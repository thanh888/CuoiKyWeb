<!-- resources/views/child.blade.php -->

@extends('layout.admin')

@section('title')
<title>Admin </title>
@endsection

@section('css')
<link rel="stylesheet" href="{{asset('admins/slider/add.css')}}">
@endsection
@section('js')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{asset('vendors/sweetAlert2/sweetalert2@11.js')}}"></script>
<script src="{{asset('admins/user/index.js')}}"></script>
@endsection
@section('content')
    

<div class="content-wrapper">
    
    
 


    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
                  <a href="{{route('users.create')}}" class="btn btn-success float-right m-2">ADD</a>
          </div>
          <div class="col-md-12">
                     <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Tên</th>
                            <th scope="col">Email</th>
                            
                            <th scope="col">Action</th>
                            
                          </tr>
                        </thead>  
                        <tbody>
                          @foreach($users as $usersItem)
                          <tr>
                            <th scope="row">{{$usersItem->id}}</th>
                            <td>{{$usersItem->name}}</td>
                            <td>{{$usersItem->email}}</td>
                            
                            <td>
                               <a href="{{route('users.edit',['id'=>$usersItem->id])}}"class="btn btn-default">Edit</a>
                               <a href=""data-url="{{route('users.delete',['id'=>$usersItem->id])}}"class="btn btn-danger actionDelete">Delete</a>
                            </td>
                          </tr>
                          @endforeach
                         
                        </tbody>
                        
                   </table>
                   {{ $users->links()}}
          </div>
           <div>
           
           </div>      
        </div>
        
      </div>
    </div>

  </div>

@endsection

