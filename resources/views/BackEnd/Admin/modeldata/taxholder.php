<div class="modal fade" id="taxholdermodel" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">New Tax Holder</h5>
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
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="area">Area</label>
                            <select name="" id="area_id" class="form-control"></select>
                        </div>
                    </div>
                </div>
                <hr>
                <h5 align="center">Tax Payer Information</h5>

                <div class="row">
                    <div class="col-sm-6 mb-2 mx-auto">
                        <div class="form-group">
                            <label for="date">Date<span>*</span></label>
                            <input type="text" class="form-control" id="date" placeholder="Date">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 mb-2 mx-auto">
                        <div class="form-group">
                            <label for="nid">Name<span>*</span></label>
                            <input type="text" class="form-control" id="name" placeholder="Name">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 mb-2 mx-auto">
                        <div class="form-group">
                            <label for="birth_day">Holding Number<span>*</span></label>
                            <input type="text" class="form-control" id="holding_number" placeholder="Holding Number">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 mb-2 mx-auto">
                        <div class="form-group">
                            <label for="mother">Memo Number <span>*</span></label>
                            <input type="text" class="form-control" id="memo_number" placeholder="Memo Number">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 mb-2 mx-auto">
                        <div class="form-group">
                            <label for="mobilenumber">Amount</label>
                            <input type="amount" class="form-control" id="amount" placeholder="Amount">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary model-close" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="datainsert">Save</button>
            </div>
        </div>
    </div>
</div>


<script>
$('#date').bootstrapMaterialDatePicker({
    time: false
});
$(function() {
    var d = new Date();
    var month = d.getMonth() + 1;
    var day = d.getDate();

    var output = d.getFullYear() + '-' +
        (month < 10 ? '0' : '') + month + '-' +
        (day < 10 ? '0' : '') + day;
    $("#date").val(output);
});
</script>