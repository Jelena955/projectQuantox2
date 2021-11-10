
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

@section('title')Register @endsection
@section('description') Register @endsection
@section('keywords') invoices, invoice, register, mail, password, name @endsection

@section('content')


<div class="container" style="margin-top: 25px">
    <ul class="nav justify-content-center" style="border-bottom: #718096 1px solid; margin-top: 80px;margin-bottom: 50px" >

        <li class="nav-item">
            <a class="nav-link" href="#">Register</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{url('/login')}}">Log in</a>
        </li>

    </ul>
    <form action="/register" method="post">
        <fieldset >
            <legend>Register form</legend>
            <div class="mb-4" id="maile">
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                <label for="Mail" class="form-label">Mail</label>
                <input type="email" id="mail" name="mail"  class="form-control" placeholder="Mail (e.g. pera@gmail.com">
            </div>
            <div class="mb-4" id="namee">
                <label for="name" class="form-label">Name</label>
                <input type="text" id="name" name="name"  class="form-control" placeholder="Name (e.g. Petar)">
            </div>
            <div class="mb-4" id="pibe">
                <label for="Pib" class="form-label">PIB</label>
                <input type="text" id="pib" name="pib" class="form-control" placeholder="pib (9 digits)">
            </div>
            <div class="mb-4" id="idnumbere">
                <label for="Idnumber" class="form-label">Id number</label>
                <input type="text" id="idnumber" name="idnumber" class="form-control" placeholder="Id number (8 digits)">
            </div>
            <div class="mb-4" id="accountnumbere">
                <label for="account" class="form-label">Account number</label>
                <input type="text" id="accountnumber" name="accountnumber" class="form-control" placeholder="Account number (8-12 digits)">
            </div>

            <div class="mb-3" id="citye">
                <label for="disabledSelect" class="form-label">Disabled select menu</label>
                <select id="city" name="city" class="form-select">
                    @foreach($cities as $city)
                    <option>{{$city->cityname}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4" id="streete">
                <label for="Street" class="form-label">Street</label>
                <input type="text" id="street" class="form-control"  name="street" placeholder="Street (e.g. 5218 Jensen Freeway )">
            </div>
            <div class="mb-4" id="passworde">
                <label for="password" class="form-label">Password</label>
                <input type="password" id="password"  name="password" class="form-control" placeholder="Password (must include  min 8 character, at least 1 digit, 1 upercasse letter, one lowercase leter and one symbol e.g. Ivjk!klio)">
            </div>
            <div class="mb-4" id="passwordagaine">
                <label for="passwordagain" class="form-label">Password again</label>
                <input type="password" id="password_confirmation"  name="password_confirmation"class="form-control" placeholder="Password again">
            </div>
            <div class="mb-3">
                <div class="form-check" id="FieldsetChecke">
                    <input class="form-check-input" type="checkbox" id="FieldsetCheck" name="FieldsetCheck">
                    <label class="form-check-label" for="FieldsetCheck">
                        I confirm that I have read and agree to Terms of Service and Privacy Policy.
                    </label>
                </div>
            </div>
            <button id="register"  class="btn btn-primary">Submit</button>
        </fieldset>
    </form>

    @if($errors->any())

        @foreach($errors->all() as $error)<h5 style="color: crimson">{{$error}}</h5>
        @endforeach

    @endif

</div>

<div id="editModal"></div>

<script type="text/javascript">
    const baseUrl = "{{url('/')}}";
    const publicFolder = "{{asset('/')}}";
</script>

<script src="{{ asset('js/app.js') }}"></script>







</body>

