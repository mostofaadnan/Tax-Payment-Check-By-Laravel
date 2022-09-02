@extends('FrontEnd.pdf.master')
@section('content')
<h4 style="background-color: #369 !important; color:#fff;padding:5px;"> Payment Details</h4>

<table style="width:100%" cellspacing="0">
    <tr>
        <td>
          <!--   <h6 style="border-bottom:1px #ccc solid;">Tax Holder Information</h6> -->
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
        </td>
        <td></td>
        <td>
          <!--   <h6 style="border-bottom:1px #ccc solid;">Payment Information</h6> -->
            <p><b>Payment Date:</b> <span>{{  $TaxPayment->date }}</span><br>
                <b>From Date:</b> <span>{{  $TaxPayment->from_date }}</span><br>
                <b>To Date:</b> <span>{{  $TaxPayment->to_date }}</span><br>
                <b>Year:</b> <span>{{  $TaxPayment->year }}</span><br>
                <b>Payment No:</b> <span>{{  $TaxPayment->payment_no }}</span>
            </p>
        </td>
    </tr>
</table>

<table class="table table-striped table-bordered" style="width:100%" cellspacing="0">
    <thead class="custom-header-table">
        <tr>
            <th class="text-center">#sl</th>
            <th class="text-center">Description</th>
            <th class="text-center">Amount</th>
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
            <td align="right" style="border-bottom: 1px #003 solid;"><span style="font-size:18px;">
                    {{ $TaxPayment->amount }}</span></td>
        </tr>
    </tfoot>
</table>
@endsection
