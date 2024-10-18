<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Http\Requests\Note\NoteRequest;
use App\Http\Resources\Note\NoteResourse;
use App\Models\Image;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class NoteController extends Controller
{
    public function index()
    {
        $notes = Note::orderBy('id', 'asc')->get();

        return NoteResourse::collection($notes);
    }

    public function show(Note $note) 
    {
        $note->load('image');

        return new NoteResourse($note);
    }

    public function store(NoteRequest $storeRequest)
    {
        $data = $storeRequest->validated();

        $image = $data['image'];
        unset($data['image']);

        $imageName = md5(Carbon::now() . '_' . $image->getClientOriginalName() . '.' . $image->getClientOriginalExtension());
        $filePath = Storage::disk('public')->putFileAs('/images', $image, $imageName);

        $note = Note::create($data);
        Image::create([
            'path' => $filePath,
            'url' => url('/storage/' . $filePath),
            'note_id' => $note->id,
        ]);

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
