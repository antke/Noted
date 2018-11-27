<div class="entry">
  <span>{{$entry['title']}}</span>
  <span>{{$entry['created_at']}}</span>
  <p>{{$entry['content']}}</p>

  <a href="{{route('delete.record', $entry['id'])}}">Delete this note</a>
  <a href="{{route('edit.record', $entry['id'])}}">Edit this note</a>
</div>
