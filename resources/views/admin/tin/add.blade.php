@extends('layout.admin')

@section('title')
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
<form action="{{route('tin.store')}}"method="post" enctype="multipart/form-data">
  @csrf

  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h3 class="m-0">City</h3>
        </div><!-- /.col -->
        
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <div class="content-wrapper">
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="form-group col-md-3">
            <label>Chọn Tỉnh/ Thành phố</label>
            <select class="form-control choose city" name="city" id="city">
            <option value="">--Chọn tỉnh thành phố--</option>
                @foreach($city as $key => $citys)
            <option value="{{$citys->matp}}">{{$citys->name_city}}</option>
                @endforeach
            </select>
          </div>
          <div class="form-group col-md-3">
            <label>Chọn Quận/ Huyện</label>
            <select class="form-control province choose" name="province" id="province">
            <option value="">--Chọn quận huyện--</option>
            </select>
          </div>
          <div class="form-group col-md-3">
            <label>Chọn Xã/ Phuòng</label>
            <select class="form-control wards choose" name="wards" id="wards" >
            <option value="">--Chọn xã phường--</option>
            </select>
          </div>
          <div class="form-group col-md-3">
            <label >Số Đường/Phố</label>
          <div class="sonha" id="sonha" name="sonha">
            <input type="text" class="form-control">
          </div>
        </div>
        <div class="row">
          <div class="form-group col-md-3">
            <label>Chọn Nhu Cầu</label>
            <select name="need" class="form-control" id="" >
              <option value="">Chọn nhu cầu</option>
              @foreach ($needs as $need)
                <option value="{{ $need->id }}">{{ $need->name }}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group col-md-3">
              <label>Loại nhà đất</label>
              <select name="housingtype" class="form-control" id="">
                @foreach ($housingtypes as $housingtype)
                  <option value="">Chọn loại hình nhà đất</option>
                  <option value="{{ $housingtype->id }}">{{ $housingtype->name }}</option>
                @endforeach
              </select>
          </div>
          
          <div class="form-group col-md-3">
              <label >Ảnh đại diện</label>
              <input type="file" class="form-control-file" placeholder=" Nhập tên sản phẩm    " name="feature_image">
          </div>
          <div class="form-group col-md-3">
              <label >Ảnh chi tiết</label>
              <input type="file" multiple class="form-control-file" placeholder=" Nhập tên sản phẩm    " name="image_path[]">
          </div>  
        </div>
        <div class="row">
          <div class="col-md-4">
            <label >Số Tầng </label>
            <div class="form-group">
                <input class="orm-control border-radius-lg shadow-sm" name="quantityfloor" type="number" min=1>
            </div>

          </div>
          <div class="col-md-4">
            <label >Phòng Ngủ</label>
            <div class="form-group">
              <input class="orm-control border-radius-lg shadow-sm" name="quantitybed" type="number" min=1>
            </div>

          </div>
          <div class="col-md-4">
            <label >Phòng Tắm</label>
            <div class="form-group">
                <input class="orm-control border-radius-lg shadow-sm" name="quantitybath" type="number" min=1>
            </div>
          </div>
          <div class="col-md-4">
            <label >Diện Tích (m2)</label>
            <div class="form-group ">
                <input class="border-radius-lg shadow-sm" name="dientich" type="text">
            </div>

          </div>
          <div class="col-md-4">
            <label >Giá Khoảng(1đ/m2)</label>
            <div class="form-group ">
                <input class=" border-radius-lg shadow-sm" name="price" type="text">
            </div>

          </div>
                    
        </div> 
        <div class="row">
          <div class="col-md-12">
            <label >Tiêu đề</label>
            <div class="form-group ">
                <input class="form-control" name="title" type="text" placeholder="Tiêu đề">
            </div>

          </div>
          <div class="md-form amber-textarea active-amber-textarea-2">
            <i class="fas fa-pencil-alt prefix"></i>
            <label for="form24">Mô tả chi tiết</label>
            <textarea name="description" id="form24" class="md-textarea form-control" rows="3"></textarea>
          </div>
        </div> 
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h3 class="m-0">Thông tin người đăng</h3>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <div class="content-wrapper">
    <div class="content">
      <div class="container-fluid">
        
        <div class="row">
          <div class="col-md-6">
            <label >Họ và tên</label>
            <div class="form-group ">
                <input class="form-control" name="nameuser" type="text" placeholder="Họ và tên">
            </div>
          </div>
          <div class="col-md-6">
            <label >Số điện thoại</label>
            <div class="form-group ">
                <input class="form-control" name="phone" type="text" placeholder="Số điện thoại">
            </div>
          </div>
          <div class="col-md-6">
            <label >Email</label>
            <div class="form-group ">
                <input class="form-control" name="email" type="email" placeholder="Email">
            </div>
          </div>
          
        </div> 
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h3 class="m-0">Chọn gói đăng tin</h3>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <div class="content-wrapper">
    <div class="content">
      <div class="container-fluid">
        
        <div class="row">
          <div class="col-md-6">
            <label >Số ngày đăng</label>
            <div class="form-group">
              <select class="form-control" name="quantity_daypost" id="choose_quantity">
                @foreach ($daypost as $item)
                  <option  value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
              </select>

            </div>
            
          </div>
          <div class="col-md-6">
            <label >Ngày đăng</label>
            <div class="form-group ">
                <input class="form-control" name="daypost" id="day_post" name="created" type="date" value="">
            </div>
          </div>
          <div class="col-md-12">
            <label >Giá gói cước</label>
            <div class="form-group ">
                <input class="form-control " id="price_post" name="text" disabled type="text" value="500000">
            </div>
          </div>
          
        </div> 
          </div>
        </div>
      </div>
    </div>
  </div>
  <button type="submit"class=" btn btn-success update add_delivery">Đăng tin</button>

</form>

@endsection