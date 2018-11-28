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
