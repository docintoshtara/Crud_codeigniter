<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Technical extends CI_Controller {
	function __construct() {
        parent::__construct();
			$this->load->model('crud');
	}

	public function index()
	 {
		$data['data'] = $this->crud->get_records('technical_data');
		$this->load->view('technical/list', $data);
	 }
 
	public function create()
	{
        $where['is_deleted'] = '0';
		$data['data'] = $this->crud->get_records_condition('products',$where);
		$this->load->view('technical/create', $data);
	}

	public function store()
	{
        $data['product_id'] = $this->input->post('product_id');
		$data['title'] = $this->input->post('title');
		$data['title_value'] = $this->input->post('title_value');

		$this->crud->insert('technical_data', $data);
		$this->session->set_flashdata('message', '<div class="alert alert-success">Record has been saved successfully.</div>');
		redirect(base_url('technical/create'));
	}

	public function edit($id)
	{
		$data['data'] = $this->crud->find_record_by_id('technical_data', $id);
		$this->load->view('technical/edit', $data);
	}

	public function update($id)
	{
		$data['title'] = $this->input->post('title');
		$data['description'] = $this->input->post('description');

		$this->crud->update('technical_data', $data, $id);
		$this->session->set_flashdata('message', '<div class="alert alert-success">Record has been updated successfully.</div>');
		redirect(base_url('technical'));
	}

	public function delete($id)
	{	
		$data['is_deleted'] = '1';
		$this->crud->update('technical_data', $data, $id);
		$this->session->set_flashdata('message', '<div class="alert alert-success">Record has been deleted successfully.</div>');
		redirect(base_url('technical'));
	}

}
