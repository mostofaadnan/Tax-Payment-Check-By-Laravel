@extends('BackEnd.SuperAdmin.layouts.app')
@section('wrapper')

<div class="page-wrapper">
    <div class="page-content">
        <div class="card">
            <style .input-group-text{width:auto;}></style>
            <div class="card-header card-header-section">
                <div class="float-start">
                    Union User Management
                </div>
                <div class="float-end">
                    <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                        <div class="btn-group" role="group" aria-label="First group">
                            <a type="button" class="btn btn-light px-5 radius-30"
                                href="{{Route('unionuser.create')}}">New
                                User</i>
                            </a>

                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                @include('BackEnd.SuperAdmin.layouts.ErrorMessage')
                <table id="mytable" class="data-table table table-striped table-bordered table-sm" cellspacing="0">
                    <thead>
                        <tr>
                            <th> #Sl </th>
                            <th> Name</th>
                            <th> Phone</th>
                            <th> Email </th>
                            <th> State </th>
                            <th> District </th>
                            <th> Upazila </th>
                            <th> Union </th>
                            <th> Status</th>
                            <th> Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th> #Sl </th>
                            <th>Name</th>
                            <th>Phone</th>
                            <th> Email </th>
                            <th> State </th>
                            <th> District </th>
                            <th> Upazila </th>
                            <th> Union </th>
                            <th> Status</th>
                            <th> Action</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
var tabledata;

function DataTable() {
    tabledata = $('#mytable').DataTable({
        paging: true,
        scrollY: 500,
        scrollCollapse: false,
        ordering: true,
        searching: true,
        select: false,
        autoFill: true,
        colReorder: true,
        keys: true,
        processing: true,
        serverSide: true,

        dom: "<'row'<'col-sm-6'l><'col-sm-6'f>>" +
            "<'row'<'col-sm-12'tr>>" +
            "<'row'<'col-sm-5'i><'col-sm-7'p>>",
        "ajax": {
            "url": "{{ route('unionuser.loadall') }}",
            "type": "GET",
        },
        columns: [{
                data: 'DT_RowIndex',
                name: 'DT_RowIndex',
                className: "text-center"
            },
            {
                data: 'name',
                name: 'name',
            },
            {
                data: 'phone',
                name: 'phone',
            },
            {
                data: 'email',
                name: 'email',
            },
            {
                data: 'state',
                name: 'state',
            },
            {
                data: 'district',
                name: 'district',
            },
            {
                data: 'upazila',
                name: 'upazila',
            },
            {
                data: 'union',
                name: 'union',
            },
            {
                data: 'status',
                name: 'status',
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
    /*   $('.dataTables_length').addClass('bs-select'); */
}
window.onload = DataTable();

$(document).on('click', "#datadelete", function() {
    var logingid = "{{ Auth::user()->id }}"
    var id = $(this).data("id");
    if (logingid == id) {
        swal("Opps! Faild", "Sorry, You Can't Delete it, This is Login User", "error");
    } else {
        swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this  data!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {

                    $.ajax({
                        type: "post",
                        url: "{{ url('SuperAdmin/Union-User/delete')}}" + '/' + id,
                        success: function() {
                            $('#mytable').DataTable().ajax.reload()
                        },
                        error: function(data) {
                            console.log(data);
                            swal("Opps! Faild", "Data Fail to Delete", "error");
                        }
                    });
                    swal("Ok! Your file has been deleted!", {
                        icon: "success",
                    });
                } else {
                    swal("Your file is safe!");
                }
            });
    }


});

$(document).on('click', '#inactive', function() {
    var id = $(this).data("id");
    $.ajax({
        type: "get",
        url: "{{ url('SuperAdmin/Union-User/inactive')}}" + '/' + id,
        success: function(data) {
            if (data.status == 200) {
                $.toast({
                    heading: 'Update',
                    text: data.message,
                    showHideTransition: 'slide',
                    position: 'top-right',
                    icon: 'success'
                });
                tabledata.ajax.reload();
            } else {
                $.toast({
                    heading: 'Error',
                    text: data.message,
                    showHideTransition: 'fade',
                    position: 'top-right',
                    icon: 'error'
                })
            }

        },
        error: function(data) {
            console.log(data);
            $.toast({
                heading: 'Warning',
                text: 'Fail to Action',
                showHideTransition: 'plain',
                icon: 'warning'
            })
        }
    });

});
$(document).on('click', '#active', function() {
    var id = $(this).data("id");
    $.ajax({
        type: "get",
        url: "{{ url('SuperAdmin/Union-User/active')}}" + '/' + id,
        success: function(data) {
            if (data.status == 200) {
                $.toast({
                    heading: 'Status Update',
                    text: data.message,
                    showHideTransition: 'slide',
                    position: 'top-right',
                    icon: 'success'
                });
                tabledata.ajax.reload();
            } else {
                $.toast({
                    heading: 'Error',
                    text: data.message,
                    showHideTransition: 'fade',
                    position: 'top-right',
                    icon: 'error'
                })
            }
        },
        error: function(data) {
            console.log(data);
            $.toast({
                heading: 'Warning',
                text: 'Fail to Action',
                showHideTransition: 'plain',
                icon: 'warning'
            })
        }
    });

});
</script>
@endsection
