  </div>
  </div>
  <!-- /.card-body -->
  </div>
  <!-- /.card -->
  </div>
  <!-- /.col -->
  </div>
  <!-- /.row -->
  </section>
  <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.0.0-rc.1
    </div>
  </footer>
  
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  {{-- chart JS --}} 
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script> 
  <!-- Bootstrap 4 -->
<script src="{{ asset('assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- Select2 -->
<script src="{{ asset('assets/admin/plugins/select2/js/select2.full.min.js') }}"></script>
<!-- DataTables -->
<script src="{{ asset('assets/admin/plugins/datatables/jquery.dataTables.js') }}"></script>
<script src="{{ asset('assets/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>
<!-- Sparkline -->
<script src="{{ asset('assets/admin/plugins/sparklines/sparkline.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('assets/admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<!-- Summernote -->
<script src="{{ asset('assets/admin/plugins/summernote/summernote-bs4.min.js') }}"></script>
<!-- tinymce -->
  <script src="{{ asset('assets/ckeditor/ckeditor.js') }}" type="text/javascript"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('assets/admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<!-- pace-progress -->
<script src="{{ asset('assets/admin/plugins/pace-progress/pace.min.js') }}"></script>
<script src="{{ asset('assets/admin/dist/js/adminlte.js') }}"></script>

<script>  
  tinymce.init({
    selector: '.simple',
    menubar: false,
    plugins: [
      'advlist autolink lists link image charmap print preview anchor',
      'searchreplace visualblocks code fullscreen',
      'insertdatetime media table paste code help wordcount'
    ],
    toolbar: 'undo redo | formatselect | ' +
    'bold italic backcolor | alignleft aligncenter ' +
    'alignright alignjustify | bullist numlist outdent indent | ' +
    'removeformat | help',
    content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
  });
  </script>
  
  <?php 
  $sek  = date('Y');
  $awal = $sek-100;
  ?>
  <script>
    $( ".datepicker" ).datepicker({
      inline: true,
      changeYear: true,
      changeMonth: true,
      dateFormat: "dd-mm-yy",
      yearRange: "<?php echo $awal ?>:<?php $tahundepan = date('Y')+2; echo $tahundepan; ?>"
    });
  
    $( ".tanggal" ).datepicker({
      inline: true,
      changeYear: true,
      changeMonth: true,
      dateFormat: "dd-mm-yy",
      yearRange: "<?php echo $awal ?>:<?php $tahundepan = date('Y')+2; echo $tahundepan; ?>"
    });
  
    $( ".tanggalan" ).datepicker({
      inline: true,
      changeYear: true,
      changeMonth: true,
      dateFormat: "dd-mm-yy",
      yearRange: "<?php echo $awal ?>:<?php $tahundepan = date('Y')+2; echo $tahundepan; ?>"
    });
  
  </script>
  <script>    
  var label = ['Artikel & Berita', 'Layanan', 'File & Dokumen', 'Galeri', 'Rekening', 'Video Youtube', 'Agenda Kegiatan'];
  var url = "{{ url('admin/dasbor/chart') }}";
  var berita = new Array();
  var layanan = new Array();
  var dokumentasi = new Array();
  var galeri =new Array();
  var rekening = new Array();
  var video = new Array();
  var agenda = new Array();

  $.get(url, function(response){
    response.forEach(function(data){
        berita.push(data.berita);
        layanan.push(data.layanan);
        dokumentasi.push(data.dokumentasi);
        galeri.push(data.galeri);
        rekening.push(data.rekening);
        video.push(data.video);
        agenda.push(data.agenda);
    });  
    var ctx = document.getElementById("canvas").getContext('2d');
        var myChart = new Chart(ctx, {
          type: 'bar',
          data: {
              labels:['Dashboard Bar Chart'],
              datasets: [
                {
                  label: label[0],
                  data: berita,
                  backgroundColor: "rgba(245, 97, 39, 0.8)"
                },
                {
                  label: label[1],
                  data: layanan,
                  backgroundColor: "rgba(245, 183, 39, 0.8)"
                },
                {
                  label: label[2],
                  data: dokumentasi,
                  backgroundColor: "rgba(118, 245, 39, 0.8)"
                },
                {
                  label: label[3],
                  data: galeri,
                  backgroundColor: "rgba(59, 238, 161, 0.8)"
                },
                {
                  label: label[4],
                  data: rekening,
                  backgroundColor: "rgba(59, 238, 225, 0.8)"
                },
                {
                  label: label[5],
                  data: video,
                  backgroundColor: "rgba(87, 89, 226, 0.8)"
                },
                {
                  label: label[6],
                  data: agenda,
                  backgroundColor: "rgba(202, 59, 238, 0.8)"
                },
              ]
          },
          options: {
              scales: {
                  yAxes: [{
                      ticks: {
                          beginAtZero:true
                      }
                  }]
              }
          }
      });
  });

  @if ($message = Session::get('sukses'))
  // Notifikasi
  swal ( "Berhasil" ,  "<?php echo $message ?>" ,  "success" )
  @endif
  
  @if ($message = Session::get('warning'))
  // Notifikasi
  swal ( "Oops.." ,  "<?php echo $message ?>" ,  "warning" )
  @endif
  
  // Popup Delete
  $(document).on("click", ".delete-link", function(e){
    e.preventDefault();
    url = $(this).attr("href");
    swal({
      title:"Yakin akan menghapus data ini?",
      type: "warning",
      showCancelButton: true,
      confirmButtonClass: 'btn btn-danger',
      cancelButtonClass: 'btn btn-success',
      buttonsStyling: false,
      confirmButtonText: "Delete",
      cancelButtonText: "Cancel",
      closeOnConfirm: false,
      showLoaderOnConfirm: true,
    },
    function(isConfirm){
      if(isConfirm){
        $.ajax({
          url: url,
          success: function(resp){
            window.location.href = url;
          }
        });
      }
      return false;
    });
  });
  // Popup disable
  $(document).on("click", ".disable-link", function(e){
    e.preventDefault();
    url = $(this).attr("href");
    swal({
      title:"Yakin akan menonaktifkan data ini?",
      type: "warning",
      showCancelButton: true,
      confirmButtonClass: 'btn btn-danger',
      cancelButtonClass: 'btn btn-success',
      buttonsStyling: false,
      confirmButtonText: "Non Aktifkan",
      cancelButtonText: "Cancel",
      closeOnConfirm: false,
      showLoaderOnConfirm: true,
    },
    function(isConfirm){
      if(isConfirm){
        $.ajax({
          url: url,
          success: function(resp){
            window.location.href = url;
          }
        });
      }
      return false;
    });
  });
  
  // Popup approval
  $(document).on("click", ".approval-link", function(e){
    e.preventDefault();
    url = $(this).attr("href");
    swal({
      title:"Anda yakin ingin menyetujui data ini?",
      type: "info",
      showCancelButton: true,
      confirmButtonClass: 'btn btn-danger',
      cancelButtonClass: 'btn btn-success',
      buttonsStyling: false,
      confirmButtonText: "Ya, Setujui",
      cancelButtonText: "Cancel",
      closeOnConfirm: false,
      showLoaderOnConfirm: true,
    },
    function(isConfirm){
      if(isConfirm){
        $.ajax({
          url: url,
          success: function(resp){
            window.location.href = url;
          }
        });
      }
      return false;
    });
  });
  </script>
  
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>

<script>
    CKEDITOR.replace('editorku', {
      height: 60,
      // Define the toolbar groups as it is a more accessible solution.
      toolbarGroups: [{
          "name": "basicstyles",
          "groups": ["basicstyles"]
        },
        {
          "name": "links",
          "groups": ["links"]
        },
        {
          "name": "paragraph",
          "groups": ["list", "blocks"]
        },
        {
          "name": "document",
          "groups": ["mode"]
        },
        
      ],
      // Remove the redundant buttons from toolbar groups defined above.
      removeButtons: 'Underline,Strike,Subscript,Superscript,Anchor,Styles,Specialchar'
    });
    // Tes
    
// Replace the <textarea id="editor1"> with a CKEditor 4
// instance, using default configuration.
CKEDITOR.replace( 'kontenku',
      {
        filebrowserBrowseUrl : '{{ asset("assets/ckeditor/filemanager/dialog.php?type=2&editor=ckeditor&fldr=") }}',
        filebrowserUploadUrl : '{{ asset("assets/ckeditor/filemanager/dialog.php?type=2&editor=ckeditor&fldr=") }}',
        filebrowserImageBrowseUrl : '{{ asset("assets/ckeditor/filemanager/dialog.php?type=1&editor=ckeditor&fldr==") }}'
  } 
);
</script>
<!-- Page Script -->
<script>
  $(function () {
     //Initialize Select2 Elements
    //Initialize Select2 Elements
    $('.select2').select2({
      theme: 'bootstrap4'
    })
    
    $('.mselect2').select2({
      dropdownParent: $('.Tambah')
    });
   
    $('.checkbox-toggle').click(function () {
      var clicks = $(this).data('clicks')
      if (clicks) {
        //Uncheck all checkboxes
        $('.mailbox-messages input[type=\'checkbox\']').prop('checked', false)
        $('.checkbox-toggle .far.fa-check-square').removeClass('fa-check-square').addClass('fa-square')
      } else {
        //Check all checkboxes
        $('.mailbox-messages input[type=\'checkbox\']').prop('checked', true)
        $('.checkbox-toggle .far.fa-square').removeClass('fa-square').addClass('fa-check-square')
      }
      $(this).data('clicks', !clicks)
    })

    //Handle starring for glyphicon and font awesome
    $('.mailbox-star').click(function (e) {
      e.preventDefault()
      //detect type
      var $this = $(this).find('a > i')
      var glyph = $this.hasClass('glyphicon')
      var fa    = $this.hasClass('fa')

      //Switch states
      if (glyph) {
        $this.toggleClass('glyphicon-star')
        $this.toggleClass('glyphicon-star-empty')
      }

      if (fa) {
        $this.toggleClass('fa-star')
        $this.toggleClass('fa-star-o')
      }
    })
  })
</script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('assets/admin/dist/js/demo.js') }}"></script>
<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": false,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
  });

  </script>

</body>
</html>