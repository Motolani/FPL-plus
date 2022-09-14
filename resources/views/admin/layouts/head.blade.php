<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Voler Admin Dashboard</title>
    
    <link rel="stylesheet" href="{{asset('admin/assets/css/bootstrap.css')}}">
    
    <link rel="stylesheet" href="{{asset('admin/assets/vendors/chartjs/Chart.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/aassets/vendors/simple-datatables/style.css')}}">
    <link rel="stylesheet" href="{{asset('admin/assets/vendors/perfect-scrollbar/perfect-scrollbar.css')}}">
    <link rel="stylesheet" href="{{asset('admin/assets/css/app.css')}}">
    <link rel="shortcut icon" href="{{asset('admin/assets/images/favicon.svg" type="image/x-icon')}}">
    <link rel="stylesheet" href="{{asset('admin/assets/vendors/quill/quill.bubble.css')}}">
    <link rel="stylesheet" href="{{asset('admin/assets/vendors/quill/quill.snow.css')}}">
    <link rel="stylesheet" href="{{asset('admin/assets/vendors/simple-datatables/style.css')}}">
    <script src="https://cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>
</head>
<body>

    <div id="app">
        <div id="sidebar" class='active'>
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <img src="assets/images/logo.svg" alt="" srcset="">
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">
                            <li class='sidebar-title'>Main Menu</li>
                            <li class="sidebar-item active ">
                                <a href="index.html" class='sidebar-link'>
                                    <i data-feather="home" width="20"></i> 
                                    <span>Dashboard</span>
                                </a>
                            </li>
                            <li class="sidebar-item  has-sub">
                                <a href="#" class='sidebar-link'>
                                    <i data-feather="triangle" width="20"></i> 
                                    <span>Post</span>
                                </a>
                                
                                <ul class="submenu ">
                                    
                                    <li>
                                        <a href="{{url('admin/post/create')}}">Create Post</a>
                                    </li>
                                    
                                    <li>
                                        <a href="{{url('admin/posts/published')}}">View Posts</a>
                                    </li>
                                    
                                    <li>
                                        <a href="{{url('admin/post')}}">View Drafts</a>
                                    </li>
                                    
                                    <li>
                                        <a href="{{url('admin/post/category')}}">View Post Category</a>
                                    </li>
                                    
                                </ul>
                                
                            </li>
                            
                            <li class="sidebar-item  has-sub">
                                <a href="#" class='sidebar-link'>
                                    <i data-feather="triangle" width="20"></i> 
                                    <span>Subscription</span>
                                </a>
                                
                                <ul class="submenu ">
                                    
                                    <li>
                                        <a href="{{url('admin/create/sub/plan')}}">Create Subscription Plan</a>
                                    </li>
                                    
                                    <li>
                                        <a href="{{url('admin/view/sub/plan')}}">View Subscription Plans</a>
                                    </li>
                                    
                                    {{-- <li>
                                        <a href="{{url('admin/post')}}">View Drafts</a>
                                    </li> --}}
                                    
                                    {{-- <li>
                                        <a href="{{url('admin/post/category')}}">View Post Category</a>
                                    </li> --}}
                                    
                                </ul>
                                
                            </li>
            
                            {{-- <li class="sidebar-item  has-sub">
                                <a href="#" class='sidebar-link'>
                                    <i data-feather="briefcase" width="20"></i> 
                                    <span>Extra Components</span>
                                </a>
                                
                                <ul class="submenu ">
                                    
                                    <li>
                                        <a href="component-extra-avatar.html">Avatar</a>
                                    </li>
                                    
                                    <li>
                                        <a href="component-extra-divider.html">Divider</a>
                                    </li>
                                    
                                </ul>
                                
                            </li> --}}
            
                            {{-- <li class='sidebar-title'>Forms &amp; Tables</li> --}}
                        
                            {{-- <li class="sidebar-item  has-sub">
                                <a href="#" class='sidebar-link'>
                                    <i data-feather="file-text" width="20"></i> 
                                    <span>Form Elements</span>
                                </a>
                                
                                <ul class="submenu ">
                                    
                                    <li>
                                        <a href="form-element-input.html">Input</a>
                                    </li>
                                    
                                    <li>
                                        <a href="form-element-input-group.html">Input Group</a>
                                    </li>
                                    
                                    <li>
                                        <a href="form-element-select.html">Select</a>
                                    </li>
                                    
                                    <li>
                                        <a href="form-element-radio.html">Radio</a>
                                    </li>
                                    
                                    <li>
                                        <a href="form-element-checkbox.html">Checkbox</a>
                                    </li>
                                    
                                    <li>
                                        <a href="form-element-textarea.html">Textarea</a>
                                    </li>
                                    
                                </ul>
                                
                            </li>
            
                            <li class="sidebar-item  ">
                                <a href="form-layout.html" class='sidebar-link'>
                                    <i data-feather="layout" width="20"></i> 
                                    <span>Form Layout</span>
                                </a>
                                
                            </li>
            
                            <li class="sidebar-item  ">
                                <a href="form-editor.html" class='sidebar-link'>
                                    <i data-feather="layers" width="20"></i> 
                                    <span>Form Editor</span>
                                </a>
                                
                            </li>
            
                            <li class="sidebar-item  ">
                                <a href="table.html" class='sidebar-link'>
                                    <i data-feather="grid" width="20"></i> 
                                    <span>Table</span>
                                </a>
                                
                            </li>
            
                            <li class="sidebar-item  ">
                                <a href="table-datatable.html" class='sidebar-link'>
                                    <i data-feather="file-plus" width="20"></i> 
                                    <span>Datatable</span>
                                </a>
                                
                            </li>
            
                            <li class='sidebar-title'>Extra UI</li>
            
                            <li class="sidebar-item  has-sub">
                                <a href="#" class='sidebar-link'>
                                    <i data-feather="user" width="20"></i> 
                                    <span>Widgets</span>
                                </a>
                                
                                <ul class="submenu ">
                                    
                                    <li>
                                        <a href="ui-chatbox.html">Chatbox</a>
                                    </li>
                                    
                                    <li>
                                        <a href="ui-pricing.html">Pricing</a>
                                    </li>
                                    
                                    <li>
                                        <a href="ui-todolist.html">To-do List</a>
                                    </li>
                                    
                                </ul>
                                
                            </li>
            
                            <li class="sidebar-item  has-sub">
                                <a href="#" class='sidebar-link'>
                                    <i data-feather="trending-up" width="20"></i> 
                                    <span>Charts</span>
                                </a>
                                
                                <ul class="submenu ">
                                    
                                    <li>
                                        <a href="ui-chart-chartjs.html">ChartJS</a>
                                    </li>
                                    
                                    <li>
                                        <a href="ui-chart-apexchart.html">Apexchart</a>
                                    </li>
                                    
                                </ul>
                                
                            </li>
            
                            <li class='sidebar-title'>Pages</li>
            
                            <li class="sidebar-item  has-sub">
                                <a href="#" class='sidebar-link'>
                                    <i data-feather="user" width="20"></i> 
                                    <span>Authentication</span>
                                </a>
                                
                                <ul class="submenu ">
                                    
                                    <li>
                                        <a href="auth-login.html">Login</a>
                                    </li>
                                    
                                    <li>
                                        <a href="auth-register.html">Register</a>
                                    </li>
                                    
                                    <li>
                                        <a href="auth-forgot-password.html">Forgot Password</a>
                                    </li>
                                    
                                </ul>
                                
                            </li>
            
                            <li class="sidebar-item  has-sub">
                                <a href="#" class='sidebar-link'>
                                    <i data-feather="alert-circle" width="20"></i> 
                                    <span>Errors</span>
                                </a>
                                
                                <ul class="submenu ">
                                    
                                    <li>
                                        <a href="error-403.html">403</a>
                                    </li>
                                    
                                    <li>
                                        <a href="error-404.html">404</a>
                                    </li>
                                    
                                    <li>
                                        <a href="error-500.html">500</a>
                                    </li>
                                    
                                </ul>
                                
                            </li> --}}
                    </ul>
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>
        <div id="main">
            <nav class="navbar navbar-header navbar-expand navbar-light">
                <a class="sidebar-toggler" href="#"><span class="navbar-toggler-icon"></span></a>
                <button class="btn navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav d-flex align-items-center navbar-light ml-auto">
                        <li class="dropdown nav-icon">
                            <a href="#" data-toggle="dropdown" class="nav-link  dropdown-toggle nav-link-lg nav-link-user">
                                <div class="d-lg-inline-block">
                                    <i data-feather="bell"></i>
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-large">
                                <h6 class='py-2 px-4'>Notifications</h6>
                                <ul class="list-group rounded-none">
                                    <li class="list-group-item border-0 align-items-start">
                                        <div class="avatar bg-success mr-3">
                                            <span class="avatar-content"><i data-feather="shopping-cart"></i></span>
                                        </div>
                                        <div>
                                            <h6 class='text-bold'>New Order</h6>
                                            <p class='text-xs'>
                                                An order made by Ahmad Saugi for product Samsung Galaxy S69
                                            </p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="dropdown nav-icon mr-2">
                            <a href="#" data-toggle="dropdown" class="nav-link  dropdown-toggle nav-link-lg nav-link-user">
                                <div class="d-lg-inline-block">
                                    <i data-feather="mail"></i>
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="#"><i data-feather="user"></i> Account</a>
                                <a class="dropdown-item active" href="#"><i data-feather="mail"></i> Messages</a>
                                <a class="dropdown-item" href="#"><i data-feather="settings"></i> Settings</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#"><i data-feather="log-out"></i> Logout</a>
                            </div>
                        </li>
                        <li class="dropdown">
                            <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                                <div class="avatar mr-1">
                                    <img src="assets/images/avatar/avatar-s-1.png" alt="" srcset="">
                                </div>
                                <div class="d-none d-md-block d-lg-inline-block">Hi, Saugi</div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="#"><i data-feather="user"></i> Account</a>
                                <a class="dropdown-item active" href="#"><i data-feather="mail"></i> Messages</a>
                                <a class="dropdown-item" href="#"><i data-feather="settings"></i> Settings</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#"><i data-feather="log-out"></i> Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
            
            @yield('content')

            <footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-left">
                        <p>2020 &copy; Voler</p>
                    </div>
                    <div class="float-right">
                        <p>Crafted with <span class='text-danger'><i data-feather="heart"></i></span> by <a href="http://ahmadsaugi.com">Ahmad Saugi</a>. Downloaded from <a href="https://themeslab.org/" target="_blank">Themeslab</a></p>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    
    <script src="{{asset('admin/assets/js/feather-icons/feather.min.js')}}"></script>
    <script src="{{asset('admin/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/app.js')}}"></script>
    
    <script src="{{asset('admin/assets/vendors/chartjs/Chart.min.js')}}"></script>
    <script src="{{asset('admin/assets/vendors/apexcharts/apexcharts.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/pages/dashboard.js')}}"></script>

    <script src="{{asset('admin/assets/js/main.js')}}"></script>
    <script src="{{asset('admin/assets/js/feather-icons/feather.min.js')}}"></script>
    <script src="{{asset('admin/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/app.js')}}"></script>
    
<script src="{{asset('admin/assets/vendors/simple-datatables/simple-datatables.js')}}"></script>
<script src="{{asset('admin/assets/js/vendors.js')}}"></script>
<script src="{{asset('admin/assets/vendors/quill/quill.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/pages/form-editor.js')}}"></script>
    
<script src="{{asset('admin/assets/vendors/simple-datatables/simple-datatables.js')}}"></script>
<script src="https://cdn.tiny.cloud/1/ppcgbzxo3a5vcfljf8p1iqbovn244eo7bmeuwpj0jpgj0exm/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    {{-- <script>
        CKEDITOR.replace('description', {
            // filebrowserUploadUrl: "{{ route('posts.upload', ['_token' => csrf_token()]) }}",
            filebrowserUploadMethod: 'form'
        })
    </script> --}}
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script>
    tinymce.init({
      selector: '#description',
      plugins: 'image code',
      toolbar: 'undo redo | link image | code',
      /* enable title field in the Image dialog*/
      image_title: true,
      /* enable automatic uploads of images represented by blob or data URIs*/
      automatic_uploads: true,
      file_picker_types: 'image',
      images_upload_url: 'http://127.0.0.1:8000/api/postImgUpload',
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

</body>
</html>