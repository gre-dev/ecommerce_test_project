
<!-- Plugins css start-->
@yield('css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/bootstrap.css')}}">
<!-- App css-->
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/style.css')}}">

<style>
.search {
  outline: 0;
  border-width: 0 0 2px;
  border-color: blue
}
.search:focus {
  border-color: green;
  outline: 1px dotted #000
}
</style>
