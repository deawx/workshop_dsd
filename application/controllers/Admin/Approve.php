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
		$data = $this->input->post();
		if ($data) :
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

		$q = $this->input->get();
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
		$data = $this->input->post();
		if ($data) :

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
