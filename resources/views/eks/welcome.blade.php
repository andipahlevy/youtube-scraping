<!doctype html>
<html class="no-js" lang="zxx">

<head>
    @include('eks.parts.head')
</head>

<body>
    <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->

    <!-- header-start -->
    @include('eks.parts.top_menu')
	<!-- header-end -->

    <!-- bradcam_area  
    <div class="bradcam_area bradcam_bg_2">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="bradcam_text text-center">
                        <h3>Destinations</h3>
                        <p>Pixel perfect design with awesome contents</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ bradcam_area  -->

    <!-- newletter_area_start  -->
        <div class="newletter_area overlay">
            <div class="container">
                <div class="row justify-content-center align-items-center">
                    <div class="col-lg-10"><form method="post" action="" class="fsubmit">
                        <div class="row align-items-center">
                            <div class="col-lg-5">
                                <div class="newsletter_text">
                                    <h4>Find videos!</h4>
                                    <p>You can find awesome videos here</p>
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="mail_form">
                                    <div class="row no-gutters">
                                        
											<div class="col-lg-9 col-md-8">
												<div class="newsletter_field">
													<input type="text" class="text-find" value="{{ @$q }}" placeholder="Explore videos..." >
												</div>
											</div>
											<div class="col-lg-3 col-md-4">
												<div class="newsletter_btn">
													<button class="boxed-btn4 bfind" type="submit" >Search</button>
												</div>
											</div>
										
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div></form>
                </div>
            </div>
        </div>
        <!-- newletter_area_end  -->
    
	@if(isset($id))
	<section class="blog_area single-post-area section-padding">
      <div class="container">
         <div class="row">
            <div class="col-lg-12 posts-list">
               <div class="single-post">
				  <div>
					<h1>
					 {{ ucfirst(@$q) }}
                     </h1>
				  </div>
                  <div class="feature-img">
                     <div style="overflow:hidden;position: relative;" class="img-fluid">
							<style>
    .hytPlayerWrap {
        display: inline-block;
        position: relative;
    }
    .hytPlayerWrap.ended::after {
        content:"";
        position: absolute;
        top: 0;
        left: 0;
        bottom: 0;
        right: 0;
        cursor: pointer;
        background-color: black;
        background-repeat: no-repeat;
        background-position: center; 
        background-size: 64px 64px;
        background-image: url(data:image/svg+xml;utf8;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxMjgiIGhlaWdodD0iMTI4IiB2aWV3Qm94PSIwIDAgNTEwIDUxMCI+PHBhdGggZD0iTTI1NSAxMDJWMEwxMjcuNSAxMjcuNSAyNTUgMjU1VjE1M2M4NC4xNSAwIDE1MyA2OC44NSAxNTMgMTUzcy02OC44NSAxNTMtMTUzIDE1My0xNTMtNjguODUtMTUzLTE1M0g1MWMwIDExMi4yIDkxLjggMjA0IDIwNCAyMDRzMjA0LTkxLjggMjA0LTIwNC05MS44LTIwNC0yMDQtMjA0eiIgZmlsbD0iI0ZGRiIvPjwvc3ZnPg==);
    }
    .hytPlayerWrap.paused::after {
        content:"";
        position: absolute;
        top: 70px;
        left: 0;
        bottom: 50px;
        right: 0;
        cursor: pointer;
        background-color: black;
        background-repeat: no-repeat;
        background-position: center; 
        background-size: 40px 40px;
        background-image: url(data:image/svg+xml;utf8;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZlcnNpb249IjEiIHdpZHRoPSIxNzA2LjY2NyIgaGVpZ2h0PSIxNzA2LjY2NyIgdmlld0JveD0iMCAwIDEyODAgMTI4MCI+PHBhdGggZD0iTTE1Ny42MzUgMi45ODRMMTI2MC45NzkgNjQwIDE1Ny42MzUgMTI3Ny4wMTZ6IiBmaWxsPSIjZmZmIi8+PC9zdmc+);
    }
