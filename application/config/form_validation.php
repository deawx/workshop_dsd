<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$config = array(
  'patients' => array(
    array(
      'field' => 'username',
      'label' => 'Username',
      'rules' => 'required'
    ),
    array(
      'field' => 'email',
      'label' => 'Email',
      'rules' => 'required'
    )
  ),
  ''
);
