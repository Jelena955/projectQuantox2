
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

@section('title') Clients @endsection
@section('description') Your clients @endsection
@section('keywords') client, add, name, pib, id number @endsection

@section('content')

    <h1>Add client</h1>
    <div class="container" style="margin-top: 25px">

        <form action="/user/invoices/do-add" method="post">
            <fieldset >
                <legend>Add new invoice</legend>
                <div class="mb-4" id="dateissuee">
                    <label for="Client" class="form-label">Client</label>
                    <select class="form-select" aria-label="Default select example" id="client" name="client">
                        <option value="choose" selected>Choose client</option>
                    @foreach($firms as $firmarray)
                            @foreach($firmarray as $firm)
                        <option value="{{$firm->idfirm}}">{{$firm->name}}</option>

                    @endforeach
                        @endforeach
                    </select>
                </div>
                <div class="mb-4" id="dateissuee">

                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                    <label for="Mail" class="form-label">Date of issue</label>
                    <input type="email" id="mail" name="dateissue"  class="form-control" placeholder="Date of issue (e.g. 2021-12-15">
                </div>
                <div class="mb-4" id="datedue">
                    <label for="name" class="form-label">Due date</label>
                    <input type="text" id="duedate" name="duedate"  class="form-control" placeholder="Due date (e.g. 2022-1-1">
                </div>
                <div id="articles">
                <hr/>
                <div class="mb-4" class="article" id="article">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" id="name1" name="name" class="form-control" placeholder="Name">
                    <label for="description" class="form-label">Name</label>
                    <input type="text" id="description1" name="description" class="form-control" placeholder="description">
                    <label for="quantity" class="form-label">Discount</label>
                    <input type="text" id="quantity1" name="quantity" class="form-control" placeholder="quantity">
                    <label for="Price" class="form-label">Price</label>
                    <input type="text" id="price1" name="price" class="form-control" placeholder="price">
                    <label for="Discount" class="form-label">Discount</label>
                    <input type="text" id="discount1" name="discount" class="form-control" placeholder="Discount">
                    <label for="Itemtax" class="form-label">Item tax</label>
                    <input type="text" id="itemtax1" name="itemtax" class="form-control" placeholder="Item taxt">
                </div>
                </div>
                <button id="morearticle">Add one more article</button>
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

                    </select>
                </div>
                <div class="mb-4" id="streete">
                    <label for="Street" class="form-label">Street</label>
                    <input type="text" id="street" class="form-control"  name="street" placeholder="Street (e.g. 5218 Jensen Freeway )">
                </div>

                <button id="addinvoice"  class="btn btn-primary">Submit</button>
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
    <script src="{{ asset('js/article.js') }}"></script>
    <script src="{{ asset('js/jquery-3.6.9.min.js') }}"></script>







    </body>

@endsection

