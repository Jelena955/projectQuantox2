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
@section('description') Your inoices. @endsection
@section('keywords') client, invoices, date, mail, id number@endsection

@section('content')

    <div style="margin-top: 60px; ">

        <nav class="nav nav-pills justify-content-around" style="padding-top: 50px; padding-bottom:50px">

            <h4 class="nav-link" style="color: #198754">Invoices</h4 >

            <a class="nav-link active" style="margin-left: 10px; background-color: #198754" aria-current="page" href="/user/invoices/add">Add new invoice +</a>
        </nav>

    </div>

    <table class="table table-dark table-striped">
        <thead>
        <h1>Search</h1>
        <tr>

            <th scope="col">Id invoice</th>
            <th scope="col">Client</th>
            <th scope="col">Date of issue</th>
            <th scope="col">Due date</th>
            <th scope="col">Note</th>
            <th scope="col">Paid</th>
            <th scope="col">To paid</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
        </tr>
        </thead>

        <tr>
            @foreach($invoices as $invoicesarray)
                @foreach($invoicesarray as $invoice)


                    <form method="post" action="{{ route("user.clients.update", ['id' => $invoice->id]) }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        <td><input style="border: #198754" type="text" name="idinvoice" id="idinvoice" value="{{$invoice->id}}"></td>
                        <td><input type="text" name="client" value="{{$invoice->name}}"></td>
                        <td><input type="text" name="dateissue" value="{{$invoice->dateOfIssue}}"></td>
                        <td><input type="text" name="duedate" value="{{$invoice->DueDate}}"></td>
                        <td><input type="text" name="note" value="{{$invoice->notes}}"></td>
                        <td><input type="text" name="paid" value="{{$invoice->paid}}"></td>
                        <td><input type="text" name="To paid" value="{{$invoice->paid}}"></td>
                        <td><button type="submit" name="edit" value="{{$invoice->id}}" class="btn btn-success">Edit</button></td>


                    </form>
                    <td><a href="{{ route("user.clients.delete", ['id' => $invoice->id]) }}"><button type="submit" name="delete" value="{{$invoice->id}}" class="btn btn-danger" >Delete</button></a></td>

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

