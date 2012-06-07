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
    
    public function detail($id=null){
         if ($id == NULL)
            $id = $this->uri->segment(3);
        $this->load->helper(array('form', 'url'));
        $this->load->library('transaksiservice');

        $data['transaksi'] = $this->transaksiservice->loadById($id);
        $layout['title'] = "Detail Transaksi";
        $layout['content'] = $this->load->view('transaksi_detail', $data, true);
        $this->load->view('layout', $layout);
    }
}

?>
