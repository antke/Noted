<div class="entry">
  <form action="/update_list/{{$entry['id']}}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}

    <div class="note_control_buttons">
      <a href="#">
        <button class="edit_button" type="submit" name="button"><img src="{{asset('/images/save_icon.svg')}}" alt=""></button>
      </a>

      <a href="{{route('delete.record', $entry['id'])}}">
        <button class="delete_button" type="button" name="button"><img src="{{asset('/images/delete_icon.svg')}}" alt=""></button>
      </a>
    </div>

    <p class="title">{{$entry['title']}} <span class="date">{{$entry['updated_at']}}</span></p>

    @foreach ($entry['content'] as $key => $todo_item)
      <li>
        <input type="checkbox" name="checkboxes[{{$key}}]" value="{{$key}}" {{($todo_item->checked === 1) ? "checked" : "" }}>
        <input class="display_list_item" type="text" name="items[]" value="{{{$todo_item->entry}}}">
      </li>
    @endforeach

  </form>
</div>
