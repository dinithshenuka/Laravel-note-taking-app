<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $note->title }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto px-4 py-8">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold">{{ $note->title }}</h1>
            <a href="{{ route('notes.index') }}" class="text-blue-500 hover:underline">Back to Notes</a>
        </div>

        <div class="bg-white p-6 rounded shadow mb-6">
            <p class="whitespace-pre-wrap">{{ $note->content }}</p>
            <div class="mt-4 text-gray-500">
                <span>Created: {{ $note->created_at->format('M d, Y H:i') }}</span>
                @if($note->updated_at != $note->created_at)
                    <span>• Updated: {{ $note->updated_at->format('M d, Y H:i') }}</span>
                @endif
            </div>
        </div>

        <div class="flex space-x-4">
            <a href="{{ route('notes.edit', $note->id) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded">Edit</a>
            <form action="{{ route('notes.destroy', $note->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded" onclick="return confirm('Are you sure?')">Delete</button>
            </form>
        </div>
    </div>
</body>
</html>
