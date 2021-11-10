<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="@yield('description')" />
    <meta name="keywords" content="@yield('keywords')" />

    <title>Invoices- @yield('title')</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />

    <!-- Custom styles for this template -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" />

</head>
@extends('layouts.layout')

@section('title') Log in @endsection
@section('description') Log in @endsection
@section('keywords')log in, mail, password, invoice @endsection

@section('content')
    <div class="container" style="margin-top: 25px">
        <ul class="nav justify-content-center" style="border-bottom: #718096 1px solid; margin-top: 80px;margin-bottom: 50px" >

            <li class="nav-item">
                <a class="nav-link" href="#">Register</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{url('')}}">Log in</a>
            </li>

        </ul>
        <form method="post" action="/logg">
            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
            <fieldset >
                <legend>Register form</legend>
                <div class="mb-4" id="maile">


                    <label for="Mail" class="form-label">Mail</label>
                    <input type="email" id="mail"  name="mail" class="form-control" placeholder="Mail (e.g. pera@gmail.com">
                </div>
                <div class="mb-4" id="passworde">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Password (must include  min 8 character, at least 1 digit, 1 upercasse letter, one lowercase leter and one symbol e.g. Ivjk!klio)">
                </div>
                <button id="login"  class="btn btn-primary">Submit</button>
            </fieldset>
        </form>

        @endsection

        @if($errors->any())

    @foreach($errors->all() as $error)<h5 style="color: crimson">{{$error}}</h5>
            @endforeach

 @endif

    </div>

    <script type="text/javascript">
        const baseUrl = "{{url('/')}}";
        const publicFolder = "{{asset('/')}}";
    </script>

    <script src="{{ asset('js/app.js') }}"></script>







    </body>
