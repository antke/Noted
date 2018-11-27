<div class="entry add_list_modal">
<h3>Add a list</h3>
  <form class="list_form" action="/add_list" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}

    <p>Title</p>
    <input type="text" name="title" value="">

    <p>Tasks</p>
    <ul id="new_todo_list" name="new_todo_list">
      <li class="new_todo_item">
        <input class="todo_item" type="text" name="todo_item_1" placeholder="To do...">
      </li>
    </ul>
    <input id="todo_item_count" type="hidden" name="todo_item_count" value="1">

    <div class="list_control_buttons">
      <button id="add_todo_item" type="button" name="button">+</button>
      <button id="remove_todo_item" type="button" name="button">-</button>
    </div>

    <div class="submit_button_wrapper">
      <button type="submit" name="note_submit_button">Submit</button>
    </div>
  </form>

</div>
