@extends('BackEnd.SuperAdmin.layouts.app')
@section('wrapper')

<div class="page-wrapper">
    <div class="page-content">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">About Post List</h4>
                <div class="float-end">
                    <a class="btn btn-lg btn-info" href="{{ route('aboutus.create') }}">New Post</a>
                </div>
            </div>
            <div class="card-body">
                @include('BackEnd.SuperAdmin.layouts.ErrorMessage')
                <div class="table-responsive">
                    <table id="mytable" class="table table-striped table-bordered" style="width:100%" cellspacing="0">

                        <thead class="table-light">
                            <tr>
                                <th>#Sl No</th>
                                <th>Title</th>
                                <th>Type</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>#Sl No</th>
                                <th>Title</th>
                                <th>Type</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
var table;

function DataTable() {

    table = $('#mytable').DataTable({
        responsive: true,
        paging: true,
        scrollY: 400,
        ordering: true,
        searching: true,
        colReorder: true,
        keys: true,
        processing: true,
        serverSide: true,
        aLengthMenu: [
            [25, 50, 100, 200, -1],
            [25, 50, 100, 200, "All"]
        ],
        iDisplayLength: 100,



        dom: "<'row'<'col-sm-6'l><'col-sm-6'f>>" +
            "<'row mt-2'<'col-sm-12'tr>>" +
            "<'row mt-2'<'col-sm-6'i><'col-sm-6'p>>",

        "ajax": {
            "url": "{{ route('aboutus.loadall') }}",
            "type": "GET",
        },

        columns: [{
                data: 'DT_RowIndex',
                name: 'DT_RowIndex',
                className: "text-center"
            },

            {
                data: 'title',
                name: 'title',
                className: "text-center"
            },
            {
                data: 'type',
                name: 'type',
                className: "text-center"
            },
            {
                data: 'status',
                name: 'status',
                orderable: false,
            },
            {
                data: 'action',
                name: 'action',
                className: "text-center",
                orderable: false,
                searchable: false
            }
        ],
    });

}

window.onload = DataTable();

$(document).on('click', '#datashow', function() {
    var id = $(this).data("id");
    url = "{{ url('SuperAdmin/About-Us/edit')}}" + '/' + id,
        window.location = url;
});



$(document).on('click', '#deletedata', function() {
    swal({
            title: "Are you sure?",
            text: "Once Delete, you will not be able to recover this  data!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                var id = $(this).data("id");
                $.ajax({
                    type: "delete",
                    url: "{{ url('SuperAdmin/About-Us/delete')}}" + '/' + id,
                    success: function(data) {
                        $('#mytable').DataTable().ajax.reload()
                    },
                    error: function(data) {
                        console.log(data);
                        swal("Opps! Faild", "Data Fail to Cancel", "error");
                    }
                });
                swal("Ok! Your file has been cancelled!", {
                    icon: "success",
                });
            } else {
                swal("Your file is safe!");
            }
        });
});
</script>

@endsection