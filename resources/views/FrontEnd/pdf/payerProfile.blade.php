@extends('FrontEnd.pdf.master')
@section('content')
<h4 style="background-color: #369 !important; color:#fff;padding:5px;">Tax Payer details</h4>
<table>
    <tr>
        <td>
            <p>
                <span style="font-size:20px;font-weight: 500 !important;">{{ $taxholder->name }}</span><br>
                <b>Gender: </b>{{ $taxholder->gender==1?'Male':'Female' }} <br>
                <b>Father: </b>{{ $taxholder->father }} <br>
                <b>Mother: </b>{{ $taxholder->mother }} <br>
                <b>Mobile: </b>{{ $taxholder->phone }}
            </p>
            <p>
            <span style="font-size:20px;font-weight: 500 !important;">Address</span><br>
            <b>House: </b>{{ $taxholder->house}}, <b>Block: </b>{{ $taxholder->block}},
            {{ $taxholder->AreaName->name }}, <br>
            {{ $taxholder->UnionName->name }},{{ $taxholder->UnionName->UpazilaName->name }},
            {{ $taxholder->UnionName->UpazilaName->DistricName->name }} <br>

            <b>Idetification Number: </b>{{ $taxholder->nid }} <br>
            <b>Tax No: </b>{{ $taxholder->tax_no }}
            </p>
        </td>
    </tr>
</table>
<h4 style="background-color: #369 !important; color:#fff;padding:5px;">Tax Information</h4>
<table class="table table-striped table-bordered" style="width:100%" cellspacing="0">
    <thead>
        <th align="center">#Sl</th>
        <th align="center">Date</th>
        <th align="center">Tax Year</th>
        <th align="center">TRN Number</th>
        <th align="center">Amount</th>
    </thead>
    <tbody>
        @foreach($taxholder->TaxPaymentDetails as $key=>$details)
        <tr>
            <td align="center">{{ $key+1 }}</td>
            <td align="center">{{ $details->date }}</td>
            <td>
                <b>From Date: </b>{{ $details->from_date }}<br>
                <b>To Date: </b>{{ $details->to_date }}<br>
                <b>Year: </b>{{  $details->year }}
            </td>
            <td>{{ $details->payment_no }}</td>
            <td align="right">{{ $details->amount }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection