<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/solid.min.css">
    <link rel="stylesheet" href="{{asset('admin-template/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('admin-template/css/select2.css')}}">
    {{-- <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> --}}

    <title>Admintrator</title>
    <script src="https://cdn.tiny.cloud/1/qpyv0z8sefqqjj333fuywlssmr4k1te7v9g3niegwa8v7d1s/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

    <script>
      var editor_config = {
    path_absolute : "http://localhost/LaravelPro1/unimart/",
    selector: 'textarea#full',
    height:400,
    relative_urls: false,
    plugins: [
      "advlist autolink lists link image charmap print preview hr anchor pagebreak",
      "searchreplace wordcount visualblocks visualchars code fullscreen",
      "insertdatetime media nonbreaking save table directionality",
      "emoticons template paste textpattern"
    ],
    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
    file_picker_callback : function(callback, value, meta) {
      var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
      var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

      var cmsURL = editor_config.path_absolute + 'laravel-filemanager?editor=' + meta.fieldname;
      if (meta.filetype == 'image') {
        cmsURL = cmsURL + "&type=Images";
      } else {
        cmsURL = cmsURL + "&type=Files";
      }

      tinyMCE.activeEditor.windowManager.openUrl({
        url : cmsURL,
        title : 'Filemanager',
        width : x * 0.8,
        height : y * 0.8,
        resizable : "yes",
        close_previous : "no",
        onMessage: (api, message) => {
          callback(message.content);
        }
      });
    }
  };

  tinymce.init(editor_config);
    </script>
</head>

