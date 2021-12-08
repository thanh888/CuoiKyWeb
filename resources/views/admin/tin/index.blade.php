


@extends('layout.admin')

@section('title')
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
  }
  .card-title{
    font-weight: 600; 
    font-size: 15px;
    white-space: nowrap;
    text-overflow: ellipsis;
    overflow: hidden;
  }
  .article-price{
    font-size: 14px;
    font-weight: 700;
  }
  .article-info-detail-item{
    white-space: nowrap; 
    text-overflow: ellipsis; 
    overflow: hidden;
    font-size: 13px;
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
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3 class="m-0">Đăng Tin</h3>
          </div><!-- /.col -->
          <div class="col-sm-6">
              <a href="{{route('tin.create')}}"class="btn btn-success">ADD</a>
          </div><!-- /.col -->
        </div><!-- /.row -->
        <div class="row">
        
          <div class="col-md-12">
            <div class="table-responsive p-0">
              <table class="table align-items-center mb-0">
                <thead>
                  <tr>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Người đăng</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Nhu cầu</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Sản phẩm</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Ngày đăng</th>
                    <th class="text-secondary opacity-7"></th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($tin as $itemTin)
                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                          {{-- <div>
                            <img src="../assets/img/team-4.jpg" class="avatar avatar-sm me-3" alt="user6">
                          </div> --}}
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">{{ $itemTin->InforUser->name }}</h6>
                            <p class="text-xs text-secondary mb-0">{{ $itemTin->InforUser->email }}</p>
                          </div>
                        </div>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0">{{ $itemTin->need->name }}</p>
                        <p class="text-xs text-secondary mb-0">{{ $itemTin->housingtype->name }}</p>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <span class="text-xs ">{{$itemTin->title}}</span>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">{{ $itemTin->daypost }}</span>
                      </td>
                      <td class="align-middle">
                        <a href="{{ route('tin.edit', ['id'=>$itemTin->id]) }}" class="text-success  badge badge-sm bg-gradient-secondary"  data-toggle="tooltip" data-original-title="Edit user">
                          Edit
                        </a>
                        <a href="" class="text-danger   badge badge-sm bg-gradient-secondary" data-toggle="tooltip" data-original-title="Edit user">
                          delete
                        </a>
                      </td>
                    </tr>
                      
                  @endforeach

                </tbody>
              </table>
              
              
              </div>
              {{ $tin->links() }}

            </div>
          
             
        </div>
        
       
      </div><!-- /.container-fluid -->
    </div>


@endsection
