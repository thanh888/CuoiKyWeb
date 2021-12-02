 <!-- resources/views/child.blade.php -->

@extends('layout.admin')

@section('title')
<title>Setting </title>
@endsection

@section('css')
<!-- CSS only -->
<link rel="stylesheet" href="{{asset('admins/setting/index.css')}}">
@endsection
@section('js')

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script src="{{asset('vendors/sweetAlert2/sweetalert2@11.js')}}"></script>
<script src="{{asset('admins/setting/index.js')}}"></script>
@endsection
@section('content')
    

<div class="content-wrapper">
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
          
          
        
                <div class="btn-group float-right">
                    <a class="btn dropdown-toggle btn-primary" href="{{route('settings.create').'?type=Text'}}" data-toggle="dropdown">
                      Add Setting Text
                      <span class="caret"></span>
                    </a>
                    
                  </div>
                  <div class="btn-group float-right">
                    <a class="btn dropdown-toggle btn-primary"href="{{route('settings.create').'?type=Textarea'}}" >
                      Add Setting Textarea
                      <span class="caret"></span>
                    </a>
                    
                  </div>
          </div>
          <div class="col-md-12">
                     <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Config Key</th>
                            <th scope="col">Config Value</th>
                            <th scope="col">Action</th>
                            
                          </tr>
                        </thead>  
                        <tbody>
                       
                        @foreach($setting as $settingItem)
                          <tr>
                            <td scope="col">{{$settingItem->id}}</td>
                            <td scope="col">{{$settingItem->config_key}}</td>
                            <td scope="col">{{$settingItem->config_value}}</td>
                            <td>
                               <a href="{{route('settings.edit',['id'=>$settingItem->id]).'?type='.$settingItem->type}}"class="btn btn-default">Edit</a>
                               <a href=""data-url="{{route('settings.delete',['id'=>$settingItem->id])}}"class="btn btn-danger actionDelete">Delete</a>
                            </td>
                            
                          </tr>
                          @endforeach
                          
                
                         
                        </tbody>
                        
                   </table>
                   {{$setting->links()}}
          </div>
           <div>
           
           </div>      
        </div>
        
      </div>
    </div>

  </div>

@endsection

