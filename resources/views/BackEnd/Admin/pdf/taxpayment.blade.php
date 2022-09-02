@extends('BackEnd.Admin.pdf.master')
@section('content')
<table width="100%" style="margin-bottom:30px;">
    <tr>
        <td width="40%">
            <h3 style="border-bottom:1px #ccc solid;">Tax Holder Information</h3>
            <span style="font-size:30px;"><b>Name: </b>{{ $TaxPayment->TaxHolderInfo->name }} </span> <br>
            <b>Gender:</b><br>
            <b>Father: </b>{{ $TaxPayment->TaxHolderInfo->father }} <br>
            <b>Mother: </b>{{ $TaxPayment->TaxHolderInfo->mother }}
            <span>Address:</span><br>
            <b>House No: </b>{{ $TaxPayment->TaxHolderInfo->house_no }},
            ,<b>Block: </b>{{ $TaxPayment->TaxHolderInfo->block }},
            <b>Area: </b>{{ $TaxPayment->TaxHolderInfo->AreaName->name }}
            <br>
            {{ $TaxPayment->UnionName->name }},
            {{ $TaxPayment->UnionName->UpazilaName->name }},
            {{ $TaxPayment->UnionName->UpazilaName->DistricName->name }},
            {{ $TaxPayment->UnionName->UpazilaName->DistricName->StateName->name }}<br>
            <b>NID:</b>{{ $TaxPayment->TaxHolderInfo->nid }} <br>
            <b>Tax No:</b>{{ $TaxPayment->TaxHolderInfo->tax_no }}

        </td>
        <td width="30%"></td>
        <td width="30%">
            <div style="margin-top:-100px;">
                <h3 style="border-bottom:1px #ccc solid;padding:0px !important;">Payment Information</h3>
                <b>Payment Date:</b> <span>{{  $TaxPayment->date }}</span><br>
                <b>From Date:</b> <span>{{  $TaxPayment->from_date }}</span><br>
                <b>To Date:</b> <span>{{  $TaxPayment->to_date }}</span><br>
                <b>Year:</b> <span>{{  $TaxPayment->year }}</span><br>
                <b>Payment No:</b> <span>{{  $TaxPayment->payment_no }}</span>

            </div>
        </td>
    </tr>
</table>
<table class="custom-table" width="100%">
    <thead class="custom-header-table">
        <tr>
            <th class="text-white border-radius-first">
                #sl</th>
            <th>Description</th>
            <th class="text-white border-radius-last">
                Amount</th>
        </tr>
    </thead>
    <tbody class="customer-table-boody">

        <tr>
            <td align="center">
                1
            </td>
            <td align="center" width="60%">
                Tax Payment
            </td>

            <td align="right"> {{ $TaxPayment->amount }}</td>
        </tr>
    </tbody>
    <tfoot class="custom-table-footer">
        <tr style="margin-top: 20px !important;">
            <td colspan="2"></td>
            <td align="right" style="border-bottom: 1px #003 solid;">
                <b style="margin-right:20px;">Total:</b>{{ $TaxPayment->amount }}
            </td>
        </tr>
    </tfoot>
</table>
@endsection