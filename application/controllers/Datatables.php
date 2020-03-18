<?php

    class Datatables extends CI_Controller
    {
        public function __construct()
        {  
            parent::__construct();
            $this->load->model('M_Datatables');
        }

        public function index()
        {
            $this->load->view('home');
        }

        public function onetable()
        {
            $this->load->view('onetable');

        }

        public function tablewhere()
        {
            $this->load->view('tablewhere');

        }

        public function tablequery()
        {
            $this->load->view('tablequery');

        }

        function view_data()
        {
            $tables = "artikel";
            $search = array('judul','kategori','penulis','tgl_posting');
            header('Content-Type: application/json');
            echo $this->M_Datatables->get_tables($tables,$search);
        }

        function view_data_where()
        {
            $tables = "artikel";
            $search = array('judul','kategori','penulis','tgl_posting');
            $where  = array('kategori' => 'php');
            header('Content-Type: application/json');
            echo $this->M_Datatables->get_tables_where($tables,$search,$where);
        }

        function view_data_query()
        {
            $query  = "SELECT kategori.nama_kategori AS nama_kategori, subkat.* FROM subkat 
                       JOIN kategori ON subkat.id_kategori = kategori.id_kategori";
            $search = array('nama_kategori','subkat','tgl_add');
            $where  = null; 
            // $where  = array('nama_kategori' => 'Tutorial');
            header('Content-Type: application/json');
            echo $this->M_Datatables->get_tables_query($query,$search,$where);
        }
    }
?>