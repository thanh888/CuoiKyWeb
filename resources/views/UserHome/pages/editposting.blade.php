@extends('UserHome.layout.layout')
@section('css')

<style>
  .active-amber-textarea-2 textarea.md-textarea {
    border-bottom: 1px solid #ffa000;
    box-shadow: 0 1px 0 0 #ffa000;
  }
  .active-amber-textarea-2.md-form label.active {
    color: #ffa000;
  }
  .active-amber-textarea-2.md-form label {
    color: #ffa000;
  }
  .active-amber-textarea-2.md-form .prefix {
    color: #ffa000;
  }
  .active-amber-textarea-2.md-form textarea.md-textarea:focus:not([readonly])+label {
    color: #ffa000;
  }
  .product_image_150_10
{
    width: 100px;
    height: 100px;
    overflow: hidden;
    object-fit: cover;
}
.ok{
    padding: 5px;
}
</style>
@endsection
@section('js')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
      var today = new Date();
      var dd = today.getDate();
      var mm = today.getMonth() + 1; //January is 0!
      var yyyy = today.getFullYear();

      if (dd < 10) {
        dd = '0' + dd;
      }
      if (mm < 10) {
        mm = '0' + mm;
      }   
      today = yyyy + '-' + mm + '-' + dd;
      $('#day_post').attr('min', today );
      $('#day_post').val(today);

      

      $('.choose').on('change',function()
       {
            var action=$(this).attr('id');
            var ma_id=$(this).val();
            var _token=$('input[name="_token"]').val();
            var result='';  
            //   alert(action);
            //   alert(ma_id);
            //   alert(_token);
              if (action==='city') 
                {
                  result='province';

                }else if(action==='province'){
                    result='wards';
                }
                $.ajax({
                    url:"/delivery/sonha",
                    method:'POST',
                    data:{action:action,ma_id:ma_id,_token:_token},
                    success:function(data){
                      $('#'+result).html(data);
                    }
                });
       });

       $('#choose_quantity').on('change',function()
       {
            // var action=$(this).attr('id');
            // alert(1);
            var id=$(this).val();
            var _token=$('input[name="_token"]').val();
            // var result='';  
              $.ajax({
                  url:"/delivery/songay",
                  method:'POST',
                  data:{id:id,
                        _token:_token
                        },
                  success:function(data){
                    $('#price_post').val(data);

                  }
              });
       });
    });  
</script>
@endsection

