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
  /**
  * Main index
  */
  public function index()
  {
    $entriesData = $this->getEntries();

    return view('home', ['entries' => $entriesData]);
  }

  /**
  * Return all entries to be displayed on the main page
  *
  * @return $entriesData
  */
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

  /**
  * Add a new note object
  */
  public function addNote()
  {
    $note = new NoteObject;

    $note->title = request('title');
    $note->content = $this->sanitizeData(request('content'));

    $note->data_type = "note";
    $note->save();

    return redirect()->to('/');
  }

  /**
  * Add a new list object
  */
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

  /**
  * Delete a record
  */
  public function deleteRecord($id)
  {
    $recordToDelete = NoteObject::find($id);
    $recordToDelete->delete();

    return redirect()->to('/');
  }

  /**
  * Update a note entry
  */
  public function updateNote($id, Request $request)
  {
    $post = NoteObject::find($id);

    $post->update($request->all());

    return redirect()->to('/');
  }

  /**
  * Update a list entry
  */
  public function updateList($id, Request $request)
  {
    $post = ListObject::find($id);

    $listItems = [];
    $checkboxes = request('checkboxes');

    foreach (request('items') as $key => $item) {
      $checked = (isset($checkboxes[$key])) ? 1 : 0;

      $listItems[] = [
        "entry" => $item,
        "checked" => $checked
      ];
    }

    $content = json_encode($listItems);

    $post->update(array('content' => $content));

    return redirect()->to('/');
  }

  /**
  * Sanitize input data
  *
  * @return $string
  */
  private function sanitizeData($string)
  {
    $string = trim($string);
    $string = htmlspecialchars($string);
    $string = htmlentities($string);
    $string = strip_tags($string);

    return $string;
  }
}
