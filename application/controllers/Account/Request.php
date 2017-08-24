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
    $this->load->model('Standard_model','standard');
		$this->id = $this->session->user_id;
    $this->data['parent'] = 'request';
    $this->data['navbar'] = $this->load->view('_partials/navbar',$this->data,TRUE);
		$this->data['user'] = $this->ion_auth->user($this->id)->row_array();
		$this->data['profile'] = $this->profile->get_id($this->id);
	}

	public function index()
	{
		$this->data['menu'] = 'index';
		$this->data['navbar'] = $this->load->view('_partials/navbar',$this->data,TRUE);
		$this->data['rightbar'] = $this->load->view('_partials/rightbar',$this->data,TRUE);
		$this->data['body'] = $this->load->view('request/index',$this->data,TRUE);
		$this->load->view('_layouts/rightside',$this->data);
	}

	function standard()
	{
		$this->session->set_flashdata('warning','');
		$post = $this->input->post();
		if ($post) :
			// $this->form_validation->set_rules('department','หน่วยงาน','required');
			// $this->form_validation->set_rules('branch','สาขาอาชีพ','required');
			// $this->form_validation->set_rules('level','ระดับ','required');
			// $this->form_validation->set_rules('category','ประเภทการสอบ','required');
			// $this->form_validation->set_rules('used','ประวัติการเข้าทดสอบ','required');
			// $this->form_validation->set_rules('used_place','สถานที่เข้ารับการทดสอบ','required');
			// $this->form_validation->set_rules('reason','เหตุผลที่สมัครสอบ','required');
			// $this->form_validation->set_rules('source','แหล่งที่ทราบข่าว','required');
			//
			// $this->form_validation->set_rules('title','','required');
			// $this->form_validation->set_rules('firstname','','required');
			// $this->form_validation->set_rules('lastname','','required');
			// $this->form_validation->set_rules('fullname','','required');
			// $this->form_validation->set_rules('religion','','required');
			// $this->form_validation->set_rules('nationality','','required');
			// $this->form_validation->set_rules('id_card','','required');
			// $this->form_validation->set_rules('','','required');
			// $this->form_validation->set_rules('','','required');
			// $this->form_validation->set_rules('','','required');
			// $this->form_validation->set_rules('','','required');
			// $this->form_validation->set_rules('','','required');
			// $this->form_validation->set_rules('','','required');

			if ($this->form_validation->run() === TRUE) :
				print_data($this->input->post()); die();
				redirect('account/request/standard/'.$this->data['next']);
			else:
				$this->session->set_flashdata('warning',validation_errors());
			endif;
		endif;

		$this->data['css'] = array(link_tag('assets/css/editable-select.min.css'));
		$this->data['js'] = array(script_tag('assets/js/editable-select.min.js'));
		$this->data['menu'] = 'standard';
		$this->data['navbar'] = $this->load->view('_partials/navbar',$this->data,TRUE);
		$this->data['rightbar'] = $this->load->view('_partials/rightbar',$this->data,TRUE);
		$this->data['body'] = $this->load->view('request/standard',$this->data,TRUE);
		$this->load->view('_layouts/rightside',$this->data);
	}

	function skill($step='1')
	{
		$this->session->set_flashdata('warning','');
		$step = (intval($step) > 0 && intval($step) <= 4) ? $step : '1';
		$this->data['step'] = $step;
		$this->data['prev'] = $step-1;
		$this->data['next'] = $step+1;

		$post = $this->input->post();
		if ($post) :
			$this->form_validation->set_rules('firstname','ชื่อ','required');
			if ($this->form_validation->run() === TRUE) :
				// print_data($this->input->post());
				redirect('account/request/standard/'.$this->data['next']);
			else:
				$this->session->set_flashdata('warning',validation_errors());
			endif;
		endif;

		$this->data['menu'] = 'skill';
		$this->data['navbar'] = $this->load->view('_partials/navbar',$this->data,TRUE);
		$this->data['rightbar'] = $this->load->view('_partials/rightbar',$this->data,TRUE);
		$this->data['body'] = $this->load->view('request/skill',$this->data,TRUE);
		$this->load->view('_layouts/rightside',$this->data);
	}

	function result()
	{
		$this->data['menu'] = 'result';
		$this->data['navbar'] = $this->load->view('_partials/navbar',$this->data,TRUE);
		$this->data['rightbar'] = $this->load->view('_partials/rightbar',$this->data,TRUE);
		$this->data['body'] = $this->load->view('request/register',$this->data,TRUE);
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

	function get_work_category_type($type='')
	{
		$array = array();
		switch ($type) :
			case 'government':
				$array = array(
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
			case 'company':
				$array = array(
					''=>'เลือกรายการ',
					'พนักงาน/ลูกจ้างภาคเอกชน'=>'พนักงาน/ลูกจ้างภาคเอกชน'
				);
				break;
			case 'state':
				$array = array(
					''=>'เลือกรายการ',
					'พนักงาน/ลูกจ้างรัฐวิสาหกิจ'=>'พนักงาน/ลูกจ้างรัฐวิสาหกิจ'
				);
				break;
			case 'private':
				$array = array(
					''=>'เลือกรายการ',
					'ผู้รวมกลุ่มอาชีพ/วิสาหกิจชุมชน'=>'ผู้รวมกลุ่มอาชีพ/วิสาหกิจชุมชน',
					'ผู้รับจ้างทั่วไปโดยไม่มีนายจ้าง'=>'ผู้รับจ้างทั่วไปโดยไม่มีนายจ้าง',
					'เกษตรกร(ทำไร่/ทำนา/ทำสวน/เลี้ยงสัตว์)'=>'เกษตรกร(ทำไร่/ทำนา/ทำสวน/เลี้ยงสัตว์)'
				);
				break;
			case 'family':
				$array = array(
					''=>'เลือกรายการ',
					'ลูกจ้างธุรกิจในครัวเรือน'=>'ลูกจ้างธุรกิจในครัวเรือน'
				);
				break;
			// default:
			// 	break;
		endswitch;

		$this->output
			->set_content_type('application/json','utf-8')
			->set_output(json_encode($array));
	}

}
