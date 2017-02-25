@extends('users.layouts.layout')

@section('content')
    <br><br><br>
    <div class="container">
        <div class="row page-title-row">
            <div class="col-md-6">
                <h3>Client <small>» Votre commande BuyGood</small></h3>
            </div>
        </div>
    </div>

    <div class="container">
        @if (Session::has('success'))
            <div class="alert alert-info fade in">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>
                    <i class="fa fa-check-circle fa-lg fa-fw"></i> &nbsp;
                </strong>
                {{ Session::get('success') }}
            </div>
        @endif
    </div>



    <div class="container">
        @if (count($errors) > 0)
            <div class="alert alert-warning fade in">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>
                    <i class="fa fa-check-circle fa-lg fa-fw"></i> &nbsp;
                </strong>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </div>
        @endif
    </div>

    <div class="container">
        <div class="row">
            <table class="table table-condensed table-responsive table-hover">
                <thead>
                <tr>
                    <th>Article</th>
                    <th>Prix Unitaire</th>
                    <th>Quantité</th>
                    <th>Prix</th>
                </tr>
                </thead>
                <tbody>
                @foreach($paniers as $pan)
                    <tr>
                        <td>{{ $pan[0]->nom }}</td>
                        <td> {{ $pan[0]->prix }} &#8364 </td>
                        <td> {{ $pan[1]->quantity }} </td>
                        <td> {{ $pan[1]->quantity * $pan[0]->prix }} &#8364 </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <a href="/users/commandes" class="btn btn-info btn-xs " role="button">Mes Commandes</a>
        </div>
    </div>

    <br>
@stop