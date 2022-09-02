@extends('BackEnd.SuperAdmin.layouts.app')
@section('wrapper')

<div class="page-wrapper">
    <div class="page-content">
        <div class="row">
            <div class="col-sm-8 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            District Management
                        </div>
                        <div class="float-end">
                            <button class="btn btn-sm btn-info" data-bs-toggle="modal"
                                data-bs-target="#districtmodel">New
                                District</button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered" id="mytable" style="width:100%"
                                cellspacing="0">
                                <thead>
                                    <tr>
                                        <th> #Sl </th>
                                        <th> State </th>
                                        <th> Name </th>
                                        <th width="17%"> Action </th>
                                    </tr>
                                </thead>
                                <tbody id="showalldata">

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th> #Sl </th>
                                        <th> State </th>
                                        <th> Name </th>
                                        <th width="17%"> Action </th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('BackEnd.SuperAdmin.modeldata.district')
<script type='text/javascript'>
var table;
var districtid = 0;

function DataTable() {
    table = $('#mytable').DataTable({
        responsive: true,
        paging: true,
        scrollY: 500,
        ordering: true,
        searching: true,
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
            "url": "{{ route('district.loadall') }}",
            "type": "GET",
        },
        columns: [{
                data: 'DT_RowIndex',
                name: 'DT_RowIndex',
                className: "text-center"
            },
            {
                data: 'state',
                name: 'state',

            },
            {
                data: 'name',
                name: 'name',

            },
            {
                data: 'action',
                name: 'action',
                className: "text-center",
                orderable: false,
                searchable: false
            },

        ],
    });
    $('.dataTables_length').addClass('bs-select');
}
window.onload = DataTable();

$("#districtinsert").on("click", function(e) {
    $("#overlay").fadeIn();
    var state_id = $("#state_id").val();
    var name = $("#name").val();
    var status = $("#status").val();
    if (name == "" || state_id == "") {
        $("#overlay").fadeOut();
        $.toast({
            heading: 'Warning',
            text: 'Please Select State And District Name',
            showHideTransition: 'plain',
            position: 'top-right',
            icon: 'warning'
        })
    } else {
        if (districtid == 0) {
            $.ajax({
                type: 'post',
                url: "{{ route('district.store') }}",
                data: {
                    state_id: state_id,
                    name: name,
                    status: status,

                },
                datatype: ("json"),
                success: function(data) {
                    if (data.status == 200) {
                        $("#overlay").fadeOut();
                        $.toast({
                            heading: 'Success',
                            text: data.message,
                            showHideTransition: 'slide',
                            position: 'top-right',
                            icon: 'success'
                        })
                        clear();
                        table.ajax.reload();
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
                    $("#overlay").fadeOut();
                    $.toast({
                        heading: 'Warning',
                        position: 'top-right',
                        text: 'Fail to Action',
                        showHideTransition: 'plain',
                        icon: 'warning'
                    })
                    console.log(data);
                }
            });
        } else {
            $.ajax({
                type: 'post',
                url: "{{ route('district.update') }}",
                data: {
                    id: districtid,
                    state_id: state_id,
                    name: name,
                    status: status,

                },
                datatype: ("json"),
                success: function(data) {
                    if (data.status == 200) {
                        $("#overlay").fadeOut();
                        $.toast({
                            heading: 'Update',
                            text: data.message,
                            showHideTransition: 'slide',
                            position: 'top-right',
                            icon: 'success'
                        })
                        clear();
                        table.ajax.reload();
                    } else {
                        $("#overlay").fadeOut();
                        $.toast({
                            heading: 'Error',
                            text: data.message,
                            showHideTransition: 'fade',
                            position: 'top-right',
                            icon: 'error'
                        })
                    }

                },
                error: function() {
                    $("#overlay").fadeOut();
                    $.toast({
                        heading: 'Warning',
                        position: 'top-right',
                        text: 'Fail to Action',
                        showHideTransition: 'plain',
                        icon: 'warning'
                    })
                }

            });

        }
    }
})

function clear() {
    districtid = 0;
    $("#name").val("");
    $("#districtmodel").modal('hide');
}
$(".model-close").on('click', function() {
    districtid = 0;
    $("#name").val("");

});
$(document).on('click', "#reset", function() {
    clear();
})
$(document).on('click', '#deletedata', function() {
    swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this  data!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                var dataid = $(this).data("id");
                $.ajax({
                    type: "POST",
                    url: "{{ url('SuperAdmin/District/delete')}}" + '/' + dataid,
                    success: function(data) {
                        table.ajax.reload();
                        clear();
                    },
                    error: function() {
                        swal("Opps! Faild", "Form Submited Faild", "error");
                    }
                });
                swal("Poof! Your imaginary file has been deleted!", {
                    icon: "success",
                });
            } else {
                swal("Your imaginary file is safe!");
            }
        });


})
//show Data by id

$(document).on('click', '#datashow', function() {
    var id = $(this).data("id");
    $.ajax({
        type: 'get',
        url: "{{ route('district.show') }}",
        data: {
            id: id,
        },
        datatype: 'JSON',
        success: function(data) {
            districtid = data.id;
            $("#name").val(data.name);
            $("#status option[value='" + data.status + "']").attr('selected', 'selected');
            $("#state_id option[value='" + data.state_id + "']").attr('selected', 'selected');
        },
        error: function(data) {
            console.log(data);
        }
    });
})

$(document).on('click', '#inactive', function() {
    var id = $(this).data("id");
    $.ajax({
        type: "get",
        url: "{{ url('SuperAdmin/District/inactive')}}" + '/' + id,
        success: function(data) {
            if (data.status == 200) {
                $.toast({
                    heading: 'Update',
                    text: data.message,
                    showHideTransition: 'slide',
                    position: 'top-right',
                    icon: 'success'
                });
                table.ajax.reload();
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
        url: "{{ url('SuperAdmin/District/active')}}" + '/' + id,
        success: function(data) {
            if (data.status == 200) {
                $.toast({
                    heading: 'Status Update',
                    text: data.message,
                    showHideTransition: 'slide',
                    position: 'top-right',
                    icon: 'success'
                });
                table.ajax.reload();
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