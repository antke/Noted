<div class="entry">
  <span>{{$entry['title']}}</span>
  <span>{{$entry['created_at']}}</span>

  @foreach ($entry['content'] as $key => $todo_item)
    <li>
      <input type="checkbox" name="" {{($todo_item->checked === 1) ? "checked" : "" }}>
      {{$todo_item->entry}}
    </li>
  @endforeach

  <a href="{{route('delete.record', $entry['id'])}}">Delete this note</a>
  <a href="{{route('edit.record', $entry['id'])}}">Edit this note</a>
</div>
