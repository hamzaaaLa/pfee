@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>FSA-Online</title>
        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{asset('/css/all.min.css')}}" />
        <!-- Bootstrap 05 -->
        <link rel="stylesheet" href="{{asset('/css/bootstrap.min.css')}}" />
        <!-- Main CSS File -->
        <link rel="stylesheet" href="{{asset('/css/Welcome.css')}}" />
        <!-- Google Fonts - Work Sans -->
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@300;400;500;700;900&display=swap" rel="stylesheet" />

    </head>
    <body class="antialiased">
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a>
                    @endauth
                </div>
            @endif
    </body>
</html>
@endsection
