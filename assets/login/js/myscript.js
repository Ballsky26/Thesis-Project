//sweetalert2
var flash = $('#flash').data('flash');
        if (flash) {
            Swal.fire({
              icon: 'success',
              title: 'Sukses',
              text: 'Data Berhasil ' + flash
            })
        }
    $('.tombol-hapus').on('click', function(e) 
    {
        e.preventDefault();
        const href = $(this).attr('href');

        Swal.fire({
          title: 'Apakah Anda Yakin?',
          text: "Data ini akan Dihapus",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          cancelButtonText: 'Batal',
          confirmButtonText: 'Ya, Hapus!'
            }).then((result) => {
              if (result.isConfirmed) {
                document.location.href = href;
              }
            })

    });

//datatables
    $(document).ready(function() {
            var table = $('#dataTable').DataTable( {
                buttons: [ 'copy','print', 'excel', 'pdf', 'colvis' ],
                dom:
                "<'row'<'col-md-3'l><'col-md-5'B><'col-md-4'f>>" +
                "<'row'<'col-md-12'tr>>" +
                "<'row'<'col-md-5'i><'col-md-7'p>>",
                lengthMenu:[
                    [5,10,25,50,100,-1],
                    [5,10,25,50,100,"Semua"]
                ]
            } );
         
            table.buttons().container()
                .appendTo( '#dataTable_wrapper .col-md-5:eq(0)' );
        } );

//datatablescustom
    $(document).ready(function() {
            var table = $('#dataTablecs').DataTable( {
                lengthMenu:[
                    [5,10,25,50,100,-1],
                    [5,10,25,50,100,"Semua"]
                ]
            } );
         
            table.buttons().container()
                .appendTo( '#dataTable_wrapper .col-md-5:eq(0)' );
        } );

//dropify
    $(document).ready(function() {
        $('.dropify').dropify({
            messages: {
                default: 'Drag/Drop/Klik Untuk Memilih Gambar',
                replace: 'Ganti',
                remove: 'Hapus',
                error: 'error'
            }            
        });
    });