<nav class="navbar navbar-expand-lg navbar-dark bg-info row">
  <div class="col-3">
    <a class="navbar-brand ml-5" href="/top">
      <img src="{{asset('images/navagirrogo.svg')}}" width="80" height="40" class="d-inline-block align-top" alt="">
    </a>
  </div>
  <div class="col-5">
    <h2 class="text-white h1 font-weight-bold pt-2">{{$title}}</h2>
  </div>
  <div class="col-4">
  <div class="collapse navbar-collapse d-flex flex-row-reverse mr-5" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="top">Top</a>
      </li>
      <span class="nav-link disabled">|</span>
      <li class="nav-item">
        <a class="nav-link" href="create">アンケート作成</a>
      </li>
      <span class="nav-link disabled">|</span>
      <li class="nav-item">
        <a class="nav-link" href="archive">アーカイブ</a>
      </li>
    </ul>
  </div>
  </div>
</nav>