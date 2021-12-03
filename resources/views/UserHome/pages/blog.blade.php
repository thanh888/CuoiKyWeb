@extends('UserHome.layout.layout')
@section('content')
<section class="intro-single">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-lg-8">
          <div class="title-single-box">
            <h1 class="title-single">Bài viết tuyệt vời của chúng tôi</h1>
          </div>
        </div>
        <div class="col-md-12 col-lg-4">
          <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="trangchu.html">Trang chủ</a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">
                Blog
              </li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </section>
  <!--/ Intro Single End /-->


  <!--/ News Grid Star /-->
  <section class="news-grid grid">
    <div class="container">
      <div class="row">
        @foreach($data as $us)
        <div class="col-md-4">
          <div class="card-box-b card-shadow news-box">
            <div class="img-box-b">
              <img src="{{ asset('upload/'.$us->image.'') }}" alt="" width="350px" height="380px" class="img-b">
            </div>
            <div class="card-overlay">
              <div class="card-header-b">
                <div class="card-category-b">
                  <a href="" class="category-b">{{$us->title }}</a>
                </div>
                <div class="card-title-b">
                  <h2 class="title-2">
                    <a href="">{{ $us->sologan }}</a>
                  </h2>
                </div>
                <div class="card-date">
                  <span class="date-b">{{ $us-> created_at }}</span>
                </div>
              </div>
            </div>
          </div>
        </div> 
        @endforeach
      </div>
        {{ $data->links() }}
    </div>
  </section>
@endsection