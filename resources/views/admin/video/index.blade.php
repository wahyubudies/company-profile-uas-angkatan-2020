@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<p>
  @include('admin/video/tambah')
</p>
<form action="{{ asset('admin/video/proses') }}" method="post" accept-charset="utf-8">
{{ csrf_field() }}
<div class="row">

  <div class="col-md-12">
    <div class="btn-group">
        <button type="button" class="btn btn-success " data-toggle="modal" data-target="#Tambah">
            <i class="fa fa-plus"></i> Tambah Baru
        </button>
   </div>
</div>
</div>

<div class="clearfix"><hr></div>
<div class="table-responsive mailbox-messages">
    <div class="table-responsive mailbox-messages">
<table id="example1" class="display table table-bordered" cellspacing="0" width="100%">
<thead>
    <tr class="bg-info">
    <th width="15%">VIDEO</th>
    <th width="35%">JUDUL</th>
    <th width="20%">KETERANGAN</th>
    <th width="10%">POSISI</th>
    <th>ACTION</th>
</tr>
</thead>
<tbody>

    <?php $i=1; foreach($video as $video) { ?>      
      <td>
        <div class="embed-responsive embed-responsive-16by9">
          <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/{{ $video->video }}?rel=0" allowfullscreen></iframe>
        </div>
          <hr>
        <?php $site   = DB::table('konfigurasi')->first(); if($video->gambar!="") { ?>
      <img src="{{ asset('assets/upload/image/thumbs/'.$video->gambar) }}" class="img-thumbnail img-size-50 mr-2" >
      <?php }else{ ?>
      <img src="{{ asset('assets/upload/image/thumbs/'.$site->icon) }}" class="img-thumbnail img-size-50 mr-2" >
      <?php } ?>
    </td>

    <td><?php echo $video->judul ?></td>
    <td><small><?php echo $video->keterangan ?></small></td>
    <td><?php echo $video->posisi ?></td>
    <td>
        <div class="btn-group">
        <a href="{{ asset('admin/video/edit/'.$video->id_video) }}" 
          class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>

          <a href="{{ asset('admin/video/delete/'.$video->id_video) }}" class="btn btn-danger btn-sm  delete-link">
            <i class="fa fa-trash"></i></a>
        </div>

    </td>
</tr>

<?php $i++; } ?>

</tbody>
</table>
</div>
</div>
</form>