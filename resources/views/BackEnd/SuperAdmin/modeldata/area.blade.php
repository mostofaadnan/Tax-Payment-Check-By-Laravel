<div class="modal fade" id="areamodel" tabindex="-1" aria-labelledby="areamodel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New Union</h5>
                <button type="button" class="btn-close model-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="exampleInputPassword2" class="col-form-label">State</label>
                    <select id="state_id" class="form-control">
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword2" class="col-form-label">District</label>
                    <select id="district_id" class="form-control">
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword2" class="col-form-label">Upazila</label>
                    <select id="upazila_id" class="form-control">
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword2" class="col-form-label">Union</label>
                    <select id="union_id" class="form-control">
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword2" class="col-form-label">Area Name</label>
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
                    <button type="button" id="areainsert" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>
</div>
