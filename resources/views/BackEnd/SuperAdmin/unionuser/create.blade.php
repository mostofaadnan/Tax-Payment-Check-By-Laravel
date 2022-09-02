@extends('BackEnd.SuperAdmin.layouts.app')
@section('wrapper')
<div class="page-wrapper">
    <div class="page-content">
        <div class="row">
            <div class="col-sm-8 mx-auto">
                <div class="card">
                    <div class="card-header">
                        New Union User
                    </div>
                    <div class="card-body">
                        @include('BackEnd.SuperAdmin.layouts.ErrorMessage')
                        <form method="POST" action="{{ route('unionuser.store') }}">
                            @csrf
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="exampleInputPassword2" class="col-form-label">State</label>
                                        <select id="state_id" class="form-control single-select">
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="exampleInputPassword2" class="col-form-label">District</label>
                                        <select id="district_id" class="form-control single-select">
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="exampleInputPassword2" class="col-form-label">Upazila</label>
                                        <select id="upazila_id" class="form-control single-select">
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="exampleInputPassword2" class="col-form-label">Union</label>
                                        <select id="union_id" name="union_id" class="form-control single-select">
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>
                                <div class="col-md-6">
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}" required autocomplete="name" placeholder="name"
                                        autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="phone" class="col-md-4 col-form-label text-md-end">{{ __('Phone') }}</label>
                                <div class="col-md-6">
                                    <input id="phone" type="phone"
                                        class="form-control @error('email') is-invalid @enderror" name="phone"
                                        value="{{ old('phone') }}" required autocomplete="phone" placeholder="Phone">

                                    @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email"
                                        placeholder="Email Address">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password" placeholder="password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="password-confirm"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password"
                                        placeholder="confirm password">
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <div class="float-end">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Submit') }}
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
function State() {
    $.ajax({
        type: 'get',
        url: "{{ route('state.getlist') }}",
        dataType: "JSON",
        success: function(data) {
            $("#state_id").empty();
            $("#state_id").append('<option value="">Select</option>');
            data.forEach(function(value) {
                $("#state_id").append('<option value="' + value.id + '">' +
                    value.name + '</option>');
            })
        },
        error: function(data) {
            console.log(data);
        }
    });
}
window.onload = State();

$("#state_id").on("change", function() {
    var id = $(this).val();
    console.log(id);
    if (id == "") {
        $("#district_id").empty();
        $("#upazila_id").empty();
    } else {
        $.ajax({
            type: 'get',
            url: "{{ url('SuperAdmin/District/getlist')}}" + '/' + id,
            dataType: "JSON",
            success: function(data) {
                $("#district_id").empty();
                $("#district_id").append('<option value="">Select</option>');
                data.forEach(function(value) {
                    $("#district_id").append('<option value="' + value.id + '">' +
                        value.name + '</option>');
                })
            },
            error: function(data) {
                console.log(data);
            }
        });

    }

});

$("#district_id").on("change", function() {
    var id = $(this).val();
    console.log(id);
    if (id == "") {
        $("#upazila_id").empty();
    } else {
        $.ajax({
            type: 'get',
            url: "{{ url('SuperAdmin/Upazila/getlist')}}" + '/' + id,
            dataType: "JSON",
            success: function(data) {
                $("#upazila_id").empty();
                $("#upazila_id").append('<option value="">Select</option>');
                data.forEach(function(value) {
                    $("#upazila_id").append('<option value="' + value.id + '">' +
                        value.name + '</option>');
                })
            },
            error: function(data) {
                console.log(data);
            }
        });

    }

});
$("#upazila_id").on("change", function() {
    var id = $(this).val();
    console.log(id);
    if (id == "") {
        $("#union_id").empty();
    } else {
        $.ajax({
            type: 'get',
            url: "{{ url('SuperAdmin/Union/getlist')}}" + '/' + id,
            dataType: "JSON",
            success: function(data) {
                $("#union_id").empty();
                $("#union_id").append('<option value="">Select</option>');
                data.forEach(function(value) {
                    $("#union_id").append('<option value="' + value.id + '">' +
                        value.name + '</option>');
                })
            },
            error: function(data) {
                console.log(data);
            }
        });

    }

});
</script>
@endsection
