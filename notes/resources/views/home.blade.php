<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Noted</title>

    <script
		  src="https://code.jquery.com/jquery-3.3.1.min.js"
		  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
		  crossorigin="anonymous">
    </script>

    <link rel="stylesheet" href="{{asset('/css/app.css')}}">
    <link rel="stylesheet" href="{{asset('/css/stylesheet.css')}}">

  </head>
  <body>

<div class="wrapper">

<!-- <button id="add_note" type="button" name="note_button">Add a new note</button>

<button id="add_list" type="button" name="list_button">Add a new to do list</button> -->

<div class="entry_control">
  @include('add_note')
  @include('add_list')
</div>

<div class="entry_container">
  @foreach ($entries as $key => $entry)
    @if ($entry['data_type'] === "note")
      @include('note', $entry)
    @else
      @include('list', $entry)
    @endif
  @endforeach
</div>

</div>
</body>

<script type="text/javascript">
  jQuery(document).ready(function() {

    $('#add_todo_item').click(function() {
      var newItemCount = $('#new_todo_list li').length + 1;

      $('#new_todo_list').append('<li>\
        <input class="todo_item" type="text" name="todo_item_' + newItemCount + '">\
      </li>');

      $('#todo_item_count').val(newItemCount);
    })

    $('#remove_todo_item').click(function() {
      if($('#todo_item_count').val() > 1) {
        $('#new_todo_list li').last().remove();

        $('#todo_item_count').val($('#new_todo_list li').length);
      }
    })

  });
</script>

</html>
