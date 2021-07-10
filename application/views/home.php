
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
                <a class="navbar-brand" href="<?= base_url('/');?>">DS CodeIgniter <?php echo CI_VERSION; ?></a>
                <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars text-white"></i>
                </button>
                <div class="collapse navbar-collapse" id="collapsibleNavId">
                    <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                        <li class="nav-item active">
                            <a class="nav-link" href="javascript:void(0)" onclick="mytable()">One Table </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="javascript:void(0)" onclick="mytablewhere()">Table Where</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="javascript:void(0)" onclick="mytablequery()">Tables With SQL Query</a>
                        </li>
                        <li class="nav-item" style="background:#48a89c;color:#fff;">
                            <a class="nav-link text-white" href="<?= base_url('csrf');?>">CSRF Examples</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container mt-5 mb-5">
        <div id="tampil"></div>
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

        <script>
            function mytable() {
                $('#tampil').load('<?= base_url("datatables/onetable");?>');
            }

            function mytablewhere() {
                $('#tampil').load('<?= base_url("datatables/tablewhere");?>');
            }

            function mytablequery() {
                $('#tampil').load('<?= base_url("datatables/tablequery");?>');
            }

            $('li > a').click(function() {
                $('li').removeClass();
                $('li').parent().addClass('nav-item');
                $(this).parent().addClass('nav-item active');
            });
            // root 
            $('#tampil').load('<?= base_url("datatables/onetable");?>');
        </script>
    </body>
</html>
