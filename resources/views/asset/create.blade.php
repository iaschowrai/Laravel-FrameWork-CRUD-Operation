<!DOCTYPE html>
<html>
    <head>
        <title>Create Asset</title>
    </head>
    <body>
        @if ($errors->any())
        <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul><br/>
        @endif
        <form method="post" action="{{ route('asset.store') }}"> 
            @csrf
            Name: <input type="text" name="name"><br/>
            Description: <input type="text" name="description"><br/>
            Value: <input type="number" name="value"><br/>
            Date Purchased: <input type="date" name="purchased"><br/>
            <button type="submit">Add to inventory</button>
        </form>
    </body>
</html>