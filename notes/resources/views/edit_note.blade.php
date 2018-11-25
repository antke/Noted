<form class="note_form" action="/update_note/{{$note['id']}}" method="post" enctype="multipart/form-data">
  {{ csrf_field() }}

  <label for="title">Title</label>
  <input type="text" name="title" value="{{$note['title']}}">

  <label for="content">Content</label>
  <input type="textarea" name="content" value="{{$note['content']}}">

  <button type="submit" name="note_submit_button">Submit</button>
</form>
