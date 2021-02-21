<!DOCTYPE html>
<html lang="en">
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
  <title>Agir | 確認画面</title>
</head>
<body>
  @component('components.header')
  @slot('title')
  確認画面
  @endslot
  @endcomponent

  <div class="container mt-5">
    <div class="row">
      <div class="col-2"></div>
      <div class="col-8">
        <p class="alert alert-success h1 text-center font-weight-bold mb-5">第{{$th}}回 Agirアンケート</p>
        
        <div class="mb-3 h4">
          <span class="mr-5">開催日：{{$event_day}}</span>
          <span>ご来店時間：<input type="time" name="reserve_time" id=""></span>
        </div>

        @foreach ($items as $item)
            <div class="text-center mb-5">
              <div class="card mb-3 ml-3 mr-3" role="alert">
                <div class="card-header h4 text-white bg-info font-weight-bold">
                  {{$item['item_name']}}
                </div>
                <div class="card-body">
                  <img src="{{$item['image']}}" class="img-fluid" alt="Responsive image" style="height: 300px;">
                </div>                
                
                <div class="row mb-3 ml-3">
                  <div class="card" style="width: 27%;">
                    <div class="card-header text-white font-weight-light bg-info">味</div>
                    <select class="card-body text-dark custom-select custom-select-lg" name="taste[]" style="height: 75px;">
                      <option selected></option>
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                    </select>
                  </div>
                  <div class="card  ml-5" style="width: 27%">
                    <div class="card-header text-white font-weight-light bg-info">クオリティ</div>
                    <select class="card-body text-dark custom-select custom-select-lg" name="taste[]">
                      <option selected></option>
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                    </select>
                  </div>
                  <div class="card  ml-5" style="width: 27%">
                    <div class="card-header text-white font-weight-light bg-info">ボリューム</div>
                    <select class="card-body text-dark custom-select custom-select-lg" name="taste[]">
                      <option selected></option>
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                    </select>
                  </div>
                </div>  
                
                <div class="form-group ml-3 mr-3">
                  <div>感想</div>
                  <textarea class="form-control" id="comment" rows="5"></textarea>
                </div>
              </div>
            </div>
        @endforeach
        <form class="" action="complete" method="post">
          @csrf
          <input type="hidden" name="th" value="{{$th}}">
          <input type="hidden" name="event_day" value="{{$event_day}}">
          <input type="hidden" name="limit" value="{{$limit}}">

          @foreach ($items as $item)
          <input type="hidden" name="item_name[]" value="{{$item['item_name']}}">
          <input type="hidden" name="image[]" value="{{$item['image']}}">
          @endforeach
          <div class="row">
            <div class="col-3"></div>
            <div class="text-center col-6">
              <input type="submit" class="btn btn-outline-primary btn-lg btn-block" value="作成">
              <a href="create"  class="btn btn-outline-secondary btn-lg btn-block mb-4">戻る</a>
            </div>
            <div class="col-3"></div>
          </div>
        </form>
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