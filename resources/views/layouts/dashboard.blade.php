<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="stylesheet" href="{!! asset('css/app.css') !!}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.min.css">

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>

    <script src="{!! asset('js/app.js')!!}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.min.js"></script>

</head>
<body>
    {{-- top nav bar-area --}}
    @include('partials._nav')

    <div class="container">
        <div class="row">
            {{-- side bar area --}}
            <div class="col-sm-2 col-xs-12">
                @include('partials.members._memSidebar')
            </div>

            {{-- main content --}}
            <div class="col-sm-10 col-xs-12">
                @yield('content')
            </div>
        </div>
    </div>
</body>
</html>