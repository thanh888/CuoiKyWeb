
  <!-- ======= Property Search Section ======= -->
  <div class="click-closed"></div>
  <!--/ Form Search Star /-->
  <div class="box-collapse">
    <div class="title-box-d">
      <h3 class="title-d">Search Property</h3>
    </div>
    <span class="close-box-collapse right-boxed bi bi-x"></span>
    <div class="box-collapse-wrap form">
      <form class="form-a" action="{{route('search')}}" method="post">
      @csrf
        <div class="row">
          <div class="col-md-12 mb-2">
            <div class="form-group">
              <label class="pb-2" for="Type">Keyword</label>
              <input type="text" name="name" class="form-control form-control-lg form-control-a" placeholder="Keyword">
            </div>
          </div>
          <div class="col-md-6 mb-2">
            <div class="form-group mt-3">
              <label class="pb-2" for="Type">Type</label>
              <select class="form-control form-select form-control-a" id="Type">
                <option>All Type</option>
                <option>For Rent</option>
                <option>For Sale</option>
                <option>Open House</option>
              </select>
            </div>
          </div>
          <div class="col-md-6 mb-2">
            <div class="form-group mt-3">
              <label class="pb-2" for="city">City</label>
              <select class="form-control form-select form-control-a" id="city">
                <option>All City</option>
                <option>Alabama</option>
                <option>Arizona</option>
                <option>California</option>
                <option>Colorado</option>
              </select>
            </div>
          </div>
          
          <div class="col-md-12">
            <button type="submit" class="btn btn-b">Search Property</button>
          </div>
        </div>
      </form>
    </div>
  </div><!-- End Property Search Section -->>

  <!-- ======= Header/Navbar ======= -->
  <nav class="navbar navbar-default navbar-trans navbar-expand-lg fixed-top">
    <div class="container-fluid">
      <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarDefault" aria-controls="navbarDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span></span>
        <span></span>
        <span></span>
      </button>
      <a class="navbar-brand text-brand" href="{{route('home.index')}}">Estate<span class="color-b">Agency</span></a>

      <div class="navbar-collapse collapse justify-content-center" id="navbarDefault">
        <ul class="navbar-nav">

          <li class="nav-item">
            <a class="nav-link " href="{{route('home.index')}}">Home</a>
          </li>

          <li class="nav-item">
            <a class="nav-link " href="about.html">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('contact.index') }}">Contact</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="{{ route('blog.index') }}">Blog</a>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Bất động sản</a>
            <div class="dropdown-menu">
                @foreach($needs as $need)
              <a class="dropdown-item " href="{{route('loadneeds',['id'=>$need->id])}}">{{$need->name}}</a>
                @endforeach
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="{{ route('blog.index') }}">Blog</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="{{ route('contact.index') }}">Contact</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " style="color: #2eca6a;" href="{{ route('post.create') }}">Đăng tin</a>
          </li>
          @if (auth()->user())
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ auth()->user()->name }}</a>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="{{ route('profile.index') }}"><i class="fa fa-user pr-2 "></i> Profile</a>
                  <a class="dropdown-item" href="{{route('home.logout')}}"><i class="fa fa-power-off pr-2"></i> Log out</a>
              </div>
            </li>
              
          @else
          <li class="nav-item">
            <a class="nav-link " href="{{ route('home.login') }}">Đăng nhập <i class="fas fa-sign-in-alt"></i></a>
          </li>
              
          @endif
        </ul>
      </div>

      <button type="button" class="btn btn-b-n navbar-toggle-box navbar-toggle-box-collapse" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01">
        <i class="bi bi-search"></i>
      </button>

    </div>
  </nav><!-- End Header/Navbar -->
 
