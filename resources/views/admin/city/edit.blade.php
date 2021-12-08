@extends('layout.admin')

@section('title')
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
            // alert(action);
            // alert(ma_id);
            // alert(_token);
                if (action==='city') 
                {
                  result='province';

                }else{
                    result='wards';
                }
                $.ajax({
                    url:"/delivery",
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
              <li class="breadcrumb-item active">Add</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
<div class="content-wrapper">
   
   
    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
            <form action="{{route('city.update',['id'=>$apartmentnumber->id])}}"method="post">
              @csrf
                    <div class="form-group">
                        <label>Chọn City</label>
                        <select class="form-control choose city" name="city" id="city">
                        <option value="{{$apartmentnumber->matp}}">{{$apartmentnumber->citys->name_city}}</option>
                            @foreach($city as $key => $citys)
                        <option value="{{$citys->matp}}">{{$citys->name_city}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Chọn Province</label>
                        <select class="form-control province choose" name="province" id="province">
                        <option value="{{$apartmentnumber->maqh}}">{{$apartmentnumber->province->name_quanhuyen}}</option>
                        
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Chọn Wards</label>
                        <select class="form-control wards" name="wards" id="wards" >
                        <option value="{{$apartmentnumber->xaid}}">{{$apartmentnumber->wards->name_xaphuong}}</option>
                        
                        </select>
                    </div>
                    <div class="form-group">
                        <label >Số Nhà</label>
                        <input type="text" value="{{$apartmentnumber->apartmentnumber}}" class="sonha" name="sonha">
                    </div>
                    
                    
                    <button type="submit" name="add_delivery" class="btn btn-default update add_delivery">Thêm số Nhà</button>
            </form>
            </div>
        </div>
      </div>
    </div>
  </div>
@endsection