<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Berita_model;
use App\Models\Galeri_model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Konfigurasi_model;
use Image;
use PDF;

class Dasbor extends Controller
{


    // Index
    public function index()
    {
        if(Session()->get('username')=="") {
            $last_page = url()->full();
            return redirect('login?redirect='.$last_page)->with(['warning' => 'Mohon maaf, Anda belum login']);
        }            
       
		$data = array(  'title'     => '',
                        'content'   => 'admin/dasbor/index',                        
                    );
        return view('admin/layout/wrapper',$data);
    }

    public function chart()
    {
        $berita = DB::table('berita')->where('jenis_berita','Berita')->count();
        $layanan = DB::table('berita')->where('jenis_berita','Layanan')->count();
        $dokumentasi = DB::table('berita')->count();
        $galeri = DB::table('galeri')->count();
        $rekening = DB::table('rekening')->count();
        $video = DB::table('video')->count();
        $agenda = DB::table('agenda')->count();

        $data['berita'] = $berita;
        $data['layanan'] = $layanan;
        $data['dokumentasi'] = $dokumentasi;
        $data['galeri'] = $galeri;
        $data['rekening'] = $rekening;
        $data['video'] = $video;
        $data['agenda'] = $agenda;

        return response()->json([$data]);
    }
}
