<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ordering extends CI_Controller {
	function __construct() {
        parent::__construct();
			$this->load->model('crud');
	}

	public function index()
	 {
		$data['data'] = $this->crud->get_records('products');
		$this->load->view('product/list', $data);
	 }
 
	public function create()
	{
		$where['is_deleted'] = '0';
		$data['data'] = $this->crud->get_records_condition('products',$where);
		$this->load->view('ordering/create',$data);
	}

	public function store()
	{
		$data['product_id'] = $this->input->post('product_id');
		$data['description'] = $this->input->post('description');
		$data['cat_no'] 	= $this->input->post('cat_no');
		$data['standar_pack'] = $this->input->post('standar_pack');
	
		$this->crud->insert('ordering_information', $data);
		$this->session->set_flashdata('message', '<div class="alert alert-success">Record has been saved successfully.</div>');
		redirect(base_url('Ordering/create'));
	}


	public function edit($id)
	{
		$data['data'] = $this->crud->find_record_by_id('ordering_information', $id);
		$this->load->view('product/edit', $data);
	}

	public function update($id)
	{
		$data['title'] = $this->input->post('title');
		$data['description'] = $this->input->post('description');

		if(!empty($_FILES['photo'])){
			$filedata  = $this->crud->find_record_by_id('ordering_information', $id);
			// print_r($filedata->photo);
			// exit();
			unlink('uploads/'.$filedata->photo);

            $uploaddir = 'uploads/';
            $filename=rand().".png";
            $uploadfile = $uploaddir . $filename;

            if (move_uploaded_file($_FILES['photo']['tmp_name'], $uploadfile)) {
              $data['photo'] = $filename;
            }
        }


		$this->crud->update('ordering_information', $data, $id);
		$this->session->set_flashdata('message', '<div class="alert alert-success">Record has been updated successfully.</div>');
		redirect(base_url('Product'));
	}

	public function delete($id)
	{	
		$data['is_deleted'] = '1';
		$this->crud->update('ordering_information', $data, $id);
		$this->session->set_flashdata('message', '<div class="alert alert-success">Record has been deleted successfully.</div>');
		redirect(base_url('Product'));
	}

}
