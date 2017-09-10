<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends Public_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->data['page_header'] = 'Page Header';
		$this->data['page_header_small'] = 'by Page Header Small';
		$this->data['header'] = array(
			$this->load->view('_partials/header',$this->data,TRUE),
			$this->load->view('_partials/jumbotron',NULL,TRUE)
		);
		$this->data['parent'] = 'home';
		$this->data['navbar'] = $this->load->view('_partials/navbar',$this->data,TRUE);
		$this->data['body'] = $this->load->view('welcome/index',NULL,TRUE);
		$this->load->view('_layouts/boxed',$this->data);
	}

	function about()
	{
		$this->data['page_header'] = 'About Us';
		$this->data['page_header_small'] = 'It\'s Nice to Meet You!';
		$this->data['header'] = array(
			$this->load->view('_partials/header',$this->data,TRUE)
		);
		$this->data['parent'] = 'about';
		$this->data['navbar'] = $this->load->view('_partials/navbar',$this->data,TRUE);
		$this->data['body'] = $this->load->view('welcome/about',NULL,TRUE);
		$this->load->view('_layouts/boxed',$this->data);
	}

	function contact()
	{
		$this->data['page_header'] = 'Contact';
		$this->data['page_header_small'] = 'Subheading';
		$this->data['header'] = array(
			$this->load->view('_partials/header',$this->data,TRUE)
		);
		$this->data['parent'] = 'contact';
		$this->data['navbar'] = $this->load->view('_partials/navbar',$this->data,TRUE);
		$this->data['body'] = $this->load->view('welcome/contact',NULL,TRUE);
		$this->load->view('_layouts/boxed',$this->data);
	}

	function news($id='')
	{
		$this->data['page_header'] = 'News';
		$this->data['page_header_small'] = 'Subheading';
		$this->data['header'] = array(
			$this->load->view('_partials/header',$this->data,TRUE)
		);
		$this->data['parent'] = 'news';
		$this->data['navbar'] = $this->load->view('_partials/navbar',$this->data,TRUE);
		$this->data['body'] = $this->load->view('welcome/news',$this->data,TRUE);
		$this->load->view('_layouts/boxed',$this->data);
	}

}