<body>
    <div id="warpper" class="nav-fixed">
        <nav class="topnav shadow navbar-light bg-white d-flex">
            <div class="navbar-brand"><a href="?">DASHBOARD</a></div>
            <div class="nav-right ">
                <div class="btn-group mr-auto">
                    <button type="button" class="btn dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="plus-icon fas fa-plus-circle"></i>
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{url('admin/post/add')}}">Th??m b??i vi???t</a>
                        <a class="dropdown-item" href="{{url('admin/product/add')}}">Th??m s???n ph???m</a>
                        <a class="dropdown-item" href="{{url('admin/order/list')}}">Xem ????n h??ng</a>
                    </div>
                </div>
                <div class="btn-group">
                    <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{Auth::user()->name}}
                    </button>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="{{route('admin.user.edit_info',Auth::id())}}">T??i kho???n</a>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </nav>
        <!-- end nav  -->
        @php
            $module_active=session('module_active');
        @endphp
        <div id="page-body" class="d-flex">
            <div id="sidebar" class="bg-white">
                <ul id="sidebar-menu">
                    <li class="nav-link {{$module_active=='dashboard'?'active':''}}">
                        <a href="{{url('dashboard')}}">
                            <div class="nav-link-icon d-inline-flex">
                                <i class="far fa-folder"></i>
                            </div>
                            Dashboard
                        </a>
                        <i class="arrow fas fa-angle-right"></i>
                    </li>
                    @canany(['list-page','add-page'])
                    <li class="nav-link {{$module_active=='page'?'active':''}}">
                        <a href="{{url('admin/page/list')}}">
                            <div class="nav-link-icon d-inline-flex">
                                <i class="far fa-folder"></i>
                            </div>
                            Trang
                        </a>
                        <i class="arrow fas fa-angle-right"></i>
                        <ul class="sub-menu">
                            <li><a href="{{url('admin/page/add')}}">Th??m m???i</a></li>
                            <li><a href="{{url('admin/page/list')}}">Danh s??ch</a></li>
                        </ul>
                    </li>
                    @endcanany
                    @canany(['post-cat','add-post','list-post'])
                    <li class="nav-link {{$module_active=='post'?'active':''}}">
                        <a href="{{url('admin/post/list')}}">
                            <div class="nav-link-icon d-inline-flex">
                                <i class="far fa-folder"></i>
                            </div>
                            B??i vi???t
                        </a>
                        <i class="arrow fas fa-angle-right"></i>
                        <ul class="sub-menu">
                            @can('add-post')
                            <li><a href="{{url('admin/post/add')}}">Th??m m???i</a></li>
                            @endcan
                            @can('list-post')
                            <li><a href="{{url('admin/post/list')}}">Danh s??ch</a></li>
                            @endcan
                            @can('post-cat')
                            <li><a href="{{url('admin/post/cat/list')}}">Danh m???c</a></li>
                            @endcan
                        </ul>
                    </li>
                    @endcanany
                    @canany(['product-add','product-list','product-edit','product-delete'])
                    <li class="nav-link {{$module_active=='product'?'active':''}}">
                        <a href="{{url('admin/product/list')}}">
                            <div class="nav-link-icon d-inline-flex">
                                <i class="far fa-folder"></i>
                            </div>
                            S???n ph???m
                        </a>
                        <i class="arrow fas fa-angle-right"></i>
                        {{-- <i class="arrow fas fa-angle-down"></i> --}}
                        <ul class="sub-menu">
                            <li><a href="{{url('admin/product/add')}}">Th??m m???i</a></li>
                            <li><a href="{{url('admin/product/list')}}">Danh s??ch</a></li>
                            <li><a href="{{url('admin/product/cat/list')}}">Danh m???c</a></li>
                            <li><a href="{{url('admin/product/brand/list')}}">Th????ng hi???u</a></li>
                        </ul>
                    </li>
                    @endcanany
                    @canany(['list-order','detail-order','update-order','delete-order'])
                    <li class="nav-link {{$module_active=='order'?'active':''}}">
                        <a href="{{url('admin/order/list')}}">
                            <div class="nav-link-icon d-inline-flex">
                                <i class="far fa-folder"></i>
                            </div>
                            B??n h??ng
                        </a>
                        <i class="arrow fas fa-angle-right"></i>
                        <ul class="sub-menu">
                            <li><a href="{{url('admin/order/list')}}">????n h??ng</a></li>
                        </ul>
                    </li>
                    @endcanany
                    @canany(['add-slide','list-slide','delete-slide'])
                    <li class="nav-link {{$module_active=='slide'?'active':''}}">
                        <a href="{{url('admin/slide/list')}}">
                            <div class="nav-link-icon d-inline-flex">
                                <i class="far fa-folder"></i>
                            </div>
                            Slide
                        </a>
                        <i class="arrow fas fa-angle-right"></i>
                        {{-- <i class="arrow fas fa-angle-down"></i> --}}
                        <ul class="sub-menu">
                            <li><a href="{{url('admin/slide/add')}}">Th??m m???i</a></li>
                            <li><a href="{{url('admin/slide/list')}}">Danh s??ch</a></li>
                        </ul>
                    </li>
                    @endcanany
                    @canany(['user-list'])
                    <li class="nav-link {{$module_active=='user'?'active':''}}">
                        <a href="{{url('admin/user/list')}}">
                            <div class="nav-link-icon d-inline-flex">
                                <i class="far fa-folder"></i>
                            </div>
                            Users
                        </a>
                        <i class="arrow fas fa-angle-right"></i>
                        <ul class="sub-menu">
                            <li><a href="{{url('admin/user/add')}}">Th??m m???i</a></li>
                            <li><a href="{{url('admin/user/list')}}">Danh s??ch th??nh vi??n</a></li>
                            {{-- <li><a href="{{url('admin/user/role/add')}}">Th??m quy???n</a></li> --}}
                        </ul>
                    </li>
                    @endcanany
                    @canany(['add-role','edit-role','list-role','delete-role'])
                    <li class="nav-link {{$module_active=='role'?'active':''}}">
                        <a href="{{url('admin/role/list')}}">
                            <div class="nav-link-icon d-inline-flex">
                                <i class="far fa-folder"></i>
                            </div>
                            Vai tr??
                        </a>
                        <i class="arrow fas fa-angle-right"></i>

                        <ul class="sub-menu">
                            <li><a href="{{url('admin/role/add')}}">Th??m m???i</a></li>
                            <li><a href="{{url('admin/role/list')}}">Danh s??ch vai tr??</a></li>
                            {{-- <li><a href="{{url('admin/user/role/add')}}">Th??m quy???n</a></li> --}}
                        </ul>
                    </li>
                    @endcanany
                    @canany(['list-permission','delete-permission'])
                    <li class="nav-link {{$module_active=='permission'?'active':''}}">
                        <a href="{{url('admin/permission/list')}}">
                            <div class="nav-link-icon d-inline-flex">
                                <i class="far fa-folder"></i>
                            </div>
                            Quy???n
                        </a>
                        <i class="arrow fas fa-angle-right"></i>

                        <ul class="sub-menu">
                            <li><a href="{{url('admin/permission/list')}}">Danh s??ch quy???n</a></li>
                            {{-- <li><a href="{{url('admin/user/role/add')}}">Th??m quy???n</a></li> --}}
                        </ul>
                    </li>
                    @endcanany
                    <!-- <li class="nav-link"><a>B??i vi???t</a>
                        <ul class="sub-menu">
                            <li><a>Th??m m???i</a></li>
                            <li><a>Danh s??ch</a></li>
                            <li><a>Th??m danh m???c</a></li>
                            <li><a>Danh s??ch danh m???c</a></li>
                        </ul>
                    </li>
                    <li class="nav-link"><a>S???n ph???m</a></li>
                    <li class="nav-link"><a>????n h??ng</a></li>
                    <li class="nav-link"><a>H??? th???ng</a></li> -->

                </ul>
            </div>
            <div id="wp-content">
                @yield('content')
            </div>
        </div>


    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="{{asset('admin-template/js/app.js')}}"></script>
    <script src="{{asset('admin-template/js/select2.js')}}"></script>
    <script>
        $(document).ready(function(){
    $("#selectall").change(function(){
    $(".select").prop('checked', $(this).prop("checked"));
    });
    });
    </script>
    <script>
            $('#p_name').keyup(function (event){
            var title, slug;

            //L???y text t??? th??? input title
            title = $(this).val();
            // title = document.getElementById("title").value;

            //?????i ch??? hoa th??nh ch??? th?????ng
            slug = title.toLowerCase();

            //?????i k?? t??? c?? d???u th??nh kh??ng d???u
            slug = slug.replace(/??|??|???|???|??|??|???|???|???|???|???|??|???|???|???|???|???/gi, 'a');
            slug = slug.replace(/??|??|???|???|???|??|???|???|???|???|???/gi, 'e');
            slug = slug.replace(/i|??|??|???|??|???/gi, 'i');
            slug = slug.replace(/??|??|???|??|???|??|???|???|???|???|???|??|???|???|???|???|???/gi, 'o');
            slug = slug.replace(/??|??|???|??|???|??|???|???|???|???|???/gi, 'u');
            slug = slug.replace(/??|???|???|???|???/gi, 'y');
            slug = slug.replace(/??/gi, 'd');
            //X??a c??c k?? t??? ?????t bi???t
            slug = slug.replace(/\`|\\|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi,'');
            //?????i kho???ng tr???ng th??nh k?? t??? g???ch ngang
            slug = slug.replace(/ /gi, "-");
            //?????i nhi???u k?? t??? g???ch ngang li??n ti???p th??nh 1 k?? t??? g???ch ngang
            //Ph??ng tr?????ng h???p ng?????i nh???p v??o qu?? nhi???u k?? t??? tr???ng
            slug = slug.replace(/\-\-\-\-\-/gi, '-');
            slug = slug.replace(/\-\-\-\-/gi, '-');
            slug = slug.replace(/\-\-\-/gi, '-');
            slug = slug.replace(/\-\-/gi, '-');
            //X??a c??c k?? t??? g???ch ngang ??? ?????u v?? cu???i
            slug = '@' + slug + '@';
            slug = slug.replace(/\@\-|\-\@|\@/gi, '');
            //In slug ra textbox c?? id ???slug???
             $('#slug').val(slug);
            });
    </script>
    <script>
        $(document).ready(function() {
            $('.js-example-basic-multiple').select2({
            'placeholder' : 'Ch???n quy???n'
            });
          });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>

</html>
