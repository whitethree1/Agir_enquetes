<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <link rel="stylesheet" href="{{asset('css/create.css')}}">

  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <title>Agir | 新規作成</title>
</head>
<body>
  @component('components.header')
     @slot('title')
      アンケート作成
     @endslot
  @endcomponent

  <div class="container mt-5">
    <div class="row">
      <div class="col-2"></div>
      <div class="col-8">
        <form method="POST" action="confirm" enctype="multipart/form-data" class="">
          {{ csrf_field() }}
          <div class="form-group mb-4">
            <div class="form-row">
              <div class="col-md-1 text-center"><span class="align-text-top">第</span></div>
              <div class="col-md-2"><input class="th form-control" name="th" type="number"></div>
              <div class="col-md-9"><span class="align-text-top ml-2">回 Agirアンケート</span>
              </div>
            </div>
          </div>

          <div class=" mb-5">
            <div class="form-row">
              <div class="col-md-5">
                <label for="event_day">開催日</label>
              </div> 
              <div class="col-md-1">
              </div>
              <div class="col-md-5">
                <label for="limit">アンケート期限</label>
              </div>
              <div class="col-md-1">
              </div>
            </div>
            <div class="form-group">
              <div class="form-row">
                <div class="col-md-5">
                  <input type="date" class="form-control" name="event_day" id="event_day"> 
                </div> 
                <div class="col-md-1">
                </div>
                <div class="col-md-5">
                  <input type="date" class="form-control" name="limit" id="limit"> 
                </div>
                <div class="col-md-1">
                </div>
              </div>
            </div>
          </div>


          <span id="add_btn" class="btn btn-outline-info mb-3">＋ メニューの追加</span>

          <div  id="items" class="mb-5" style="display: none">
            <div class="row">
              <div class="col-5">料理名</div>
              <div class="col-3">写真</div>
              <div class="col-3"></div>
            </div>
          </div>

          <div class="row">
            <div class="col-3"></div>
            <div class="col-6">
              <input type="submit" class="btn btn-primary btn-block" value="確認画面">
              <a href="top" class="btn btn-outline-secondary btn-block">キャンセル</a>
            </div>
            <div class="col-3"></div>
          </div>

        </form>
      </div>
      <div class="col-2"></div>
    </div>
  </div>

  <script src="{{asset('js/create.js')}}"></script>
  
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>