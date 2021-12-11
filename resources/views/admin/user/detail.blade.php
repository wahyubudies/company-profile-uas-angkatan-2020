<a href="{{ route('user.index') }}" class="btn btn-primary btn-sm mb-4"><i class="fas fa-arrow-left"></i> Back</a>
<table class="table table-striped">
    <tr>
        <td scope="row" >
            <img src="{{ asset('assets/upload/user/'.$user->gambar) }}" alt="{{ $user->nama }}" width="500" class="mx-auto my-2 d-table">  
        </td>
    </tr>    
    <tr>
        <td scope="row">
            <h6><strong>Nama</strong></h6>            
            <p>{{ $user->nama }}</p>
        </td>
    </tr>
    <tr>
        <td scope="row">        
            <h6><strong>NIM</strong></h6>
            <p>{{ $user->nim }}</p>
        </td>
    </tr>
    <tr>
        <td scope="row">        
            <h6><strong>Email</strong></h6>
            <p>{{ $user->email }}</p>
        </td>
    </tr>
    <tr>
        <td scope="row">        
            <h6><strong>Username</strong></h6>
            <p>{{ $user->username }}</p>
        </td>
    </tr>
    <tr>
        <td scope="row">        
            <h6><strong>Instagram</strong></h6>
            <p>{{ $user->instagram }}</p>
        </td>
    </tr>
    <tr>
        <td scope="row">        
            <h6><strong>Job Desk</strong></h6>
            <p>{{ $user->job_desk ?? '-'}}</p>
        </td>
    </tr>
    <tr>
        <td scope="row">        
            <h6><strong>Kode Rahasia</strong></h6>
            <p>{{ $user->kode_rahasia ?? '-'}}</p>
        </td>
    </tr>
    <tr>
        <td scope="row">        
            <h6><strong>Level</strong></h6>
            <p>{{ $user->akses_level }}</p>
        </td>
    </tr>
</table>
