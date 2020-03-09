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
							<iframe frameborder="0" scrolling="no" marginheight="0" marginwidth="0"width="800" 
							height="443" type="text/html" 
							src="https://www.youtube.com/embed/

							{{ $id }}

							?autoplay=0&fs=0&iv_load_policy=3&showinfo=0&rel=0&cc_load_policy=0&start=0&end=0&origin=https://youtube-embed.com"></iframe>
							<div style="position: absolute;bottom: 10px;left: 0;right: 0;margin-left: auto;margin-right: auto;color: #000;text-align: center;">
								<small style="line-height: 1.8;font-size: 0px;background: #fff;"> 
									<a href="https://nogomi.cc/">Nogomi</a> 
								</small>
							</div>
							<style>#gmap_canvas img {
								max-width: none!important;
								background: none!important
							}

							</style>
						</div>
                  </div>
                  <div class="blog_details">
                     
                     <ul class="blog-info-link mt-3 mb-4">
                        <li><a href="#"><i class="fa fa-user"></i> Travel, Lifestyle</a></li>
                        <li><a href="#"><i class="fa fa-comments"></i> 03 Comments</a></li>
                     </ul>
                     <p class="excert">
                        MCSE boot camps have its supporters and its detractors. Some people do not understand why you
                        should have to spend money on boot camp when you can get the MCSE study materials yourself at a
                        fraction of the camp price. However, who has the willpower
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
							@if(isset($title2))
								<h2> Similar videos:</h2>
							@else
								<h1>{{ ucfirst(@$q) ?? ucfirst(env('APP_NAME')) }}</h1>
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
                                    <a href="{{ url('video/'.$dt['vid'].'/'.str_replace([' ','/'],['-','*sls*'],$dt['title'])) }}"><h3>{{ @$dt['title'] }}</h3></a>
                                    @else
									<h3>{{ @$dt['title'] }}</h3>
									@endif
									<p>{{ @$dt['desc'] }}</p>
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