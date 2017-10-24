<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
ไฟล์นี้ทำหน้าที่เขียนฟังก์ชั่นเพื่อจัดการการทำงานเรื่องการเขียนคำร้องขอสอบต่างๆ และจัดการกับตารางปฎิทินการนัดสอบของแต่ละคำร้อง
*/

class Request extends Private_Controller {

	private $id;

	public function __construct()
	{
		parent::__construct();
    $this->load->model('Profile_model','profile');
    $this->load->model('Request_model','request');
    $this->load->model('Assets_model','assets');
		$this->id = $this->session->user_id;
    $this->data['parent'] = 'request';
    $this->data['navbar'] = $this->load->view('_partials/navbar',$this->data,TRUE);
		$this->data['user'] = $this->ion_auth->user($this->id)->row_array();
	}

	public function index()
	{
		$this->session->set_flashdata('warning','');

		if ($this->input->post()) :
			$type = $this->input->post('type');
			$data = $this->input->post();
			$data['assets_id'] = $this->input->post('assets_id') ? serialize($this->input->post('assets_id')) : NULL;
			// print_data($data); die();
			if ($this->request->save($data,$type)) :
				$this->session->set_flashdata('success','บันทึกข้อมูลสำเร็จ');
			else:
				$this->session->set_flashdata('danger','บันทึกข้อมูลล้มเหลว');
			endif;
			redirect('account/request/index');
		endif;

		$this->data['requests'] = $this->request->get_all_id($this->id);
		$this->data['assets'] = $this->assets->get_all();

		$this->data['menu'] = 'index';
		$this->data['navbar'] = $this->load->view('_partials/navbar',$this->data,TRUE);
		$this->data['rightbar'] = $this->load->view('_partials/rightbar',$this->data,TRUE);
		$this->data['body'] = $this->load->view('request/index',$this->data,TRUE);
		$this->load->view('_layouts/rightside',$this->data);
	}

