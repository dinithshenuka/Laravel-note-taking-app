<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    // Show all notes
    public function index()
    {
        $notes = Note::all();
        return view('notes.index', compact('notes'));
    }

    // Create a new note
    public function create()
    {
        return view('notes.create');
    }

    // Save a new note
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        Note::create($request->only('title', 'content'));

        return redirect()->route('notes.index')->with('success', 'Note created successfully.');
    }

    // Show a single note
    public function show(Note $note)
    {
        return view('notes.show', compact('note'));
    }

    // Edit a note
    public function edit(Note $note)
    {
        return view('notes.edit', compact('note'));
    }

    // Update the note
    public function update(Request $request, Note $note)
    {
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        $note->update($request->only('title', 'content'));

        return redirect()->route('notes.index')->with('success', 'Note updated successfully.');
    }

    // Delete the note
    public function destroy(Note $note)
    {
        $note->delete();

        return redirect()->route('notes.index')->with('success', 'Note deleted successfully.');
    }
}