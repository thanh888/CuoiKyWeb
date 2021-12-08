@extends('layout.admin')

@section('title')
@section('css')
    <style>
        .active-amber-textarea-2 textarea.md-textarea {
            border-bottom: 1px solid #ffa000;
            box-shadow: 0 1px 0 0 #ffa000;
        }

        .active-amber-textarea-2.md-form label.active {
            color: #ffa000;
        }

        .active-amber-textarea-2.md-form label {
            color: #ffa000;
        }

        .active-amber-textarea-2.md-form .prefix {
            color: #ffa000;
        }

        .active-amber-textarea-2.md-form textarea.md-textarea:focus:not([readonly])+label {
            color: #ffa000;
        }

    </style>
@endsection
@section('js')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.choose').on('change', function() {
                var action = $(this).attr('id');
                var ma_id = $(this).val();
                var _token = $('input[name="_token"]').val();
                var result = '';
                //   alert(action);
                //   alert(ma_id);
                //   alert(_token);
                if (action === 'city') {
                    result = 'province';

                } else if (action === 'province') {
                    result = 'wards';
                } else {
                    result = 'sonha';
                }
                $.ajax({
                    url: "/delivery/sonha",
                    method: 'POST',
                    data: {
                        action: action,
                        ma_id: ma_id,
                        _token: _token
                    },
                    success: function(data) {
                        $('#' + result).html(data);
                    }
                });
            });


        });
    </script>
@endsection

@endsection


@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h3 class="m-0">Update Blog</h3>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Trang Chu</a></li>
                    <li class="breadcrumb-item active">List</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<div class="content-wrapper">
    <div class="content">
        <div class="container-fluid">
            <form action="{{ route('adminblog.pupdate',['id'=>$data->id]) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="form-group col-md-3">
                        <label>Ảnh blog</label>
                        <input type="file" class="form-control-file" name="image" value="{{ $data->image }}">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-3">
                        <label>Tiêu đề </label>
                        <div class="" id="" name="">
                            <input class="border-radius-lg shadow-sm" name="title" value="{{ $data->title }}" type="text">
                        </div>
                    </div>
                    <div class="form-group col-md-3">
                        <label>Sologan </label>
                        <div class="" id="" name="">
                            <input class="border-radius-lg shadow-sm" name="sologan" value="{{ $data->sologan }}" type="text">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="md-form amber-textarea active-amber-textarea-2">
                        <i class="fas fa-pencil-alt prefix"></i>
                        <textarea name="description" id="form24" class="md-textarea form-control"  rows="3">{{ $data->description }}</textarea>
                        <label for="form24">Mô tả blog(tóm tắt ý chính)</label>
                    </div>
                </div>

                <button type="submit" class="btn btn-success update add_delivery"> Update blog</button>
            </form>
        </div>
    </div>
</div>
</div>
</div>
@endsection
