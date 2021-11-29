@extends('layout.admin')

@section('title')
@section('js')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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
         that.parent().parent().remove();
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

    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <a style="margin-left:1100px;" href="{{route('admin.city.add')}}"class="btn btn-success">ADD</a>
        </div>
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6>City table</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">#</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">City</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Province</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Wards</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Apartmentnumber</th>

                      <th class="text-secondary opacity-7"></th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($city as $citys)
                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div>
                           
                          </div>
                          
                            <h6 class="mb-0 text-sm">{{$citys->id}}</h6>
                          
                          </div>
                        </div>
                      </td>
                      <td>
                      <span class="badge badge-sm bg-gradient-success">{{$citys->citys->name_city}}</span>
                        
                      </td>
                      <td class="">
                        <span class="badge badge-sm bg-gradient-success">{{$citys->province->name_quanhuyen}}</span>
                      </td>
                      <td class="">
                        <span class="badge badge-sm bg-gradient-success">{{$citys->wards->name_xaphuong}}</span>
                      </td>
                      <td class="">
                        <span class="badge badge-sm bg-gradient-secondary">{{$citys->apartmentnumber}}</span>
                      </td>
                      <td class="align-middle">
                      <a href="{{route('city.edit',['id'=>$citys->id])}}"class="btn btn-default">Edit</a>
                      <a href=""data-url="{{route('city.delete',['id'=>$citys->id])}}"class="btn btn-danger actionDelete">Delete</a>
                      </td>
                    </tr>
                   @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      
    </div>
    
@endsection