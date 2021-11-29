@extends('layout.admin')

@section('title')

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
            <h3 class="m-0">Slider</h3>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Home</a></li>
              <li class="breadcrumb-item active">List</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <a style="margin-left:1100px;" href="{{route('admin.slider.add')}}"class="btn btn-success">ADD</a>
        </div>
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6>Authors table</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">#</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Image</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Name</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Description</th>
                      <th class="text-secondary opacity-7"></th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($slider as $sliders)
                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div>
                           
                          </div>
                          
                            <h6 class="mb-0 text-sm">{{$sliders->id}}</h6>
                          
                          </div>
                        </div>
                      </td>
                      <td>
                      <img src="{{$sliders->image_path}}" class="avatar" alt="user1">
                        
                      </td>
                      <td class="">
                        <span class="badge badge-sm bg-gradient-success">{{$sliders->name}}</span>
                      </td>
                      <td class="">
                        <span class="text-secondary text-xs font-weight-bold">{{$sliders->discription}}</span>
                      </td>
                      <td class="align-middle">
                      <a href="{{route('slider.edit',['id'=>$sliders->id])}}"class="btn btn-default">Edit</a>
                      <a href=""data-url="{{route('slider.delete',['id'=>$sliders->id])}}"class="btn btn-danger actionDelete">Delete</a>
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