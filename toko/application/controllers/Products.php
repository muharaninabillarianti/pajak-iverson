<?php

class Products extends CI_Controller {

    public function index() {
        $this->load->helper('url');
        return $this->all();
    }

    public function all() {
        $this->load->library('productservice');
        $data['products'] = $this->productservice->loadAllProduct();
        $layout['title'] = 'Daftar Product';
        $layout['content'] = $this->load->view('product_list', $data, true);
        $this->load->view('layout', $layout);
    }

    public function edit($id = null) {
        if ($id == NULL)
            $id = $this->uri->segment(3);
        $this->load->helper(array('form', 'url'));
        $this->load->library('productservice');

        $data['product'] = $this->productservice->loadById($id);
        $layout['title'] = "Edit Product";
        $layout['content'] = $this->load->view('product_edit', $data, true);
        $this->load->view('layout', $layout);
    }

    public function insert() {
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');

        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '100';
        $config['max_width'] = '1024';
        $config['max_height'] = '768';

        $this->load->library('upload', $config);


        $this->form_validation->set_rules('kode', 'Kode', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('price', 'Price', 'required');
        $this->form_validation->set_error_delimiters
                ('<font color=\'red\'>', '</font><br>');

        if ($this->form_validation->run() == FALSE) {
            $layout['title'] = "Insert Product";
            $layout['content'] = $this->load->view('product_new', '', true);
            $this->load->view('layout', $layout);
        } else {
            $this->load->library('productservice');
            $kode = $this->input->post('kode');
            $nama = $this->input->post('nama');
            $price = $this->input->post('price');
            if ($this->upload->do_upload()) {
                echo $this->upload->display_errors();
                $image = $this->upload->data(3);
                $this->productservice->insertProduct($kode, $nama, $price, $image);
            }
            $this->output->set_header("Location: /toko/index.php/products");
        }
    }

    public function update() {
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');

        $this->form_validation->set_rules('kode', 'Kode', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('price', 'Price', 'required');
        $this->form_validation->set_error_delimiters
                ('<font color=\'red\'>', '</font><br>');

        if ($this->form_validation->run() == FALSE) {
            return $this->edit($this->input->post('id'));
        } else {
            $this->load->library('productservice');
            //$this->productservice->insertProduct(set_value('kode'),
            //        set_value('nama'), set_value('price'));
            $id = $this->input->post('id');
            $kode = $this->input->post('kode');
            $nama = $this->input->post('nama');
            $price = $this->input->post('price');
            $this->productservice->updateProduct($id, $kode, $nama, $price);

            //return $this->all();
            $this->output->set_header("Location: /toko/index.php/products");
        }
    }

    public function delete($id = null) {
        if ($id == NULL)
            $id = $this->uri->segment(3);
        $this->load->helper('url');
        $this->load->library('productservice');
        $this->productservice->deleteById($id);
        $this->output->set_header("Location: /toko/index.php/products");
    }

}

?>
