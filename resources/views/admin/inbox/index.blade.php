<table class="table table-bordered" id="example1">
<thead>
<tr>
    <th width="5%">NO</th>
    <th width="25%">FULL NAME</th>
    <th width="25%">SUBJECT</th>
    <th width="25%">CREATED AT</th>
    <th width="20%">Action</th>
</tr>
</thead>
<tbody>

<?php $i=1; foreach($inboxs as $inbox) { ?>

<tr>
    <td class="text-center"><?php echo $i ?></td>
    <td><?php echo $inbox->full_name ?></td>
    <td><?php echo $inbox->subject ?></td>
    <td><?php echo $inbox->created_at->toFormattedDateString() ?></td>
    <td>        
        <div class="btn-group">          
        <a href="{{ asset('admin/inbox/'.$inbox->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-eye"></i> Detail</a>
            
        <a href="{{ asset('admin/inbox/delete/'.$inbox->id) }}" class="btn btn-danger btn-sm delete-link ml-2"><i class="fas fa-trash-alt"></i> Hapus</a>
        </div>
    </td>
</tr>

<?php $i++; } ?>

</tbody>
</table>