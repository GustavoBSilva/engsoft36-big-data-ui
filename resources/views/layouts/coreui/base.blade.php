<!doctype html>
<html lang="en">
 <head>
 <!-- Required meta tags -->
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">

 <!-- CoreUI CSS -->
 <link rel="stylesheet" href="https://unpkg.com/@coreui/coreui/dist/css/coreui.min.css" crossorigin="anonymous">

 <title>CoreUI</title>
 </head>
 
<body class="c-app">
  
  <div class="c-sidebar c-sidebar-dark c-sidebar-fixed c-sidebar-lg-show" id="sidebar">
    @include('layouts.coreui.shared.nav')

    @include('layouts.coreui.shared.header')

    <div class="c-body">
      <main class="c-main">
        @yield('content')
      </main>

      @include('layouts.coreui.shared.footer')
    </div>
    
  </div>
</body>
</html>