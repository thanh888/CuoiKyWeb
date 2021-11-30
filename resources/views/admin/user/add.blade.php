<!-- resources/views/child.blade.php -->

@extends('layout.admin')

@section('title')
<title>ADD </title>
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
            <form action="{{route('users.store')}}"method="post" enctype="multipart/form-data">
              @csrf
                    <div class="form-group">
                        <label >Tên</label>
                        <input type="text" class="form-control" value="{{old('name')}}" placeholder=" Nhập tên    " name="name">
                      
                    </div>
                    <div class="form-group">
                        <label >Email</label>
                        <input type="text" class="form-control" value="{{old('email')}}" placeholder=" Nhập tên email    " name="email">
                        
                    </div>
                    <div class="form-group">
                        <label >Password</label>
                        <input type="text" class="form-control" value="{{old('password')}}" placeholder=" Nhập tên password    " name="password">
                        
                    </div>
                    <div class="form-group">
                        <label >Nhận Vai Trò</label>
                        <select name="role_id[]" class="form-control select2_init" multiple>
                            <option value="">admin</option>
                            @foreach($role as $roleItem)
                            <option value="{{$roleItem->id}}">{{$roleItem->name}}</option>
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

