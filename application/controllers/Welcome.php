<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	// public function index()
	// {
		// $this->load->model('model_barang');
	// 	$data['barang'] = $this->model_barang->tampil_data()->result();
	// 	$this->load->view('templates/header');
	// 	$this->load->view('templates/sidebar');
	// 	$this->load->view('dashboard', $data);
	// 	$this->load->view('templates/footer');
	// }

    public function index()
    {
        // $this->load->model('model_barang');
        // $data['barang'] = $this->model_barang->tampil_data()->result();
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/table');
        $this->load->view('templates_admin/footer');
    }

     public function search()
    {
        $keyword = $this->input->post('keyword');
        $data['barang'] = $this->model_barang->get_keyword($keyword);
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('dashboard', $data);
        $this->load->view('templates/footer');
    }
}
