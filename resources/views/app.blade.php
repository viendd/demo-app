<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('template/assets/img/apple-icon.png')}}">
    <link rel="icon" type="image/png" href="{{asset('template/assets/img/favicon.png')}}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>
        @yield('title', 'FamilyHome')
    </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <!-- CSS Files -->
    <link href="{{asset('template/assets/css/bootstrap.min.css')}}" rel="stylesheet" />
    <link href="{{asset('template/assets/css/paper-dashboard.css?v=2.0.1')}}" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="{{asset('template/assets/demo/demo.css')}}" rel="stylesheet" />
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    @yield('css')
</head>

<body class="">
<div class="wrapper ">
    @include('layouts.sidebar')
    <div class="main-panel">
        <!-- Navbar -->
        @include('layouts.navbar')
        <!-- End Navbar -->
        @yield('content')
        @include('layouts.footer')
    </div>
</div>
<!--   Core JS Files   -->
<script src="{{asset('template/assets/js/core/jquery-3.6.0.min.js')}}"></script>
<script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.7/jquery.validate.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.2/js/toastr.min.js">

<script src="{{asset('template/assets/js/core/popper.min.js')}}"></script>
<script src="{{asset('template/assets/js/core/bootstrap.min.js')}}"></script>
<script src="{{asset('template/assets/js/plugins/perfect-scrollbar.jquery.min.js')}}"></script>
<!--  Google Maps Plugin    -->
<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
<!-- Chart JS -->
<script src="{{asset('template/assets/js/plugins/chartjs.min.js')}}"></script>
<!--  Notifications Plugin    -->
<script src="{{asset('template/assets/js/plugins/bootstrap-notify.js')}}"></script>
<!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
<script src="{{asset('template/assets/js/paper-dashboard.min.js?v=2.0.1')}}" type="text/javascript"></script><!-- Paper Dashboard DEMO methods, don't include it in your project! -->
<script src="{{asset('template/assets/demo/demo.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script src="{{ asset('js/js.js') }}"></script>

@yield('js')

<script src="https://cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script>


<script>
    $(document).ready(function(){
        let notificationSuccess = '{{session('message_success')}}';
        if (notificationSuccess){
            toastr.success(notificationSuccess)
        }
        let notificationError = '{{session('message_error')}}';
        if (notificationError){
            toastr.warning(notificationError)
        }

        $('.js-example-basic-multiple').select2();
    });

    function showConfirm(item, url, method){
        JS.modalConfirmDelete($(item).attr("data-id"), url, method);
    }

    var editor = CKEDITOR.replace('description', {
        {{--filebrowserUploadUrl: "{{route('ckeditor.upload', ['_token' => csrf_token() ])}}",--}}
        {{--filebrowserUploadMethod: 'form'--}}
    });
    editor.on('required', function( evt ) {
        editor.showNotification( 'Trường này không được bỏ trống.', 'warning' );
        evt.cancel();
    } );


</script>

<style>
    .feedback-error{
        color: red;
    }
    .border-error{
        border: 1px solid red;
    }
    .select2-container .select2-selection--single{
        height: 38px !important;
    }
</style>
</body>

</html>
