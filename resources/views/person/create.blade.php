<!DOCTYPE html>
<html>
    <head>
        <title>Create person</title>
    </head>
    <body>
        @if ($errors->any())
        <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul><br/>
        @endif
        <form method="post" action="{{ route('person.store') }}"> 
            @csrf
            First Name: <input type="text" name="firstname"><br/>
            Last Name: <input type="text" name="lastname"><br/>
            Date of Birth: <input type="date" name="dateofbirth"><br/>
            Email Address: <input type="email" name="emailaddress"><br/>
            <button type="submit">Submit</button>
        </form>
    </body>
</html>