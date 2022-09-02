@extends("BackEnd.SuperAdmin.layouts.app")
@section("wrapper")
<div class="page-wrapper">
    <div class="page-content">

        <div class="dash-wrapper bg-info">

        </div>

        <div class="row" style="margin-top:30px;">
            <div class="col">
                <div class="card radius-10 mb-0">
                    <div class="card-body">
                        <!--   <h5 align="center">Company Information<!-- {{  config('company.company_name') }} -->
                        </h5>
                        <div class="row">
                            <h5 align="center">Company Information

                            </h5>
                            <div class="col-sm-6 mx-auto">
                                <table class="table table-striped">
                                    <tr>
                                        <th>Name:</th>
                                        <td>{{ config('company.company_name') }}</td>
                                    </tr>
                                    <tr>
                                        <th>Address:</th>
                                        <td>{{ config('company.address') }}</td>
                                    </tr>
                                    <tr>
                                        <th>Phone:</th>
                                        <td>{{ config('company.phone') }}</td>
                                    </tr>
                                    <tr>
                                        <th>Email:</th>
                                        <td>{{ config('company.email') }}</td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>
                                            <div class="float-end">
                                                <a href="{{ route('general.show') }}" class="btn btn-success btn-sm">Update</a>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                                <div class="float-end">

                                </div>
                            </div>
                            <hr>
                            <div class="col-sm-6 mx-auto">
                                <table class="table table-striped">
                                    <tr>
                                        <th>Total State:</th>
                                        <td>{{ $state }}</td>
                                    </tr>
                                    <tr>
                                        <th>Total District:</th>
                                        <td>{{  $district }}</td>
                                    </tr>
                                    <tr>
                                        <th>Total Upazila:</th>
                                        <td>{{  $upazila }}</td>
                                    </tr>
                                    <tr>
                                        <th>Total Union:</th>
                                        <td>{{  $union }}</td>
                                    </tr>
                                    <tr>
                                        <th>Total Area:</th>
                                        <td>{{  $area }}</td>
                                    </tr>
                                </table>
                                <div class="float-end">

                                </div>
                            </div>
                            <hr>
                            <div class="col-sm-6 mx-auto">
                                <table class="table table-striped">
                                    <tr>
                                        <th>Total Admin:</th>
                                        <td>{{ $totaladmin }}</td>
                                    </tr>
                                    <tr>
                                        <th>Total Tax Payer:</th>
                                        <td>{{  $taxholder }}</td>
                                    </tr>
                                    <tr>
                                        <th>Total Tax Amount:</th>
                                        <td>{{ $tax }}/-</td>
                                    </tr>

                                </table>
                                <div class="float-end">

                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
        <!--end row-->
    </div>
</div>

@endsection