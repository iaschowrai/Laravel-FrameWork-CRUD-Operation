<!DOCTYPE html>
<html>
    <head>
        <title>Update Person</title>
    </head>
    <body>
        @if ($errors->any())
        <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul><br/>
        @endif
        <form method="post" action="{{ route('person.update', $item->id) }}"> 
            @csrf
            @method('PATCH')
            Name: <input type="text" name="firstname" value="{{ $item->firstname }}"><br/>
            Description: <input type="text" name="lastname" value="{{ $item->lastname }}"><br/>
            Value: <input type="date" name="dateofbirth" value = "{{ $item->dateofbirth }}"><br/>
            Date Purchased: <input type="email" name="emailaddress" value="{{ $item->emailaddress }}"><br/>
            <button type="submit">Update</button>
        </form>
    </body>
</html>
