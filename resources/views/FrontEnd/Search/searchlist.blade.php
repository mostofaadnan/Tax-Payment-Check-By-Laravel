@extends('FrontEnd.layouts.master')
@section('content')
<!-- DataTables -->
<link rel="stylesheet" href="{{asset('assets/BackEnd/css/datatables/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/BackEnd/css/datatables/autoFill.dataTables.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/BackEnd/css/datatables/colReorder.dataTables.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/BackEnd/css/datatables/keyTable.dataTables.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/BackEnd/css/datatables/searchPanes.dataTables.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/BackEnd/css/datatables/buttons.dataTables.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/BackEnd/css/datatables/buttons.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/BackEnd/css/datatables/responsive.dataTables.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/BackEnd/css/datatables/fixedColumns.bootstrap.min.css')}}">
<script src="{{asset('assets/BackEnd/js/datatables/datatables.min.js')}}"></script>
<script src="{{asset('assets/BackEnd/js/datatables/dataTables.bootstrap4.min.js')}}"></script>
<section class="union-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-9 col-sm-9">
                <div class="card custom-card">
                    <div class="card header custom-card-header text-light">Tax Payer Information</div>
                </div>
                <div class="card-body">
                    @include('FrontEnd.Search.taxpayersearch')
                    <hr>
                    @if($taxholder->count()>0)
                    <div class="btn-pdf-download mb-2">
                        <a href="{{ route('front.taxpayment.profile.Pdf') }}" class="btn btn-sm btn-danger"
                            target="_blank">Download Pdf</a>
                    </div>
                    <table class="table table-bordered table-striped table-responsive">
                        <thead>
                            <th class="text-center">#Sl</th>
                            <th class="text-center">Date</th>
                            <th class="text-center">Name</th>
                            <th class="text-center">Holding Number</th>
                            <th class="text-center">Memo Number</th>
                            <th class="text-center">Amount</th>
                        </thead>
                        <tbody>
                            @foreach($taxholder as $key=>$holder)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $holder->date }}</td>
                                <td>{{ $holder->name }}</td>
                                <td>{{ $holder->holding_number }}</td>
                                <td>{{ $holder->memo_number }}</td>
                                <td align="right">{{ $holder->amount }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @else
                    <h4 align="center" style="margin-top:100px; margin-bottom:50px; color:red">Sorry! This Search Data
                        Not Available. Try Again</h4>
                    @endif
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3">
                <div class="card-header custom-card-header">Union</div>
                <div class="card-body">
                    <ul>
                        @foreach($unions as $area)
                        <li><a href="{{ route('front.union.details',$area->id)}}">{{ $area->name }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="{{asset('assets/BackEnd/js/datatables/fixedHeader.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/BackEnd/js/datatables/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('assets/BackEnd/js/datatables/buttons.flash.min.js')}}"></script>
<script src="{{asset('assets/BackEnd/js/datatables/jszip.min.js')}}"></script>
<script src="{{asset('assets/BackEnd/js/datatables/pdfmake.min.js')}}"></script>
<script src="{{asset('assets/BackEnd/js/datatables//vfs_fonts.js')}}"></script>
<script src="{{asset('assets/BackEnd/js/datatables/buttons.html5.min.js')}}"></script>
<script src="{{asset('assets/BackEnd/js/datatables/buttons.print.min.js')}}"></script>
<script src="{{asset('assets/BackEnd/js/datatables/dataTables.autoFill.min.js')}}"></script>
<script src="{{asset('assets/BackEnd/js/datatables/dataTables.colReorder.min.js')}}"></script>
<script src="{{asset('assets/BackEnd/js/datatables/dataTables.keyTable.min.js')}}"></script>
<script src="{{asset('assets/BackEnd/js/datatables/dataTables.searchPanes.min.js')}}"></script>
<script src="{{asset('assets/BackEnd/js/datatables/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('assets/BackEnd/js/datatables/fixedHeader.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/BackEnd/js/datatables/dataTables.fixedColumns.min.js')}}"></script>
<script src="{{asset('assets/BackEnd/js/datatables/sum/sum.js')}}"></script>
<script src="{{asset('assets/BackEnd/js/datatables/buttons.colVis.min.js')}}"></script>
<script src="{{asset('assets/BackEnd/js/datatables/pdfmake.min.js')}}"></script>
<script src="{{asset('assets/BackEnd/js/datatables/vfs_fonts.js')}}"></script>
<script src="{{asset('assets/BackEnd/js/datatables/dataTables.select.min.js')}}"></script>
@endsection
