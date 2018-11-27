<div class="entry add_note_modal">
<h3>Add a note</h3>
  <form class="note_form" action="/add_note" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}

    <p>Title</p>
    <input type="text" name="title" value=""></input>

    <p>Content</p>
    <textarea type="textarea" name="content"></textarea>

    <div class="submit_button_wrapper">
      <button type="submit" name="note_submit_button">Submit</button>
    </div>
  </form>

</div>