	function standard($id='')
	{
		$this->session->set_flashdata('warning','');

		/*
		ฟังก์ชั่นตรวจสอบความถูกต้องของการกรอกแบบฟอร์มก่อนการบันทึกเข้าสู่ฐานข้อมูล
		*/
		$this->form_validation->set_rules('department','หน่วยงาน','required');
		$this->form_validation->set_rules('branch','สาขาอาชีพ','required');
		$this->form_validation->set_rules('level','ระดับ','required');
		$this->form_validation->set_rules('category','ประเภทการสอบ','required');
		$this->form_validation->set_rules('type','ประเภทผู้สมัคร','required');
		$this->form_validation->set_rules('health','สภาพร่างกาย','required');
		// $this->form_validation->set_rules('used','ประวัติการเข้าทดสอบ','required');
		// $this->form_validation->set_rules('used_place','สถานที่เข้ารับการทดสอบ','');
		// $this->form_validation->set_rules('reason','เหตุผลที่สมัครสอบ','');
		// $this->form_validation->set_rules('source','แหล่งที่ทราบข่าว','');

		$this->form_validation->set_rules('profile[title]','คำนำหน้าชื่อ','required');
		$this->form_validation->set_rules('profile[firstname]','ชื่อ','required');
		$this->form_validation->set_rules('profile[lastname]','นามสกุล','required');
		$this->form_validation->set_rules('profile[fullname]','ชื่อเต็ม(ภาษาอังกฤษ)','required');
		$this->form_validation->set_rules('religion','','required');
		$this->form_validation->set_rules('nationality','','required');
		$this->form_validation->set_rules('d','วันเกิด','required|is_numeric');
		$this->form_validation->set_rules('m','เดือนเกิด','required|is_numeric');
		$this->form_validation->set_rules('y','ปีเกิด','required|is_numeric');
		$this->form_validation->set_rules('address[address]','ที่อยู่เลขที่','required');
		// $this->form_validation->set_rules('address[street]','ถนน','required');
		$this->form_validation->set_rules('address[tambon]','ตำบล','required');
		$this->form_validation->set_rules('address[amphur]','อำเภอ','required');
		$this->form_validation->set_rules('address[province]','จังหวัด','required');
		$this->form_validation->set_rules('address[email]','อีเมล์','required|valid_email');
		$this->form_validation->set_rules('address[phone]','โทรศัพท์','required|is_numeric|exact_length[10]');
		// $this->form_validation->set_rules('address[fax]','โทรสาร','required|is_numeric|exact_length[10]');
		// $this->form_validation->set_rules('education[degree]','ระดับการศึกษา','required');
		// $this->form_validation->set_rules('education[place]','สถานศึกษา','required');
		// $this->form_validation->set_rules('education[department]','สาขาวิชา','required');
		// $this->form_validation->set_rules('education[province]','จังหวัดที่ศึกษา','required');
		// $this->form_validation->set_rules('education[year]','ปีที่จบการศึกษา','required');
		// $this->form_validation->set_rules('work_status','การทำงานในปัจจุบัน','required');
		// $this->form_validation->set_rules('need_work_status','ความต้องการหางาน','required');

		if ($this->form_validation->run() == FALSE) :
			$this->session->set_flashdata('warning',validation_errors());
		else:
			$data = $this->input->post();
			if ($this->input->post('id')) :
				$data['date_update'] = time();
			else:
				$data['date_create'] = time();
			endif;
			$d = $this->input->post('d');
			$m = $this->input->post('m');
			$y = $this->input->post('y')-543;
			$birthdate = strtotime($y.'-'.$m.'-'.$d);
			$data['profile'] = $this->input->post('profile');
			$data['profile']['birthdate'] = $birthdate;
			$data['profile'] = serialize($data['profile']);
			$data['address'] = $this->input->post('address') ? serialize($this->input->post('address')) : NULL;
			$data['address_current'] = $this->input->post('address_current') ? serialize($this->input->post('address_current')) : serialize($this->input->post('address'));
			$data['education'] = $this->input->post('education') ? serialize($this->input->post('education')) : NULL;
			if ($this->input->post('work_status') === 'ผู้มีงานทำ') :
				$work_yes = $this->input->post('work_yes');
				$work_yes['group'] = isset($work_yes['group']) ? $work_yes['group'] : NULL;
				$data['work_yes'] = serialize($work_yes);
				$data['work_no'] = NULL;
			elseif ($this->input->post('work_status') === 'ผู้ไม่มีงานทำ'):
				$data['work_no'] = $this->input->post('work_no');
				$data['work_yes'] = NULL;
			else:
				$data['work_yes'] = NULL;
				$data['work_no'] = NULL;
			endif;
			if ($this->input->post('need_work_status') === 'ต้องการจัดหางานในประเทศ') :
				$data['need_work_country'] = NULL;
			elseif ($this->input->post('need_work_status') === 'ต้องการจัดหางานในต่างประเทศ') :
				$data['need_work_position'] = NULL;
				$data['need_work_group'] = NULL;
			else:
				$data['need_work_position'] = NULL;
				$data['need_work_group'] = NULL;
				$data['need_work_country'] = NULL;
			endif;
			$data['work_abroad'] = $this->input->post('work_abroad') ? serialize($this->input->post('work_abroad')) : NULL;
			$data['reference'] = $this->input->post('reference') ? serialize($this->input->post('reference')) : NULL;

			// print_data($data); die();

			if ($this->request->save($data,'standards')) :
				$this->session->set_flashdata('success','บันทึกข้อมูลสำเร็จ');
			else:
				$this->session->set_flashdata('danger','บันทึกข้อมูลล้มเหลว');
			endif;
			redirect('account/request/index');
		endif;

		$this->data['css'] = array(link_tag('assets/css/editable-select.min.css'));
		$this->data['js'] = array(script_tag('assets/js/editable-select.min.js'),script_tag('assets/js/jquery.inputmask.bundle.js'));
		if (intval($id) > 0) :
			$this->data['navbar'] = NULL;
			$this->data['standard'] = $this->request->search_id($id,'standards');
			$this->data['body'] = $this->load->view('request/standard_edit',$this->data,TRUE);
			$this->load->view('_layouts/boxed',$this->data);
		else:
			$this->data['menu'] = 'standard';
			$this->data['navbar'] = $this->load->view('_partials/navbar',$this->data,TRUE);
			$this->data['rightbar'] = $this->load->view('_partials/rightbar',$this->data,TRUE);
			$this->data['body'] = $this->load->view('request/standard',$this->data,TRUE);
			$this->load->view('_layouts/rightside',$this->data);
		endif;
	}

