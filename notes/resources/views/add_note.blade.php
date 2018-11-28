<div class="entry add_note_modal">
<h3>Add a new note</h3>
  <form class="note_form" action="/add_note" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}

    <p class="add_box_title">Title</p>
    <input type="text" name="title" value="" required></input>

    <p class="add_box_title">Content</p>
    <textarea type="textarea" name="content" required></textarea>

    <div class="submit_button_wrapper">
      <button class="add_button" type="submit" name="note_submit_button">CREATE</button>
    </div>
  </form>

</div>
