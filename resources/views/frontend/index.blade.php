@extends('frontend.layouts.master')
@section('content')

    <main>
    <!-- Trending Area Start -->
    <div class="trending-area fix">
        <div class="container">
            <div class="trending-main">
                <!-- Trending Tittle -->
               
                <div class="row">
                    <div class="col-lg-12">
                        <div class="trending-tittle">
                            <strong>Trending now</strong>
                            <!-- <p>Rem ipsum dolor sit amet, consectetur adipisicing elit.</p> -->
                            <div class="trending-animated">
                                <ul id="js-news" class="js-hidden">
                                    @foreach($details as $newdetail)
                                    <li class="news-item">{{$newdetail->trendnews}}</li>
                                    @endforeach
                                    
                                </ul>
                            </div>
                            
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-lg-8">
                        <!-- Trending Top -->
                        @if(count($details) > 0)
                        @php $detail = $details[0]; @endphp
                        <div class="trending-top mb-30">
                            <div class="trend-top-img">
                                  <img src="{{asset('images/'. $detail->photo)}}" alt=""/>
                                <div class="trend-top-cap">
                                    <span>{{$detail->category_name}}</span>
                                    <h2><a href="{{url('detail',$detail->id)}}">{{$detail->newshead}}</a></h2>
                                </div>
                            </div>
                        </div>
                        @endif

                        <!-- Trending Bottom -->
                        <div class="trending-bottom">
                            <div class="row">
                               
                                @foreach($details as $newdetail)
                                <div class="col-lg-4">
                                    <div class="single-bottom mb-35">
                                        <div class="trend-bottom-img mb-30">
                                            <img src="{{asset('images/'. $newdetail->photo)}}" alt="">
                                        </div>
                                        <div class="trend-bottom-cap">
                                            <span class="color2">{{$newdetail->category_name}}</span>
                                            <h4><h4><a href="{{url('detail',$newdetail)}}">{{$newdetail->trendnews}}</a></h4></h4>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <!-- Riht content -->
                    @foreach($details as $newdetail)
                    <div class="col-lg-4">
                        <div class="trand-right-single d-flex">
                            
                            <div class="trand-right-img">
                                <img src="{{asset('images/'. $newdetail->photo)}}" alt="">
                            </div>
                            <div class="trand-right-cap">
                                <span class="color1">{{$newdetail->category_name}}</span>
                                <h4><a href="{{url('detail',$newdetail)}}">{{$newdetail->newshead}}</a></h4>
                            </div>
                        </div>
                        @endforeach
                        
                        
                        </div>
                    </div>
                  
                </div>
            </div>
        </div>
    </div>
    <!-- Trending Area End -->
    <!--   Weekly-News start -->
    <div class="weekly-news-area pt-50">
        <div class="container">
           <div class="weekly-wrapper">
                <!-- section Tittle -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-tittle mb-30">
                            <h3>Weekly Top News</h3>
                        </div>
                    </div>
                </div>
              
                <div class="row">
                    <div class="col-12">
                       
                        <div class="weekly-news-active dot-style d-flex dot-style">
                            {{-- @foreach ($details as $newdetail)
                            <div class="weekly-single">
                                <div class="weekly-img">
                                    <img src="{{asset('images/'. $newdetail->photo)}}" alt="">
                                </div>
                                <div class="weekly-caption">
                                    <span class="color1">{{$newdetail->category_name}}</span>
                                    <h4><a href="{{url('detail',$newdetail)}}">{{$newdetail->newshead}}</a></h4>
                                </div>
                            </div> 

                           
                            @endforeach --}}
                            
                            <div class="weekly-single active">
                                <div class="weekly-img">
                                        <img src="assets/img/news/weeklyNews1.jpg" alt="">
                                </div>
                                <div class="weekly-caption">
                                    <span class="color1">Strike</span>
                                    <h4><a href="#">Welcome To The Best Model  Winner Contest</a></h4>
                                </div>
                            </div>
                            <div class="weekly-single">
                                <div class="weekly-img">
                                        <img src="assets/img/news/weeklyNews3.jpg" alt="">
                                </div>
                                <div class="weekly-caption">
                                    <span class="color1">Strike</span>
                                    <h4><a href="#">Welcome To The Best Model  Winner Contest</a></h4>
                                </div>
                            </div>
                            <div class="weekly-single">
                                <div class="weekly-img">
                                    <img src="assets/img/news/weeklyNews1.jpg" alt="">
                                </div>
                                <div class="weekly-caption">
                                    <span class="color1">Strike</span>
                                    <h4><a href="#">Welcome To The Best Model  Winner Contest</a></h4>
                                </div>
                            </div>
                        </div>
                      
                    </div>
                </div>

           </div>
        </div>
    </div>           
    <!-- End Weekly-News -->
   <!-- Whats New Start -->
    <section class="whats-news-area pt-50 pb-20">
        <div class="container">
            <div class="row">
            <div class="col-lg-8">
                <div class="row d-flex justify-content-between">
                    <div class="col-lg-3 col-md-3">
                        <div class="section-tittle mb-30">
                            <h3>Whats New</h3>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-9">
                        <div class="properties__button">
                            <!--Nav Button  -->                                            
                            <nav>                                                                     
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">All</a>
                                    @foreach($categories as $category)
                                    <a class="nav-item nav-link" id="nav-{{ $category->id }}-tab" data-toggle="tab" href="#nav-{{ $category->id }}" role="tab" aria-controls="nav-{{ $category->id }}" aria-selected="false">{{ $category->category_name }}</a>
                                    @endforeach
                                </div>
                            </nav>
                            <!--End Nav Button  -->
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <!-- Nav Card -->
                        <div class="tab-content" id="nav-tabContent">
                            <!-- card one -->
                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">           
                                <div class="whats-news-caption">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6">
                                            @foreach($details as $newdetail)
                                            <div class="single-what-news mb-100">
                                                <div class="what-img">
                                                    <img src="{{asset('images/'. $newdetail->photo)}}" alt="">
                                                </div>
                                                <div class="what-cap">
                                                    <span class="color1">{{$newdetail->category_name}}</span>
                                                    <h4><a href="{{url('detail',$newdetail)}}">{{$newdetail->newshead}}</a></h4>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                       
                                    </div>
                                </div>
                            </div>
                            <!-- Card two -->
                            @foreach ($categories as $category)
                            <div class="tab-pane fade" id="nav-{{ $category->id }}" role="tabpanel" aria-labelledby="nav-profile-tab">
                                <div class="whats-news-caption">
                                    <div class="row">
                                        @foreach(App\Models\Newsdetail::where('category_name',$category->category_name)->get() as $newdetail)
                                        <div class="col-lg-6 col-md-6">
                                            <div class="single-what-news mb-100">
                                                <div class="what-img">
                                                    <img src="{{asset('images/'. $newdetail->photo)}}" alt="">
                                                </div>
                                                <div class="what-cap">
                                                    <span class="color1">{{$newdetail->category_name}}</span>
                                                    <h4><a href="{{url('detail',$newdetail)}}">{{$newdetail->newshead}}</a></h4>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            
                            <!-- card fure -->
                            
                        </div>
                    <!-- End Nav Card -->
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <!-- Section Tittle -->
                <div class="section-tittle mb-40">
                    <h3>Follow Us</h3>
                </div>
                <!-- Flow Socail -->
                <div class="single-follow mb-45">
                    <div class="single-box">
                        <div class="follow-us d-flex align-items-center">
                            <div class="follow-social">
                                <a href="#"><img src="assets/img/news/icon-fb.png" alt=""></a>
                            </div>
                            <div class="follow-count">  
                                <span>8,045</span>
                                <p>Fans</p>
                            </div>
                        </div> 
                        <div class="follow-us d-flex align-items-center">
                            <div class="follow-social">
                                <a href="#"><img src="assets/img/news/icon-tw.png" alt=""></a>
                            </div>
                            <div class="follow-count">
                                <span>8,045</span>
                                <p>Fans</p>
                            </div>
                        </div>
                            <div class="follow-us d-flex align-items-center">
                            <div class="follow-social">
                                <a href="#"><img src="assets/img/news/icon-ins.png" alt=""></a>
                            </div>
                            <div class="follow-count">
                                <span>8,045</span>
                                <p>Fans</p>
                            </div>
                        </div>
                        <div class="follow-us d-flex align-items-center">
                            <div class="follow-social">
                                <a href="#"><img src="assets/img/news/icon-yo.png" alt=""></a>
                            </div>
                            <div class="follow-count">
                                <span>8,045</span>
                                <p>Fans</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- New Poster -->
                <div class="news-poster d-none d-lg-block">
                    <img src="assets/img/news/news_card.jpg" alt="">
                </div>
            </div>
            </div>
        </div>
    </section>
    <!-- Whats New End -->
    <!--   Weekly2-News start -->
    <div class="weekly2-news-area  weekly2-pading gray-bg">
        <div class="container">
            <div class="weekly2-wrapper">
                <!-- section Tittle -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-tittle mb-30">
                            <h3>Weekly Top News</h3>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="weekly2-news-active dot-style d-flex dot-style">
                            @foreach($details as $newdetail)
                            <div class="weekly2-single">
                                <div class="weekly2-img">
                                    <img src="{{asset('images/'. $newdetail->photo)}}" alt="">
                                </div>
                                <div class="weekly2-caption">
                                    <span class="color1">{{$newdetail->category_name}}</span>
                                    
                                    <h4><a href="{{url('detail',$newdetail)}}">{{$newdetail->newshead}}</a></h4>
                                </div>
                            </div> 
                            @endforeach
                        </div>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>           
    <!-- End Weekly-News -->
    <!-- Start Youtube -->
    <div class="youtube-area video-padding">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="video-items-active">
                        @foreach ($videos as $video)
                            <div class="video-items text-center">
                                @php
                                    // You can modify the URL here if needed
                                    $videoUrl = $video->url;
                                    $autoplayUrl = $videoUrl . (strpos($videoUrl, '?') !== false ? '&' : '?') . 'autoplay=1';
                                @endphp
                                <iframe src="{{ $autoplayUrl }}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            
            <div class="video-info">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="video-caption">
                            <div class="top-caption">
                                <span class="color1">{{$video->category_name}}</span>
                            </div>
                            <div class="bottom-caption">
                                <h2>{{$video->title}}</h2>
                                <p>{{$video->description}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="testmonial-nav text-center">
                            @foreach ($videos as $video)
                                
                           
                            <div class="single-video">
                                @php
                                // You can modify the URL here if needed
                                $videoUrl = $video->url;
                                $autoplayUrl = $videoUrl . (strpos($videoUrl, '?') !== false ? '&' : '?') . 'autoplay=1';
                            @endphp
                            <iframe src="{{ $autoplayUrl }}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                    <h4>{{$video->title}}</h4>
                                </div>
                            </div>
                            @endforeach
                            
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> 
    <!-- End Start youtube -->
    <!--  Recent Articles start -->
    <div class="recent-articles">
        <div class="container">
           <div class="recent-wrapper">
                <!-- section Tittle -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-tittle mb-30">
                            <h3>Recent Articles</h3>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="recent-active dot-style d-flex dot-style">
                           @foreach ($details as $newdetail)
                           <div class="single-recent mb-100">
                            <div class="what-img">
                                <img src="{{asset('images/'.$newdetail->photo)}}" alt="">
                            </div>
                            <div class="what-cap">
                                <span class="color1">{{$newdetail->category_name}}</span>
                                <h4><a href="{{url('details',$newdetail)}}">{{$newdetail->newshead}}</a></h4>
                            </div>
                        </div>
                               
                           @endforeach
                          </div>
                        </div>
                    </div>
                </div>
           </div>
        </div>
    </div>           
    <!--Recent Articles End -->
    <!--Start pagination -->
    <div class="pagination-area pb-45 text-center">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="single-wrap d-flex justify-content-center">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-start">
                              <li class="page-item"><a class="page-link" href="#"><span class="flaticon-arrow roted"></span></a></li>
                                <li class="page-item active"><a class="page-link" href="#">01</a></li>
                                <li class="page-item"><a class="page-link" href="#">02</a></li>
                                <li class="page-item"><a class="page-link" href="#">03</a></li>
                              <li class="page-item"><a class="page-link" href="#"><span class="flaticon-arrow right-arrow"></span></a></li>
                            </ul>
                          </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End pagination  -->
    </main>
    @endsection
    
   