@extends('Userhome.profile.layout.layout')
@section('css')
@endsection
@section('js')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  function actionDelete(event)
  {
  event.preventDefault();
  let urlRequest=$(this).data('url');
  let that=$(this);


  Swal.fire({
    title: 'Are you sure?',
    text: "You won't be able to revert this!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Yes, delete it!'
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({
        type:'GET',
        url:urlRequest,
        success:function(data)
        {
        if (data.code==200) {
          that.parent().parent().parent().parent().parent().parent().remove();
          Swal.fire(
                      'Deleted!',
                      'Your file has been deleted.',
                      'success'
                    )
        }
        
        },
        error:function()
        {

        }

      });
      
    }
  })
  }
  $(function(){
  $(document).on('click','.actionDelete',actionDelete);
  });
  </script>
@endsection
@section('content')
<div class="container-fluid py-4">
  <div class="row">
    <div class="col-12 mt-4">
      <div class="card mb-4">
        <div class="card-header pb-0 p-3">
          <h6 class="mb-1">Tất cả các tin đã đăng</h6>
          <a class="nav-link mb-0 px-0 py-1 active" data-bs-toggle="tab" href="javascript:;" role="tab" aria-selected="true">
            <a class="ms-1 btn btn-outline-primary "><i class="far fa-plus-square"></i> Đăng tin</a>
          </a>
          {{-- <p class="text-sm">Architects design houses</p> --}}
        </div>
        <div class="card-body p-3">
          
        </div>
      </div>
    </div>
  </div>
  
