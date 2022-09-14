@extends('articles.blade')
@section('sidebar-widgets')
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
        <li><img src="{{asset('assets/img/blog/instagram/i1.jpg')}}" alt=""></li>
        <li><img src="{{asset('assets/img/blog/instagram/i2.jpg')}}" alt=""></li>
        <li><img src="{{asset('assets/img/blog/instagram/i3.jpg')}}" alt=""></li>
        <li><img src="{{asset('assets/img/blog/instagram/i4.jpg')}}" alt=""></li>
        <li><img src="{{asset('assets/img/blog/instagram/i5.jpg')}}" alt=""></li>
        <li><img src="{{asset('assets/img/blog/instagram/i6.jpg')}}" alt=""></li>
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
            <img class="img-fluid" src="{{asset('assets/img/blog/pp1.jpg')}}" alt="">
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
            <img class="img-fluid" src="{{asset('assets/img/blog/pp2.jpg')}}" alt="">
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
            <img class="img-fluid" src="{{asset('assets/img/blog/pp3.jpg')}}" alt="">
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
            <img class="img-fluid" src="{{asset('assets/img/blog/pp4.jpg')}}" alt="">
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
  @endsection