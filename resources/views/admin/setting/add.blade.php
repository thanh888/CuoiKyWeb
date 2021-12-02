<!-- resources/views/child.blade.php -->

@extends('layout.admin')

@section('title')
<title>Setting </title>
@endsection
@section('css')
<link rel="stylesheet" href="{{asset('admins/setting/add.css')}}">
@endsection
@section('content')
    
<div class="content-wrapper">
   
    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
            <form action="{{route('settings.store').'?type='.$request->type}}"method="post">
              @csrf
                    <div class="form-group">
                        <label >Config Key</label>
                        <input type="text" class="form-control @error('config_key') is-invalid @enderror" placeholder=" Nhập config key    " name="config_key">
                        @error('config_key')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>
                   @if($request->type==='Text')
                   <div class="form-group">
                        <label >Config Value</label>
                        <input type="text" class="form-control @error('config_value') is-invalid @enderror" placeholder=" Nhập config value    " name="config_value">
                        @error('config_value')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    @elseif($request->type==='Textarea')
                    <div class="form-group">
                        <label >Config Value</label><br>
                        <textarea class="form-group @error('config_value') is-invalid @enderror" name="config_value" id="" cols="50" rows="5"></textarea>
                        @error('config_value')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    @endif
                    
                    
                    <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            </div>
        </div>
      </div>
    </div>
  </div>

@endsection

