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
                }else{
                  result='sonha';
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

  
    });
</script>
@endsection

@endsection


@section('content')
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3 class="m-0">City</h3>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Trang Chu</a></li>
              <li class="breadcrumb-item active">List</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
<div class="content-wrapper">
   
   
    <div class="content">
      <div class="container-fluid">
      <form action="{{route('tin.store')}}"method="post" enctype="multipart/form-data">
              @csrf
        
        <div class="row">
            
                    <div class="form-group col-md-3">
                        <label>Chọn City</label>
                        <select class="form-control choose city" name="city" id="city">
                        <option value="">--Chọn tỉnh thành phố--</option>
                            @foreach($city as $key => $citys)
                        <option value="{{$citys->matp}}">{{$citys->name_city}}</option>
                            @endforeach
                        </select>
                        
                    </div>
                    <div class="form-group col-md-3">
                        <label>Chọn Province</label>
                        <select class="form-control province choose" name="province" id="province">
                        <option value="">--Chọn quận huyện--</option>
                        
                        </select>
                    </div>
                    <div class="form-group col-md-3">
                        <label>Chọn Wards</label>
                        <select class="form-control wards choose" name="wards" id="wards" >
                        <option value="">--Chọn xã phường--</option>
                        
                        </select>
                    </div>
                    <div class="form-group col-md-3">
                        <label >Số Nhà</label>
                        
                    <div class="sonha" id="sonha" name="sonha">
                        
					    
              
                    </div>
            </div>
        <div class="row">
                    
                    <div class="form-group col-md-2">
                        <label>Area</label>
                        <select name="area" class="form-control" id="">
                        <option>Chọn Area</option>
                        <option>Mỹ</option>
                        <option>Việt Nam</option>
                        <option>Anh</option>
                        <option>Trung Quốc</option>
                        <option>Pháp</option>
                        </select>
                    </div>
                    <div class="form-group col-md-3">
                        <label>Chọn Nhu Cầu</label>
                        <select name="nhucau" class="form-control" id="">
                        <option>Nhu Cầu</option>
                        <option>Bán</option>
                        <option>Thuê</option>
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
                    <div class="form-group col-md-2">
                        <label >Số Tầng </label>
                        
                        <div class="" id="" name="">
                        <input class="border-radius-lg shadow-sm" name="quantityfloor" type="number" min=1>
					              </div>
                    </div>
                    <div class="form-group col-md-2">
                        <label >Phong Ngủ</label>
                        
                        <div class="" id="" name="">
                        <input class="border-radius-lg shadow-sm" name="quantitybed" type="number" min=1>
					              </div>
                    </div>
                    <div class="form-group col-md-2">
                        <label >Phòng Tắm</label>
                        
                        <div class="" id="" name="">
                        <input class="border-radius-lg shadow-sm" name="quantitybath" type="number" min=1>
					              </div>
                    </div>
        </div>
        <div class="row">
                    <div class="form-group col-md-2">
                        <label >Diện Tích</label>
                        
                        <div  class="" id="" name="">
                        <input class="border-radius-lg shadow-sm" name="dientich" type="text">
					              </div>
                    </div>
                    <div class="form-group col-md-2">
                        <label >Gía Khoảng</label>
                        
                        <div class="" id="" name="">
                        <input class="border-radius-lg shadow-sm" name="price" type="text">
					              </div>
                    </div>
                    
        </div> 
        <div class="row">
        <div class="md-form amber-textarea active-amber-textarea-2">
          <i class="fas fa-pencil-alt prefix"></i>
          <textarea name="description" id="form24" class="md-textarea form-control" rows="3"></textarea>
          <label for="form24">Thông tin tổng quát(ghi rõ cách liên lạc)</label>
        </div>
        </div> 
                    
                    <button type="submit"class="btn btn-success update add_delivery">Đăng tin</button>
           
            </div>
        </div>
        </form>
      </div>
    </div>
  </div>
@endsection