@extends('UserHome.layout.layout')
@section('css')
  {{-- <link href="https://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet" /> --}}
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.js"></script>
  {{-- <script src="https://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script> --}}
<style>
body{
  background-color: rgb(209, 206, 206);
}
.container{
  background-color: #fff;

}
/* .posting-detail
{
    margin-top: 5rem;
} */
.gallery img{
	background: #fff;
	padding: 15px;
	width: 100%;
	box-shadow: 0px 0px 15px rgba(0,0,0,0.3);
	cursor: pointer;
}
#gallery-popup .modal-img{
	width: 100%;
}
  .user-header-info{
    margin-top: 28px;
    padding: 16px;
    border-radius: 8px;
    border: solid 1px #e0e0e0;
    background-color: white;
  }
  .avatar{
    width: 56px;
        max-width: 56px;
        min-width: 56px;
        height: 56px;
        overflow: hidden;
        display: block;
        border-radius: 50%;
        position: relative;
        margin-right: 10px;
  }
  .avatar img{
    width: 100%;
    height: 100%;
    display: inline-block;
    vertical-align: middle;
    object-fit: cover;
  }
  .button-chat{
    height: 40px;
    padding: 8px 3px 8px 32px;
    color: #ab8843;
    font-size: 16px;
    border-radius: 8px;
    border: solid 1px #e0e0e0;
    background-color: #ffffff;
    margin-right: 8px;
    width: 275px;
    position: relative;
    outline: none !important;
  }
  .phone-number{
    border-radius: 8px;
    border: solid 1px #e0e0e0;
    margin-top: 16px;
    margin-bottom: 12px;
    height: 48px;
    align-content: center;
    background-color: rgba(26,75,183,0.8);
  }
  .phone{
    font-size: 20px;
        font-weight: bold;
        position: relative;
        color: #fff;
  }
</style>
@endsection
@section('js')
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
     <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>

    <script type="text/javascript">
		document.addEventListener("click",function (e){
		  if(e.target.classList.contains("gallery-item")){
		  	  const src = e.target.getAttribute("src");
		  	  document.querySelector(".modal-img").src = src;
		  	  const myModal = new bootstrap.Modal(document.getElementById('gallery-popup'));
		  	  myModal.show();
		  }
		})
	</script>
@endsection
@section('content')

<!--/ Intro Single End /-->
<section class="posting-detail">

    <div class="container pt-5 pb-5 mt-3">
        <div class="row">
            <div class="col-12 col-lg-8">
                <div id="carouselExampleIndicators" class="carousel slide"  data-ride="carousel">
                    <ol class="carousel-indicators">
                      <li data-target="#carouselExampleIndicators" data-slide-to="0" class=""></li>
                      <li data-target="#carouselExampleIndicators" data-slide-to="1" class=""></li>
                      <li data-target="#carouselExampleIndicators" data-slide-to="2" class="active"></li>
                    </ol>
                    <div class="carousel-inner">
                      @foreach ($post->images as $item)
                        <div class="carousel-item" style="height: 400px;">
                            <img src="{{ $item->image_path }}" style="width: 100%; object-fit: cover;
                            " class="d-block w-100 gallery-item " alt="Gallery2" >
                        </div>
                      @endforeach
                      <div class="carousel-item active" style="height: 400px;" >
                        <img src="{{ $post->image_path }}" style="width: 100%; object-fit: cover; " class="d-block w-100 gallery-item" alt="Gallery3" >
                    </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                      <span class="carousel-control-prev" aria-hidden="true"><i class="fas fa-arrow-circle-left" style="color: black; padding-left:20px; font-size:30px;"></i></span>
                      <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                      <span class="carousel-control-next" aria-hidden="true" ><i class="fas fa-arrow-circle-right" style="color: black; padding-right:20px; font-size:30px;"></i></span>
                      <span class="sr-only">Next</span>
                    </a>
                  </div>
            </div>
            <div class="col-12 col-lg-4">
                <div class="ml-text-20 ml-text-bold mb-3 fw-bold" style="font-size: 20px"> Đặc điểm nổi trội</div>
                <ul class="wrap-content list-unstyled">
                    <li class="ml-text-16 wrap-content-item text-overflow-ellipsis">
                        Thương lượng
                    </li> 
                    <li class="ml-text-16 wrap-content-item  text-overflow-ellipsis">
                        <i class="fas fa-check"></i>  Giấy tờ pháp lý: Giấy CN QSDĐ - Sổ đỏ - Sổ hồng
                    </li> 
                    <li class="ml-text-16 wrap-content-item  text-overflow-ellipsis">
                        <i class="fas fa-check"></i>  Diện tích: 58 m²
                    </li> 
                    <li class="ml-text-16 wrap-content-item  text-overflow-ellipsis">
                        <i class="fas fa-check"></i> Số phòng ngủ: 3
                  </li> 

                    <li class="ml-text-16 wrap-content-item  text-overflow-ellipsis">
                        <i class="fas fa-check"></i> Số phòng tắm: 2
                  </li>

                    <li class="ml-text-16 wrap-content-item disable text-overflow-ellipsis">
                        <i class="fas fa-check"></i>  Hướng: ---
                    </li> 
                    <li class="ml-text-16 wrap-content-item  text-overflow-ellipsis">
                        <i class="fas fa-check"></i>  Loại nhà đất:  Chung cư
                    </li> 
                </ul>
              
                <div class="tour-booking">
                    <div class="ml-text-18 ml-text-bold">Đăng kí xem nhà 

                       
                    </div>
                        <div style="font-size: 13px;margin-top: 10px;">
                          Bạn vui lòng liên hệ trực tiếp với <a href="#tab_info" class="text-decoration">người đăng tin</a> để đăng ký lịch xem nhà!
                      </div>

                  
                </div>
            </div>
        </div>
            
    
	</div>
  <div class="modal fade" id="gallery-popup" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <!-- <h5 class="modal-title" id="exampleModalLabel">Modal title</h5> -->
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <img src="images/1.jpg" class="modal-img" alt="Modal Image">
        </div>
      </div>
    </div>
  </div>

  </section>
  <section class="navs">
    <div class="container">
      <div class="row">
        <div class="col-md-8">
          <nav id="navbar-example2" class="navbar navbar-light bg-light">
            <ul class="nav nav-pills">
              <li class="nav-item">
                <a class="nav-link nav-item" href="#inf">Giới thiệu</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#des">Mô tả</a>
              </li>
            </ul>
          </nav>
          <div data-spy="scroll" class="mt-3" data-target="#navbar-example2" data-offset="0">
            <div id="inf">
              <div id="nav-profile fat" class="info-description">
                <div class="des-detail ml-text-14 "><div class="text-uppercase" style="font-weight:700;  color: #993393;
                  text-transform: uppercase;"><h5>{{$post->need->name .' '.  $post->large .'(m2)' .' '. $post->housingtype->name }} </h5></div>
                <div> </div>
                <div class="address ml-text-14 ml-text-gray ml-mb-12"><i class="fas fa-map-marker-alt mx-2"></i>{{ $post->numberhouse .', '. $post->wards->name_xaphuong .', '. $post->province->name_quanhuyen .', '. $post->city->name_city }}</div>
                <div class="d-flex ml-mb-12 align-items-center introduce-line">
                    <div class=" ml-text-14 ml-text-gray">Ngày đăng: {{ $post->daypost }}</div>
                </div>
                <div class="price-sec row">
                  <div class="col-12 d-flex align-items-center">
                    <div class="item">
                      <div class="label ml-text-14 ml-text-gray d-flex">Mức giá: 
                        <div class="ml-text-16 text-bold price-article font-weight-bold" style="color: #e7843f !important;}">{{  number_format($post->price * $post->large) }} Tỷ - {{ number_format($post->price) }} Triệu/m²</div>
                      </div>
                      </div>
                    <div></div>
                    <div>&nbsp;</div>
                    <div>&nbsp;</div>
                  
                  </div>
              </div>
            </div>
            <div id="des" class="mt-3">
              <div id="nav-profile fat" class="info-description">
                <h4 class="title ml-text-15 ml-text-bold-2">Thông tin mô tả</h4>
                <div class="des-detail ml-text-14 "><div class="text-uppercase"> {{$post->need->name .' '.  $post->large .'(m2)' .' '. $post->housingtype->name }} </div>
                <div> 

                </div>
                  <div>+ Diện tích sổ đỏ  $post->large(m2)</div>
                  <div>- Cách Quốc lộ 35: 500m.</div>
                  <div>- Cách sân bay Nội Bài 5km.</div>
                  <div>- Sóc Sơn là thành phố đô thị vệ tinh của thủ đô Hà Nội, xung quanh có nhiều dự án lớn sắp khởi công xây dựng.</div>
                  <div>- Xung quanh có nhiều điểm tham quan du lịch nổi tiếng như: Việt Phủ Thành Chương, hồ Hàm lợn, khu vui chơi giải trí – du lịch Thung lũng xanh, bản zõm,..</div>
                  <div>- Phù hợp gia đình xây nhà để ở, nhà đầu tư chia lô, bán nền.</div>
                  <div>- Sổ đỏ chính chủ, sang tên trong ngày.</div>
                  <div>- Giá đầu tư : {{ $post->price }} triệu/m2 (có thương lượng)</div>
                  <div>- Liên hệ Phạm Hiền chính chủ để biết thêm chi tiết !</div>
                  <div>&nbsp;</div>
                  <div>&nbsp;</div>

                </div>
              </div>

            </div>
            
          </div>
          </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="poster-info">
            
            <div class="user-header-info d-flex" style="    ">
                    <div class="avatar" style="    ">
                    <img style="    " src="https://static.meeyland.com/avatar/image_crop_07840772-10af-4bb7-a449-738692f56eca4173775885343371192.1619449065022.jpg?d=56x56" alt="no avatar">
                  </div>

                <div class="wrap-info">
                    <div class="poster-name is-certificate font-weight-bold" >Phạm Hiền</div>
                    <div class="poster-role d-flex justify-content-between">
                        <div class="ml-text-14" style="font-size:15px;">Chính chủ</div>

                    </div>
                </div>
            </div>
            <div class="info-detail-poster mt-2" >
                <div class="wrap-info-detail d-flex justify-content-between ml-mb-8" style="font-size:15px">
                    <div class="">Đánh giá: Đang cập nhật</div>
                    <div class="">Tham gia từ: 03/2021</div>
                </div>
                <div class="wrap-info-detail d-flex justify-content-between ml-mb-8">
                <div class="">Số tin đăng: 46</div>
                </div>
            </div>
            <div class="flex-wrapper-circle">
                <div class="wrap-text">
                    <div class="ml-text-14 font-weight-bold ml-mb-2">Xếp hạng: <span class="ml-text-14 text-secondary">Đang cập nhật</span> </div>
                </div>
            </div>
            <div class="wrap-button-chat d-flex mt-2">
                <button style="    
                " class="button-chat tracking-chat" type="button" data-article-id="61a88fbd32c75a0019884c2a" >
                <i class="far fa-comment-dots"></i>  Chat với người đăng tin
              </button>
            </div>
            </div>
            <div class="phone-number tracking-call" style="" 
                data-article-id="61a88fbd32c75a0019884c2a">

                <div class="wrap-phone-number d-flex align-items-center">
                    <div class="phone" style="    
                    
                    " data-phone="0898262666">
                    <i class="fas fa-phone-volume"></i>
                    {{ $post->InforUser->phone }}
                  </div>
                    {{-- <a class="show-number tracking-call" data-article-id="61a88fbd32c75a0019884c2a" href="javascript:void(0)">Bấm để hiện số</a> --}}
                </div>
            </div>
        </div>
      </div>
      
    </div>
  </section>
@endsection