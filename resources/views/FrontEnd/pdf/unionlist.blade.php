@extends('FrontEnd.pdf.master')
@section('content')

<h4 style="background-color: #369 !important; color:#fff;padding:5px;">Tax Payer List</h4>
<table class="table table-striped table-bordered" style="width:100%" cellspacing="0">
    <thead>
        <th class="text-center">#Sl</th>
        <th class="text-center">Date</th>
        <th class="text-center">Name</th>
        <th class="text-center">Holding Number</th>
        <th class="text-center">Memo number</th>
        <th class="text-center">Amount</th>
    </thead>
    <tbody>
        @foreach($TaxHolders as $key=>$TaxHolder)
        <tr>
            <td align="center">{{ $key+1 }}</td>
            <td align="center">{{ $TaxHolder->date  }}</td>
            <td>{{ $TaxHolder->name }}</td>
            <td>{{ $TaxHolder->holding_number }}</td>
            <td>{{ $TaxHolder->memo_number }}</td>
            <td align="right">{{ $TaxHolder->amount }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
