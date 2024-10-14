<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Http\Requests\Note\NoteRequest;
use App\Http\Requests\Note\UpdateRequest;

class NoteController extends Controller
{
    public function index()
    {
        $notes = Note::orderBy('id', 'asc')->get();

        return $notes;
    }

    public function store(NoteRequest $storeRequest)
    {
        $data = $storeRequest->validated();

        $note = Note::create($data);

        return $note;
    }

    public function update(NoteRequest $updateRequest, Note $note)
    {
        $data = $updateRequest->validated();

        $note->update($data);

        return $note;
    }

    public function destroy(Note $note) 
    {
        $note->delete();
        return response([]);
    }
}
