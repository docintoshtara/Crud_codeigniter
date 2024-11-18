<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {
	function __construct() {
        parent::__construct();
			$this->load->model('crud');
	}

	public function index()
	{
		try {
			$where['is_deleted'] = '0';
			$data['data'] = $this->crud->get_records_condition('products',$where);

			$this->load->view('product/list', $data);
		} catch (\Throwable $th) {
			//throw $th;
		}
	}
 
	public function create()
	{
		try {
			$this->load->view('product/create');
		} catch (\Throwable $th) {

		}
		
	}

	public function store()
	{
		try {
			$data['name'] = $this->input->post('name');
			$data['title'] = $this->input->post('title');
			$data['description'] = $this->input->post('description');

			if(!empty($_FILES['photo'])){
				$uploaddir = 'uploads/';
				$filename=rand().".png";
				$uploadfile = $uploaddir . $filename;

				if (move_uploaded_file($_FILES['photo']['tmp_name'], $uploadfile)) {
				
				$data['photo'] = $filename;
				}
        	}

			$this->crud->insert('products', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success">Record has been saved successfully.</div>');
			redirect(base_url('Product'));
		} catch (\Throwable $th) {

		}
	}


	public function edit($id = null)
	{ 
		try {
				if (!is_numeric($id) || $id <= 0) {
					// Show error or redirect to an error page
					show_error('Invalid Product ID.', 400); // 400 Bad Request
					return;
				}

				$data['data'] = $this->crud->find_record_by_id('products', $id);
				$this->load->view('product/edit', $data);
			} catch (\Throwable $th) {
				//throw $th;
			}
	}

	public function view($id = null)
	{
		try {
		
			if (!is_numeric($id) || $id <= 0) {
				// Show error or redirect to an error page
				show_error('Invalid Product ID.', 400); // 400 Bad Request
				return;
			}

			$where['product_id'] = $id;
			$data['data'] = $this->crud->find_record_by_id('products', $id);
			$data['technical'] = $this->crud->get_records_condition('technical_data', $where);
			$data['ordering'] = $this->crud->get_records_condition('ordering_information', $where);
			$data['connection'] = $this->crud->get_records_condition('connection_data', $where);
			$data['product_details'] = $this->crud->get_records_condition('products', $where);
			
			// $newdata = [];
			// foreach($product_details as $prd) { 

			// 	$newdata = $this->db->query('SELECT * FROM `ordering_information` WHERE product_id = "'.$prd->id.'"')->result();;
			// }


			// echo '<pre>';
			// print_r($newdata);
			// exit();
			$this->load->view('product/view', $data);
		} catch (\Throwable $th) {
			//throw $th;
		}
	}


	public function update($id= null)
	{
		try {
			if(!is_numeric($id) || $id <= 0) {
				// Show error or redirect to an error page
				show_error('Invalid Product ID.', 400); // 400 Bad Request
				return;
			}
			$data['name'] 	= $this->input->post('name');
			$data['title'] 	= $this->input->post('title');
			$data['description'] = $this->input->post('description');

			if(!empty($_FILES['photo'])){
				$filedata  = $this->crud->find_record_by_id('products', $id);
				
				unlink('uploads/'.$filedata->photo);

				$uploaddir = 'uploads/';
				$filename=rand().".png";
				$uploadfile = $uploaddir . $filename;

				if (move_uploaded_file($_FILES['photo']['tmp_name'], $uploadfile)) {
				$data['photo'] = $filename;
				}
			}


			$this->crud->update('products', $data, $id);
			$this->session->set_flashdata('message', '<div class="alert alert-success">Record has been updated successfully.</div>');
			redirect(base_url('Product'));
		} catch (\Throwable $th) {
			show_error('Error'); 
			return;
		}
	}

	public function delete($id =null)
	{	
		try {
			if(!is_numeric($id) || $id <= 0) {
				// Show error or redirect to an error page
				show_error('Invalid Product ID.', 400); // 400 Bad Request
				return;
			}
			$data['is_deleted'] = '1';
			$this->crud->update('products', $data, $id);
			$this->session->set_flashdata('message', '<div class="alert alert-success">Record has been deleted successfully.</div>');
			redirect(base_url('Product'));
		} catch (\Throwable $th) {
			//throw $th;
		}
	}

}
