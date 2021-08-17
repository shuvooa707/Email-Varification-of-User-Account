<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            .hide {
                display: none!important;
            }
            .card-body {
                position: relative;
            }
            .overlay {
                position: absolute;
                top: 0px;
                left: 0px;
                background: white;
                opacity: .6;
                z-index: 10;
                height: 100%;
                width: 100%;
            }
        </style>

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    </head>
    <body>

        @include('navbar')

        <div class="container mt-5">
            @csrf
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-12">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="alert alert-success hide">
                            Invitaiton Sent
                        </div>
                        <div class="alert alert-danger hide">
                            Invitaiton Not Sent, Try Again!!!
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            Dashboard
                        </div>
                        <div class="card-body shadow d-flex justify-content-center">
                            <div class="overlay hide text-center">
                                <div class="spinner-border mt-3" style="display: inline-block" role="status">
                                    <span class="sr-only">Loading...</span>
                                </div>
                            </div>
                            <div class="form-group col-lg-7">
                                <input type="email" id="email" class="form-control" placeholder="Enter Email" required>
                            </div>
                            <div class="form-group col-lg-4">
                                <button class="btn btn-success form-control" onclick="invite()">Invite</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
        <script src="{{ asset('js/dashboard.js') }}"></script>
    </body>
</html>
