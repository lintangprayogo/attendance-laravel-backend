<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    public function index()
    {
        $notes = note::all();
        return response()->json($notes);
    }

    public function show($id)
    {
        $note = Note::find($id);
        if (is_null($note)) {
            return response()->json(['message' => 'Note not found'], 404);
        }
        return response()->json($note);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'note' => 'required',
        ]);
        $note = new Note();
        $note->title = $request->title;
        $note->note = $request->note;
        $note->user_id = $request->user()->id;
        return response()->json(['message' => 'Note created successfully'], 201);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'note' => 'required',
        ]);
        $note = Note::find($id);
        if (is_null($note)) {
            return response()->json(['message' => 'Note not found'], 404);
        }
        $note = new Note();
        $note->title = $request->title;
        $note->note = $request->note;
        $note->user_id = $request->user()->id;
        return response()->json(['message' => 'Note updated successfully'], 201);
    }

    public function destroy($id)
    {
        $note = Note::find($id);
        if (is_null($note)) {
            return response()->json(['message' => 'Note not found'], 404);
        }
        $note->delete();
        return response()->json(['message' => 'Note updated successfully'], 204);
    }
}
