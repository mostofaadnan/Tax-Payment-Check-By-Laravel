<div class="modal fade" id="districtmodel" tabindex="-1" aria-labelledby="districtmodel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New District</h5>
                <button type="button" class="btn-close model-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="exampleInputPassword2" class="col-form-label">State</label>
                    <select id="state_id" class="form-control">
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword2" class="col-form-label">Name</label>
                    <input type="text" class="form-control" id="name" placeholder="Name">
                </div>

                <div class="form-group mb-3">
                    <label for="exampleInputPassword2" class="col-form-label">Status</label>
                    <select class="form-control" id="status">
                        <option value="1">Active</option>
                        <option value="0">Deactive</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <div class="btn-group" role="group" aria-label="Basic example">
                    <button type="button" class="btn btn-secondary model-close" data-bs-dismiss="modal">Close</button>
                    <button type="button" id="districtinsert" class="btn btn-primary" id="dataupdate">Save</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function State() {
    $.ajax({
        type: 'get',
        url: "{{ route('state.getlist') }}",
        dataType: "JSON",
        success: function(data) {
            $("#state_id").empty();
            $("#state_id").append('<option value="">Select</option>');
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
</script>
