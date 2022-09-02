@extends("BackEnd.Admin.layouts.app")
@section("wrapper")
<div class="page-wrapper">
    <div class="page-content">

        <div class="dash-wrapper bg-info">

        </div>

        <div class="row" style="margin-top:30px;">
            <div class="col">
                <div class="card radius-10 mb-0">
                    <div class="card-body">
                        <h5 align="center">Union Information</h5>
                        <div class="row">
                            <div class="col-sm-6 mx-auto">
                                <table class="table table-striped">
                                    <tr>
                                        <th>State:</th>
                                        <td>{{ Auth::user()->UnionName->UpazilaName->DistricName->StateName->name }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>District:</th>
                                        <td>{{ Auth::user()->UnionName->UpazilaName->DistricName->name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Upazila:</th>
                                        <td>{{ Auth::user()->UnionName->UpazilaName->name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Tile:</th>
                                        <td>{{ Auth::user()->UnionName->title }}</td>
                                    </tr>
                                    <tr>
                                        <th>Address:</th>
                                        <td>{{ Auth::user()->UnionName->address }}</td>
                                    </tr>
                                    <tr>
                                        <th>Phone:</th>
                                        <td>{{ Auth::user()->UnionName->phone }}</td>
                                    </tr>
                                    <tr>
                                        <th>Email:</th>
                                        <td>{{ Auth::user()->UnionName->email }}</td>
                                    </tr>
                                    <tr>
                                        <th>Address:</th>
                                        <td>{{ Auth::user()->UnionName->name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Total Tax Holder:</th>
                                        <td>{{ $taxholder }}</td>
                                    </tr>
                                    <tr>
                                        <th>Total Tax Amount:</th>
                                        <td>{{ $tax }}/-</td>
                                    </tr>
                                 
                                </table>

                                <div class="float-end">
                                    <button class="btn btn-success btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#unioninfomodel">Update</button>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
        <!--end row-->
    </div>
</div>
@include('BackEnd.Admin.modeldata.unionInfo')
<script>
window.onload = function LocationOnload() {
    var state = "{{ Auth::user()->UnionName->UpazilaName->DistricName->StateName->name }}";
    $("#state").val(state);
    var district = "{{ Auth::user()->UnionName->UpazilaName->DistricName->name }}";
    $("#district").val(district);
    var upazila = "{{ Auth::user()->UnionName->UpazilaName->name }}";
    $("#upazila").val(upazila);
    var union = "{{ Auth::user()->UnionName->name }}";
    $("#union").val(union);

    var title = "{{ Auth::user()->UnionName->title }}";
    $("#title").val(title);
    var address = "{{ Auth::user()->UnionName->address }}";
    $("#address").val(address);
    var email = "{{ Auth::user()->UnionName->email }}";
    $("#email").val(email);
    var phone = "{{ Auth::user()->UnionName->phone }}";
    $("#phone").val(phone);
}

$("#dataupdate").on("click", function(e) {
    $("#overlay").fadeIn();
    var title = $("#title").val();
    var addresses = $("#address").val();
    var email = $("#email").val();
    var phone = $("#phone").val();
    var unionid = "{{ Auth::user()->UnionName->id }} ";
    console.log(address);
    if (title == "" && phone == "" && address=="") {
        $("#overlay").fadeOut();
        $.toast({
            heading: 'Warning',
            text: 'Please Select State,District And Name Correctly',
            showHideTransition: 'plain',
            position: 'top-right',
            icon: 'warning'
        })
    } else {
        if (unionid > 0) {
            $.ajax({
                type: 'post',
                url: "{{ route('union.adminupdate') }}",
                data: {
                    id: unionid,
                    title: title,
                    address: addresses,
                    email: email,
                    phone: phone,

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
                        $("#unioninfomodel").modal('hide');
                       
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
            $("#overlay").fadeOut();
        }
    }
})
</script>
@endsection