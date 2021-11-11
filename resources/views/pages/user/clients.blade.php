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
@section('description') Your clients. @endsection
@section('keywords') client, clients, name, pib, id number@endsection

@section('content')

    <div style="margin-top: 60px; ">

    <nav class="nav nav-pills justify-content-around" style="padding-top: 50px; padding-bottom:50px">

        <h4 class="nav-link" style="color: #198754">Clients</h4 >

        <a class="nav-link active" style="margin-left: 10px; background-color: #198754" aria-current="page" href="/user/clients/add">Add new client +</a>
    </nav>

    </div>

    <table class="table table-dark table-striped">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Address</th>
            <th scope="col">Mail</th>
            <th scope="col">Pib</th>
            <th scope="col">Id number</th>
            <th scope="col">Account number</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
        </tr>
        </thead>

        <tr>
   @foreach($firms as $firmarray)
       @foreach($firmarray as $firm)

            <th scope="row"></th>
                    <form method="post" action="{{ route("user.clients.update", ['id' => $firm->id]) }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
            <td><input style="border: #198754" type="text" name="name" id="name" value="{{$firm->name}}"></td>
            <td><input type="text" name="street" value="{{$firm->adress}}"></td>
            <td><input type="text" name="mail" value="{{$firm->mail}}"></td>
            <td><input type="text" name="pib" value="{{$firm->pib}}"></td>
            <td><input type="text" name="idnumber" value="{{$firm->idnumber}}"></td>
                    <td><input type="text" name="accountnumber" value="{{$firm->accountnumber}}"></td>
                    <td><button type="submit" name="edit" value="{{$firm->id}}" class="btn btn-success">Edit</button></td>


                    </form>
                    <td><a href="{{ route("user.clients.delete", ['id' => $firm->id]) }}"><button type="submit" name="delete" value="{{$firm->id}}" class="btn btn-danger" >Delete</button></a></td>

        </tr>

        @endforeach

        @endforeach

        </tbody>
    </table>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


@endsection

