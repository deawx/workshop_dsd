<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends Private_Controller {

	private $id;

	public function __construct()
	{
		parent::__construct();
    $this->load->model('Profile_model','profile');
		$this->load->model('Assets_model','assets');
    $this->load->model('Ion_auth_model','auth');
		$this->id = $this->session->user_id;
    $this->data['parent'] = 'account';
    $this->data['navbar'] = $this->load->view('_partials/navbar',$this->data,TRUE);
		$this->data['user'] = $this->auth->user($this->id)->row_array();

		$this->data['js'] = array(script_tag('assets/js/jquery.inputmask.bundle.js'));
	}

  public function index()
  {
    //ตรวจสอบความถูกต้องจากฟอร์มที่ถูกส่งมา
    $this->form_validation->set_rules('title','คำนำหน้าชื่อ','required');
    $this->form_validation->set_rules('firstname','ชื่อ','required|max_length[100]');
    $this->form_validation->set_rules('lastname','นามสกุล','required|max_length[100]');
		$this->form_validation->set_rules('nationality','สัญชาติ','required|max_length[100]');
    $this->form_validation->set_rules('religion','ศาสนา','required|max_length[100]');
		if ($this->input->post('id_card') !== $this->input->post('id_card_old')) :
	    $this->form_validation->set_rules('id_card','หมายเลขบัตรประชาชน','required|is_numeric|exact_length[13]|is_unique[users.id_card]');
		else:
			$this->form_validation->set_rules('id_card','หมายเลขบัตรประชาชน','required|is_numeric|exact_length[13]');
		endif;
    $this->form_validation->set_rules('d','วันเกิด','required|is_numeric');
    $this->form_validation->set_rules('m','เดือนเกิด','required|is_numeric');
    $this->form_validation->set_rules('y','ปีเกิด','required|is_numeric');
		if ($this->form_validation->run() == FALSE) :
			$this->session->set_flashdata('warning',validation_errors());
		else:
			$d = $this->input->post('d');
			$m = $this->input->post('m');
			$y = $this->input->post('y')-543;
			$birthdate = strtotime($y.'-'.$m.'-'.$d);
			$data = array(
				'id' => $this->id,
				'title' => $this->input->post('title'),
				'firstname' => $this->input->post('firstname'),
				'lastname' => $this->input->post('lastname'),
				'nationality' => $this->input->post('nationality'),
				'religion' => $this->input->post('religion'),
				'id_card' => $this->input->post('id_card'),
				'birthdate' => $birthdate
			);
			if ($this->profile->save($data,'users')) :
				$this->session->set_flashdata('success','บันทึกข้อมูลสำเร็จ');
			else:
				$this->session->set_flashdata('warning',validation_errors());
			endif;
			redirect('account/profile');
		endif;

    $this->data['menu'] = 'profile';
    $this->data['leftbar'] = $this->load->view('_partials/leftbar',$this->data,TRUE);
		$this->data['body'] = $this->load->view('profile/profile',$this->data,TRUE);
		$this->load->view('_layouts/leftside',$this->data);
  }

  function address()
  {
		$this->form_validation->set_rules('address[zip]','','is_numeric|max_length[5]');
		$this->form_validation->set_rules('address_current[zip]','','is_numeric|max_length[5]');

		if ($this->form_validation->run() == FALSE) :
			$this->session->set_flashdata('warning',validation_errors());
		else:
			$address = $this->input->post('address');
			$address_current = $this->input->post('address_current');
			$data = array(
				'id' => $this->id,
				'address' => serialize($address),
				'address_current' => ($this->input->post('exist')) ? serialize($address) : serialize($address_current),
				'email' => $this->input->post('email'),
				'phone' => $this->input->post('phone'),
				'fax' => $this->input->post('fax')
			);

			if ($this->profile->save($data,'users')) :
				$this->session->set_flashdata('success','บันทึกข้อมูลสำเร็จ');
			else:
				$this->session->set_flashdata('warning',validation_errors());
				redirect('account/profile/address');
			endif;
		endif;

    $this->data['menu'] = 'address';
    $this->data['leftbar'] = $this->load->view('_partials/leftbar',$this->data,TRUE);
    $this->data['body'] = $this->load->view('profile/address',NULL,TRUE);
    $this->load->view('_layouts/leftside',$this->data);
  }

  function edit()
  {
		$this->form_validation->set_rules('phone','','is_numeric|max_length[10]');
		$this->form_validation->set_rules('fax','','is_numeric|max_length[10]');

		if ($this->form_validation->run() == FALSE) :
			$this->session->set_flashdata('warning',validation_errors());
		else:
			$data = array(
				'id' => $this->id,
				'phone' => $this->input->post('phone'),
				'fax' => $this->input->post('fax')
			);
			if ($this->profile->save($data,'users')) :
				$this->session->set_flashdata('success','บันทึกข้อมูลสำเร็จ');
			else:
				$this->session->set_flashdata('warning',validation_errors());
				redirect('account/profile/edit');
			endif;
		endif;

    $this->data['menu'] = 'edit';
    $this->data['leftbar'] = $this->load->view('_partials/leftbar',$this->data,TRUE);
    $this->data['body'] = $this->load->view('profile/edit',NULL,TRUE);
    $this->load->view('_layouts/leftside',$this->data);
  }

	function change_picture()
	{
		if (isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) :
			$upload = array(
				'allowed_types'	=> 'jpg|jpeg|png',
				'upload_path'	=> FCPATH.'uploads/profiles',
				'file_ext_tolower' => TRUE,
			);
			$exist = $this->input->post('asset_id');
			if ($exist) :
				$upload['file_name'] = $this->input->post('file_name');
				$upload['overwrite'] = TRUE;
			else:
				$upload['encrypt_name'] = TRUE;
			endif;
			$this->upload->initialize($upload);
			if ($this->upload->do_upload('file')) :
				$resize = array(
					'source_image' => $this->upload->data('full_path'),
					'width' => '600',
					'height' => '600'
				);
				$this->image_lib->initialize($resize);
				if ($this->image_lib->resize()) :
					$data = $this->upload->data();
					$data['id'] = ($this->input->post('asset_id')) ? $this->input->post('asset_id') : NULL;
					$data['file_name'] = ($this->input->post('file_name')) ? $this->input->post('file_name') : $this->upload->data('file_name');
					if ($this->assets->save($data)) :
						$id = ($this->input->post('asset_by_id')) ? $this->input->post('asset_by_id') : NULL;
						$asset_id = ($this->db->insert_id()) ? $this->db->insert_id() : $this->input->post('asset_id');
						if ($this->assets->save(array(
							'id' => $id,
							'asset_id' => $asset_id,
							'user_id' => $this->id,
							'upload_date' => time(),
							'is_avatar' => TRUE
						),'assets_by')) :
							$this->session->set_flashdata('message','อัพโหลดไฟล์เสร็จสิ้น');
						else:
							$this->session->set_flashdata('danger',$this->db->error());
						endif;
					else:
						$this->session->set_flashdata('danger',$this->db->error());
					endif;
				else:
					$this->session->set_flashdata('danger',$this->image_lib->display_errors());
				endif;
			else:
				$this->session->set_flashdata('danger',$this->upload->display_errors());
			endif;
			redirect('account/profile/change_picture');
		endif;

		$this->data['menu'] = 'change_picture';
		$this->data['picture'] = $this->assets->get_id();
		$this->data['leftbar'] = $this->load->view('_partials/leftbar',$this->data,TRUE);
		$this->data['body'] = $this->load->view('profile/change_picture',$this->data,TRUE);
		$this->load->view('_layouts/leftside',$this->data);
	}

	function attachment()
	{
		$type = $this->input->get('type');
		$id = $this->input->get('id');
		if ($type === 'delete' && intval($id) > 0) :
			$deleted = $this->assets->delete_attachment($id);
			if ($deleted === TRUE) :
				$this->session->set_flashdata('success','การลบไฟล์เสร็จสิ้น');
			else:
				$this->session->set_flashdata('danger','การลบไฟล์ขัดข้อง');
			endif;
			redirect('account/profile/attachment');
		endif;

		if (isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) :
			$upload = array(
				'allowed_types'	=> 'jpg|jpeg|png',
				'upload_path'	=> FCPATH.'uploads/attachments',
				'file_ext_tolower' => TRUE,
				'encrypt_name' => TRUE
			);
			$this->upload->initialize($upload);
			if ($this->upload->do_upload('file')) :
				$data = $this->upload->data();
				if ($this->assets->save($data)) :
					if ($this->assets->save(array(
						'asset_id' => $this->db->insert_id(),
						'user_id' => $this->id,
						'upload_date' => time()
					),'assets_by')) :
						$this->session->set_flashdata('success','อัพโหลดไฟล์เสร็จสิ้น');
					else:
						$this->session->set_flashdata('danger',$this->db->error());
					endif;
				else:
					$this->session->set_flashdata('danger',$this->db->error());
				endif;
			else:
				$this->session->set_flashdata('danger',$this->upload->display_errors());
			endif;
			redirect('account/profile/attachment');
		endif;

		$this->data['menu'] = 'attachment';
		$this->data['css'] = array(link_tag('assets/css/basic.min.css'),link_tag('assets/css/dropzone.min.css'));
		$this->data['js'] = array(script_tag('assets/js/dropzone.min.js'));
		$this->data['assets'] = $this->assets->get_all();
		$this->data['leftbar'] = $this->load->view('_partials/leftbar',$this->data,TRUE);
		$this->data['body'] = $this->load->view('profile/attachment',$this->data,TRUE);
		$this->load->view('_layouts/boxed',$this->data);
	}

  function change_password()
  {
		$this->form_validation->set_rules('old_password','รหัสผ่านเดิม','required');
		$this->form_validation->set_rules('password','รหัสผ่านใหม่','required|min_length['.$this->config->item('min_password_length','ion_auth').']|max_length['.$this->config->item('max_password_length','ion_auth').']|matches[password_confirm]');
		$this->form_validation->set_rules('password_confirm','รหัสผ่านใหม่(ยืนยัน)','required');
		if ($this->form_validation->run() == FALSE) :
			$this->session->set_flashdata('warning',validation_errors());
		else:
			$identity = $this->session->userdata('identity');
			$success = $this->ion_auth->change_password($identity,$this->input->post('old_password'),$this->input->post('password'));
			if ($success) :
				$this->session->set_flashdata('message',$this->ion_auth->messages());
				$this->logout();
			else:
				$this->session->set_flashdata('message',$this->ion_auth->errors());
				redirect('account/profile/change_password','refresh');
			endif;
		endif;
		$this->data['menu'] = 'change_password';
		$this->data['leftbar'] = $this->load->view('_partials/leftbar',$this->data,TRUE);
		$this->data['body'] = $this->load->view('profile/change_password',NULL,TRUE);
		$this->load->view('_layouts/leftside',$this->data);
  }

}
