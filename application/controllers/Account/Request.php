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
		$this->id = $this->session->user_id;
    $this->data['parent'] = 'request';
    $this->data['navbar'] = $this->load->view('_partials/navbar',$this->data,TRUE);
		$this->data['user'] = $this->ion_auth->user($this->id)->row_array();
		$this->data['profile'] = $this->profile->get_id($this->id);
	}

	public function index()
	{
		$this->data['requests'] = $this->request->get_all();
		$this->data['menu'] = 'index';
		$this->data['navbar'] = $this->load->view('_partials/navbar',$this->data,TRUE);
		$this->data['rightbar'] = $this->load->view('_partials/rightbar',$this->data,TRUE);
		$this->data['body'] = $this->load->view('request/index',$this->data,TRUE);
		$this->load->view('_layouts/rightside',$this->data);
	}

	function standard()
	{
		$this->session->set_flashdata('warning','');

		// $this->form_validation->set_rules('department','หน่วยงาน','required');
		// $this->form_validation->set_rules('branch','สาขาอาชีพ','required');
		// $this->form_validation->set_rules('level','ระดับ','required');
		$this->form_validation->set_rules('category','ประเภทการสอบ','required');
		$this->form_validation->set_rules('type','ประเภทผู้สมัคร','required');
		$this->form_validation->set_rules('health','สภาพร่างกาย','required');
		// $this->form_validation->set_rules('used','ประวัติการเข้าทดสอบ','required');
		// $this->form_validation->set_rules('used_place','สถานที่เข้ารับการทดสอบ','');
		// $this->form_validation->set_rules('reason','เหตุผลที่สมัครสอบ','');
		// $this->form_validation->set_rules('source','แหล่งที่ทราบข่าว','');

		// $this->form_validation->set_rules('title','','required');
		// $this->form_validation->set_rules('firstname','','required');
		// $this->form_validation->set_rules('lastname','','required');
		// $this->form_validation->set_rules('fullname','','required');
		// $this->form_validation->set_rules('religion','','required');
		// $this->form_validation->set_rules('nationality','','required');
		// $this->form_validation->set_rules('d','วันเกิด','required|is_numeric');
		// $this->form_validation->set_rules('m','เดือนเกิด','required|is_numeric');
		// $this->form_validation->set_rules('y','ปีเกิด','required|is_numeric');
		// $this->form_validation->set_rules('address[email]','อีเมล์','required|valid_email');
		// $this->form_validation->set_rules('address[phone]','โทรศัพท์','required|is_numeric|exact_length[10]');
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
			if ($this->input->post('profile')) :
				$data['profile'] = $this->input->post('profile');
				$data['profile']['birthdate'] = $birthdate;
				$data['profile'] = serialize($data['profile']);
			endif;
			$data['address'] = $this->input->post('address') ? serialize($this->input->post('address')) : NULL;
			$data['education'] = $this->input->post('education') ? serialize($this->input->post('education')) : NULL;
			$data['work_yes'] = $this->input->post('work_yes') ? serialize($this->input->post('work_yes')) : NULL;
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

		$this->data['menu'] = 'standard';
		$this->data['css'] = array(link_tag('assets/css/editable-select.min.css'));
		$this->data['js'] = array(script_tag('assets/js/editable-select.min.js'));
		$this->data['navbar'] = $this->load->view('_partials/navbar',$this->data,TRUE);
		$this->data['rightbar'] = $this->load->view('_partials/rightbar',$this->data,TRUE);
		$this->data['body'] = $this->load->view('request/standard',$this->data,TRUE);
		$this->load->view('_layouts/rightside',$this->data);
	}

	function skill()
	{
		$this->session->set_flashdata('warning','');

		$this->form_validation->set_rules('profile[title]','คำนำหน้าชื่อ','required');
		// $this->form_validation->set_rules('profile[firstname]','','required');
		// $this->form_validation->set_rules('profile[lastname]','','required');
		// $this->form_validation->set_rules('profile[fullname]','','required');
		// $this->form_validation->set_rules('profile[religion]','','required');
		// $this->form_validation->set_rules('profile[blood]','','required');
		// $this->form_validation->set_rules('profile[nationality]','','required');
		// $this->form_validation->set_rules('d','วันเกิด','required|is_numeric');
		// $this->form_validation->set_rules('m','เดือนเกิด','required|is_numeric');
		// $this->form_validation->set_rules('y','ปีเกิด','required|is_numeric');
		$this->form_validation->set_rules('career[1]','สาขาอาชีพที่ 1','max_length[150]|differs[career[2]]|differs[career[3]]|differs[career[4]]|differs[career[5]]');
		$this->form_validation->set_rules('career[2]','สาขาอาชีพที่ 2','max_length[150]|differs[career[1]]|differs[career[3]]|differs[career[4]]|differs[career[5]]');
		$this->form_validation->set_rules('career[3]','สาขาอาชีพที่ 3','max_length[150]|differs[career[1]]|differs[career[2]]|differs[career[4]]|differs[career[5]]');
		$this->form_validation->set_rules('career[4]','สาขาอาชีพที่ 4','max_length[150]|differs[career[1]]|differs[career[2]]|differs[career[3]]|differs[career[5]]');
		$this->form_validation->set_rules('career[5]','สาขาอาชีพที่ 5','max_length[150]|differs[career[1]]|differs[career[2]]|differs[career[3]]|differs[career[4]]');

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
			if ($this->input->post('profile')) :
				$data['profile'] = $this->input->post('profile');
				$data['profile']['birthdate'] = $birthdate;
				$data['profile'] = serialize($data['profile']);
			endif;
			$data['address'] = $this->input->post('address') ? serialize($this->input->post('address')) : NULL;
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

		$this->data['menu'] = 'skill';
		$this->data['navbar'] = $this->load->view('_partials/navbar',$this->data,TRUE);
		$this->data['rightbar'] = $this->load->view('_partials/rightbar',$this->data,TRUE);
		$this->data['body'] = $this->load->view('request/skill',$this->data,TRUE);
		$this->load->view('_layouts/rightside',$this->data);
	}

	function result()
	{

		// $this->data['results'] = $this->approve->get_all();

		$this->data['menu'] = 'result';
		$this->data['navbar'] = $this->load->view('_partials/navbar',$this->data,TRUE);
		$this->data['rightbar'] = $this->load->view('_partials/rightbar',$this->data,TRUE);
		$this->data['body'] = $this->load->view('request/result',$this->data,TRUE);
		$this->load->view('_layouts/rightside',$this->data);
	}

	function calendar()
	{
		$this->data['menu'] = 'calendar';
		$this->data['navbar'] = $this->load->view('_partials/navbar',$this->data,TRUE);
		$this->data['rightbar'] = $this->load->view('_partials/rightbar',$this->data,TRUE);
		$this->data['body'] = $this->load->view('request/register',$this->data,TRUE);
		$this->load->view('_layouts/rightside',$this->data);
	}

	function attachment($id=NULL)
	{
		if ( ! intval($id) > 0)
			show_error('ไม่พบหน้าที่ต้องการค้นหา','404');

		if (isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) :
			$upload = array(
				'allowed_types'	=> 'jpg|jpeg|png|pdf',
				'upload_path'	=> FCPATH.'uploads/attachments',
				'file_ext_tolower' => TRUE,
			);
			if ($this->upload->initialize($upload)) :
				if ($this->assets->save($data)) :
					$asset_id = $this->db->insert_id();
					$assets = array(
						'asset_id' => $asset_id,
						'user_id' => $this->id,
						'upload_date' => time()
					);
					if ($this->assets->save($assets,'assets_by')) :
						$this->session->set_flashdata('success','อัพโหลดไฟล์เสร็จสิ้น');
					else:
						$this->session->set_flashdata('danger',$this->db->error());
					endif;
				else:
					$this->session->set_flashdata('danger',$this->db->error());
				endif;
			else:
				$this->session->set_flashdata('danger',$this->upload->display_errors());
			endif;
		endif;

		$this->data['menu'] = 'attachments';
		$this->data['navbar'] = NULL;
		$this->data['body'] = $this->load->view('request/_standard_file',NULL,TRUE);
		$this->load->view('_layouts/boxed',$this->data);
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

}
