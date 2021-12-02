<!-- resources/views/child.blade.php -->

@extends('layout.admin')

@section('title')
<title>Role </title>
@endsection

@section('css')
<link rel="stylesheet" href="{{asset('admins/slider/add.css')}}">
@endsection
@section('js')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script src="{{asset('vendors/sweetAlert2/sweetalert2@11.js')}}"></script>
<script src="{{asset('admins/slider/index/index.js')}}"></script>
@endsection
@section('content')
    

<div class="content-wrapper">
    


    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
                  <a href="{{route('roles.create')}}" class="btn btn-success float-right m-2">ADD</a>
          </div>
          <div class="col-md-12">
                     <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Tên vai trò</th>
                            <th scope="col">Mô tả vai trò</th>
                           
                            <th scope="col">Action</th>
                            
                          </tr>
                        </thead>  
                        <tbody>
                          @foreach($role as $roleItem)
                          <tr>
                            <th scope="row">{{$roleItem->id}}</th>
                            <td>
                            <span class="badge badge-sm bg-gradient-success">{{$roleItem->name}}</span>  

                            </td>
                            <td>{{$roleItem->display_name}}</td>
                            
                            <td>
                               <a href="{{route('roles.edit',['id'=>$roleItem->id])}}"class="btn btn-default">Edit</a>
                               <a href=""data-url="{{route('roles.delete',['id'=>$roleItem->id])}}"class="btn btn-danger actionDelete">Delete</a>
                            </td>
                          </tr>
                          @endforeach
                         
                        </tbody>
                        
                   </table>
          </div>
          {{$role->links()}}
           <div>
           
           </div>      
        </div>
        
      </div>
    </div>

  </div>

@endsection

