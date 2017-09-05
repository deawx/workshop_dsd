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

	public function index()
	{
		// $d = $this->input->get('d');
		// $p = ($this->input->get('p') > 0) ? $this->input->get('p') : '0';
		//
		// $pagin = array(
		// 	'base_url' => site_url('admin/approve'),
		// 	'total_rows' => count($this->request->get_all($d)),
		// 	'per_page' => '15'
		// );
		// $this->pagination->initialize($pagin);

		$standards = $this->request->search(array(),'standards');
		$skills = $this->request->search(array(),'skills');
		$requests = array_merge($standards,$skills);
		usort($requests, function($a, $b) {
			return $a['date_create'] < $b['date_create'];
		});

		$this->data['requests'] = $requests;
		$this->data['body'] = $this->load->view('approve/index',$this->data,TRUE);
		$this->load->view('_layouts/boxed',$this->data);
	}

}
