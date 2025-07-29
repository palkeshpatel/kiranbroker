<!DOCTYPE html>
<html lang="en">
<head>
   @include('includes.head')
   <style>
.email_verify_btn {
	position:relative;
} 
.email_verify_btn .btn {
	position: absolute;
    top: 6px;
    right: 5px;
    padding: 2px 12px;
    font-size: 12px;
}
</style>
</head>
@if(! Request::segment(1))
<body class="home_page">
@else
<body >
@endif

      @include('includes.header')
      @yield('content')
      @include('includes.footer')
      @include('includes.script')
</body>
</html>
