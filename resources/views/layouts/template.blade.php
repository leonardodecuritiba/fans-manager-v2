<!DOCTYPE html>
<html lang="pt-BR">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<!-- Meta, title, CSS, favicons, etc. -->
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{config('app.club-name')}}</title>

		@include('layouts.head')

		<!-- /extra css -->
		@yield('style_content')
	</head>
	<body>
		<!-- page content -->
		@yield('page_content')
		<!-- /page content -->
		{{--		@include('layouts.foot')--}}

		<!-- /extra scripts -->
		@yield('scripts_content')
	</body>
</html>
