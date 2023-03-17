<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Owner</title>
</head>
<body>
    <h1>Create Owner</h1>

    <form action="{{ route('owner.store') }}" method="POST">
        @csrf

        <div>
            <label for="person">Person:</label>
            <select name="person" id="person">
                @foreach ($people as $person)
                    <option value="{{ $person->id }}">{{ $person->firstname }} {{ $person->lastname }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="asset">Asset:</label>
            <select name="asset" id="asset">
                @foreach ($assets as $asset)
                    <option value="{{ $asset->id }}">{{ $asset->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit">Create</button>
    </form>
</body>
</html>
