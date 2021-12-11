<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Rekening_model;
use App\Models\Berita_model;
use App\Models\Staff_model;
use App\Models\Download_model;
use App\Models\Inbox;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use PDF;

class Home extends Controller
{
    // Homepage
    public function index()
    {
    	$site_config   = DB::table('konfigurasi')->first();
        $video          = DB::table('video')->orderBy('id_video','DESC')->first();
    	$slider         = DB::table('galeri')->where('jenis_galeri','Homepage')->limit(5)->orderBy('id_galeri', 'DESC')->get();
        $layanan        = DB::table('berita')->where(array('jenis_berita'=>'Layanan','status_berita'=>'Publish'))->limit(3)->orderBy('urutan', 'ASC')->get();
        $news           = new Berita_model();
        $berita         = $news->home();

        $data = array(  'title'         => $site_config->namaweb.' - '.$site_config->tagline,
                        'deskripsi'     => $site_config->namaweb.' - '.$site_config->tagline,
                        'keywords'      => $site_config->namaweb.' - '.$site_config->tagline,
                        'slider'        => $slider,
                        'site_config'   => $site_config,
                        'berita'        => $berita,
                        'beritas'       => $berita,
                        'layanan'       => $layanan,
                        'video'         => $video,
                        'content'       => 'home/index'
                    );
        return view('layout/wrapper',$data);
    }

    // Homepage
    public function about()
    {
        $site_config   = DB::table('konfigurasi')->first();
        $news   = new Berita_model();
        $berita = $news->home();
        // Staff
        $users  = User::select('nama', 'email', 'instagram', 'nim', 'job_desk', 'gambar')->get();
        $layanan = DB::table('berita')->where(array('jenis_berita' => 'Layanan','status_berita' => 'Publish'))->orderBy('urutan', 'ASC')->get();

        $data = array(  'title'     => 'Tentang '.$site_config->namaweb,
                        'deskripsi' => 'Tentang '.$site_config->namaweb,
                        'keywords'  => 'Tentang '.$site_config->namaweb,
                        'site_config'      => $site_config,
                        'berita'    => $berita,
                        'layanan'   => $layanan,
                        'users'     => $users,
                        'content'   => 'home/aws'
                    );
        return view('layout/wrapper',$data);
    }

    // kontak
    public function kontak()
    {
        $site_config   = DB::table('konfigurasi')->first();

        $data = array(  'title'     => 'Menghubungi '.$site_config->namaweb,
                        'deskripsi' => 'Kontak '.$site_config->namaweb,
                        'keywords'  => 'Kontak '.$site_config->namaweb,
                        'site_config'      => $site_config,
                        'content'   => 'home/kontak'
                    );

        return view('layout/wrapper',$data);
    }

    public function inbox(Request $request)
    {
        $rules = [
            'full_name' => ['required'],
            'email' => ['required'],
            'contact' => ['required'],
            'subject' => ['required'],
            'message' => ['required']
        ];

        Validator::make($request->all(), $rules)->validate();    

        try {
            $data = new Inbox;
            $data->full_name = $request->full_name;
            $data->email = $request->email;
            $data->contact = $request->contact;
            $data->subject = $request->subject;
            $data->message = $request->message;
            $data->save();

            return back()->with('message', 'Inbox successfully sent!');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
