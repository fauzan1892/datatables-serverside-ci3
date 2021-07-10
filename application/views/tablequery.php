
<div class="card">
    <div class="card-header">
        <h4> SQL Query With Join</h4>
    </div>
    <div class="card-body">
        <table class="table table-striped table-bordered" id="table-artikel-query">
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
    <!-- Optional JavaScript -->
     <!-- Optional JavaScript -->
<script>
    var tabel = null;
    $(document).ready(function() {
        tabel = $('#table-artikel-query').DataTable({
            "processing": true,
            "responsive":true,
            "serverSide": true,
            "ordering": true, // Set true agar bisa di sorting
            "order": [[ 0, 'asc' ]], // Default sortingnya berdasarkan kolom / field ke 0 (paling pertama)
            "ajax":
            {
                "url": "<?= base_url('datatables/view_data_query');?>", // URL file untuk proses select datanya
                "type": "POST"
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
    });
</script>