	function skill($id='')
	{
		$this->session->set_flashdata('warning','');

		$this->form_validation->set_rules('profile[title]','คำนำหน้าชื่อ','required');
		$this->form_validation->set_rules('profile[firstname]','ชื่อ','required');
		$this->form_validation->set_rules('profile[lastname]','นามสกุล','required');
		$this->form_validation->set_rules('profile[religion]','','required');
		$this->form_validation->set_rules('profile[blood]','','required');
		$this->form_validation->set_rules('profile[nationality]','','required');
		$this->form_validation->set_rules('d','วันเกิด','required|is_numeric');
		$this->form_validation->set_rules('m','เดือนเกิด','required|is_numeric');
		$this->form_validation->set_rules('y','ปีเกิด','required|is_numeric');
		$this->form_validation->set_rules('address[address]','ที่อยู่เลขที่','required');
		// $this->form_validation->set_rules('address[street]','ถนน','required');
		$this->form_validation->set_rules('address[tambon]','ตำบล','required');
		$this->form_validation->set_rules('address[moo]','หมู่','required');
		$this->form_validation->set_rules('address[soi]','ซอย','required');
		$this->form_validation->set_rules('address[amphur]','อำเภอ','required');
		$this->form_validation->set_rules('address[province]','จังหวัด','required');
		$this->form_validation->set_rules('address[email]','อีเมล์','required|valid_email');
		$this->form_validation->set_rules('address[phone]','โทรศัพท์','required|is_numeric|exact_length[10]');
		// $this->form_validation->set_rules('address[fax]','โทรสาร','required|is_numeric|exact_length[10]');
		$this->form_validation->set_rules('career[1]','สาขาอาชีพที่ 1','max_length[150]|differs[career[2]]|differs[career[3]]|differs[career[4]]|differs[career[5]]');
		$this->form_validation->set_rules('career[2]','สาขาอาชีพที่ 2','max_length[150]|differs[career[1]]|differs[career[3]]|differs[career[4]]|differs[career[5]]');
		$this->form_validation->set_rules('career[3]','สาขาอาชีพที่ 3','max_length[150]|differs[career[1]]|differs[career[2]]|differs[career[4]]|differs[career[5]]');
		$this->form_validation->set_rules('career[4]','สาขาอาชีพที่ 4','max_length[150]|differs[career[1]]|differs[career[2]]|differs[career[3]]|differs[career[5]]');
		$this->form_validation->set_rules('career[5]','สาขาอาชีพที่ 5','max_length[150]|differs[career[1]]|differs[career[2]]|differs[career[3]]|differs[career[4]]');
		if ( ! intval($id) > 0)
			$this->form_validation->set_rules('needed','เอกสารสำคัญ','required|is_numeric');

		if ($this->form_validation->run() == FALSE) :
			$this->session->set_flashdata('warning',validation_errors());
		else:
			$data = $this->input->post();
			if ($this->input->post('id')) :
				$data['date_update'] = time();
			else:
				$data['date_create'] = time();
			endif;
			$d = $this->input->post('d');
			$m = $this->input->post('m');
			$y = $this->input->post('y')-543;
			$data['profile'] = $this->input->post('profile');
			$birthdate = strtotime($y.'-'.$m.'-'.$d);
			$data['profile']['birthdate'] = $birthdate;
			$data['profile'] = serialize($data['profile']);
			$data['address'] = $this->input->post('address') ? serialize($this->input->post('address')) : NULL;
			$data['address_current'] = $this->input->post('address_current') ? serialize($this->input->post('address_current')) : serialize($this->input->post('address'));
			$data['education'] = $this->input->post('education') ? serialize($this->input->post('education')) : NULL;
			$data['work'] = $this->input->post('work') ? serialize($this->input->post('work')) : NULL;
			$careers = $this->input->post('career') ? clear_null_array($this->input->post('career'),TRUE) : array();
			if (empty($careers)) :
				$this->session->set_flashdata('danger','กรุณากรอกข้อมูลสาอาชีพอย่างน้อย 1 รายการ');
				redirect('account/request/skill');
			endif;
			foreach ($careers as $key => $value) :
				$data['career'.++$key] = $value;
			endforeach;
			$data['reference'] = $this->input->post('reference') ? serialize($this->input->post('reference')) : NULL;

			// print_data($data); die();

			if ($this->request->save($data,'skills')) :
				$this->session->set_flashdata('success','บันทึกข้อมูลสำเร็จ');
			else:
				$this->session->set_flashdata('danger','บันทึกข้อมูลล้มเหลว');
			endif;
			redirect('account/request/index');
		endif;

		$this->data['js'] = array(script_tag('assets/js/jquery.inputmask.bundle.js'));
		if (intval($id) > 0) :
			$this->data['navbar'] = NULL;
			$this->data['skill'] = $this->request->search_id($id,'skills');
			$this->data['body'] = $this->load->view('request/skill_edit',$this->data,TRUE);
			$this->load->view('_layouts/boxed',$this->data);
		else:
			$this->data['menu'] = 'skill';
			$this->data['navbar'] = $this->load->view('_partials/navbar',$this->data,TRUE);
			$this->data['rightbar'] = $this->load->view('_partials/rightbar',$this->data,TRUE);
			$this->data['body'] = $this->load->view('request/skill',$this->data,TRUE);
			$this->load->view('_layouts/rightside',$this->data);
		endif;
	}

