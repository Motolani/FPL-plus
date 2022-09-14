@extends('layouts.header')
@section('reviews-status', 'active')

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

     <!--================ Start Blog Post Area =================-->
     <div id="sub-nav" class="container">
        <div class="row sub-nav">
            <div class="col-2">
                <a class="nav-link active" href="#">GW2 Reveal</a>
            </div>
            <div class="col-2">
                <a class="nav-link" href="#">FPL Salah Reveal</a>
            </div>    
            <div class="col-2">
                <a class="nav-link" href="#">Topboy Team Reveal</a>
            </div>   
            <div class="col-2">
                <a class="nav-link" href="#">Style Bender Team Reveal</a>
            </div>  
            <div class="col-2">
                <a class="nav-link" href="#">GW3 Reveal</a>
            </div>  
            <div class="col-2">
                <a class="nav-link " href="#">Jota Time?</a>
            </div>
            
        </div>
        <hr>
    </div>
     <section class="blog-post-area section-gap relative">
        <div class="container">
          <div class="row">
            <div class="col-lg-8 mt-3">
              <div class="row">
                <div class="col-lg-6 col-md-6 mt-1">
                  <div class="single-amenities">
                    <div class="amenities-thumb">
                      <img
                        class="img-fluid w-100"
                        src="{{asset('assets/img/blog-post/blog-post1.jpg')}}"
                        alt=""
                      />
                    </div>
                    <div class="amenities-details">
                      <h5>
                        <a href="#"
                          >There's goting to be a musical about meghan
                        </a>
                      </h5>
                      <div class="amenities-meta mb-10">
                        <a href="#" class=""
                          ><span class="ti-calendar"></span>20th Nov, 2018</a
                        >
                        <a href="#" class="ml-20"
                          ><span class="ti-comment"></span>05</a
                        >
                      </div>
                      <p>
                        Creepeth green light appear let rule only you're divide
                        and lights moving and isn't given creeping deep.
                      </p>
  
                      <div class="d-flex justify-content-between mt-20">
                        <div>
                          <a href="#" class="blog-post-btn">
                            Read More <span class="ti-arrow-right"></span>
                          </a>
                        </div>
                        <div class="category">
                          <a href="#">
                            <span class="ti-folder mr-1"></span> Travel
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
  
                  <div class="single-amenities">
                    <div class="amenities-thumb">
                      <img
                        class="img-fluid w-100"
                        src="{{asset('assets/img/blog-post/blog-post3.jpg')}}"
                        alt=""
                      />
                    </div>
                    <div class="amenities-details">
                      <h5>
                        <a href="#"
                          >Forest responds to consultation smoking in al
                          fresco.</a
                        >
                      </h5>
                      <div class="amenities-meta mb-10">
                        <a href="#" class="">
                          <span class="ti-calendar"></span>20th Nov, 2018
                        </a>
                        <a href="#" class="ml-20">
                          <span class="ti-comment"></span>05
                        </a>
                      </div>
                      <p>
                        Creepeth green light appear let rule only you're divide
                        and lights moving and isn't given creeping deep.
                      </p>
  
                      <div class="d-flex justify-content-between mt-20">
                        <div>
                          <a href="#" class="blog-post-btn">
                            Read More <span class="ti-arrow-right"></span>
                          </a>
                        </div>
                        <div class="category">
                          <a href="#">
                            <span class="ti-folder mr-1"></span> Travel
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
  
                  <div class="single-amenities">
                    <div class="amenities-thumb">
                      <img
                        class="img-fluid w-100"
                        src="{{asset('assets/img/blog-post/blog-post5.jpg')}}"
                        alt=""
                      />
                    </div>
                    <div class="amenities-details">
                      <h5>
                        <a href="#"
                          >There's goting to be a musical about meghan
                        </a>
                      </h5>
                      <div class="amenities-meta mb-10">
                        <a href="#" class=""
                          ><span class="ti-calendar"></span>20th Nov, 2018</a
                        >
                        <a href="#" class="ml-20"
                          ><span class="ti-comment"></span>05</a
                        >
                      </div>
                      <p>
                        Creepeth green light appear let rule only you're divide
                        and lights moving and isn't given creeping deep.
                      </p>
  
                      <div class="d-flex justify-content-between mt-20">
                        <div>
                          <a href="#" class="blog-post-btn">
                            Read More <span class="ti-arrow-right"></span>
                          </a>
                        </div>
                        <div class="category">
                          <a href="#">
                            <span class="ti-folder mr-1"></span> Travel
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
  
                  <div class="single-amenities">
                    <div class="amenities-thumb">
                      <img
                        class="img-fluid w-100"
                        src="{{asset('assets/img/blog-post/blog-post7.jpg')}}"
                        alt=""
                      />
                    </div>
                    <div class="amenities-details">
                      <h5>
                        <a href="#"
                          >Forest responds to consultation smoking in al
                          fresco.</a
                        >
                      </h5>
                      <div class="amenities-meta mb-10">
                        <a href="#" class="">
                          <span class="ti-calendar"></span>20th Nov, 2018
                        </a>
                        <a href="#" class="ml-20">
                          <span class="ti-comment"></span>05
                        </a>
                      </div>
                      <p>
                        Creepeth green light appear let rule only you're divide
                        and lights moving and isn't given creeping deep.
                      </p>
  
                      <div class="d-flex justify-content-between mt-20">
                        <div>
                          <a href="#" class="blog-post-btn">
                            Read More <span class="ti-arrow-right"></span>
                          </a>
                        </div>
                        <div class="category">
                          <a href="#">
                            <span class="ti-folder mr-1"></span> Travel
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
  
                <div class="col-lg-6 col-md-6">
                  <div class="single-amenities">
                    <div class="amenities-thumb">
                      <img
                        class="img-fluid w-100"
                        src="{{asset('assets/img/blog-post/blog-post2.jpg')}}"
                        alt=""
                      />
                    </div>
                    <div class="amenities-details">
                      <h5>
                        <a href="#"
                          >There's goting to be a musical about meghan
                        </a>
                      </h5>
                      <div class="amenities-meta mb-10">
                        <a href="#" class=""
                          ><span class="ti-calendar"></span>20th Nov, 2018</a
                        >
                        <a href="#" class="ml-20"
                          ><span class="ti-comment"></span>05</a
                        >
                      </div>
                      <p>
                        Creepeth green light appear let rule only you're divide
                        and lights moving and isn't given creeping deep.
                      </p>
  
                      <div class="d-flex justify-content-between mt-20">
                        <div>
                          <a href="#" class="blog-post-btn">
                            Read More <span class="ti-arrow-right"></span>
                          </a>
                        </div>
                        <div class="category">
                          <a href="#">
                            <span class="ti-folder mr-1"></span> Travel
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                  
                  <div class="single-amenities">
                    <div class="amenities-thumb">
                      <img
                        class="img-fluid w-100"
                        src="{{asset('assets/img/blog-post/blog-post4.jpg')}}"
                        alt=""
                      />
                    </div>
                    <div class="amenities-details">
                      <h5>
                        <a href="#"
                          >Forest responds to consultation smoking in al
                          fresco.</a
                        >
                      </h5>
                      <div class="amenities-meta mb-10">
                        <a href="#" class="">
                          <span class="ti-calendar"></span>20th Nov, 2018
                        </a>
                        <a href="#" class="ml-20">
                          <span class="ti-comment"></span>05
                        </a>
                      </div>
                      <p>
                        Creepeth green light appear let rule only you're divide
                        and lights moving and isn't given creeping deep.
                      </p>
  
                      <div class="d-flex justify-content-between mt-20">
                        <div>
                          <a href="#" class="blog-post-btn">
                            Read More <span class="ti-arrow-right"></span>
                          </a>
                        </div>
                        <div class="category">
                          <a href="#">
                            <span class="ti-folder mr-1"></span> Travel
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                  
                  <div class="single-amenities">
                    <div class="amenities-thumb">
                      <img
                        class="img-fluid w-100"
                        src="{{asset('assets/img/blog-post/blog-post6.jpg')}}"
                        alt=""
                      />
                    </div>
                    <div class="amenities-details">
                      <h5>
                        <a href="#"
                          >There's goting to be a musical about meghan
                        </a>
                      </h5>
                      <div class="amenities-meta mb-10">
                        <a href="#" class=""
                          ><span class="ti-calendar"></span>20th Nov, 2018</a
                        >
                        <a href="#" class="ml-20"
                          ><span class="ti-comment"></span>05</a
                        >
                      </div>
                      <p>
                        Creepeth green light appear let rule only you're divide
                        and lights moving and isn't given creeping deep.
                      </p>
  
                      <div class="d-flex justify-content-between mt-20">
                        <div>
                          <a href="#" class="blog-post-btn">
                            Read More <span class="ti-arrow-right"></span>
                          </a>
                        </div>
                        <div class="category">
                          <a href="#">
                            <span class="ti-folder mr-1"></span> Travel
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                  
                  <div class="single-amenities">
                    <div class="amenities-thumb">
                      <img
                        class="img-fluid w-100"
                        src="{{asset('assets/img/blog-post/blog-post8.jpg')}}"
                        alt=""
                      />
                    </div>
                    <div class="amenities-details">
                      <h5>
                        <a href="#"
                          >Forest responds to consultation smoking in al
                          fresco.</a
                        >
                      </h5>
                      <div class="amenities-meta mb-10">
                        <a href="#" class="">
                          <span class="ti-calendar"></span>20th Nov, 2018
                        </a>
                        <a href="#" class="ml-20">
                          <span class="ti-comment"></span>05
                        </a>
                      </div>
                      <p>
                        Creepeth green light appear let rule only you're divide
                        and lights moving and isn't given creeping deep.
                      </p>
  
                      <div class="d-flex justify-content-between mt-20">
                        <div>
                          <a href="#" class="blog-post-btn">
                            Read More <span class="ti-arrow-right"></span>
                          </a>
                        </div>
                        <div class="category">
                          <a href="#">
                            <span class="ti-folder mr-1"></span> Travel
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
  
              <div class="row">
                <div class="col-lg-12">
                    <nav class="blog-pagination justify-content-center d-flex">
                        <ul class="pagination">
                            <li class="page-item">
                                <a href="#" class="page-link" aria-label="Previous">
                                    <span aria-hidden="true">
                                        <span class="ti-arrow-left"></span>
                                    </span>
                                </a>
                            </li>
                            <li class="page-item"><a href="#" class="page-link">01</a></li>
                            <li class="page-item active"><a href="#" class="page-link">02</a></li>
                            <li class="page-item"><a href="#" class="page-link">03</a></li>
                            <li class="page-item"><a href="#" class="page-link">04</a></li>
                            <li class="page-item"><a href="#" class="page-link">09</a></li>
                            <li class="page-item">
                                <a href="#" class="page-link" aria-label="Next">
                                    <span aria-hidden="true">
                                        <span class="ti-arrow-right"></span>
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
              </div>
            </div>
  
            <!-- Start Blog Post Siddebar -->
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
              </div>
            <!-- End Blog Post Siddebar -->
          </div>
        </div>
      </section>
      <!--================ End Blog Post Area =================-->
