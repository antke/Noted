<div class="entry">
  <form action="/update_note/{{$entry['id']}}" method="post" enctype="multipart/form-data">
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

    <textarea name="content" rows="3" cols="40">{{$entry['content']}}</textarea>
  </form>
</div>
