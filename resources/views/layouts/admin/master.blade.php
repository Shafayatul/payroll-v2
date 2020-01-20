<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.admin.include.meta')
    @include('layouts.admin.include.css')
    <!-- <script>
    (function(i, s, o, g, r, a, m) {
        i['GoogleAnalyticsObject'] = r;
        i[r] = i[r] || function() {
            (i[r].q = i[r].q || []).push(arguments)
        }, i[r].l = 1 * new Date();
        a = s.createElement(o), m = s.getElementsByTagName(o)[0];
        a.async = 1;
        a.src = g;
        m.parentNode.insertBefore(a, m)
    })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');
    ga('create', 'UA-85622565-1', 'auto');
    ga('send', 'pageview');
    </script> -->
</head>

<body class="fix-header fix-sidebar card-no-border">
    
    {{-- <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div> --}}
    
    <div id="main-wrapper">
        
        @include('layouts.admin.include.header')
        
        <!-- End Topbar header -->
        
        @include('layouts.admin.include.sidebar')
        
        <!-- Page wrapper  -->
        <div class="page-wrapper">
            
            <!-- Container fluid  -->
            <div class="container-fluid">
                @yield('content')
                
                <!-- .right-sidebar -->
                @include('layouts.admin.include.right-sidebar')
                
            </div>
            
            <!-- footer -->
            @include('layouts.admin.include.footer')
            
        </div>
    </div>
    
    @include('layouts.admin.include.js')
</body>

</html>