	function result()
	{
		$this->session->set_flashdata('warning','');

		$this->data['requests'] = $this->request->get_all_id($this->id,'accept');
		$this->data['assets'] = $this->assets->get_all();

		$this->data['menu'] = 'result';
		$this->data['navbar'] = $this->load->view('_partials/navbar',$this->data,TRUE);
		$this->data['rightbar'] = $this->load->view('_partials/rightbar',$this->data,TRUE);
		$this->data['body'] = $this->load->view('request/result',$this->data,TRUE);
		$this->load->view('_layouts/rightside',$this->data);
	}

	function calendar()
	{
		$this->session->set_flashdata('warning','');

		$this->form_validation->set_rules('code','ประเภทการสอบ','required');
		if ($this->form_validation->run() == FALSE) :
			$this->session->set_flashdata('warning',validation_errors());
		else:
			$code = $this->input->post('code');
			$approve_schedule = $this->input->post('approve_schedule');
			$record = $this->request->get_code($code);
			$type = (isset($record['category'])) ? 'standards' : 'skills';
			if ($this->request->save(array(
				'id'=>$record['id'],
				'approve_schedule'=>strtotime($approve_schedule),
			),$type)) :
				$this->session->set_flashdata('success','บันทึกข้อมูลสำเร็จ');
			else:
				$this->session->set_flashdata('danger','บันทึกข้อมูลล้มเหลว');
			endif;
			redirect('account/request/result');
		endif;

		$this->data['menu'] = 'calendar';
		$this->data['navbar'] = $this->load->view('_partials/navbar',$this->data,TRUE);
		$this->data['rightbar'] = $this->load->view('_partials/rightbar',$this->data,TRUE);
		$schedules = $this->request->get_future('','accept');
		$schedule = array();
		foreach ($schedules as $key => $value) :
			// $type = (isset($value['category'])) ? $value['category'] : 'ใบรับรองความรู้ความสามารถ';
			// $title = $this->db->select('title,firstname,lastname')->where('id',$value['user_id'])->get('users')->row_array();
			$schedule[$key]['title'] = $value['title'].' '.$value['firstname'].' '.$value['lastname'];
			$schedule[$key]['start'] = date('Y-m-d',$value['approve_schedule']);
		endforeach;
		$this->data['schedule'] = $schedule;
		$request = $this->request->get_all_id($this->id,'accept');
		foreach ($request as $key => $value) :
			if ($value['approve_schedule'] != NULL) :
				unset($request[$key]);
			endif;
		endforeach;
		$this->data['request'] = $request;
		$this->data['css'] = array(link_tag('assets/css/fullcalendar.css'),link_tag('assets/css/fullcalendar.print.css','stylesheet','text/css','fullcalendar','print'));
		$this->data['js'] = array(script_tag('assets/js/moment.min.js'),script_tag('assets/js/moment.th.js'),script_tag('assets/js/fullcalendar.js'));
		$this->data['body'] = $this->load->view('request/calendar',$this->data,TRUE);
		$this->load->view('_layouts/rightside',$this->data);
	}

