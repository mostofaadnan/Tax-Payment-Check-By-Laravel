@extends('BackEnd.Admin.layouts.app')
@section('wrapper')

<div class="page-wrapper">
    <div class="page-content">
        <div class="row">
            <div class="col-sm-12 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            Tax Payer Management
                        </div>
                        <div class="float-end">
                            <button class="btn btn-sm btn-info" data-bs-toggle="modal"
                                data-bs-target="#taxholdermodel">New
                                Tax Payer</button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered" id="mytable" style="width:100%"
                                cellspacing="0">
                                <thead>
                                    <tr>
                                        <th width="5%"> #Sl </th>
                                        <th>Location</th>
                                        <th> Date </th>
                                        <th> Name </th>
                                        <th> Holding Number </th>
                                        <th> Memo Number </th>
                                        <th> Amount </th>
                                        <th width="10%"> Action </th>
                                    </tr>
                                </thead>
                                <tbody id="showalldata">

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th width="5%"> #Sl </th>
                                        <th width="30%">Location</th>
                                        <th> Date </th>
                                        <th  Width="40%"> Name </th>
                                        <th> Holding Number </th>
                                        <th> Memo Number </th>
                                        <th> Amount </th>
                                        <th width="10%"> Action </th>
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
@include('BackEnd.Admin.modeldata.taxholder')
<script type='text/javascript'>
var table;
var taxholderid = 0;

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
            "url": "{{ route('taxholder.loadall') }}",
            "type": "GET",
        },
        columns: [{
                data: 'DT_RowIndex',
                name: 'DT_RowIndex',
                className: "text-center"
            },
            {
                data: 'Location',
                name: 'Location',

            },
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


function LocationOnload() {
    var state = "{{ Auth::user()->UnionName->UpazilaName->DistricName->StateName->name }} ";
    $("#state").val(state);
    var district = "{{ Auth::user()->UnionName->UpazilaName->DistricName->name }} ";
    $("#district").val(district);
    var upazila = "{{ Auth::user()->UnionName->UpazilaName->name }} ";
    $("#upazila").val(upazila);
    var union = "{{ Auth::user()->UnionName->name }} ";
    $("#union").val(union);

    var union_id = "{{ Auth::user()->UnionName->id }} ";
    console.log(union_id);
    $.ajax({
        type: 'get',
        url: "{{ url('Admin/Admin-Area/getlist')}}" + '/' + union_id,
        dataType: "JSON",
        success: function(data) {
            $("#area_id").empty();
            $("#area_id").append('<option value="">Select</option>');
            data.forEach(function(value) {
                $("#area_id").append('<option value="' + value.id + '">' +
                    value.name + '</option>');
            })
        },
        error: function(data) {
            console.log(data);
        }
    });

}
window.onload = LocationOnload();

$("#datainsert").on("click", function(e) {
    $("#overlay").fadeIn();
    var area_id = $("#area_id").val();
    var date = $("#date").val();
    var name = $("#name").val();
    var holding_number = $("#holding_number").val();
    var memo_number = $("#memo_number").val();
    var amount = $("#amount").val();

    if (date == "" && name == "" && holding_number == "" && memo_number == "" && area == "" && amount == "" && amount == "0") {
        $("#overlay").fadeOut();
        $.toast({
            heading: 'Warning',
            text: 'Please Select Name,Father,Mother And NID',
            showHideTransition: 'plain',
            position: 'top-right',
            icon: 'warning'
        })
    } else {
        if (taxholderid == 0) {
            $.ajax({
                type: 'post',
                url: "{{ route('taxholder.store') }}",
                data: {
                    area_id: area_id,
                    date: date,
                    name: name,
                    holding_number: holding_number,
                    memo_number: memo_number,
                    amount: amount,
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
                url: "{{ route('taxholder.update') }}",
                data: {
                    id: taxholderid,
                    area_id: area_id,
                    date: date,
                    name: name,
                    holding_number: holding_number,
                    memo_number: memo_number,
                    amount: amount,

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
                error: function(data) {
                    console.log(data);
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
    taxholderid = 0;
    $("#date").val("");
    $("#name").val("");
    $("#holding_number").val("");
    $("#memo_number").val("");
    $("#amount").val("");
    $("#area").val("");
    $("#taxholdermodel").modal('hide');
}
$(".model-close").on('click', function() {
    taxholderid = 0;
    $("#date").val("");
    $("#name").val("");
    $("#holding_number").val("");
    $("#memo_number").val("");
    $("#amount").val("");
    $("#area").val("");

});
$(document).on('click', "#reset", function() {
    clear();
})
/* $(document).on('click', '#deletedata', function() {
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


}) */
//show Data by id

$(document).on('click', '#datashow', function() {
    var id = $(this).data("id");
    $.ajax({
        type: 'get',
        url: "{{ route('taxholder.show') }}",
        data: {
            id: id,
        },
        datatype: 'JSON',
        success: function(data) {
            taxholderid = data.id;
            var state = data.union_name.upazila_name.distric_name.state_name['name'];
            $("#state").val(state);
            var district = data.union_name.upazila_name.distric_name['name'];
            $("#district").val(district);
            var upazila = data.union_name.upazila_name['name'];;
            $("#upazila").val(upazila);
            var union = data.union_name['name'];
            $("#union").val(union);

            $("#date").val(data.date);
            $("#name").val(data.name);
            $("#holding_number").val(data.holding_number);
            $("#memo_number").val(data.memo_number);
            $("#amount").val(data.amount);
            $("#area").val(data.area);
            getArea(data.union_name['id'], data.area_id)
        },
        error: function(data) {
            console.log(data);
        }
    });
})

function getArea(union_id, area_id) {

    $.ajax({
        type: 'get',
        url: "{{ url('Admin/Admin-Area/getlist')}}" + '/' + union_id,
        dataType: "JSON",
        success: function(data) {
            $("#area_id").empty();
            $("#area_id").append('<option value="">Select</option>');
            data.forEach(function(value) {
                $("#area_id").append('<option value="' + value.id + '">' +
                    value.name + '</option>');
            })
            $("#area_id option[value='" + area_id + "']").attr('selected', 'selected');
        },
        error: function(data) {
            console.log(data);
        }
    });
}
</script>

@endsection
