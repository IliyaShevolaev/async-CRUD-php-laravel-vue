<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Http\Requests\Note\StoreRequest;

class NoteController extends Controller
{
    public function index()
    {
        $notes = Note::all();

        return $notes;
    }

    public function store(StoreRequest $storeRequest)
    {
        $data = $storeRequest->validated();

        $note = Note::create($data);

        return $note;
    }
}
