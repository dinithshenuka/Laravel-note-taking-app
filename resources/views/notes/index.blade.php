<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notes</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto px-4 py-8">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold">My Notes</h1>
            <a href="{{ route('notes.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">Add New Note</a>
        </div>

        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4" role="alert">
                {{ session('success') }}
            </div>
        @endif

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            @forelse($notes as $note)
                <div class="bg-white p-4 rounded shadow">
                    <h2 class="text-xl font-semibold mb-2">{{ $note->title }}</h2>
                    <p class="text-gray-700 mb-4">{{ \Illuminate\Support\Str::limit($note->content, 100) }}</p>
                    <div class="flex justify-between">
                        <a href="{{ route('notes.show', $note->id) }}" class="text-blue-500 hover:underline">View</a>
                        <a href="{{ route('notes.edit', $note->id) }}" class="text-yellow-500 hover:underline">Edit</a>
                        <form action="{{ route('notes.destroy', $note->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:underline" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </div>
                </div>
            @empty
                <p>No notes found. Create your first note!</p>
            @endforelse
        </div>
    </div>
</body>
</html>
