<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->data['parent'] = 'news';
		$this->data['navbar'] = $this->load->view('_partials/menubar',$this->data,TRUE);
	}

	public function index()
	{
		$this->data['body'] = $this->load->view('news/index',NULL,TRUE);
		$this->load->view('_layouts/boxed',$this->data);
	}

}
