@extends('layouts.header')
@section('articles-status', 'active')

@section('content')
@if (session('message'))
    <div class="alert alert-success" role="alert">
        {{ session('message') }}
    </div>
@endif
@if (session('error'))
    <div class="alert alert-success" role="alert">
        {{ session('error') }}
    </div>
@endif

<section class="blog_area section-gap single-post-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                    {{-- <a href="{{url("/admin/post/".$post->id. "/edit")}}" class="btn btn-outline-success mb-2"><i class="fa fa-arrow-left" aria-hidden="true"></i></a> --}}
                    <a href="{{url()->previous()}}" class="btn btn-outline-success mb-2"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
                    
                    <div class="main_blog_details">
                      <a href="{{ asset('public/uploads/'.$post->post_img) }}" target="_blank" title="view category Banner">
                        <img class="img-rounded" src="{{ asset('public/uploads/'.$post->post_img) }}" width="100%" /> </a>
                        <a href="#"><h4>{{$post->title}}</h4></a>
                        <div class="user_details">
                            <div class="float-left">
                                <a href="#">Lifestyle</a>
                            </div>
                            <div class="float-right mt-sm-0 mt-3">
                                <div class="media">
                                    <div class="media-body">
                                        <h5>{{$author->name}}</h5>
                                        <p>{{$post->created_at}}</p>
                                    </div>
                                    <div class="d-flex">
                                        <img src="img/blog/user-img.jpg" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="content-justify-center">
                            {!!$content!!}
                        </div>
                        
                        @php
                          if(isset($post->comments)){
                            if(count($post->comments) > 1){
                                $count = count($post->comments) ." Comments";
                            }
                            else{
                                $count = count($post->comments) ." Comment";
                            }
                          }
                        @endphp
                        <div class="news_d_footer flex-column flex-sm-row">
                            <a href="#"><i class="lnr lnr lnr-heart"></i>Lily and 4 people like this</a>
                            <a class="justify-content-sm-center ml-sm-auto mt-sm-0 mt-2" href="#"><i class="lnr lnr lnr-bubble"></i>{{$count}}</a>
                            <div class="news_socail ml-sm-auto mt-sm-0 mt-2">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-youtube-play"></i></a>
                            <a href="#"><i class="fa fa-pinterest"></i></a>
                            <a href="#"><i class="fa fa-rss"></i></a>
                        </div>
                      </div>
                   </div>
                   <div class="navigation-area">
                    {{-- <div class="row">
                        <div class="col-lg-6 col-md-6 col-12 nav-left flex-row d-flex justify-content-start align-items-center">
                            <div class="thumb">
                                <a href="#"><img class="img-fluid" src="img/blog/prev.jpg" alt=""></a>
                            </div>
                            <div class="arrow">
                                <a href="#"><span class="lnr text-white lnr-arrow-left"></span></a>
                            </div>
                            <div class="detials">
                                <p>Prev Post</p>
                                <a href="#"><h4>A Discount Toner</h4></a>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12 nav-right flex-row d-flex justify-content-end align-items-center">
                            <div class="detials">
                                <p>Next Post</p>
                                <a href="#"><h4>Cartridge Is Better</h4></a>
                            </div>
                            <div class="arrow">
                                <a href="#"><span class="lnr text-white lnr-arrow-right"></span></a>
                            </div>
                            <div class="thumb">
                                <a href="#"><img class="img-fluid" src="img/blog/next.jpg" alt=""></a>
                            </div>										
                        </div>									
                    </div> --}}
                  </div>
                {{-- Comments --}}
                
                @include('partials.commentRepliesDisplay', ['comments' => $post->comments, 'post_id' => $post->id])

                <div class="comment-form">
                    <h4>Comment</h4>
                    <form action="{{url('store/comment')}}" method="post">
                      @csrf
                        <input type="hidden" name="post_id" value="{{$post->id}}">
                        {{-- <input type="hidden" name="post_url" value="{{$previ_url}}"> --}}
                        <div class="form-group">
                            <textarea class="form-control mb-10" rows="5" type="text" name="body" placeholder="Messege" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Messege'" required></textarea>
                        </div>
                        <button type="submit" class="primary-btn submit_btn" >Post Comment</button>	
                    </form>
                </div>
            </div>
            
            <div class="col-lg-4 sidebar-widgets">
                <div class="widget-wrap">
                  <div class="single-sidebar-widget search-widget">
                    <form class="search-form" action="#">
                      <input placeholder="Search Posts" name="search" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Search Posts'">
                      <button type="submit"><i class="fa fa-search"></i></button>
                    </form>
                  </div>
  
                  <div class="single-sidebar-widget instafeed-widget">
                    <h4 class="instafeed-title">Instagram</h4>
                    <ul class="instafeed d-flex flex-wrap">
                      <li><img src="img/blog/instagram/i1.jpg" alt=""></li>
                      <li><img src="img/blog/instagram/i2.jpg" alt=""></li>
                      <li><img src="img/blog/instagram/i3.jpg" alt=""></li>
                      <li><img src="img/blog/instagram/i4.jpg" alt=""></li>
                      <li><img src="img/blog/instagram/i5.jpg" alt=""></li>
                      <li><img src="img/blog/instagram/i6.jpg" alt=""></li>
                    </ul>
                  </div>
  
                  <div class="single-sidebar-widget post-category-widget">
                    <h4 class="category-title">Catgories</h4>
                    <ul class="cat-list mt-20">
                      <li>
                        <a href="#" class="d-flex justify-content-between">
                          <p>Fashion</p>
                          <p>59</p>
                        </a>
                      </li>
                      <li>
                        <a href="#" class="d-flex justify-content-between">
                          <p>Travel</p>
                          <p>09</p>
                        </a>
                      </li>
                      <li>
                        <a href="#" class="d-flex justify-content-between">
                          <p>Lifestyle</p>
                          <p>24</p>
                        </a>
                      </li>
                      <li>
                        <a href="#" class="d-flex justify-content-between">
                          <p>Shopping</p>
                          <p>44</p>
                        </a>
                      </li>
                      <li>
                        <a href="#" class="d-flex justify-content-between">
                          <p>Food</p>
                          <p>15</p>
                        </a>
                      </li>
                    </ul>
                  </div>
  
                  <div class="single-sidebar-widget popular-post-widget">
                    <h4 class="popular-title">Popular Posts</h4>
                    <div class="popular-post-list">
                      <div class="single-post-list">
                        <div class="thumb">
                          <img class="img-fluid" src="img/blog/pp1.jpg" alt="">
                        </div>
                        <div class="details mt-20">
                          <a href="blog-single.html">
                            <h6>Retro-electric 1967 Ford Mustang 
                                revealed in Russia</h6>
                          </a>
                          <p>Mate Winston | Dec 15</p>
                        </div>
                      </div>
                      <div class="single-post-list">
                        <div class="thumb">
                          <img class="img-fluid" src="img/blog/pp2.jpg" alt="">
                        </div>
                        <div class="details mt-20">
                          <a href="blog-single.html">
                            <h6>Unsettling trend of food safety at 
                                sports stadiums uncovered</h6>
                          </a>
                          <p>Mate Winston | Dec 15</p>
                        </div>
                      </div>
                      <div class="single-post-list">
                        <div class="thumb">
                          <img class="img-fluid" src="img/blog/pp3.jpg" alt="">
                        </div>
                        <div class="details mt-20">
                          <a href="blog-single.html">
                            <h6>Christmas cottage from the Holiday
                                flick selling for people</h6>
                          </a>
                          <p>Mate Winston | Dec 15</p>
                        </div>
                      </div>
                      <div class="single-post-list">
                        <div class="thumb">
                          <img class="img-fluid" src="img/blog/pp4.jpg" alt="">
                        </div>
                        <div class="details mt-20">
                          <a href="blog-single.html">
                            <h6>Home improvement advice every 
                                homeowner needs to know</h6>
                          </a>
                          <p>Mate Winston | Dec 15</p>
                        </div>
                      </div>
                    </div>
                  </div>
  
                  <div class="single-sidebar-widget newsletter-widget">
                    <h4 class="newsletter-title">Newsletter</h4>
                    <div class="form-group mt-30">
                      <div class="col-autos">
                        <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Enter email" onfocus="this.placeholder = ''"
                          onblur="this.placeholder = 'Enter email'">
                      </div>
                    </div>
                    <button class="bbtns d-block mt-20 w-100">Subcribe</button>
                  </div>
  
                    <div class="single-sidebar-widget share-widget">
                      <h4 class="share-title">Share this post</h4>
                      <div class="social-icons mt-20">
                        <a href="#">
                          <span class="ti-facebook"></span>
                        </a>
                        <a href="#">
                          <span class="ti-twitter"></span>
                        </a>
                        <a href="#">
                          <span class="ti-pinterest"></span>
                        </a>
                        <a href="#">
                          <span class="ti-instagram"></span>
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
        </div>
    </div>
</section>

@endsection