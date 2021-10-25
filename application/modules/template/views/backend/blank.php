<!-- JS Implementing Plugins -->
<script src="<?= base_url();?>assets/backend/js/vendor.min.js"></script>


<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
<?php $this->load->view($module.'/'.$fileview); ?>
<script>

	$(document).on('ready', function () {


    var f = $('#myTable2').DataTable( {
        "columnDefs": [ {
            "searchable": false,
            "orderable": false,
            "targets": 0
        } ],
        "language": {
          "emptyTable": '<div class="text-center p-4">' +
          '<img class="mb-3" src="<?= base_url() ?>assets/backend/svg/illustrations/sorry.svg" alt="Image Description" style="width: 7rem;">' +
          '<p class="mb-0">Tidak ada data untuk ditampilkan</p>' +
          '</div>'
        },
        "order": [[ 3, 'desc' ]]
    } );


var f = $('#myTable3').DataTable( {
    "columnDefs": [ {
        "searchable": false,
        "orderable": false,
        "targets": 0
    } ],
    "language": {
      "emptyTable": '<div class="text-center p-4">' +
      '<img class="mb-3" src="<?= base_url() ?>assets/backend/svg/illustrations/sorry.svg" alt="Image Description" style="width: 7rem;">' +
      '<p class="mb-0">Tidak ada data untuk ditampilkan</p>' +
      '</div>'
    },
} );
 
    f.on( 'order.dt search.dt', function () {
        f.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        } );
    } ).draw();
	});
</script>