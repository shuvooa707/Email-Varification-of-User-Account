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
            label {
                background: black;
                color: white;
                padding: 5px 10px;
                border-radius: 10px;

            }
        </style>

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    </head>
    <body>

        <nav class="navbar navbar-expand-lg sticky-top navbar-dark bg-dark d-flex justify-content-between">
            <a class="navbar-brand" href="/">Home</a>
            <a href="{{ route('login') }}" class="btn btn-info">Login</a>
        </nav>


        <div class="container my-5">

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
            <div class="row">
                <div class="col-lg-10">
                    <div class="card">
                        <div class="card-header bg-dark text-light">
                            Register
                        </div>
                        <div class="card-body shadow d-flex justify-content-center">

                            <div class="row">
                                <div class="col-lg-12">
                                    <form action="{{ route('register') }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group col-lg-12">
                                            <label for="name">Name : </label>
                                            <input type="text" id="name" name="name" class="form-control" placeholder="Enter Full Name" required>
                                        </div>
                                        <div class="form-group col-lg-12">
                                            <label for="name">Username : </label>
                                            <input type="text" id="username" name="username" class="form-control" placeholder="Enter Username" required>
                                        </div>
                                        <div class="form-group col-lg-12">
                                            <label for="name">Avatar : </label>
                                            <input type="file" id="avatar" name="avatar" onchange="showPreview(this)" class="form-control" required>
                                            <img src="" alt="" class="hide my-2" height="280px">
                                        </div>
                                        <div class="form-group col-lg-12">
                                            <label for="name">Email : </label>
                                            <input type="email" id="email" name="email" class="form-control" placeholder="Enter Email" required>
                                        </div>
                                        <div class="form-group col-lg-12">
                                            <label for="password">Password : </label>
                                            <input type="password" id="password" name="password" class="form-control" placeholder="Enter Email" required>
                                        </div>
                                        <div class="form-group col-lg-12">
                                            <label for="role">Role</label>
                                            <select name="role" value="0" id="role" class="form-control" required>
                                                <option disabled>Choose...</option>
                                                <option value="0">User</option>
                                                <option value="1">Admin</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-lg-12">
                                            <input type="submit" class="form-control btn btn-info" value="Register">
                                        </div>
                                    </form>
                                </div>
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
