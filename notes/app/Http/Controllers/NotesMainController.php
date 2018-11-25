<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\DataObject;
use App\Models\NoteObject;
use App\Models\ListObject;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;

class NotesMainController extends Controller
{
    public function index()
    {
      $notesData = $this->getNotes();

      return view('home', ['notes' => $notesData]);
    }

    private function getNotes()
    {
      $notesData = ListObject::all()->toArray();

      // foreach ($notesData as $index => $data) {
      //   dd($data);
      //   exit;
      // }

      return $notesData;
    }

    public function addNote()
    {
      var_dump(request('title'));

      $note = new NoteObject;

      $note->title = request('title');
      $note->content = request('content');

      $note->data_type = "note";
      $note->save();

      return redirect()->to('/');

    }

    public function deleteRecord($id) {
      $recordToDelete = NoteObject::find($id);
      $recordToDelete->delete();

      return redirect()->to('/');
    }

    public function editNote($id)
    {
      $recordToBeUpdated = NoteObject::find($id);

      return view('edit_note', ['note' => $recordToBeUpdated]);
    }

    public function updateNote($id, Request $request)
    {
      $post = NoteObject::find($id);

      // var_dump($request->all());

      $post->update($request->all());


      return redirect()->to('/');
    }
}