</style>
							<div class="hytPlayerWrapOuter">
								<div class="hytPlayerWrap">
									<iframe
										width="840" height="560"
										src="https://www.youtube.com/embed/{{ $id }}?rel=0&enablejsapi=1"
										frameborder="0"
									></iframe>
								</div>
							</div>
							<script>
    "use strict";
    document.addEventListener('DOMContentLoaded', function() {
        // Activate only if not already activated
        if (window.hideYTActivated) return;
        // Activate on all players
        let onYouTubeIframeAPIReadyCallbacks = [];
        for (let playerWrap of document.querySelectorAll(".hytPlayerWrap")) {
            let playerFrame = playerWrap.querySelector("iframe");
            
            let tag = document.createElement('script');
            tag.src = "https://www.youtube.com/iframe_api";
            let firstScriptTag = document.getElementsByTagName('script')[0];
            firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
            
            let onPlayerStateChange = function(event) {
                if (event.data == YT.PlayerState.ENDED) {
                    playerWrap.classList.add("ended");
                } else if (event.data == YT.PlayerState.PAUSED) {
                    playerWrap.classList.add("paused");
                } else if (event.data == YT.PlayerState.PLAYING) {
                    playerWrap.classList.remove("ended");
                    playerWrap.classList.remove("paused");
                }
            };
            
            let player;
            onYouTubeIframeAPIReadyCallbacks.push(function() {
                player = new YT.Player(playerFrame, {
                    events: {
                        'onStateChange': onPlayerStateChange
                    }
                });
            });
          
            playerWrap.addEventListener("click", function() {
                let playerState = player.getPlayerState();
                if (playerState == YT.PlayerState.ENDED) {
                    player.seekTo(0);
                } else if (playerState == YT.PlayerState.PAUSED) {
                    player.playVideo();
                }
            });
        }
        
        window.onYouTubeIframeAPIReady = function() {
            for (let callback of onYouTubeIframeAPIReadyCallbacks) {
                callback();
            }
        };
        
        window.hideYTActivated = true;
    });
</script>
					  </div>
                  </div>
                  <div class="blog_details">
                     
                     <ul class="blog-info-link mt-3 mb-4">
                        <li><a href="#"><i class="fa fa-clock-o"></i> {{ $met[0] }}</a></li>
						@if(isset($met[1]))
							<li><a href="#"><i class="fa fa-eye"></i> {{ $met[1] }}</a></li>
						@endif
                     </ul>
                     <p class="excert">
					 {!! str_replace('*dot*','.',urldecode($desc)) !!}
                     </p>
                     
                  </div>
               </div>
            </div>
          </div>
      </div>
	</section>
	@endif
	
    <div class="popular_places_area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
					<div class="row mb-3">
						<div class="section_title text-center">
							@if(isset($title))
								<h2> Similar videos:</h2>
							@else
								<h1>{{ urldecode(ucfirst(@$q)) ?? ucfirst(env('APP_NAME')) }}</h1>
							@endif
						</div>	
					</div>
                    <div class="row">
                        
						@foreach($data['api'] as $dt)
						<div class="col-lg-3 col-md-3">
                            <div class="single_place">
                                <div class="thumb">
                                    <img src="{{ @$dt['img'] }}" alt="{{ @$dt['title'] }}" title="{{ @$dt['title'] }}">
									@if(@$dt['duration'])
                                    <a href="#" class="prise">{{ @$dt['duration'] }}</a>
									@endif
								</div>
                                <div class="place_info">
									@if(@$dt['vid'] != '')
										@if($dt['meta'] != '')
											<a href="{{ url('video/'.urlencode(str_replace('.','%2E',$dt['title'])).'/'.$dt['vid'].'/'.base64_encode(@$dt['oriDesc']).'/'.base64_encode($dt['meta']) ) }}"><h3>{{ @$dt['title'] }}</h3></a>
										@else
											<a href="{{ url('video/'.urlencode(str_replace('.','%2E',$dt['title'])).'/'.$dt['vid'].'/'.base64_encode(@$dt['oriDesc']).'/'.base64_encode('Watch now!') ) }}"><h3>{{ @$dt['title'] }}</h3></a>
										@endif
									@else
									<h3>{{ @$dt['title'] }}</h3>
									@endif
									<p>Watch {{ @$dt['desc'] }}</p>
                                    <div class="rating_days d-flex justify-content-between">
									@php
									$m = explode('^nl',@$dt['meta'])
									@endphp
									
									@if(count($m) < 2)
										<span class="d-flex justify-content-center align-items-center days">
                                            <i class="fa fa-video-camera"></i> {{ @$m[0] }}
                                        </span>
									@else
										<span class="d-flex justify-content-center align-items-center days">
                                            <i class="fa fa-clock-o"></i> {{ @$m[0] }}
                                        </span>
                                        <div class="days">
                                            <i class="fa fa-eye"></i>
                                            <a href="#">{{ @$m[1] }}</a>
                                        </div>
									@endif
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
						@endforeach
                    </div>
                    
					<!--  
					<div class="row">
                        <div class="col-lg-12">
                            <div class="more_place_btn text-center">
                                <a class="boxed-btn4" href="#">More Videos</a>
                            </div>
                        </div>
                    </div>
					-->
                </div>
            </div>
        </div>
    </div>
	
	@include('eks.parts.foot')
    
</body>

</html>