<?php

class Trans extends CI_Controller {

    public function index() {
        $this->load->helper('url');
        return $this->all();
    }

    public function all() {
        $this->load->library('transaksiservice');
        $data['transaksis'] = $this->transaksiservice->loadAllTransaksi();
        $layout['title'] = "Daftar Transaksi Penjualan";
        $layout['content'] = $this->load->view('transaksi_list', $data, true);
        $this->load->view('layout', $layout);
    }

    public function detail($id = null) {
        if ($id == NULL)
            $id = $this->uri->segment(3);
        $this->load->helper(array('form', 'url'));
        $this->load->library('transaksiservice');

        $data['transaksi'] = $this->transaksiservice->loadById($id);
        $layout['title'] = "Detail Transaksi";
        $layout['content'] = $this->load->view('transaksi_detail', $data, true);
        $this->load->view('layout', $layout);
    }

    public function insert() {
        $this->load->helper(array('form', 'url'));
        $this->load->library(array('form_validation', 'customerservice'));

        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
        $this->form_validation->set_rules('faktur', 'Faktur', 'required');
        $this->form_validation->set_error_delimiters
                ('<font color=\'red\'>', '</font><br>');
        if ($this->form_validation->run() == FALSE) {
            $data['customers'] = $this->customerservice->loadAllCustomer();
            $layout['title'] = "Insert Penjualan";
            $layout['content'] = $this->load->view('transaksi_new', $data, true);
            $this->load->view('layout', $layout);
        } else {
            //$this->load->library('session');
            $this->load->library('transaksiservice');
            $tanggal = $this->input->post('tanggal');
            $faktur = $this->input->post('faktur');
            $customer_id = $this->input->post('customer');
            $transaksi = $this->transaksiservice->
                    createTransaksi($tanggal, $faktur, $customer_id);
            $this->session->set_userdata('TRANSAKSI', serialize($transaksi));
            //$_SESSION['TRANSAKSI'] = $transaksi;
            $data['transaksi'] = $transaksi;
            $layout['title'] = "Add Product";
            $layout['content'] = $this->load->view('transaksi_add_product', $data, true);
            $this->load->view('layout', $layout);
        }
    }

    public function browse() {
        $this->load->helper('url');
        $this->load->library('productservice');
        $data['products'] = $this->productservice->loadAllProduct();
        $layout['title'] = 'Select Product';
        $layout['content'] = $this->load->view('transaksi_browse_product', $data, true);
        $this->load->view('layout', $layout);
    }

    public function select() {
        $this->load->helper(array('form', 'url'));
        $this->load->library(array('transaksiservice', 'productservice'));
        $product_id = $this->uri->segment(3);
        $product = $this->productservice->loadById($product_id);
        $data['product'] = $product;
        $layout['title'] = 'Input Quantity';
        $layout['content'] = $this->load->view('transaksi_input_qty', $data, true);
        $this->load->view('layout', $layout);
    }

    public function inputqty() {
        $this->load->helper('url');
        $this->load->library(array('transaksiservice', 'productservice', 'entity/transaksi'));
        $product = $this->productservice->loadById($this->input->post('product_id'));
        $qty = $this->input->post('qty');
        $transDetail = $this->transaksiservice->createTransaksiDetail($qty, $product);
        $transaksi = unserialize($this->session->userdata('TRANSAKSI'));
        $transaksi->addTransaksiDetail($transDetail);
        $this->session->set_userdata('TRANSAKSI', serialize($transaksi));
//        $data['transaksi'] = $transaksi;
//        $layout['title'] = "Add Product";
//        $layout['content'] = $this->load->view('transaksi_add_product', $data, true);
//        $this->load->view('layout', $layout);
        $this->output->set_header("Location: /toko/index.php/trans/add");
    }

    public function add() {
        $this->load->helper('url');
        $this->load->library(array('transaksiservice', 'productservice', 'entity/transaksi'));
        $transaksi = unserialize($this->session->userdata('TRANSAKSI'));
        $data['transaksi'] = $transaksi;
        $layout['title'] = "Add Product";
        $layout['content'] = $this->load->view('transaksi_add_product', $data, true);
        $this->load->view('layout', $layout);
    }

    public function submit() {
        $this->load->library(array('transaksiservice', 'entity/transaksi'));
        $transaksi = unserialize($this->session->userdata('TRANSAKSI'));
        $date = new DateTime();
        $transaksi->setId($date->getTimestamp());
        $this->transaksiservice->insertTransaksi($transaksi);
        $this->session->unset_userdata('TRANSAKSI');
        $this->output->set_header("Location: /toko/index.php/trans");
    }

}

?>
