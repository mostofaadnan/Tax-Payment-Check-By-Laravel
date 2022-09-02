<div class="modal fade" id="unioninfomodel" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Union Info</h5>
                <button type="button" class="btn-close model-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="sate">State</label>
                            <input type="text" class="form-control" id="state" disabled>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="Disrict">District</label>
                            <input type="text" class="form-control" id="district" disabled>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="upazila">Upazila</label>
                            <input type="text" class="form-control" id="upazila" disabled>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="union">Union</label>
                            <input type="text" class="form-control" id="union" disabled>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="UnionTitle">Union Ttile (Name)</label>
                            <input type="text" id="title" class="form-control" placeholder="Union Ttile (Name)">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="address">Address</label>
                            <textarea name="" address cols="30" rows="5" class="form-control" id="address"></textarea>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <label for="phone">Phone</label>
                        <input type="phone" id="phone" class="form-control" placeholder="Phone">
                    </div>
                    <div class="col-sm-6">
                        <label for="email">Email</label>
                        <input type="email" id="email" class="form-control" placeholder="Email">
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary model-close" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="dataupdate">Save Change</button>
            </div>
        </div>
    </div>
</div>



<script>
$('#birth_day').bootstrapMaterialDatePicker({
    time: false
});
/* $(function() {
    var d = new Date();
    var month = d.getMonth() + 1;
    var day = d.getDate();

    var output = d.getFullYear() + '-' +
        (month < 10 ? '0' : '') + month + '-' +
        (day < 10 ? '0' : '') + day;
    $("#birth_day").val(output);
}); */
</script>
