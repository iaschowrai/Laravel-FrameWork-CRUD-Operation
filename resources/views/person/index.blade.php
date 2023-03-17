<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">

        <title>Person</title>
        <link rel="stylesheet" href="//cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>

    </head>
    <body>
        <nav class="navbar navbar-expand-md navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="/">Home</a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
                    <ul class="navbar-nav">

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('asset.index') }}">Assets</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('owner.index') }}">Owner</a>
                        </li>
                    </ul>

                    <ul class="navbar-nav">

                        @auth
                        <li class="nav-item">
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                            <a class="nav-link" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Logout
                            </a>
                        </li>
                        @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('login')}}">Login</a>
                        </li>
                        <li class="nav-item">   
                            <a class="nav-link" href="{{route('register')}}">Register</a>
                        </li>
                        @endauth
                    </ul>
                </div>
            </div>
        </nav>

        <div class="d-flex justify-content-center">
            <div class="col-auto">
                <h3><strong>Person Page</strong></h3>
                @auth
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <a class="btn btn-primary" href="{{ route('person.create') }}">Create Person</a>
                </div>
                <table class="table table-bordered table-striped w-auto">
                    <thead>
                        <tr>
                            <th scope="col">Full Name</th>
                            <th scope="col">Date of Birth</th>
                            <th scope="col">Email Address</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    @foreach($person as $item)
                    <tbody>
                        <tr>
                            <td><a href="{{ route('person.show', $item->id) }}">{{$item->firstname}} {{$item->lastname}}</a></td>
                            <td>{{$item->dateofbirth}}</td>
                            <td>{{$item->emailaddress}}</td>
                            <td><a class="btn btn-primary" href="{{ route('person.edit', $item->id) }}">Edit</a>
                                <form action="{{ route('person.destroy', $item->id) }}" method="post" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type='submit'class="btn btn-danger"><i class="fa fa-trash"></i>Delete</button>         
                                </form>
                            </td>
                        </tr>
                    </tbody>
                    @endforeach
                </table>
                @else
                <table class="table table-bordered table-striped w-auto">
                    <thead>
                        <tr>
                            <th scope="col">Full Name</th>
                            <th scope="col">Date of Birth</th>
                            <th scope="col">Email Address</th>
                        </tr>
                    </thead>
                    @foreach($person as $item)
                    <tbody>
                        <tr>
                            <td><a href="{{ route('person.show', $item->id) }}">{{$item->firstname}} {{$item->lastname}}</a></td>
                            <td>{{$item->dateofbirth}}</td>
                            <td>{{$item->emailaddress}}</td>
                        </tr>
                    </tbody>
                    @endforeach
                </table>
                @endif
                </body>
                </html>
