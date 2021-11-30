<!-- resources/views/child.blade.php -->

@extends('layout.admin')

@section('title')
<title>Edit </title>
@endsection
@section('css')
<link href="{{asset('vendors/select2/select2.min.css')}}" rel="stylesheet" />
<link href="{{asset('admins/user/add.css')}}" rel="stylesheet" />
@endsection
@section('js')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script src="{{asset('vendors/select2/select2.min.js')}}"></script>
<script src="{{asset('admins/user/add.js')}}"></script>

@endsection
@section('content')
    
<div class="content-wrapper">
   
  
    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
            <form action="{{route('users.update',[$user->id])}}"method="post" enctype="multipart/form-data">
              @csrf
                    <div class="form-group">
                        <label >Tên</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{$user->name}}" placeholder=" Nhập tên    " name="name">
                        
                    </div>
                    <div class="form-group">
                        <label >Email</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{$user->email}}" placeholder=" Nhập tên email    " name="email">
                        
                    </div>
                    <div class="form-group">
                        <label >Password</label>
                        <input type="password" class="form-control @error('name') is-invalid @enderror"  placeholder=" Nhập tên password    " name="password">
                       
                    </div>
                    <div class="form-group">
                        <label >Nhận Vai Trò</label>
                        <select name="role_id[]" class="form-control select2_init">
                            <option value="">admin</option>
                            @foreach($role as $roleItem)
                            <option
                            {{$rolesOfUser->contains('id',$roleItem->id)?'selected':''}}
                            value="{{$roleItem->id}}">{{$roleItem->name}}</option>
                            @endforeach

                        </select>
                        
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            </div>
        </div>
      </div>
    </div>
  </div>

@endsection

