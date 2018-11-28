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

    <script type="text/javascript" src="{{asset('/js/main.js')}}"></script>

    <link rel="stylesheet" href="{{asset('/css/app.css')}}">
    <link rel="stylesheet" href="{{asset('/css/stylesheet.css')}}">

  </head>
  <body>
    <div class="wrapper">

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
</html>
