

<!doctype html>
<html lang="en">
    <head>
        <title>Datatables Server Side Tutorial</title>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS --><!-- BOOTSTRAP 4-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <!-- DATATABLES BS 4-->
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css" />
        <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.bootstrap4.min.css" />
        <!-- jQuery -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    </head>
    <body>
        <nav class="navbar navbar-expand-sm navbar-dark bg-info">
            <div class="container">
                <a class="navbar-brand" href="#">DS CodeIgniter <?php echo CI_VERSION; ?></a>
                <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars text-white"></i>
                </button>
                <div class="collapse navbar-collapse" id="collapsibleNavId">
                    <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('/');?>">One Table </a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="<?= base_url('csrf');?>">CSRF</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container mt-5 mb-5">
            <div class="card">
                <div class="card-header">
                    <h4> SQL Query With Join (CSRF)</h4>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-bordered" id="table-artikel-csrf">
                        <thead>
                            <tr>
                                <th> No. </th>
                                <th> Kategori </th>
                                <th> Sub Kategori </th>
                                <th> Aksi </th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
        <hr/>
            <center>
                Dibuat dengan <i class="fa fa-heart" style="color:red;"></i> Oleh 
                <a href="https://www.codekop.com/" target="_blank">Codekop</a> © <?= date('Y');?>
            </center>
        <br/>

        <!-- DATATABLES BS 4-->
        <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
        <script src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js"></script>
        <script src="https://cdn.datatables.net/responsive/2.2.7/js/responsive.bootstrap4.min.js"></script>
        <!-- Datatable config -->
        <script>
            var tabel = null;
            var token = "<?php echo $this->security->get_csrf_hash();?>";
            $(document).ready(function() {
                tabel = $('#table-artikel-csrf').DataTable({
                    "processing": true,
                    "responsive":true,
                    "serverSide": true,
                    "ordering": true, // Set true agar bisa di sorting
                    "order": [[ 0, 'asc' ]], // Default sortingnya berdasarkan kolom / field ke 0 (paling pertama)
                    "ajax":
                    {
                        "url": "<?= base_url('datatables/view_data_query_csrf');?>", // URL file untuk proses select datanya
                        "type": "POST",
                        // csrf datatable
                        "data": function ( d ) {
                            d.<?php echo $this->security->get_csrf_token_name();?> = token;
                        }
                    },
                    "deferRender": true,
                    "aLengthMenu": [[5, 10, 50],[ 5, 10, 50]], // Combobox Limit
                    "columns": [
                        {"data": 'id_kategori',"sortable": false, 
                            render: function (data, type, row, meta) {
                                return meta.row + meta.settings._iDisplayStart + 1;
                            }  
                        },
                        { "data": "nama_kategori" },  // Tampilkan kategori
                        { "data": "subkat" },  // Tampilkan nama sub kategori
                        { "data": "id_kategori",
                        "render": 
                        function( data, type, row, meta ) {
                            return '<a href="show/'+data+'">Show</a>';
                        }
                        },
                    ],
                });
                // csrf datatable
                table.on('xhr.dt', function ( e, settings, json, xhr ) {
                    token = json.<?=$this->security->get_csrf_token_name();?>;
                } );
            });
        </script>
    </body>
</html>

