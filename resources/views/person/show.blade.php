<!DOCTYPE html>
<html>
    <head>
        <title>Person Number {{ $person->id }}</title>
    </head>
    <body>
        <h1>Person Number {{ $person->id }}</h1>
        <ul>
            <li>First Name: {{ $person->firstname }}</li>
            <li>Last name: {{ $person->lastname }} </li>
            <li>Date Of Birth: {{ $person->dateofbirth }} </li>
            <li>Email Address: {{ $person->emailaddress }}</li>
        </ul>
    </body>
</html>
    