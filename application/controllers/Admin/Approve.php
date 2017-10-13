<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Approve extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Request_model','request');

		$this->data['parent'] = 'approve';
		$this->data['navbar'] = $this->load->view('_partials/menubar',$this->data,TRUE);
	}

	function index()
	{
		$this->form_validation->set_rules('approve_remark','หมายเหตุการปฎิเสธ','max_length[100]');
		if ($this->form_validation->run() == FALSE) :
			$this->session->set_flashdata('warning',validation_errors());
		else:
			$data = $this->input->post();
			$data['admin_id'] = $this->session->user_id;
			$data['approve_date'] = time();

			// print_data($data); die();

			if ($this->request->save($data,$data['type'])) :
				$this->session->set_flashdata('success','บันทึกข้อมูลสำเร็จ');
			else:
				$this->session->set_flashdata('danger','บันทึกข้อมูลล้มเหลว');
			endif;
			redirect('admin/approve');
		endif;

		$q = $this->input->get('email');
		$this->data['requests'] = $this->request->get_all($q);
		$this->data['body'] = $this->load->view('approve/index',$this->data,TRUE);
		$this->load->view('_layouts/boxed',$this->data);
	}

	function view($code='')
	{
		if ( ! intval($code) && ! strlen($code) === '11')
			show_404();

		$record = $this->request->get_code($code);
		$type = isset($record['department']) ? 'standard' : 'skill';

		$this->data['record'] = $record;
		$this->load->view('_pdf/'.$type,$this->data);
	}

	function status()
	{
		$this->form_validation->set_rules('status','ผลการสอบ','in_list[ผ่าน,ไม่ผ่าน]');
		if ($this->form_validation->run() == FALSE) :
			$this->session->set_flashdata('warning',validation_errors());
		else:
			$data = $this->input->post();

			// print_data($data); die();

			if ($this->request->save($data,$data['type'])) :
				$this->session->set_flashdata('success','บันทึกข้อมูลสำเร็จ');
			else:
				$this->session->set_flashdata('danger','บันทึกข้อมูลล้มเหลว');
			endif;
			redirect('admin/approve');
		endif;
	}

}
