<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Profile_model','profile');
		$this->load->model('Ion_auth_model','auth');

		$this->data['parent'] = 'user';
		$this->data['navbar'] = $this->load->view('_partials/menubar',$this->data,TRUE);
		$this->data['user'] = $this->ion_auth->user($this->session->user_id)->row_array();
	}

	function index()
	{
		$q = $this->input->get('q');
		$p = ($this->input->get('p') > 0) ? $this->input->get('p') : '0';

		$pagin = array(
			'base_url' => site_url('admin/user'),
			'total_rows' => count($this->profile->get_users($q)),
			'per_page' => '15'
		);
		$this->pagination->initialize($pagin);

		$this->data['users'] = $this->profile->get_users($q,$pagin['per_page'],$p);
    $this->data['body'] = $this->load->view('user/index',$this->data,TRUE);
		$this->load->view('_layouts/boxed',$this->data);
	}

	public function delete($user_id = NULL)
	{
		if ( ! intval($user_id) > 0)
			show_404();

		$this->auth->delete_user($user_id);

		redirect('admin/user');
	}

	public function activate($user_id = NULL)
	{
		if ( ! intval($user_id) > 0)
			show_404();

		$this->auth->activate($user_id);
		redirect('admin/user');
	}

	public function deactivate($user_id = NULL)
	{
		if ( ! intval($user_id) > 0)
			show_404();

		$this->auth->deactivate($user_id);
		redirect('admin/user');
	}

}
