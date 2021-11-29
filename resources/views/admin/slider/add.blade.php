@extends('layout.admin')

@section('title')


@section('content')

    <div class="content-wrapper">
        <div class="content">
            <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                <form action="{{route('admin.slider.store')}}"method="post" enctype="multipart/form-data">
                    @csrf
                        <div class="form-group">
                            <label >Tên Slider</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{old('name')}}" placeholder=" Nhập tên slider    " name="name">
                            @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label >Mô Tả</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" name="description"  rows="4">
                            {{old('description')}}
                            </textarea>
                            @error('description')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label >Hình ảnh</label>
                            <input type="file" class="form-control-file @error('image_path') is-invalid @enderror" name="image_path">
                            @error('image_path')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Submit</button>
                </form>
                </div>
            </div>
            </div>
        </div>
    </div>
@endsection