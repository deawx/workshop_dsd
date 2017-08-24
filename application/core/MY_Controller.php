<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

  public $data = array();

  public function __construct()
  {
    parent::__construct();
    $this->data = array(
      'page_title' => 'DSD System',
      'page_header' => '',
      'page_header_small' => '',
      'parent' => '',
      'menu' => '',
      'meta_tag' => array(),
      'css' => array(),
      'js' => array(),
      'header' => '',
      'footer' => '',
      'navbar' => '',
      'breadcrumb' => array(),
      'body' => '',
      'leftbar' => '',
      'rightbar' => ''
    );
  }

}

class Public_Controller extends MY_Controller {

  public function __construct()
  {
    parent::__construct();
    // if ($this->ion_auth->in_group('member'))
  }

}

class Private_Controller extends MY_Controller {

  public function __construct()
  {
    parent::__construct();
    if ( ! $this->session->has_userdata('identity') === TRUE)
      redirect('auth/logout');
  }

}

class Admin_Controller extends MY_Controller {

  public function __construct()
  {
    parent::__construct();
  }

}
