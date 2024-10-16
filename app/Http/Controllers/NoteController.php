<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Http\Requests\Note\NoteRequest;
use App\Http\Resources\Note\NoteResourse;

class NoteController extends Controller
{
    public function index()
    {
        $notes = Note::orderBy('id', 'asc')->get();

        return NoteResourse::collection($notes);
    }

    public function show(Note $note) 
    {
        return new NoteResourse($note);
    }

    public function store(NoteRequest $storeRequest)
    {
        $data = $storeRequest->validated();

        $note = Note::create($data);

        return response([], 200);
    }

    public function update(NoteRequest $updateRequest, Note $note)
    {
        $data = $updateRequest->validated();

        $note->update($data);

        return response([], 200);
    }

    public function destroy(Note $note) 
    {
        $note->delete();
        return response([], 200);
    }
}
