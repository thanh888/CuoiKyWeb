<!-- resources/views/child.blade.php -->

@extends('layout.admin')

@section('title')
<title>ADD </title>
@endsection
@section('css')
<link rel="stylesheet" href="{{asset('admins/role/add.css')}}">
@endsection
@section('js')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{asset('admins/role/add.js')}}"></script>

</script>
@endsection
@section('content')
    
<div class="content-wrapper">
   
    <div class="content">
      <div class="container-fluid">
        <div class="row">
        <form action="{{route('roles.update',['id'=>$role->id])}}"method="post" enctype="multipart/form-data" style="width:100%;">
            <div class="col-md-10">
              @csrf
                    <div class="form-group">
                        <label >Tên Vai Trò</label>
                        <input type="text" class="form-control" value="{{$role->name}}" placeholder=" Nhập tên vai trò    " name="name">
                       
                    </div>
                    <div class="form-group">
                        <label >Mô Tả Vai Trò</label>
                        <textarea class="form-control " name="display_name"  rows="4">
                        {{$role->display_name}}
                        </textarea>
                        
                    </div>
                    
                   
            </div>
            <div class="col-md-10">
                <div class="row">
                <div class="col-md-12">
                        <label>
                            <input type="checkbox" class="checkall">
                            check all
                        </label>
                    </div>
                    @foreach($permissionParent as $permissionParentItem)
                <div class="card text-white col-mb-3 dai">
                    <div class="card-header" style="color:red" >
                    <label for="">
                        <input type="checkbox" class="checkbox_wrapper">
                    </label>    
                    {{$permissionParentItem->name}}
                </div>

                    <div class="row">
                    @foreach($permissionParentItem->permissionChildrent as $permissionChildrentItem)
                    <div class="card-body bg-success ">
                        <h5 class="card-title">
                        <label for="" >
                        <input type="checkbox"{{$permissionChecked->contains('id',$permissionChildrentItem->id)?'checked':''}} name="permission_id[]" class="checkbox_childrent" value="{{$permissionChildrentItem->id}}">
                    </label>        
                        {{$permissionChildrentItem->name}}</h5>
                    </div>
                    
                    @endforeach
                    </div>
                    </div>
                    @endforeach
                </div>

                
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
         </form>
        </div>
      </div>
    </div>
  </div>

@endsection

