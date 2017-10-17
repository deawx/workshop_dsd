<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends Technician_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Order_model','order');
    $this->data['parent'] = 'order';
    $this->data['navbar'] = $this->load->view('_partials/menubar',$this->data,TRUE);
  }

  function index()
  {
    $this->data['orders'] = $this->order->search();
    $this->data['body'] = $this->load->view('order/index',$this->data,TRUE);
    $this->load->view('_layouts/boxed', $this->data);
  }

  function approve($id='')
  {
    $this->form_validation->set_rules('technician_status','สถานะการตอบกลับ','required');
    $this->form_validation->set_rules('technician_remark','หมายเหตุการตอบกลับ','required');
    if ($this->form_validation->run() === FALSE) :
      $this->session->set_flashdata('warning',validation_errors());
    else:
      $data = $this->input->post();
      $data['technician_id'] = $this->session->user_id;
      $data['technician_update'] = time();
      if($this->order->save($data)) :
        $this->session->set_flashdata('message','บันทึกข้อมูลเสร็จสิ้น');
      endif;
      redirect('admin/order','refresh');
    endif;

    $this->data['order'] = $this->order->search_id($id);
    $this->data['order']['admin_id'] = $this->ion_auth->user($this->data['order']['admin_id'])->row_array();
    $this->data['order']['technician_id'] = $this->ion_auth->user($this->data['order']['technician_id'])->row_array();
    $this->data['body'] = $this->load->view('order/approve',$this->data,TRUE);
    $this->load->view('_layouts/boxed', $this->data);
  }

}
