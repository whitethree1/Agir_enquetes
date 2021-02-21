<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
  
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <title>Agir | 第{{$enquete->th}}回アーカイブ</title>
  </head>
<body>
  @component('components.header')
  @slot('title')
  第{{$enquete->th}}回 アンケート結果    
  @endslot
  @endcomponent
  <div class="container mt-5">
    <div class="row">
      <div class="col-2"></div>
      <div class="col-8">
        <p>開催日{{$enquete->event_day}}</p>
        <form action="/archive_detail/{{$enquete->id}}/summary" method="POST">
          @csrf
          <input type="hidden" name="date" value="{{$enquete->event_day}}">
          <input type="hidden" name="th" value="{{$enquete->th}}">
          <input type="time" name="start_time">
          <input type="time" name="end_time">
          <input type="submit" value="絞り込み">
        </form>
          @foreach ($enquete_answer as $answer)
          <table class="table">
              <caption style="caption-side: top">
                来店時間{{$answer['reserve_time']}}
              </caption>
              <tr>
                <th>料理名</th>
                <th>味</th>
                <th>ボリューム</th>
                <th>クオリティー</th>
                <th>コメント</th>
              </tr>
              @foreach ($answer->archives as $archive)
                <tr>
                  <td>{{$archive->item->item_name}}</td>
                  <td>{{$archive->taste}}</td>
                  <td>{{$archive->quarlity}}</td>
                  <td>{{$archive->volume}}</td>
                  <td>{{$archive->comment}}</td>
                </tr>
                {{-- {{$archive['id']}} --}}
              
              @endforeach
              <tr>
                <th colspan="5">感想</th>
              </tr>
              <tr>
                <td colspan="5">{{$answer['sammary']}}</td>
              </tr>
            </table>
        @endforeach

        <a href="archive">アーカイブ一覧へ</a>
      </div>
      <div class="col-2"></div>
    </div>
  </div>
  <!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>