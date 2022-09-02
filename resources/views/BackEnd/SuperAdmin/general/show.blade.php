@extends("BackEnd.SuperAdmin.layouts.app")
@section("wrapper")
<div class="page-wrapper">
    <div class="page-content">
        <div class="row">
            <div class="col-sm-8 mx-auto">
                <div class="card">
                    <div class="card-header">General Site Setting</div>
                    <div class="card-body">
                         @include('BackEnd.SuperAdmin.layouts.ErrorMessage')
                        <form action="{{ route('general.update') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mb-1">
                                <label for="site-header">Company Name</label>
                                <input type="text" name="company_name" value="{{ config('company.company_name') }}"
                                    class="form-control" require>
                            </div>
                            <div class="form-group mb-1">
                                <label for="site-header">Short Description</label>
                                <input type="text" name="Short_description"
                                    value="{{ config('company.Short_description') }}" class="form-control" require>
                            </div>
                            <div class="form-group mb-1">
                                <label for="site-header">Address</label>
                                <input type="text" name="address"
                                    value="{{ config('company.address') }}" class="form-control" require>
                            </div>
                            <div class="form-group mb-1">
                                <label for="site-header">Phone</label>
                                <input type="phone" name="phone"
                                    value="{{ config('company.phone') }}" class="form-control" require>
                            </div>
                            <div class="form-group mb-1">
                                <label for="site-header">Email Address</label>
                                <input type="email" name="email" value="{{ config('company.email') }}"
                                    class="form-control" require>
                            </div>
                            <div class="form-group mb-1">
                                <label for="site-header">Password</label>
                                <input type="passowrd" name="mail_password"
                                    value="{{ config('company.mail_password') }}" class="form-control" require>
                            </div>
                            <div class="form-group mb-1">
                                <label for="site-header">Mail Host</label>
                                <input type="text" name="Mail_Host" value="{{ config('company.Mail_Host') }}"
                                    class="form-control">
                            </div>

                            <div class="form-group mb-1">
                                <label for="site-header">Copy Rights</label>
                                <input type="text" name="copy_rights" value="{{ config('company.copy_rights') }}"
                                    class="form-control">
                            </div>
                          <!--   <div class="form-group mb-1">
                                <label for="site-header">Main Logo</label><br>
                                <img src="{{ asset('image/logo/'.config('company.main_logo')) }}" alt="">
                                <input type="file" name="main_logo" class="mt-2 mb-2">
                            </div>
                            <div class="form-group mb-1">
                                <label for="site-header">Side Logo</label><br>
                                <img src="{{ asset('image/logo/'.config('company.side_logo')) }}" alt="">
                                <input type="file" name="side_logo" class="mt-2 mb-2">
                            </div> -->
                   
                            <button type="submit" class="btn btn-success mt-2">Submit</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection