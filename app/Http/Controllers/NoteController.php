<?php

namespace App\Http\Controllers;

use App\models\Note;
use Illuminate\Support\Str;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Http\Request;

class NoteController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
       $notes = Note::all();

       foreach ($notes as $note) {
           if (isset($note->expiry) && (date('Y-m-d H:i:s') > $note->expiry)) {
                Note::destroy($note);
            }
       }

       return view('notes.index', ['notes' => $notes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('notes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $maskDescription = static::maskValue(request('description'));
        $expiryDate = static::expiryDate(request('expiry'));

        request()->validate([
            'title'         => 'required',
            'description'   => 'required',
            'expiry'        => 'nullable',
        ]);

        Note::create([
            'title'         => request('title'),
            'description'   => $maskDescription,
            'expiry'        => (isset($expiryDate) ? $expiryDate : null),
        ]);

        return redirect('/project-notes');
    }

    public function expiryDate($expiry) {
        if (isset($expiry) && strtotime($expiry)) {
            return date('Y-m-d H:i:s', strtotime($expiry));
        }
        return;
    }

    public function maskValue($description) {
        if (preg_match_all('/[a-z0-9_\-\+\.]+@[a-z0-9\-]+\.([a-z]{2,4})(?:\.[a-z]{2})?/i', $description, $matches)) {
            $content      = Str::before($description, implode('', $matches[0]));
            $prefix       = Str::before(implode('', $matches[0]), '@');
            $replacement  = $content . str_repeat('*', strlen($prefix));
            $domain       = Str::after($description, '@');
            return $replacement . '@' . $domain;
        }
        return $description;
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  object  $note
     * @return \Illuminate\Http\Response
     */
    public function edit(Note $note) {
        return view('notes.edit', ['note' => $note]); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  object $note
     * @return \Illuminate\Http\Response
     */
    public function update(Note $note) {
        request()->validate([
            'title'         => 'required',
            'description'   => 'required',
        ]);

        $note->update([
            'title'         => request('title'),
            'description'   => request('description'),
        ]);

        return redirect('/project-notes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  object $note
     * @return \Illuminate\Http\Response
     */
    public function destroy(Note $note) {

        if ($note->trashed()) {
            $note->forceDelete();
            return redirect('/project-notes/archive');
        }

        $note->delete();

        return redirect('/project-notes');
    }

    public function archive() {
        $notes = Note::onlyTrashed()->get();

        return view('notes.archive', ['notes' => $notes]);
    }

    public function restore(Note $note) {
        $note->restore();

        return redirect('/project-notes/archive');
    }
}
