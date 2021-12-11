<!--Inner Header Start-->
<section class="wf100 p80 inner-header">
<div class="container">
   <h1>{{ $title }}</h1>
</div>
</section>
<!--Inner Header End--> 
<!--About Start-->
<section class="wf100 about">
<!--About Txt Video Start-->
<div class="about-video-section wf100">
   <div class="container">
      <div class="row">
            
          <?php foreach($videos as $video) { ?>
           <div class="col-md-6 col-sm-6">
              <div class="blog-post">
                  <iframe width="560" height="315" src="https://www.youtube.com/embed/{{ $video->video }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                  <hr>
                  <div class="post-txt">
                     <h5><?php echo $video->judul ?></h5>
                  </div>
              </div>
          </div>
          <?php } ?>
          

          </div>
         <div class="gt-pagination">
            {{ $videos->links() }}
         </div>
      </div>
   </div>
</section>
<!--Blog End--> 