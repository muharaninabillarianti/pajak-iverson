<?php

class Customers extends CI_Controller {

    public function index() {
        $this->load->helper('url');
        return $this->all();
    }

    public function all() {
        $this->load->library('customerservice');
        $this->load->library('pagination');        
        $data['customers'] = $this->customerservice->loadAllCustomer();
        $layout['title'] = "Daftar Customer";
        $layout['content'] = $this->load->view('customer_list', $data, true);

        $this->load->view('layout', $layout);
    }

    public function insert() {
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');

        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('telp', 'Telp', 'required');
        $this->form_validation->set_rules('email', 'email', 'required|valid_email');

        $this->form_validation->set_error_delimiters
                ('<font color=\'red\'>', '</font><br>');

        if ($this->form_validation->run() == FALSE) {
            $layout['title'] = "Insert Customer";
            $layout['content'] = $this->load->view('customer_new', '', true);
            $this->load->view('layout', $layout);
        } else {
            $this->load->library('customerservice');
            $nama = $this->input->post('nama');
            $alamat = $this->input->post('alamat');
            $telp = $this->input->post('telp');
            $email = $this->input->post('email');
            $this->customerservice->insertCustomer($nama, $alamat, $telp, $email);

            //return $this->all();
            $this->output->set_header("Location: /toko/index.php/customers");
        }
    }

    public function edit($id = null) {
        if ($id == NULL)
            $id = $this->uri->segment(3);
        $this->load->helper(array('form', 'url'));
        $this->load->library('customerservice');

        $data['customer'] = $this->customerservice->loadById($id);
        $layout['title'] = "Edit Customer";
        $layout['content'] = $this->load->view('customer_edit', $data, true);
        $this->load->view('layout', $layout);
    }

    public function update() {
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');

        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('telp', 'Telp', 'required');
        $this->form_validation->set_rules('email', 'email', 'required|valid_email');

        $this->form_validation->set_error_delimiters
                ('<font color=\'red\'>', '</font><br>');

        if ($this->form_validation->run() == FALSE) {
            return $this->edit($this->input->post('id'));
        } else {
            $this->load->library('customerservice');
            $id = $this->input->post('id');
            $nama = $this->input->post('nama');
            $alamat = $this->input->post('alamat');
            $telp = $this->input->post('telp');
            $email = $this->input->post('email');
            $this->customerservice->updateCustomer($id, $nama, $alamat, $telp, $email);

            //return $this->all();
            $this->output->set_header("Location: /toko/index.php/customers");
        }
    }

    public function delete($id = null) {
        if ($id == NULL)
            $id = $this->uri->segment(3);
        $this->load->helper('url');
        $this->load->library('customerservice');
        $this->customerservice->deleteById($id);
        $this->output->set_header("Location: /toko/index.php/customers");
    }

}

?>
