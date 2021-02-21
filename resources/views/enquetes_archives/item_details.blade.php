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
    <title>Agir | 第{{$th}}回アーカイブ</title>
  </head>
<body>
  @component('components.header')
  @slot('title')
  第{{$th}}回 アンケート結果    
  @endslot
  @endcomponent
  <div class="container mt-5">
    <div class="row">
      <div class="col-2"></div>
      <div class="col-8">
       
        @foreach ($archives as $item)
        <div class="text-center mb-5">
          <div class="card mb-3 ml-3 mr-3" role="alert">
            <div class="card-header h4 text-white bg-info font-weight-bold">
              <p>{{$item}}</p>
            </div>
            @foreach ($item as $it)
              {{$it->item->item_name}} {{-- 料理名を入れたい --}}
              <div class="card-body">
                  <img src="{{asset($it->item->image)}}" class="img-fluid" alt="Responsive image" style="height: 300px;">
              </div>                
                <div class="row mb-3 ml-3">
                  <div class="card" style="width: 27%;">
                    <div class="card-header text-white font-weight-light bg-info">味</div>
                    <span class="card-body text-dark custom-span custom-span-lg" name="taste[]" style="height: 75px;">
                      {{$it->taste}}
                    </span>
                  </div>
                  <div class="card  ml-5" style="width: 27%">
                    <div class="card-header text-white font-weight-light bg-info">クオリティ</div>
                    <span class="card-body text-dark custom-span custom-span-lg" name="taste[]">
                      {{$it->quarlity}}
                    </span>
                  </div>
                  <div class="card  ml-5" style="width: 27%">
                    <div class="card-header text-white font-weight-light bg-info">ボリューム</div>
                    <span class="card-body text-dark custom-span custom-span-lg" name="taste[]">
                      {{$it->volume}}
                    </span>
                  </div>
                </div>  
                
                <div class="form-group ml-3 mr-3">
                  <div>感想</div>
                  <li class="form-control" id="comment" rows="5">
                    {{$it->comment}}
                  </li>
                </div>
                @endforeach
              </div>
            </div>
        @endforeach

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