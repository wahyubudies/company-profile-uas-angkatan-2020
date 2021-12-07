
<div class="row">

  <div class="col-md-6">
    <form action="{{ asset('admin/galeri/cari') }}" method="get" accept-charset="utf-8">
    <br>
    <div class="input-group">
      <span class="input-group-btn btn-flat">        
        <a href="{{ asset('admin/galeri/tambah') }}" class="btn btn-success">
        <i class="fa fa-plus"></i> Tambah Baru</a>
      </span>
    </div>
    </form>
  </div>
  <div class="col-md-6 text-left">
   
  </div>
</div>

<div class="clearfix"><hr></div>
<form action="{{ asset('admin/galeri/proses') }}" method="post" accept-charset="utf-8">
  {{ csrf_field() }}
<div class="row">
    <div class="table-responsive mailbox-messages">
      <table id="example1" class="display table table-bordered table-sm" cellspacing="0" width="100%">
        <thead>
          <tr class="bg-info">
            <th width="8%">GAMBAR</th>
            <th width="25%">JUDUL</th>
            <th width="15%">KATEGORI</th>
            <th width="10%">JENIS</th>
            <th width="10%">TAMPILKAN TEKS DI BANNER?</th>
            <th width="20%">Action</th>
          </tr>
        </thead>
        <tbody>

          <?php $i=1; foreach($galeri as $galeri) { ?>

            <tr class="odd gradeX">
              <td><img src="{{ asset('assets/upload/image/thumbs/'.$galeri->gambar) }}" class="img img-thumbnail img-fluid"></td>
              <td><?php echo $galeri->judul_galeri ?></td>
              <td><a href="{{ asset('admin/galeri/kategori/'.$galeri->id_kategori_galeri) }}"><?php echo $galeri->nama_kategori_galeri ?></a></td>
              <td><a href="{{ asset('admin/galeri/status_galeri/'.$galeri->jenis_galeri) }}">
                  <?php echo $galeri->jenis_galeri ?></a></td>
              <td>{{ $galeri->status_text }}</td>
              <td>
                    <div class="btn-group">

                        <a href="{{ asset('admin/galeri/edit/'.$galeri->id_galeri) }}" 
                          class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>

                          <a href="{{ asset('admin/galeri/delete/'.$galeri->id_galeri) }}" class="btn btn-danger btn-sm delete-link"><i class="fa fa-trash"></i></a>
                        </div>
                        
                      </td>
                    </tr>

                    <?php $i++; } ?>

                  </tbody>
                </table>
              </div>

              </form>

              <div class="clearfix"><hr></div>
              <div class="pull-right"><?php if(isset($pagin)) { echo $pagin; } ?></div>
