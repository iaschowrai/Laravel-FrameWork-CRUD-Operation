
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">

        <title>buzzio</title>
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

                        <!--Navigation using route to different views folder-->

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('asset.index') }}">Assets</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('person.index') }}">Person</a>
                        </li><li class="nav-item">
                            <a class="nav-link" href="{{ route('owner.index') }}">Owner</a>
                        </li>
                    </ul>

                    <ul class="navbar-nav">

                        @auth
                        <li class="nav-item">
                            <a class="nav-link"  href="{{ route('dashboard') }}">Dashboard</a>
                        </li>

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
                            <a class="nav-link" href="{{ route('login') }}">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">Register</a>
                        </li>
                        @endauth

                    </ul>
                </div>
            </div>
        </nav>

        <div style="text-align: center; margin-top: 50px;">
            <h2>Welcome to Inventory!</h2>

            <p> click on any three button on top left to read the data, want to be a member click register on top right or click login!</p>
        </div>
