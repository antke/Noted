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
      $entriesData = $this->getEntries();

      return view('home', ['entries' => $entriesData]);
    }

    private function getEntries()
    {
      $entriesData = NoteObject::all()->toArray();

      foreach ($entriesData as $index => $entry) {
        if ($entry['data_type'] === "list") {
          $entriesData[$index]['content'] = json_decode($entry['content']);
        }
      }

      return $entriesData;
    }

    public function addNote()
    {
      $note = new NoteObject;

      $note->title = request('title');
      $note->content = request('content');

      $note->data_type = "note";
      $note->save();

      return redirect()->to('/');
    }

    public function addList()
    {
        $list = new ListObject;

        $list->title = request('title');

        $todoList = [];
        $numberOfIterations = request('todo_item_count') + 1;
        for ($i = 1; $i < $numberOfIterations; $i++) {
          $todoList[] = [
            "entry" => request("todo_item_$i"),
            "checked" => 0
          ];
        }

        $list->content = json_encode($todoList);

        $list->data_type = "list";
        $list->save();

        return redirect()->to('/');
    }

    public function deleteRecord($id)
    {
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
