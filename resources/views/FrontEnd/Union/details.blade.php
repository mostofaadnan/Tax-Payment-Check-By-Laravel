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
                    <div class="card header custom-card-header text-light">Union Information</div>
                </div>

                <div class="card-body">
                    <div class="" align="center">
                        <h2 align="center">{{ $union->title }}</h2>
                        <address>
                            <p>
                                {{ $union->UpazilaName->name }}, {{ $union->UpazilaName->DistricName->name }} <br>
                                {{ $union->phone }} <br>
                                {{ $union->email }}

                            </p>
                        </address>
                    </div>
                    <hr>
                </div>
                <div class="card custom-card">
                    <div class="card header custom-card-header text-light">Tax Payer Information</div>
                </div>
                <div class="card-body">
                    @include('FrontEnd.Search.taxpayersearch')
                    <hr>
                    @if($union->TaxholderInfo->count()>0)
                    <div class="btn-pdf-download mb-2">
                        <a href="{{ route('front.union.pdf',$union->id) }}" class="btn btn-sm btn-danger"
                            target="_blank">Download Pdf</a>
                    </div>
                    @endif

                    <table class="table table-bordered table-striped table-responsive" id="mytable">
                        <thead>
                            <th class="text-center">#Sl</th>
                            <th  class="text-center">Date</th>
                            <th  class="text-center">Name</th>
                            <th  class="text-center">Holding Number</th>
                            <th  class="text-center">Memo Number</th>
                            <th  class="text-center">Amount</th>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3">
                <div class="card-header custom-card-header">Area</div>
                <div class="card-body">
                    <ul>
                        @foreach($union->AreaDetails as $area)
                        <li><a href="{{ route('front.area.details',$area->id)}}">{{ $area->name }}</a></li>
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

<script>
function DataTable() {
    var id = "{{ $union->id }}"
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
            "url": "{{ url('Union/TaxHolderLoadAll')}}" + '/' + id,
            "type": "GET",
        },
        columns: [{
                data: 'DT_RowIndex',
                name: 'DT_RowIndex',
                className: "text-center"
            },
      /*       {
                data: 'Location',
                name: 'Location',

            }, */
            {
                data: 'date',
                name: 'date',

            },
            {
                data: 'name',
                name: 'name',

            },
            {
                data: 'holding_number',
                name: 'holding_number',

            },
            {
                data: 'memo_number',
                name: 'memo_number',

            },
            {
                data: 'amount',
                name: 'amount',
                class:'right-right'

            },
        ],
    });
    $('.dataTables_length').addClass('bs-select');
}
window.onload = DataTable();
</script>
@endsection