@endsection

<script>
  tinymce.init({
    selector: '#description',
    plugins: 'image code',
    toolbar: 'undo redo | link image | code',
    /* enable title field in the Image dialog*/
    image_title: true,
    /* enable automatic uploads of images represented by blob or data URIs*/
    automatic_uploads: true,
    
    /*
      URL of our upload handler (for more details check: https://www.tiny.cloud/docs/configure/file-image-upload/#images_upload_url)
      images_upload_url: 'postAcceptor.php',
      here we add custom filepicker only to Image dialog
    */
    file_picker_types: 'image',
    /* and here's our custom image picker*/
    file_picker_callback: function (cb, value, meta) {
      var input = document.createElement('input');
      input.setAttribute('type', 'file');
      input.setAttribute('accept', 'image/*');
  
      /*
        Note: In modern browsers input[type="file"] is functional without
        even adding it to the DOM, but that might not be the case in some older
        or quirky browsers like IE, so you might want to add it to the DOM
        just in case, and visually hide it. And do not forget do remove it
        once you do not need it anymore.
      */
  
      input.onchange = function () {
          var file = this.files[0];
          const data = file.name.split(".")[1]
          console.log("file: "+file, data)
  
          var reader = new FileReader();
          
          reader.onload = function () {
          /*
              Note: Now we need to register the blob in TinyMCEs image blob
              registry. In the next release this part hopefully won't be
              necessary, as we are looking to handle it internally.
          */
          var id = 'blobid' + (new Date()).getTime();
          console.log("id: "+id)
          
          var blobCache =  tinymce.activeEditor.editorUpload.blobCache;
          console.log("blobCache: "+blobCache)
          
          var base64 = reader.result.split(',')[1];
          console.log("blobCacbase64he: "+base64)
          
          var blobInfo = blobCache.create(id, file, base64);
          blobCache.add(blobInfo);
          console.log("blobInfo: "+blobInfo)
          
  
          /* call the callback and populate the Title field with the file name */
          cb(blobInfo.blobUri(), { title: file.name });
          };
          reader.readAsDataURL(file);
      };
  
      input.click();
      },
      content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
  });
</script>