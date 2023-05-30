<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Usando Vite -->
    @vite(['resources/js/app.js'])
</head>

<body>
    <div id="app">


        @include('partials.header')

        <main>
            <div class="container-fluid px-3">

                <div class="d-flex justify-content-between">
                    <div class="row w-100">
                        <div class="col-2">
                            <div class="d-flex flex-column flex-shrink-0 p-3 bg-body-tertiary">
                                <a href="/"
                                    class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
                                    <h2 class="fs-4 text-secondary my-4">
                                        {{ __('Dashboard') }}
                                    </h2>
                                </a>
                                <hr>
                                <ul class="nav nav-pills flex-column mb-auto">
                                    <li class="nav-item">
                                        <a href="{{ route('admin.dashboard') }}"
                                            class="nav-link ms-bg-blue {{ Route::currentRouteName() == 'admin.dashboard' ? 'active' : '' }}"
                                            aria-current="page">
                                            <svg class="bi pe-none me-2" width="16" height="16">
                                                <use xlink:href="#home"></use>
                                            </svg>
                                            Dashboard
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('admin.projects.index') }}"
                                            class="nav-link ms-bg-blue link-body-emphasis {{ Route::currentRouteName() == 'admin.projects.index' ? 'active' : '' }}">
                                            <svg class="bi pe-none me-2" width="16" height="16">
                                                <use xlink:href="#speedometer2"></use>
                                            </svg>
                                            Indice
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('admin.technologies.index') }}"
                                            class="nav-link ms-bg-blue link-body-emphasis {{ Route::currentRouteName() == 'admin.technologies.index' ? 'active' : '' }}">
                                            <svg class="bi pe-none me-2" width="16" height="16">
                                                <use xlink:href="#speedometer2"></use>
                                            </svg>
                                            Tecnologie
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('admin.types.index') }}"
                                            class="nav-link ms-bg-blue link-body-emphasis {{ Route::currentRouteName() == 'admin.types.index' ? 'active' : '' }}">
                                            <svg class="bi pe-none me-2" width="16" height="16">
                                                <use xlink:href="#speedometer2"></use>
                                            </svg>
                                            Tipologie
                                        </a>
                                    </li>
                                </ul>
                                <hr>
                            </div>
                        </div>
                        <div class="col-10 pt-4">

                            @yield('content')

                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>

</html>
