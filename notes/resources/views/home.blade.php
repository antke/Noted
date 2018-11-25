<h1>Notes</h1>

<button id="add_note" type="button" name="note_button">Add a new note</button>

<button id="add_list" type="button" name="list_button">Add a new to do list</button>

<div class="add_note_modal">

  <form class="note_form" action="/add_note" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}

    <label for="title">Title</label>
    <input type="text" name="title" value="">

    <label for="content">Content</label>
    <input type="textarea" name="content" value="">

    <button type="submit" name="note_submit_button">Submit</button>
  </form>

</div>

<br>

<?php foreach ($notes as $key => $note): ?>

  <div class="note">
    <span>{{$note['title']}}</span>
    <span>{{$note['created_at']}}</span>
    <p>{{$note['content']}}</p>

    <a href="{{route('delete.record', $note['id'])}}">Delete this note</a>
    <a href="{{route('edit.record', $note['id'])}}">Edit this note</a>
  </div>

  <br><br><br>
<?php endforeach; ?>
