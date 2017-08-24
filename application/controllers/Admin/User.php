<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Profile_model','profile');

		$this->data['parent'] = 'user';
		$this->data['navbar'] = $this->load->view('_partials/menubar',$this->data,TRUE);
	}

	function index()
	{
		$this->data['users'] = $this->profile->get_users();
    $this->data['body'] = $this->load->view('user/index',$this->data,TRUE);
		$this->load->view('_layouts/boxed',$this->data);
	}

}
