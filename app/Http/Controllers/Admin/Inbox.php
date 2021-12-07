<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Inbox as ModelsInbox;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Inbox extends Controller
{
    public function index()
    {
        $inboxs = ModelsInbox::select('id','full_name', 'subject', 'created_at')->get();

        $data['title'] = 'Data Inbox';
        $data['inboxs'] = $inboxs;
        $data['content'] = 'admin/inbox/index';

        return view('admin/layout/wrapper', $data );
    }

    public function show($id)
    {
        $inboxs = ModelsInbox::select('full_name', 'email', 'contact', 'subject', 'message', 'created_at')->where('id', $id)->first();

        $data['title'] = 'Detail Inbox';
        $data['inboxs'] = $inboxs;
        $data['content'] = 'admin/inbox/detail';

        return view('admin/layout/wrapper', $data );
    }

    public function delete($id)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}

        DB::table('inboxs')->where('id',$id)->delete();
        return back()->with(['sukses' => 'Data telah dihapus']);
    }
}
