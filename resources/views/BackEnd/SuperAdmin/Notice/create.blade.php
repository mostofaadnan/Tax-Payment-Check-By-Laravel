@extends('BackEnd.SuperAdmin.layouts.app')
@section('wrapper')
<link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link
    href="https://fonts.googleapis.com/css?family=Lato:300,700|Montserrat:300,400,500,600,700|Source+Code+Pro&display=swap"
    rel="stylesheet">


<script type="text/javascript" src="{{asset('assets/FrontEnd/ImageUploader/image-uploader.min.js')}}"></script>
<script src="https://cdn.tiny.cloud/1/x16bdhjkeyrsv2vmjrgbilj5x5idshzxa5pg2rptyvglnplz/tinymce/6/tinymce.min.js"
    referrerpolicy="origin"></script>
<div class="page-wrapper">
    <div class="page-content">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">New Notice</h4>
            </div>
            <div class="card-body">
                @include('BackEnd.SuperAdmin.layouts.ErrorMessage')
                <form action="{{ route('notice.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="title">Date</label>
                                <input type="text" id="date" name="date" class="form-control" placeholder="Date">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-8">
                            <div class="form-group">
                                <label for="title">Notice Title</label>
                                <input type="text" name="title" class="form-control" placeholder="Title">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" id="description" cols="30" rows="20"
                            class="form-control"></textarea>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <label for="status">Status</label>
                            <select name="status" id="" class="form-control">
                                <option value="1">Publish</option>
                                <option value="2">Draft</option>
                            </select>
                        </div>
                    </div>
                    <div class="float-end">
                        <button type="submit" class="btn btn-lg btn-success">Publish</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
tinymce.init({
    selector: 'textarea#description',
    skin: 'bootstrap',
    plugins: 'lists, link, image, media',
    toolbar: 'h1 h2 bold italic strikethrough blockquote bullist numlist backcolor | link image media | removeformat help',
    menubar: false,
});

$('#date').bootstrapMaterialDatePicker({
    time: false
});
$(function() {
    var d = new Date();
    var month = d.getMonth() + 1;
    var day = d.getDate();

    var output = d.getFullYear() + '-' +
        (month < 10 ? '0' : '') + month + '-' +
        (day < 10 ? '0' : '') + day;
    $("#date").val(output);
});
</script>
@endsection