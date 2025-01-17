<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Posts List</title>
</head>
<body>
    <a href="{{ url('/dashboard') }}" class="inline-block mt-4 bg-gray-500 text-white py-2 px-4 rounded">Back to Dashboard</a>

    <h1>Posts</h1>
    <!-- Success Message -->
    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <!-- Create New Post -->
    <a href="{{ route('posts.create') }}">Create New Post</a>

    <ul>
        @forelse ($posts as $post)
            <li>
                <strong>{{ $post->title }}</strong> by {{ $post->user->name }}<br>
                {{ $post->body }}<br>
                <a href="{{ route('posts.edit', $post->id) }}">Edit</a>
                <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Are you sure?')">Delete</button>
                </form>
            </li>
        @empty
            <li>No posts available.</li>
        @endforelse
    </ul>
</body>
</html>
