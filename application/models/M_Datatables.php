<?php
/**
 * Models     : Datatables serverside based php
 * Modified   : Fauzan Falah
 * Website    : https://www.codekop.com/
 * References : 
 * - https://www.mynotescode.com/jquery-datatables-dengan-php-dan-mysql/
 * - https://datatables.net/
 * 
 * 
 * 
 * 
 */
    class M_Datatables extends CI_Model
    {
        function __construct()
        {
            parent::__construct();
        }

        function get_tables($tables,$cari)
        {
            // Ambil data yang di ketik user pada textbox pencarian
            $search = preg_replace("/[^a-zA-Z0-9.]/", '', "{$_POST['search']['value']}");
            // Ambil data limit per page
            $limit = preg_replace("/[^a-zA-Z0-9.]/", '', "{$_POST['length']}");
            // Ambil data start
            $start =preg_replace("/[^a-zA-Z0-9.]/", '', "{$_POST['start']}"); 
            
            $sql = $this->db->get($tables);

            $sql_count = $sql->num_rows();

            $query = $tables;
            $cari = implode(" LIKE '%".$search."%' OR ", $cari)." LIKE '%".$search."%'";

            
            // Untuk mengambil nama field yg menjadi acuan untuk sorting
            $order_field = $_POST['order'][0]['column']; 

            // Untuk menentukan order by "ASC" atau "DESC"
            $order_ascdesc = $_POST['order'][0]['dir']; 
            $order = " ORDER BY ".$_POST['columns'][$order_field]['data']." ".$order_ascdesc;

            $sql_data = $this->db->query("SELECT * FROM ".$query." WHERE (".$cari.")".$order." LIMIT ".$limit." OFFSET ".$start);
            $sql_filter = $this->db->query("SELECT * FROM ".$query);
            $sql_filter_count = $sql_filter->num_rows();
            $data = $sql_data->result_array();

            $callback = array(    
                'draw' => $_POST['draw'], // Ini dari datatablenya    
                'recordsTotal' => $sql_count,    
                'recordsFiltered'=>$sql_filter_count,    
                'data'=>$data
            );

            return json_encode($callback); // Convert array $callback ke json
        }

        function get_tables_where($tables,$cari,$where)
        {
            // Ambil data yang di ketik user pada textbox pencarian
            $search = preg_replace("/[^a-zA-Z0-9.]/", '', "{$_POST['search']['value']}");
            // Ambil data limit per page
            $limit = preg_replace("/[^a-zA-Z0-9.]/", '', "{$_POST['length']}");
            // Ambil data start
            $start =preg_replace("/[^a-zA-Z0-9.]/", '', "{$_POST['start']}"); 

            $setWhere = array();
            foreach ($where as $key => $value)
            {
                $setWhere[] = $key."='".$value."'";
            }

            $fwhere = implode(' AND ', $setWhere);

            $sql = $this->db->query("SELECT * FROM ".$tables." WHERE ".$fwhere);
            $sql_count = $sql->num_rows();

            $query = $tables;
            $cari = implode(" LIKE '%".$search."%' OR ", $cari)." LIKE '%".$search."%'";
            
            // Untuk mengambil nama field yg menjadi acuan untuk sorting
            $order_field = $_POST['order'][0]['column']; 

            // Untuk menentukan order by "ASC" atau "DESC"
            $order_ascdesc = $_POST['order'][0]['dir']; 
            $order = " ORDER BY ".$_POST['columns'][$order_field]['data']." ".$order_ascdesc;

            $sql_data = $this->db->query("SELECT * FROM ".$query." WHERE ".$fwhere." AND (".$cari.")".$order." LIMIT ".$limit." OFFSET ".$start);
            $sql_filter = $this->db->query("SELECT * FROM ".$tables." WHERE ".$fwhere);
            $sql_filter_count = $sql_filter->num_rows();
            $data = $sql_data->result_array();
            
            $callback = array(    
                'draw' => $_POST['draw'], // Ini dari datatablenya    
                'recordsTotal' => $sql_count,    
                'recordsFiltered'=>$sql_filter_count,    
                'data'=>$data
            );
            return json_encode($callback); // Convert array $callback ke json
        }

        function get_tables_query($query,$cari, $where)
        {
            // Ambil data yang di ketik user pada textbox pencarian
            $search = preg_replace("/[^a-zA-Z0-9.]/", '', "{$_POST['search']['value']}");
            // Ambil data limit per page
            $limit = preg_replace("/[^a-zA-Z0-9.]/", '', "{$_POST['length']}");
            // Ambil data start
            $start =preg_replace("/[^a-zA-Z0-9.]/", '', "{$_POST['start']}"); 

            if($where != null)
            {
                $setWhere = array();
                foreach ($where as $key => $value)
                {
                    $setWhere[] = $key."='".$value."'";
                }
    
                $fwhere = implode(' AND ', $setWhere);

                $sql = $this->db->query($query." WHERE ".$fwhere);
                $sql_count = $sql->num_rows();
    
                $cari = implode(" LIKE '%".$search."%' OR ", $cari)." LIKE '%".$search."%'";
                
                // Untuk mengambil nama field yg menjadi acuan untuk sorting
                $order_field = $_POST['order'][0]['column']; 
    
                // Untuk menentukan order by "ASC" atau "DESC"
                $order_ascdesc = $_POST['order'][0]['dir']; 
                $order = " ORDER BY ".$_POST['columns'][$order_field]['data']." ".$order_ascdesc;
    
                $sql_data = $this->db->query($query." WHERE ".$fwhere." AND (".$cari.")".$order." LIMIT ".$limit." OFFSET ".$start);
                $sql_filter = $this->db->query($query." WHERE ".$fwhere);
                $sql_filter_count = $sql_filter->num_rows();
                $data = $sql_data->result_array();

            }else{

                $sql = $this->db->query($query);
                $sql_count = $sql->num_rows();
    
                $cari = implode(" LIKE '%".$search."%' OR ", $cari)." LIKE '%".$search."%'";
                
                // Untuk mengambil nama field yg menjadi acuan untuk sorting
                $order_field = $_POST['order'][0]['column']; 
    
                // Untuk menentukan order by "ASC" atau "DESC"
                $order_ascdesc = $_POST['order'][0]['dir']; 
                $order = " ORDER BY ".$_POST['columns'][$order_field]['data']." ".$order_ascdesc;
    
                $sql_data = $this->db->query($query." WHERE (".$cari.")".$order." LIMIT ".$limit." OFFSET ".$start);
                $sql_filter = $this->db->query($query);
                $sql_filter_count = $sql_filter->num_rows();
                $data = $sql_data->result_array();

            }
            
            $callback = array(    
                'draw' => $_POST['draw'], // Ini dari datatablenya    
                'recordsTotal' => $sql_count,    
                'recordsFiltered'=>$sql_filter_count,    
                'data'=>$data
            );
            return json_encode($callback); // Convert array $callback ke json
        }

    }