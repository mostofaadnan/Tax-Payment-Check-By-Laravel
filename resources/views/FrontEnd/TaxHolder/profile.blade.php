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

            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card custom-card">
                    <div class="card header custom-card-header text-light">Tax Payer Information</div>
                </div>

                <div class="card-body">
                    <div class="" align="center">
                        <h2 align="center">{{ $taxholder->UnionName->title }}</h2>
                        <address>
                            <p>
                                {{ $taxholder->AreaName->name }},{{ $taxholder->UnionName->UpazilaName->name }},
                                {{ $taxholder->UnionName->UpazilaName->DistricName->name }} <br>
                                {{ $taxholder->UnionName->phone }} <br>
                                {{ $taxholder->UnionName->email }}

                            </p>
                        </address>
                    </div>
                    <hr>
                </div>

                <div class="card custom-card">
                    <div class="card-header custom-card-header">
                        <div class="row">
                            <div class="col-md-8 col-lg-8 col-sm-8">
                                Tax Payer details
                            </div>
                            <div class="col-md-4 col-lg-4 col-sm-4">

                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <p>
                            <span style="font-size:20px;font-weight:500 !important;">{{ $taxholder->name }}</span><br>
                            <b>Gender: </b>{{ $taxholder->gender==1?'Male':'Female' }}
                        </p>
                        <b>Father: </b>{{ $taxholder->father }} <br>
                        <b>Mother: </b>{{ $taxholder->mother }} <br>
                        <b>Mobile: </b>{{ $taxholder->phone }}</p>
                        <h6>Address:</h6>
                        <address>
                            <b>House: </b>{{ $taxholder->house}}, <b>Block: </b>{{ $taxholder->block}},
                            {{ $taxholder->AreaName->name }}, <br>
                            {{ $taxholder->UnionName->name }},{{ $taxholder->UnionName->UpazilaName->name }},
                            {{ $taxholder->UnionName->UpazilaName->DistricName->name }} <br>
                        </address><br>
                        <b>Idetification Number: </b>{{ $taxholder->nid }} <br>
                        <b>Tax No: </b>{{ $taxholder->tax_no }}
                        <hr>
                        @if($taxholder->TaxPaymentDetails->count()>0)
                        <div class="btn-pdf-download">
                            <a href="{{ route('front.taxpayment.profile.Pdf',$taxholder->id) }}"
                                class="btn btn-sm btn-danger" target="_blank">Download Pdf</a>
                        </div>
                        @endif
                    </div>
                </div>
                <div class="card custom-card">
                    <div class="card header custom-card-header text-light">Tax Information</div>

                    <div class="card-body">
                        <table class="table table-bordered table-striped table-responsive" id="mytable">
                            <thead>
                                <th align="center">#Sl</th>
                                <th align="center">Date</th>
                                <th align="center">Tax Year</th>
                                <th align="center">TRN Number</th>
                                <th align="center">Amount</th>
                                <th align="center">Action</th>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
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

<script>
function DataTable() {
    var taxholderid = "{{ $id }}";

    table = $('#mytable').DataTable({
        responsive: true,
        paging: true,
        scrollY: 600,
        ordering: true,
        /*   searching: true, */
        colReorder: true,
        keys: true,
        aLengthMenu: [
            [25, 50, 100, 200, -1],
            [25, 50, 100, 200, "All"]
        ],
        iDisplayLength: 100,
        processing: true,
        serverSide: true,

        //dom: 'lBfrtip',
        dom: "<'row'<'col-sm-6'l><'col-sm-6'f>>" +
            "<'row'<'col-sm-12'tr>>" +
            "<'row'<'col-sm-5'i><'col-sm-7'p>>",

        "ajax": {
            "url": "{{ url('Tax-Payer/LoadTaxPaymentPrayer')}}" + '/' + taxholderid,
            "type": "GET",
        },
        columns: [{
                data: 'DT_RowIndex',
                name: 'DT_RowIndex',
                className: "text-center"
            },
            {
                data: 'date',
                name: 'date',

            },
            {
                data: 'taxyear',
                name: 'taxyear',

            },
            {
                data: 'payment_no',
                name: 'payment_no',

            },
            {
                data: 'amount',
                name: 'amount',

            },
            {
                data: 'action',
                name: 'action',
                orderable: false,
                searchable: false
            },
        ],
    });
    $('.dataTables_length').addClass('bs-select');
}
window.onload = DataTable();
</script>
@endsection