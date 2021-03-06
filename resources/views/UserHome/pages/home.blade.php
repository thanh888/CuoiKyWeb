@extends('UserHome.layout.layout')
@section('content')
@section('css')
@section('css')
<style>
  .article-card{
    border-radius: 8px;
      box-shadow: 0 1px 10px 0 rgb(0 0 0 / 12%);
      background-color: #ffffff;
      margin-bottom: 24px;
  }
  .function-heart{
    box-shadow: none;
    border: none;
    background: rgba(255, 191, 0 , 0.8);
    position: absolute;
    top: 0;
    left: 0;
    border-radius: 8px;
  }
  .article-card-head{
    position: relative;
    height: 185px;
    margin-bottom: 5px;
  }
  .card-title{
    font-weight: 600; 
    font-size: 15px;
    white-space: nowrap;
    text-overflow: ellipsis;
    overflow: hidden;
    margin-bottom: 10px;
  }
  .article-price{
    font-size: 14px;
    font-weight: 700;
    margin-bottom: 10px;
  }
  .article-info-detail-item{
    white-space: nowrap; 
    text-overflow: ellipsis; 
    overflow: hidden;
    font-size: 13px;
    margin-bottom: 10px; 
  }
  .article-info-location{
    font-size: 14px; 
  }
  .article-card-footer{
    color: #e79327;
  }
  .card-head-img{
    height: 100%;

  }
  .card-image-top{
    overflow: hidden;
    width: 100%;
    height: 100%;
    object-fit: cover;
    border-radius: 8px;

  }
  .article-card-footer{
    border-top: 1px solid #e0e0e0;

  }
  .tracking-chat{
    color: #e79327
  }


</style>
@endsection
@endsection

