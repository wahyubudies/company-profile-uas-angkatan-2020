<?php 
$bg   = DB::table('heading')->where('halaman','Kontak')->orderBy('id_heading','DESC')->first();
 ?>
<!--Inner Header Start-->
<section class="wf100 p80 inner-header" style="background-image: url('{{ asset('assets/upload/image/'.$bg->gambar) }}'); background-position: bottom center;">
   <div class="container">
      <h1>{{ $title }}</h1>
   </div>
</section>
<!--Inner Header End--> 
<!--Contact Start-->
<section class="contact-page wf100 p50">   
   <div class="container contact-info">
      <div class="row">
         <!--Contact Info Start-->
         <div class="col-md-6">
            <div class="c-info">
               <h6>Alamat:</h6>
               <p>
                <strong><?php echo $site_config->namaweb ?></strong>
                <br><?php echo nl2br($site_config->alamat) ?>
              </p>
            </div>
         </div>
         <!--Contact Info End--> 
         <!--Contact Info Start-->
         <div class="col-md-6">
            <div class="c-info">
               <h6>Kontak:</h6>
               <p>Telepon: <?php echo $site_config->telepon ?>
                <br>Email: <?php echo $site_config->email ?>
                <br>Website: <?php echo $site_config->website ?></p>
            </div>
         </div>
         <!--Contact Info End--> 
         
      </div>
      <br><br>
   </div>
   <div class="container">
      <div class="row">
         <div class="col-md-6">
            @if( session()->has('message') )
               <div class="alert alert-success alert-dismissible fade show" role="alert">
                  {{ session()->get('message') }}
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
            @endif
            <form action="{{ route('inbox') }}" method="post">
               @csrf
               <div class="row">
                  <div class="col-12 col-md-6 mb-4">
                     <input type="text" class="form-control @error('full_name') is-invalid @enderror" placeholder="Full Name" name="full_name" value="{{ old('full_name') }}">
                     @error('full_name')
                        <span class="text-danger">{{ $message }}</span>
                     @enderror
                  </div>
                  <div class="col-12 col-md-6 mb-4">
                     <input type="text" class="form-control @error('email') is-invalid @enderror" placeholder="Email" name="email" value="{{ old('email') }}">
                     @error('email')
                        <span class="text-danger">{{ $message }}</span>
                     @enderror
                  </div>
                  <div class="col-12 col-md-6 mb-4">
                     <input type="text" class="form-control @error('contact') is-invalid @enderror" placeholder="Contact" name="contact" value="{{ old('contact') }}">
                     @error('contact')
                        <span class="text-danger">{{ $message }}</span>
                     @enderror
                  </div>
                  <div class="col-12 col-md-6 mb-4">
                     <input type="text" class="form-control @error('subject') is-invalid @enderror" placeholder="Subject" name="subject" value="{{ old('subject') }}">
                     @error('subject')
                        <span class="text-danger">{{ $message }}</span>
                     @enderror
                  </div>
                  <div class="col-12 mb-4">
                     <textarea class="form-control @error('message') is-invalid @enderror" placeholder="Message" name="message">{{ old('message') }}</textarea>
                     @error('message')
                        <span class="text-danger">{{ $message }}</span>
                     @enderror
                  </div>
                  <div class="col-12 mb-4">
                     <input type="submit" value="Contact us" class="btn btn-info btn-lg btn-block">
                  </div>
               </div>
            </form>
         </div>
         <div class="col-md-6">
            <div class="google-map">
               <?php echo $site_config->google_map ?>
            </div>
         </div>
         
      </div>
   </div>
   <br><br>
</section>
<!--Contact End--> 