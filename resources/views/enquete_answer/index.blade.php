<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <link rel="stylesheet" href="{{asset('css/answer.css')}}">

  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <title>Agir | 第{{$enquete->th}}回アンケート</title>
</head>
<body>

  <div class="container mt-5">
        <form action="/thanks" method="get">
          <p class="alert alert-success text-center font-weight-bold mb-3">第{{$enquete->th}}回 Agirアンケート</p>
          
          <div class="mb-3">
            <label for="reserve_time" style="margin: 0;">ご来店日時</label><br>
            <span>{{$event_day}} <input type="time" name="reserve_time" id="reserve_time"></span>
          </div>
          
          @foreach ($enquete->items as $item)
          <div class="text-center mb-5">
            <div class="card mb-3 ml-3 mr-3" role="alert">
        
              <div class="card-header h4 text-white bg-info font-weight-bold">
                {{$item['item_name']}}
              </div>
              <div class="card-body">
                <img src="{{asset($item['image'])}}" class="img-fluid" alt="Responsive image" style="height: 300px;">
              </div>                
              
              <div class="mx-auto" style="width:90%;">
              <div class="row mb-3">
                <div class="col-4" style="padding: 0 2%;">
                  <div class="card">
                    <div class="card-header text-white font-weight-light bg-info">味</div>
                  <select class="card-body text-dark custom-select custom-select-sm" name="items[{{$item['id']}}][taste]" style="height: 60px;">
                      <option selected></option>
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                    </select>
                  </div>
                </div>
                <div class="col-4" style="padding: 0 2%;">
                  <div class="card">
                    <div class="card-header text-white font-weight-light bg-info">見た目</div>
                    <select class="card-body text-dark custom-select custom-select-sm" name="items[{{$item['id']}}][quarlity]" style="height: 60px;">
                      <option selected></option>
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                    </select>
                  </div>
                </div>
                <div class="col-4" style="padding: 0 2%;">
                  <div class="card">
                    <div class="card-header text-white font-weight-light bg-info">量</div>
                    <select class="card-body text-dark custom-select custom-select-sm" name="items[{{$item['id']}}][volume]" style="height: 60px;">
                      <option selected></option>
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                    </select>
                  </div>
                </div>
              </div>
              </div>  
              
              <div class="form-group ml-3 mr-3">
                <div>感想</div>
                <textarea class="form-control" id="comment" name="items[{{$item['id']}}][comment]" rows="3"></textarea>
              </div>
            </div>
          </div>
          @endforeach

          <div class="card mb-5 ml-3 mr-3">
            <div class="card-header h4 text-white bg-info font-weight-bold">
              その他感想
            </div>
            <div class="card-body">
              <textarea class="form-control" id="sammary" name="sammary" rows="5"></textarea>
            </div>
          </div>

          <div class="form-group mb-5 ml-5 mr-5">
            <input class="form-control btn btn-outline-primary btn-lg btn-block" type="submit" value="ア ン ケ ー ト 送 信">
          </div>
          <input type="hidden" name="enquete_id" value="{{$enquete->id}}">
          <input type="hidden" name="th" value="{{$enquete->th}}">
          <input type="hidden" name="event_day" value="{{$enquete->event_day}}">
          
        </form>
  </div>
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>