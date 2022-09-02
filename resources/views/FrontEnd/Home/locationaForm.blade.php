<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js"></script>
<section class="banner-section">
    <div class="overlay">
        <div class="container">
            <div class="banner-content">
                <!-- <h3 class="banner-heading">Welcome to Check Tax BD</h3> -->
                <div class="row">
                    <div class="col-lg-2 col-md-2 col-sm-12 p-0">
                        <div class="form-group">
                            <select name="" id="state_id" class="form-control search-slt single-select">
                                <option value="">Choose State...</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-12 p-0">
                        <div class="form-group">
                            <select name="" id="district_id" class="form-control search-slt single-select">
                                <option value="volvo">Choose District...</option>

                            </select>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-12 p-0">
                        <div class="form-group">
                            <select name="" id="upazila_id" class="form-control search-slt single-select">
                                <option value="volvo">Choose Upazila...</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-12 p-0">
                        <div class="form-group">
                            <select name="" id="union_id" class="form-control search-slt single-select">
                                <option value="volvo">Choose Union...</option>

                            </select>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-12 p-0">
                        <div class="form-group">
                            <select name="" id="area_id" class="form-control single-select search-slt">
                                <option value="volvo">Choose Area...</option>

                            </select>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-12 p-0">
                        <button type="button" class="btn btn-danger wrn-btn dataGet">Search</button>
                    </div>
                </div>
            </div>
        </div>
</section>
<script>
function State() {
    $.ajax({
        type: 'get',
        url: "{{ route('homestate.getlist') }}",
        dataType: "JSON",
        success: function(data) {
            $("#state_id").empty();
            $("#state_id").append('<option value="">Choice State...</option>');
            data.forEach(function(value) {
                $("#state_id").append('<option value="' + value.id + '">' +
                    value.name + '</option>');
            })
        },
        error: function(data) {
            console.log(data);
        }
    });
}
window.onload = State();

$("#state_id").on("change", function() {
    var id = $(this).val();
    if (id == "") {
        $("#district_id").empty();
        $("#district_id").append('<option value="">Choose Upazila</option>');
        $("#upazila_id").empty();
        $("#upazila_id").append('<option value="">Choose Upazila</option>');
        $("#union_id").empty();
        $("#union_id").append('<option value="">Choose Upazila</option>');
        $("#area_id").empty();
        $("#area_id").append('<option value="">Choose Upazila</option>');
    } else {
        $.ajax({
            type: 'get',
            url: "{{ url('getDistrictlist')}}" + '/' + id,
            dataType: "JSON",
            success: function(data) {
                $("#district_id").empty();
                $("#district_id").append('<option value="">Choose District</option>');
                data.forEach(function(value) {
                    $("#district_id").append('<option value="' + value.id + '">' +
                        value.name + '</option>');
                })
            },
            error: function(data) {
                console.log(data);
            }
        });

    }

});

$("#district_id").on("change", function() {
    var id = $(this).val();
    console.log(id);
    if (id == "") {
        $("#upazila_id").empty();
        $("#upazila_id").append('<option value="">Choose Upazila</option>');
        $("#union_id").empty();
        $("#union_id").append('<option value="">Choose Upazila</option>');
        $("#area_id").empty();
        $("#area_id").append('<option value="">Choose Upazila</option>');
    } else {
        $.ajax({
            type: 'get',
            url: "{{ url('getUpazilatlist')}}" + '/' + id,
            dataType: "JSON",
            success: function(data) {
                $("#upazila_id").empty();
                $("#upazila_id").append('<option value="">Choose Upazila</option>');
                data.forEach(function(value) {
                    $("#upazila_id").append('<option value="' + value.id + '">' +
                        value.name + '</option>');
                })
            },
            error: function(data) {
                console.log(data);
            }
        });

    }

});
$("#upazila_id").on("change", function() {
    var id = $(this).val();
    console.log(id);
    if (id == "") {
        $("#union_id").empty();
        $("#union_id").append('<option value="">Choose Upazila</option>');
        $("#area_id").empty();
        $("#area_id").append('<option value="">Choose Upazila</option>');
    } else {
        $.ajax({
            type: 'get',
            url: "{{ url('getUnionlist')}}" + '/' + id,
            dataType: "JSON",
            success: function(data) {
                $("#union_id").empty();
                $("#union_id").append('<option value="">Choose Union</option>');
                data.forEach(function(value) {
                    $("#union_id").append('<option value="' + value.id + '">' +
                        value.name + '</option>');
                })
            },
            error: function(data) {
                console.log(data);
            }
        });

    }

});
$("#union_id").on("change", function() {
    var id = $(this).val();
    console.log(id);
    if (id == "") {
        $("#area_id").empty();
    } else {
        $.ajax({
            type: 'get',
            url: "{{ url('getArealist')}}" + '/' + id,
            dataType: "JSON",
            success: function(data) {
                $("#area_id").empty();
                $("#area_id").append('<option value="">Choose Union</option>');
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

});
$(".dataGet").on('click', function() {
    var state_id = $("#state_id").val();
    var district_id = $("#district_id").val();
    var upazila_id = $("#union_id").val();
    var area_id = $("#area_id").val();
    var union_id = $("#union_id").val();

    if (state_id==""||district_id==""||upazila_id==""||union_id == "") {
        $.toast({
            heading: 'Warning',
            text: 'Please Select Select Union',
            showHideTransition: 'plain',
            position: 'top-right',
            icon: 'warning'
        })
    } else {
        if (area_id == "") {
            url = "{{ url('Union/Details')}}" + '/' + union_id,
                window.location = url;
        } else {
            url = "{{ url('Area')}}" + '/' + area_id,
                window.location = url;

        }
    }
})
</script>