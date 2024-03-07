<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Short Link</title>
</head>
<body>
    <h1>Edit Short Link</h1>
    <form action="{{ route('shorten.link.update', $shortLink->id) }}" method="POST">
    @csrf 
    @method('PUT')
    <div class="form-group">
        <label for="code">Code</label>
        <input type="text" name="code" class="form-control" id="code" value="{{ $shortLink->code }}">
    </div>
    <button type="submit" class="btn btn-primary">Update Shorten Link</button>
</form>

</body>
</html>