</div>
<div class="container-fluid">
  <div class="row">
    @foreach ($post as $item)
      <div class="col-md-3 mb-xl-0 mb-4" style="border-radius: 8px;
      box-shadow: 0 1px 10px 0 rgb(0 0 0 / 12%);
      background: #fff;">
        <div class="card card-blog card-plain">
          <div class="position-relative" style="height: 170px">
            <a class="d-block shadow-xl border-radius-xl">
              <img style="width: 100%; object-fit: cover; max-height:170px;" src="{{ $item->image_path }}" alt="img-blur-shadow" class="img-fluid shadow border-radius-xl">
            </a>
          </div>
        <div class="card-body px-1 pb-0" style="">
            <p class="text-gradient text-dark mb-2 text-sm" > {{ $item->need->name }}</p>
            <a href="javascript:;">
              <h5 style="white-space: nowrap;
              text-overflow: ellipsis;
              overflow: hidden;">
                {{ $item->title }}
              </h5>
            </a>
              <div class="article-info-detail row">
                  <div class="col-md-6">
                    <div class="article-info-detail-item no-wrap items-center " data-toggle="tooltip" data-placement="top" title="" data-original-title=" Diện tích: 470 m²">
                      <i class="far fa-clone"></i> {{ $item->large }} m²
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="article-info-detail-item no-wrap items-center " style="white-space: nowrap;
                    text-overflow: ellipsis;
                    overflow: hidden;" data-toggle="tooltip" data-placement="top" title="" data-original-title="Đường rộng: Mặt phố - Mặt đường" >
                      <i class="fas fa-road"></i> Mặt phố - Mặt đường
                    </div>
                  </div>
                  
                  <div class="col-md-6">
                    <div class="article-info-detail-item no-wrap items-center " data-toggle="tooltip" data-placement="top" title="" data-original-title="Đối tượng: Chính chủ">
                      <i class="fas fa-user"></i> Chính chủ
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="article-info-detail-item no-wrap items-center " data-toggle="tooltip" data-placement="top" title="" data-original-title="Loại nhà đất: Đất - Đất nền - Nhà như đất" style="white-space: nowrap; text-overflow: ellipsis; overflow: hidden;">
                      <i class="fas fa-city"></i> {{ $item->housingtype->name }}
                    </div>
                  </div>
              </div>
              <div class="article-info-location" data-toggle="tooltip" data-placement="top"  data-original-title="Vị trí" style="font-size: 14px;">
                  <i class="fas fa-map-marker-alt"></i> {{ $item->numberhouse .', '. $item->wards->name_xaphuong .', '. $item->province->name_quanhuyen .', '. $item->city->name_city }}
              </div>
            {{-- </div> --}}
            <div class="d-flex align-items-center justify-content-between">
              <button type="button" class="btn btn-outline-primary btn-sm mb-0 px-2">View Project</button>
              <button type="button" class="btn btn-outline-primary btn-sm mb-0 px-2">Edit Project</button>
            </div>
          </div>
        </div>
        </div>
        
        @endforeach
      </div>
    
  </div>
  {{-- <div class="row">
    @foreach ($post as $item)
    <div class="col-md-4">
      <div class="article-card" data-id="61a88fbd32c75a0019884c2a" data-category-id="5deb722db4367252525c1d00" >
        <div class="article-card-head" style="">
          <div class="card-head-img" >
              <a href="{{ route('post.detail', ['id'=>$item->id]) }}" class="call-traking"></a>
              <img class="card-image-top lazy" src="{{ $item->image_path }}">
          </div>
          <div class="card-head-function " >
              <div class="list-function">
                <button class="btn-custom btn-func function-heart" id="btn-favorite-61a88fbd32c75a0019884c2a" data-article-id="61a88fbd32c75a0019884c2a" >Bán gấp</button>
              </div>
          </div>
        </div>
        <div class="article-card-body p-2" >
          <div class="card-title text-uppercase" >
              <a href="{{ route('post.detail', ['id'=>$item->id]) }}" class="call-traking">
                    Chính chủ cần bán 470m2 đất thổ cư, đường ô tô, giá đầu tư, Sóc Sơn, Hà Nội
              </a>
          </div>
          <div class="article-info">
              <div class="article-price" >
                <i class="fas fa-dollar-sign"></i> 3.06 Tỷ - 6.5 Triệu/m²
              </div>
          </div>
          <div class="article-info-detail row">
              <div class="col-md-6">
                <div class="article-info-detail-item no-wrap items-center " data-toggle="tooltip" data-placement="top" title="" data-original-title=" Diện tích: 470 m²">
                  <i class="far fa-clone"></i> 470 m²
                </div>
              </div>
              <div class="col-md-6">
                <div class="article-info-detail-item no-wrap items-center " data-toggle="tooltip" data-placement="top" title="" data-original-title="Đường rộng: Mặt phố - Mặt đường" >
                  <i class="fas fa-road"></i> Mặt phố - Mặt đường
                </div>
              </div>
              
              <div class="col-md-6">
                <div class="article-info-detail-item no-wrap items-center " data-toggle="tooltip" data-placement="top" title="" data-original-title="Đối tượng: Chính chủ">
                  <i class="fas fa-user"></i> Chính chủ
                </div>
              </div>
              <div class="col-md-6">
                <div class="article-info-detail-item no-wrap items-center " data-toggle="tooltip" data-placement="top" title="" data-original-title="Loại nhà đất: Đất - Đất nền - Nhà như đất" style="white-space: nowrap; text-overflow: ellipsis; overflow: hidden;">
                  <i class="fas fa-city"></i> Đất - Đất nền - Nhà như đất
                </div>
              </div>
          </div>
          <div class="article-info-location" data-toggle="tooltip" data-placement="top"  data-original-title="Vị trí" style="font-size: 14px;">
              <i class="fas fa-map-marker-alt"></i> Huyện Sóc Sơn, Thành phố Hà Nội
          </div>
        </div>
        <div class="article-card-footer p-2 text-end" >
          <a  class="no-wrap items-center chip-content-footer icon-messenge tracking-chat" data-article-id="61a88fbd32c75a0019884c2a" href="javascript:void(0)" >
            <i class="far fa-comment-dots"></i> Chat ngay</a>
        </div>
      </div>
    </div>
      
     @endforeach
    
  </div> --}}
@endsection