<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project Management System | @yield('title')</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('admin') }}/images/logo.png" />
    <link href="{{ asset('admin') }}/css/bootstrap.css" rel="stylesheet" />
    <link href="{{ asset('admin') }}/css/style.css" rel="stylesheet" />



    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">

    <link href="{{ asset('admin') }}/css/jquery.dataTables.min.css" rel="stylesheet" />
    <script src="{{ asset('admin') }}/js/jquery-3.7.0.min.js"></script>
    <script src="{{ asset('admin') }}/js/jquery.dataTables.min.js"></script>


    <script src="{{ asset('admin') }}/js/bootstrap.bundle.js"></script>
    <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
</head>

<body>

    {{-- ---- nav ----  --}}
    @include('dashboard.components.nav')
    {{-- ---- nav ----  --}}


    <div class="main_body">

        {{-- ---- sidebar ----  --}}
        @include('dashboard.components.sidebar')
        {{-- ---- sidebar ----  --}}



        <div id="contentRef" class="content">

            {{-- ---- page content ----  --}}
            @yield('content')
            {{-- ---- page content ----  --}}

            {{-- ---- footer ----  --}}
            @include('dashboard.components.footer')
        </div>

    </div>




    <script>


        function MenuBarClickHandler() {
            let sideNav = document.getElementById('sideNavRef');
            let content = document.getElementById('contentRef');
            if (sideNav.classList.contains("side-nav-open")) {
                sideNav.classList.add("side-nav-close");
                sideNav.classList.remove("side-nav-open");
                content.classList.add("content-expand");
                content.classList.remove("content");
            } else {
                sideNav.classList.remove("side-nav-close");
                sideNav.classList.add("side-nav-open");
                content.classList.remove("content-expand");
                content.classList.add("content");
            }
        };
     new DataTable('#tableData', {
      order: [
        [0, 'desc']
      ],
      lengthMenu: [5, 10, 15, 20, 30]
    });

    </script>
        {!! Toastr::message() !!}
</body>

</html>
