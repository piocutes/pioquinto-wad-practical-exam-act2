<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Post</title>
</head>
<body>
    <h1>Create New Post</h1>

    <!-- Display Validation Errors -->
    @if($errors->any())
        <ul style="color: red;">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('posts.store') }}" method="POST">
        @csrf
        <label for="title">Title:</label><br>
        <input type="text" id="title" name="title" value="{{ old('title') }}"><br><br>

        <label for="body">Body:</label><br>
        <textarea id="body" name="body">{{ old('body') }}</textarea><br><br>

        <button type="submit">Create Post</button>
    </form>
</body>
</html>