@section('content')
<section class="intro-single">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-lg-8">
          <div class="title-single-box">
            <h1 class="title-single">Chỉnh sửa bài viết</h1>
            <span class="color-text-a">Các bạn có thể liên hệ với chúng tôi bằng những hình thức dưới đây.</span>
          </div>
        </div>
        <div class="col-md-12 col-lg-4">
          <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="{{ route('home.index') }}">Trang chủ</a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">
                Liên hệ
              </li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </section>
  <!--/ Intro Single End /-->

  <form action="{{route('post.update',['id'=>$tin->id])}}"method="post" enctype="multipart/form-data">
    @csrf
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3 class="m-0">City</h3>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container -->
    </div>
    <div class="content-wrapper">
      <div class="content">
        <div class="container">
          <div class="row" style="line-height: 3">
              <div class="form-group col-md-3">
                  <label>Chọn city</label>
                  <select class="form-control choose city" name="city" id="city">
                  <option value="{{$tin->matp}}">{{$tin->city->name_city}}</option>
                      @foreach($city as $key => $citys)
                  <option value="{{$citys->matp}}">{{$citys->name_city}}</option>
                      @endforeach
                  </select>
                  
              </div>
              <div class="form-group col-md-3">
                  <label>Chọn quận huyện</label>
                  <select class="form-control province choose" name="province" id="province">
                  <option  value="{{$tin->maqh}}">{{$tin->province->name_quanhuyen}}</option>
                  
                  </select>
              </div>
              <div class="form-group col-md-3">
                  <label>Chọn xã phường</label>
                  <select class="form-control wards choose" name="wards" id="wards" >
                  <option value="{{$tin->xaid}}">{{$tin->wards->name_xaphuong}}</option>
                  
                  </select>
              </div>
              <div class="form-group col-md-3">
                  <label >Số Nhà</label>
                  <div class="sonha" id="sonha" name="sonha">
                      <input name="sonha"  class="form-control " value="{{$tin->numberhouse}}" type="text">
            
                  </div>
              </div>
          </div>
          <div class="row" style="line-height: 3">
                      
            <div class="form-group col-md-3">
              <label>Chọn Nhu Cầu</label>
              <select name="need" class="form-control" id="" >
                <option value="">Chọn nhu cầu</option>
                @foreach ($needs as $need)
                  <option {{ $needed==$need->id ? 'selected': '' }} value="{{ $need->id }}">{{ $need->name }}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group col-md-3">
                <label>Loại nhà đất</label>
                <select name="housingtype" class="form-control" id="">
                  <option value="">Chọn loại hình nhà đất</option>
                  @foreach ($housingtypes as $housingtype)
                    <option {{ $housingtyped==$housingtype->id? 'selected': '' }} value="{{ $housingtype->id }}">{{ $housingtype->name }}</option>
                  @endforeach
                </select>
            </div>
            
          </div>
          <div class="row" style="line-height: 3">
            <div class="col-md-6">
              <label >Ảnh đại diện</label>
              <div class="form-group ">
                  <input type="file" class="form-control" placeholder="Chọn ảnh" name="feature_image">
                  <img  class="m-3 product_image_150_10 border-radius-lg shadow-sm" src="{{$tin->image_path}}" alt="">
              </div>
  
            </div>
            <div class="col-md-6">
              <label >Ảnh chi tiết</label>
              <div class="form-group ">
                <input type="file" multiple class="form-control" placeholder=" Nhập tên sản phẩm    " name="image_path[]">
                  @foreach($tin->tinImage as $tins )
                          
                    <img class="m-3 product_image_150_10 ok border-radius-lg shadow-sm" src="{{$tins->image_path}}" alt="">
                          
                  @endforeach
              </div>  
  
            </div>
            
          </div>
          <div class="row" style="line-height: 3">
            <div class="col-md-4">
              <label >Số Tầng </label>
              <div class="form-group">
                  <input value="{{ $tin->quantityfloor }}" class="form-control border-radius-lg shadow-sm" name="quantityfloor" type="number" min=1>
              </div>
  
            </div>
            <div class="col-md-4">
              <label >Phòng Ngủ</label>
              <div class="form-group">
                <input value="{{ $tin->quantitybed }}" class="form-control border-radius-lg shadow-sm" name="quantitybed" type="number" min=1>
              </div>
  
            </div>
            
            <div class="col-md-4">
              <label >Phòng Tắm</label>
              <div class="form-group">
                  <input value="{{ $tin->quantitybath }}" class="form-control border-radius-lg shadow-sm" name="quantitybath" type="number" min=1>
              </div>
            </div>
            <div class="col-md-4">
              <label >Diện Tích (m2)</label>
              <div class="form-group ">
                  <input value="{{ $tin->large }}" class="form-control border-radius-lg shadow-sm" name="dientich" type="text">
              </div>
  
            </div>
            <div class="col-md-4">
              <label >Giá Khoảng(1đ/m2)</label>
              <div class="form-group ">
                  <input value="{{ $tin->price }}" class=" form-control border-radius-lg shadow-sm" name="price" type="text">
              </div>
  
            </div>
                      
          </div> 
          <div class="row" style="line-height: 3">
            <div class="col-md-12">
              <label >Tiêu đề</label>
              <div class="form-group ">
                  <input class="form-control" name="title" type="text" value="{{ $tin->title }}" placeholder="Tiêu đề">
              </div>
  
            </div>
            <div class="md-form amber-textarea active-amber-textarea-2">
              <i class="fas fa-pencil-alt prefix"></i>
              <label for="form24">Thông tin chi tiết</label>
              <textarea name="description" id="form24" class="md-textarea form-control" rows="3">{{ $tin->description }}</textarea>
            </div>
          </div> 
           
          </div>
        </div>
      </div>
    </div>
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3 class="m-0">Thông tin người đăng</h3>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container -->
    </div>
    <div class="content-wrapper">
      <div class="content">
        <div class="container">
          
          <div class="row" style="line-height: 3">
            <div class="col-md-6">
              <label >Họ và tên</label>
              <div class="form-group ">
                <input class="form-control" name="nameuser" type="text" placeholder="Họ và tên" value="{{ $tin->InforUser->name }}">
              </div>
            </div>
            <div class="col-md-6">
              <label >Số điện thoại</label>
              <div class="form-group ">
                  <input class="form-control" name="phone" type="text" placeholder="Số điện thoại" value="{{ $tin->InforUser->phone }}">
              </div>
            </div>
            <div class="col-md-6">
              <label >Email</label>
              <div class="form-group ">
                  <input class="form-control" name="email" type="email" placeholder="Email" value="{{ $tin->InforUser->email }}">
              </div>
            </div>
            
          </div> 
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3 class="m-0">Chọn gói đăng tin</h3>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container -->
    </div>
    <div class="content-wrapper">
      <div class="content">
        <div class="container">
          <div class="row" style="line-height: 3">
            <div class="col-md-6">
              <label >Số ngày đăng</label>
              <div class="form-group">
                <select class="form-control" name="quantity_daypost" id="choose_quantity">
                  @foreach ($daypost as $item)
                    <option {{ $item->id == $tin->quantity_daypost_id ?'selected': '' }}  value="{{ $item->id }}">{{ $item->name }}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="col-md-6">
              <label >Ngày đăng</label>
              <div class="form-group ">
                  <input class="form-control" name="daypost" id="day_post" name="created"  type="date" value="{{ $tin->daypost }}">
              </div>
            </div>
            <div class="col-md-12">
              <label >Giá gói cước</label>
              <div class="form-group ">
                  <input class="form-control " id="price_post" name="text" disabled type="text" value="{{ $tin->quantitydaypost->price }}">
              </div>
            </div>
          </div> 
            </div>
          </div>
        </div>
      </div>
    </div>
    <button type="submit"class="btn btn-success update add_delivery">Sửa tin</button>
  </form>

@endsection