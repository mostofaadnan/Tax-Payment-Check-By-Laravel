@extends('FrontEnd.layouts.master')
@section('content')
<style>
.custom-table {
    font-size: 18px !important;

}

.custom-table td {
    font-size: 18px !important;
    padding: 5px;

}

.custom-header-table {
    background-color: #369 !important;
    color: #fff;
    margin-bottom: 10px;

}

.custom-header-table th {
    padding: 10px !important;

}

.customer-table-boody {
    border-bottom: 1px #ccc solid;

}

.custom-table-footer {
    margin-top: 20px !important;
}

.border-radius-first {
    border-top-left-radius: 10px;
    border-bottom-left-radius: 10px;
}

.border-radius-last {
    border-top-right-radius: 10px;
    border-bottom-right-radius: 10px;
}
</style>
<section class="union-section">
    <div class="container">
        <div class="row">

            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card custom-card">
                    <div class="card header custom-card-header text-light">
                        Tax Details
                    </div>
                </div>

                <div class="card-body">
                    <div class="" align="center">
                        <h2 align="center">{{ $TaxPayment->TaxHolderInfo->UnionName->title }}</h2>
                        <address>
                            <p>
                                {{ $TaxPayment->TaxHolderInfo->AreaName->name }},{{ $TaxPayment->TaxHolderInfo->UnionName->UpazilaName->name }},
                                {{ $TaxPayment->TaxHolderInfo->UnionName->UpazilaName->DistricName->name }} <br>
                                {{ $TaxPayment->TaxHolderInfo->UnionName->phone }} <br>
                                {{ $TaxPayment->TaxHolderInfo->UnionName->email }}

                            </p>
                        </address>
                    </div>
                    <hr>
                </div>
                <div class="row">
                    <div class="col-md-8 col-lg-8 col-sm-12 mx-auto">
                        <div class="card custom-card">
                            <div class="card-header custom-card-header">
                                Details
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-7">
                                        <h6 style="border-bottom:1px #ccc solid;">Tax Holder Information</h6>
                                        <h6><b>Name: </b>{{ $TaxPayment->TaxHolderInfo->name }}</h6>
                                        <p><b>Gender:</b><br>
                                            <b>Father: </b>{{ $TaxPayment->TaxHolderInfo->father }} <br>
                                            <b>Mother: </b>{{ $TaxPayment->TaxHolderInfo->mother }}
                                        </p>
                                        <address>
                                            <h6>Address:</h6>
                                            <p><b>House No: </b>{{ $TaxPayment->TaxHolderInfo->house_no }},
                                                ,<b>Block: </b>{{ $TaxPayment->TaxHolderInfo->block }},<br>
                                                <b>Area: </b>{{ $TaxPayment->TaxHolderInfo->AreaName->name }}
                                                <br>
                                                {{ $TaxPayment->UnionName->UpazilaName->DistricName->StateName->name }},
                                                {{ $TaxPayment->UnionName->UpazilaName->DistricName->name }},
                                                {{ $TaxPayment->UnionName->UpazilaName->name }},
                                                {{ $TaxPayment->UnionName->name }} <br>
                                            </p>
                                        </address>
                                        <p><b>NID:</b>{{ $TaxPayment->TaxHolderInfo->nid }} <br>
                                            <b>Tax No:</b>{{ $TaxPayment->TaxHolderInfo->tax_no }}
                                        </p>
                                    </div>
                                    <div class="col-sm-5">
                                        <h6 style="border-bottom:1px #ccc solid;">Payment Information</h6>
                                        <p><b>Payment Date:</b> <span>{{  $TaxPayment->date }}</span><br>
                                            <b>From Date:</b> <span>{{  $TaxPayment->from_date }}</span><br>
                                            <b>To Date:</b> <span>{{  $TaxPayment->to_date }}</span><br>
                                            <b>Year:</b> <span>{{  $TaxPayment->year }}</span><br>
                                            <b>Payment No:</b> <span>{{  $TaxPayment->payment_no }}</span>
                                        </p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table class="table-borderless custom-table" width="100%">
                                            <thead class="custom-header-table">
                                                <tr>
                                                    <th
                                                        class="item text text-semibold text-alignment-left text-center text-white border-radius-first">
                                                        #sl</th>
                                                    <th class="text-center">Description</th>
                                                    <th
                                                        class="item text text-semibold text-alignment-left text-center text-white border-radius-last">
                                                        Amount</th>
                                                </tr>
                                            </thead>
                                            <tbody class="customer-table-boody">

                                                <tr>
                                                    <td align="center">
                                                        1
                                                    </td>
                                                    <td align="center">
                                                        Tax Payment
                                                    </td>

                                                    <td align="right"> {{ $TaxPayment->amount }}</td>
                                                </tr>
                                            </tbody>
                                            <tfoot class="custom-table-footer">
                                                <tr style="margin-top: 20px !important;">
                                                    <td colspan="1"></td>
                                                    <td align="right" style="border-bottom: 1px #003 solid;">
                                                        <span style="font-size:18px;">Total:</span>
                                                    </td>
                                                    <td align="right" style="border-bottom: 1px #003 solid;"><span
                                                            style="font-size:18px;">
                                                            {{ $TaxPayment->amount }}</span></td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                        <div align="right" class="mt-2"> <a
                                                href="{{ route('front.taxpayment.profile.PaymentDetailsPdf',$TaxPayment->id) }}"
                                                class="btn btn-danger" target="_blank">Download Pdf</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
