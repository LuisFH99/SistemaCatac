@extends('layouts.web')
@section('contenido')
<section id="main-container" class="main-container">    
    <div class="container">
        <div class="row">

        <div class="col-lg-0 mb-5 mb-lg-0">

            <div class="post-content post-single">
            <div class="post-media post-image">
                <img loading="lazy" src="constra/images/paro2.jpg" class="img-fluid" alt="post-image">
            </div>

            <div class="post-body">
                <div class="entry-header">
                <div class="post-meta">
                    <span class="post-cat">
                    <i class="far fa-folder-open"></i><a href="#"> Informes</a>
                    </span>
                    <span class="post-meta-date"><i class="far fa-calendar"></i> 03 de Marzo del 2022</span>
                </div>
                <h2 class="entry-title">
                    Paro Nacional INDEFINIDO
                </h2>
                </div><!-- header end -->

                <div class="entry-content">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p>Kucididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                    laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
                    velit esse cillum dolore eu fugiat nulla pariatur. Excepteur Lorem ipsum dolor sit amet, consectetur
                    adipisicing elit, sed do</p>

                <p>Eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                    exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in
                    reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat
                    cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut
                    perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium. </p>

                

                <div class="tags-area d-flex align-items-center justify-content-between">
                <div class="share-items">
                    <ul class="post-social-icons list-unstyled">
                    <li class="social-icons-head">Compartir en:</li>
                    <li><div class="fb-share-button" data-href=" " data-layout="button_count"></div></li>
                    <li><a href="https://twitter.com/intent/tweet?button_hashtag=share&ref_src=twsrc%5Etfw" data-show-count="false"><i class="fab fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fab fa-whatsapp"></i></a></li>
                    </ul>
                </div>
                </div>

            </div><!-- post-body end -->
            </div><!-- post content end -->
            <!-- Post comment start -->

            <h2>Comentarios</h2>

            <div class="fb-comments" data-

            <div id="fb-root"></div>    
                <script> (function(d, s, id){
                    var js, fjs=d.getElementsByTagName (s) [0];
                    if (d.getElementById (id)) return;
                     js=d.createElement(s); js.id=id;
                     js.src=
                     "//connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v2.5";
                     fjs.parentNode.insertBefore(js, fjs);
                   }(document, 'script', 'facebook-jssdk'));
                </script>   
            
            <div class="fb-comments" data-href="http://127.0.0.1:8000/noticiaeventoactividad" data-width="100%" 
                data-numposts="3" data-order-by="reverse_time">
            </div>   
        </div><!-- Sidebar Col end -->

        </div><!-- Main row end -->

    </div><!-- Conatiner end -->
</section><!-- Main container end -->
@endsection