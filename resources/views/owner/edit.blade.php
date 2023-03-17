<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">

    <title>Edit Owner</title>
  </head>
  <body>
      <h1>Edit Owner</h1>

      <form method="POST" action="{{ route('owner.update', $owner->id) }}">
        @csrf
        @method('PATCH')

          <label for="person_id">Owner:</label>
          <select class="form-control" name="person_id" id="person_id">
            @foreach ($people as $person)
              <option value="{{ $person->id }}" >{{ $person->firstname}} {{ $person->lastname}}</option>
            @endforeach
          </select>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('owner.index') }}" class="btn btn-secondary">Cancel</a>
      </form>
   
  </body>
</html>