@include('UserHome.particle.slider', ['slider'=>$slider])
<main id="main">

    <!-- ======= Services Section ======= -->
    <section class="section-services section-t8">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="title-wrap d-flex justify-content-between">
              <div class="title-box">
                <h2 class="title-a">Our Services</h2>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <div class="card-box-c foo">
              <div class="card-header-c d-flex">
                <div class="card-box-ico">
                  <span class="bi bi-cart"></span>
                </div>
                <div class="card-title-c align-self-center">
                  <h2 class="title-c">Lifestyle</h2>
                </div>
              </div>
              <div class="card-body-c">
                <p class="content-c">
                  Sed porttitor lectus nibh. Cras ultricies ligula sed magna dictum porta. Praesent sapien massa,
                  convallis a pellentesque
                  nec, egestas non nisi.
                </p>
              </div>
              <div class="card-footer-c">
                <a href="#" class="link-c link-icon">Read more
                  <span class="bi bi-chevron-right"></span>
                </a>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card-box-c foo">
              <div class="card-header-c d-flex">
                <div class="card-box-ico">
                  <span class="bi bi-calendar4-week"></span>
                </div>
                <div class="card-title-c align-self-center">
                  <h2 class="title-c">Loans</h2>
                </div>
              </div>
              <div class="card-body-c">
                <p class="content-c">
                  Nulla porttitor accumsan tincidunt. Curabitur aliquet quam id dui posuere blandit. Mauris blandit
                  aliquet elit, eget tincidunt
                  nibh pulvinar a.
                </p>
              </div>
              <div class="card-footer-c">
                <a href="#" class="link-c link-icon">Read more
                  <span class="bi bi-calendar4-week"></span>
                </a>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card-box-c foo">
              <div class="card-header-c d-flex">
                <div class="card-box-ico">
                  <span class="bi bi-card-checklist"></span>
                </div>
                <div class="card-title-c align-self-center">
                  <h2 class="title-c">Sell</h2>
                </div>
              </div>
              <div class="card-body-c">
                <p class="content-c">
                  Sed porttitor lectus nibh. Cras ultricies ligula sed magna dictum porta. Praesent sapien massa,
                  convallis a pellentesque
                  nec, egestas non nisi.
                </p>
              </div>
              <div class="card-footer-c">
                <a href="#" class="link-c link-icon">Read more
                  <span class="bi bi-chevron-right"></span>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section><!-- End Services Section -->

    <!-- ======= Latest Properties Section ======= -->
    <section class="section-property section-t8">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="title-wrap d-flex justify-content-between">
              <div class="title-box">
                <h2 class="title-a">Latest Properties</h2>
              </div>
              <div class="title-link">
                <a href="property-grid.html">All Property
                  <span class="bi bi-chevron-right"></span>
                </a>
              </div>
            </div>
          </div>
        </div>

        <div id="property-carousel" class="swiper">
          <div class="swiper-wrapper">
            @foreach($tinnew as $tinnews)
            <div class="carousel-item-b swiper-slide">
              <div class="card-box-a card-shadow">
                <div class="img-box-a">
                  <img src="{{$tinnews->image_path}}"  width="350px" height="380px" alt="" class="img-a">
                </div>
                <div class="card-overlay">
                  <div class="card-overlay-a-content">
                    <div class="card-header-a">
                      <h2 class="card-title-a">
                        <a href="property-single.html">{{$tinnews->nhucau}}
                          <br />Khu V???c:{{$tinnews->city->name_city}}</a>
                      </h2>
                    </div>
                    <div class="card-body-a">
                      <div class="price-box d-flex">
                        <span class="price-a">{{number_format($tinnews->price)}} VN??</span>
                      </div>
                      <a href="#" class="link-a">Click here to view
                        <span class="bi bi-chevron-right"></span>
                      </a>
                    </div>
                    <div class="card-footer-a">
                      <ul class="card-info d-flex justify-content-around">
                        <li>
                          <h4 class="card-info-title">Area</h4>
                          <span>{{$tinnews->dientich}}
                            <sup>2</sup>
                          </span>
                        </li>
                        <li>
                          <h4 class="card-info-title">Beds</h4>
                          <span>{{$tinnews->quantityfloor}}</span>
                        </li>
                        <li>
                          <h4 class="card-info-title">Baths</h4>
                          <span>{{$tinnews->quantitybed}}</span>
                        </li>
                        <li>
                          <h4 class="card-info-title">Garages</h4>
                          <span>{{$tinnews->quantitybath}}</span>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div><!-- End carousel item -->

            @endforeach

            
          </div>
        </div>
        <div class="propery-carousel-pagination carousel-pagination"></div>

      </div>
    </section><!-- End Latest Properties Section -->

    <!-- ======= Agents Section ======= -->
    <section class="section-agents section-t8">
      <div class="container">
        <div class="row">
          @foreach ($postings as $item)
          <div class="col-md-4">
            <div class="article-card" data-id="61a88fbd32c75a0019884c2a" data-category-id="5deb722db4367252525c1d00" >
              <div class="article-card-head" style="">
                <div class="card-head-img" >
                    <a href="{{ route('post.detail', ['id'=>$item->id]) }}" class="call-traking"></a>
                    <img class="card-image-top lazy" src="{{ $item->image_path }}">
                </div>
                <div class="card-head-function " >
                    <div class="list-function">
                      <button class="btn-custom btn-func function-heart" id="btn-favorite-61a88fbd32c75a0019884c2a" data-article-id="61a88fbd32c75a0019884c2a" >Ba??n g????p</button>
                    </div>
                </div>
              </div>
              <div class="article-card-body p-2" >
                <div class="card-title text-uppercase" >
                    <a href="{{ route('post.detail', ['id'=>$item->id]) }}" class="call-traking">
                          Ch??nh ch??? c???n b??n 470m2 ?????t th??? c??, ???????ng ?? t??, gi?? ?????u t??, S??c S??n, H?? N???i
                    </a>
                </div>
                <div class="article-info">
                    <div class="article-price" >
                      <i class="fas fa-dollar-sign"></i> 3.06 T??? - 6.5 Tri???u/m??
                    </div>
                </div>
                <div class="article-info-detail row">
                    <div class="col-md-6">
                      <div class="article-info-detail-item no-wrap items-center " data-toggle="tooltip" data-placement="top" title="" data-original-title=" Di???n t??ch: 470 m??">
                        <i class="far fa-clone"></i> 470 m??
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="article-info-detail-item no-wrap items-center " data-toggle="tooltip" data-placement="top" title="" data-original-title="???????ng r???ng: M???t ph??? - M???t ???????ng" >
                        <i class="fas fa-road"></i> M???t ph??? - M???t ???????ng
                      </div>
                    </div>
                    
                    <div class="col-md-6">
                      <div class="article-info-detail-item no-wrap items-center " data-toggle="tooltip" data-placement="top" title="" data-original-title="?????i t?????ng: Ch??nh ch???">
                        <i class="fas fa-user"></i> Ch??nh ch???
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="article-info-detail-item no-wrap items-center " data-toggle="tooltip" data-placement="top" title="" data-original-title="Lo???i nh?? ?????t: ?????t - ?????t n???n - Nh?? nh?? ?????t" style="white-space: nowrap; text-overflow: ellipsis; overflow: hidden;">
                        <i class="fas fa-city"></i> ?????t - ?????t n???n - Nh?? nh?? ?????t
                      </div>
                    </div>
                </div>
                <div class="article-info-location" data-toggle="tooltip" data-placement="top"  data-original-title="V??? tr??" style="font-size: 14px;">
                    <i class="fas fa-map-marker-alt"></i> Huy???n S??c S??n, Th??nh ph??? H?? N???i
                </div>
              </div>
              <div class="article-card-footer p-2 text-end" >
                <a  class="no-wrap items-center chip-content-footer icon-messenge tracking-chat" data-article-id="61a88fbd32c75a0019884c2a" href="javascript:void(0)" >
                  <i class="far fa-comment-dots"></i> Chat ngay</a>
              </div>
            </div>
          </div>
            
         @endforeach
        </div>
        
      </div>
    </section><!-- End Agents Section -->

    <!-- ======= Latest News Section ======= -->
    <section class="section-news section-t8">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="title-wrap d-flex justify-content-between">
              <div class="title-box">
                <h2 class="title-a">Blog</h2>
              </div>
              <div class="title-link">
                <a href="blog-grid.html">All News
                  <span class="bi bi-chevron-right"></span>
                </a>
              </div>
            </div>
          </div>
        </div>

        <div id="news-carousel" class="swiper">
          <div class="swiper-wrapper">
            @foreach ($blogs as $us)   
           
            <div class="carousel-item-c swiper-slide">
              <div class="card-box-b card-shadow news-box">
                <div class="img-box-b">
                  <img src="{{ asset('upload/'.$us->image.'') }}" width="350px" height="380px" alt="" class="img-b">
                </div>
                <div class="card-overlay">
                  <div class="card-header-b">
                    <div class="card-category-b">
                      <a href="#" class="category-b">{{$us->title }}</a>
                    </div>
                    <div class="card-title-b">
                      <h2 class="title-2">
                        <a href="blog-single.html">{{$us->sologan }}
                          </a>
                      </h2>
                    </div>
                    <div class="card-date">
                      <span class="date-b">{{ $us-> created_at }}</span>
                    </div>
                  </div>
                </div>
              </div>
            </div><!-- End carousel item -->
            @endforeach
          </div>
        </div>

        <div class="news-carousel-pagination carousel-pagination"></div>
      </div>
    </section><!-- End Latest News Section -->

    <!-- ======= Testimonials Section ======= -->
    <section class="section-testimonials section-t8 nav-arrow-a">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="title-wrap d-flex justify-content-between">
              <div class="title-box">
                <h2 class="title-a">Testimonials</h2>
              </div>
            </div>
          </div>
        </div>

        <div id="testimonial-carousel" class="swiper">
          <div class="swiper-wrapper">

            <div class="carousel-item-a swiper-slide">
              <div class="testimonials-box">
                <div class="row">
                  <div class="col-sm-12 col-md-6">
                    <div class="testimonial-img">
                      <img src="{{asset('frontend/template/assets/img/testimonial-1.jpg')}}" alt="" class="img-fluid">
                    </div>
                  </div>
                  <div class="col-sm-12 col-md-6">
                    <div class="testimonial-ico">
                      <i class="bi bi-chat-quote-fill"></i>
                    </div>
                    <div class="testimonials-content">
                      <p class="testimonial-text">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis, cupiditate ea nam praesentium
                        debitis hic ber quibusdam
                        voluptatibus officia expedita corpori.
                      </p>
                    </div>
                    <div class="testimonial-author-box">
                      <img src="{{asset('frontend/template/assets/img/mini-testimonial-1.jpg')}}" alt="" class="testimonial-avatar">
                      <h5 class="testimonial-author">Albert & Erika</h5>
                    </div>
                  </div>
                </div>
              </div>
            </div><!-- End carousel item -->

            <div class="carousel-item-a swiper-slide">
              <div class="testimonials-box">
                <div class="row">
                  <div class="col-sm-12 col-md-6">
                    <div class="testimonial-img">
                      <img src="{{asset('frontend/template/assets/img/testimonial-2.jpg')}}" alt="" class="img-fluid">
                    </div>
                  </div>
                  <div class="col-sm-12 col-md-6">
                    <div class="testimonial-ico">
                      <i class="bi bi-chat-quote-fill"></i>
                    </div>
                    <div class="testimonials-content">
                      <p class="testimonial-text">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis, cupiditate ea nam praesentium
                        debitis hic ber quibusdam
                        voluptatibus officia expedita corpori.
                      </p>
                    </div>
                    <div class="testimonial-author-box">
                      <img src="{{asset('frontend/template/assets/img/mini-testimonial-2.jpg')}}" alt="" class="testimonial-avatar">
                      <h5 class="testimonial-author">Pablo & Emma</h5>
                    </div>
                  </div>
                </div>
              </div>
            </div><!-- End carousel item -->

          </div>
        </div>
        <div class="testimonial-carousel-pagination carousel-pagination"></div>

      </div>
    </section><!-- End Testimonials Section -->

  </main><!-- End #main -->

@endsection