<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>
<body style="height: 100vh">
<div id="app">
    <app-main inline-template>
        <div class="h-100">
            <app-nav>

            </app-nav>
            <div class="container-fluid card pb-5">
                <div class="row h-100">
                    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4 h-100">
                        <div class="d-flex flex-wrap flex-md-nowrap align-items-center pt-3 border-bottom h-100">
                            <div class="flex-fill h-100">
                                @yield('content')
                            </div>
                        </div>
                    </main>
                </div>
            </div>
        </div>
    </app-main>
</div>
</body>
</html>
