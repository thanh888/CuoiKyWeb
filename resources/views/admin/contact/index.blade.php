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
          <div class="col-md-6">
                     <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>  
                        <tbody>
                          @foreach($data as $us)
                          <tr>
                            <th scope="row">{{ $us->id }}</th>
                            <td>
                              <span class="badge badge-sm bg-gradient-success">{{ $us->name }}</span>  
                            </td>
                            <td>
                               <a href="{{route('admincontact.view',['id'=>$us->id])}}"class="btn btn-default"><i class="fas fa-eye"></i></a>
                            </td>
                          </tr>
                          @endforeach
                         
                        </tbody>
                        
                   </table>
                   {{-- {{ $users->links()}} --}}
          </div>
           <div>
           
           </div>      
        </div>
        
      </div>
    </div>

  </div>

@endsection

