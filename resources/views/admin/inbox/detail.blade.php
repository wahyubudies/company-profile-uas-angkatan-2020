<a href="{{ route('inbox.index') }}" class="btn btn-primary btn-sm mb-4"><i class="fas fa-arrow-left"></i> Back</a>
<table class="table table-striped">
    <tr>
        <td scope="row">
            <h6><strong>Full Name</strong></h6>
            <p>{{ $inboxs->full_name }}</p>
        </td>
    </tr>
    <tr>
        <td scope="row">        
            <h6><strong>Email</strong></h6>
            <p>{{ $inboxs->email }}</p>
        </td>
    </tr>
    <tr>
        <td scope="row">        
            <h6><strong>Contact</strong></h6>
            <p>{{ $inboxs->contact }}</p>
        </td>
    </tr>
    <tr>
        <td scope="row">        
            <h6><strong>Subject</strong></h6>
            <p>{{ $inboxs->subject }}</p>
        </td>
    </tr>
    <tr>
        <td scope="row">        
            <h6><strong>Message</strong></h6>
            <p>{{ $inboxs->message }}</p>
        </td>
    </tr>
    <tr>
        <td scope="row">        
            <h6><strong>Created At</strong></h6>
            <p>{{ $inboxs->created_at->toFormattedDateString() }}</p>
        </td>
    </tr>
</table>
