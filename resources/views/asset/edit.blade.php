<!DOCTYPE html>
<html>
    <head>
        <title>Edit Asset</title>
    </head>
    <body>
        @if ($errors->any())
        <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul><br/>
        @endif
        <form method="post" action="{{ route('asset.update', $item->id) }}"> 
            @csrf
            @method('PATCH')
            Name: <input type="text" name="name" value="{{ $item->name }}"><br/>
            Description: <input type="text" name="description" value="{{ $item->description }}"><br/>
            Value: <input type="number" name="value" value = "{{ $item->value }}"><br/>
            Date Purchased: <input type="date" name="purchased" value="{{ $item->date_purchased }}"><br/>
            <button type="submit">Edit asset</button>
        </form>
    </body>
</html>