	function queue($code='')
	{
		$this->session->set_flashdata('warning','');

		if ( ! intval($code) && ! strlen($code) === '11')
			show_404();

		$record = $this->request->get_code($code);

		$this->data['record'] = $record;
		$this->load->view('_pdf/queue',$this->data);
	}

	function get_work_type($category='')
	{
		$type = array();
		$category = urldecode($category);
		switch ($category) :
			case 'ทำงานภาครัฐ':
				$type = array(
					''=>'เลือกรายการ',
					'ข้าราชการพลเรือน'=>'ข้าราชการพลเรือน',
					'ข้าราชการตำรวจ'=>'ข้าราชการตำรวจ',
					'ข้าราชการทหาร'=>'ข้าราชการทหาร',
					'ข้าราชการครู'=>'ข้าราชการครู',
					'ข้าราชการอัยการ'=>'ข้าราชการอัยการ',
					'ลูกจ้างประจำ'=>'ลูกจ้างประจำ',
					'พนักงานราชการ'=>'พนักงานราชการ',
					'พนักงานจ้างเหมา'=>'พนักงานจ้างเหมา'
				);
				break;
			case 'ทำงานภาคเอกชน':
				$type = array(
					''=>'เลือกรายการ',
					'พนักงาน/ลูกจ้างภาคเอกชน'=>'พนักงาน/ลูกจ้างภาคเอกชน'
				);
				break;
			case 'ทำงานรัฐวิสาหกิจ':
				$type = array(
					''=>'เลือกรายการ',
					'พนักงาน/ลูกจ้างรัฐวิสาหกิจ'=>'พนักงาน/ลูกจ้างรัฐวิสาหกิจ'
				);
				break;
			case 'ประกอบธุรกิจส่วนตัว':
				$type = array(
					''=>'เลือกรายการ',
					'ผู้รวมกลุ่มอาชีพ/วิสาหกิจชุมชน'=>'ผู้รวมกลุ่มอาชีพ/วิสาหกิจชุมชน',
					'ผู้รับจ้างทั่วไปโดยไม่มีนายจ้าง'=>'ผู้รับจ้างทั่วไปโดยไม่มีนายจ้าง',
					'เกษตรกร(ทำไร่/ทำนา/ทำสวน/เลี้ยงสัตว์)'=>'เกษตรกร(ทำไร่/ทำนา/ทำสวน/เลี้ยงสัตว์)'
				);
				break;
			case 'ช่วยธุรกิจครัวเรือน':
				$type = array(
					''=>'เลือกรายการ',
					'ลูกจ้างธุรกิจในครัวเรือน'=>'ลูกจ้างธุรกิจในครัวเรือน'
				);
				break;
		endswitch;

		$this->output
			->set_content_type('application/json','utf-8')
			->set_output(json_encode($type));
	}

	function get_event($date)
	{
		$events = $this->request->get_date($date);

		$standard = count(array_column($events,'category'));
		$skill = count($events)-$standard;

		$events['standard'] = $standard;
		if ($standard >= 15) :
			$events['standard'] = 'full';
		endif;
		$events['skill'] = $skill;
		if ($skill >= 26) :
			$events['skill'] = 'full';
		endif;

		$this->output
			->set_content_type('application/json','utf-8')
			->set_output(json_encode($events));
	}

}
