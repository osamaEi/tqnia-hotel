<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--favicon-->
	<link rel="icon" href="{{asset('back/assets/images/favicon-32x32.png')}}" type="image/png"/>
	<!--plugins-->
	<link href="{{asset('back/assets/plugins/vectormap/jquery-jvectormap-2.0.2.css')}}" rel="stylesheet"/>
	<link href="{{asset('back/assets/plugins/simplebar/css/simplebar.css')}}" rel="stylesheet" />
	<link href="{{asset('back/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css')}}" rel="stylesheet" />
	<link href="{{asset('back/assets/plugins/metismenu/css/metisMenu.min.css')}}" rel="stylesheet"/>

	<!-- Bootstrap CSS -->
	<link href="{{asset('back/assets/css/bootstrap.min.css')}}" rel="stylesheet">
	<link href="{{asset('back/assets/css/bootstrap-extended.css')}}" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
	<link href="{{asset('back/assets/css/app.css')}}" rel="stylesheet">
	<link href="{{asset('back/assets/css/icons.css')}}" rel="stylesheet">
	<!-- Theme Style CSS -->
	<link rel="stylesheet" href="{{asset('back/assets/css/dark-theme.css')}}"/>
	<link rel="stylesheet" href="{{asset('back/assets/css/semi-dark.css')}}"/>
	<link rel="stylesheet" href="{{asset('back/assets/css/header-colors.css')}}"/>

	<!-- dataTables CSS -->
	<link href="{{asset('back/assets/plugins/datatable/css/dataTables.bootstrap5.min.css')}}" rel="stylesheet" />	
   <!-- dataTables CSS -->
	<title>Rocker - Bootstrap 5 Admin Dashboard Template</title>
</head>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>



<body>


<script>
 @if(Session::has('message'))
 var type = "{{ Session::get('alert-type','info') }}"
 switch(type){
    case 'info':
    toastr.info(" {{ Session::get('message') }} ");
    break;

    case 'success':
    toastr.success(" {{ Session::get('message') }} ");
    break;

    case 'warning':
    toastr.warning(" {{ Session::get('message') }} ");
    break;

    case 'error':
    toastr.error(" {{ Session::get('message') }} ");
    break; 
 }
 @endif 
</script>
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
<script>
   tinymce.init({
     selector: 'textarea#myeditorinstance', // Replace this CSS selector to match the placeholder element for TinyMCE
     plugins: 'powerpaste advcode table lists checklist',
     toolbar: 'undo redo | blocks| bold italic | bullist numlist checklist | code | table'
   });
</script>

	<!--wrapper-->
	<div class="wrapper">
		<!--sidebar wrapper -->
	@include('admin.body.sidebar')
		<!--end sidebar wrapper -->
		<!--start header -->
		@include('admin.body.header')

		<!--end header -->
		<!--start page wrapper -->
		<div class="page-wrapper">
	@yield('admin')
		</div>
		<!--end page wrapper -->
		<!--start overlay-->
		 <div class="overlay toggle-icon"></div>
		<!--end overlay-->
		<!--Start Back To Top Button-->
		  <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
		<!--End Back To Top Button-->
	<!--datatable JS-->


<!--datatable JS-->

		@include('admin.body.footer')

</html>