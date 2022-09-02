<div class="modal fade" id="paymentconfirmmodel" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Payment Confirmation</h5>
                <button type="button" class="btn-close model-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            @include('BackEnd.partialities.unioninfo')
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-7">
                                <h6 style="border-bottom:1px #ccc solid;">Tax Holder Information</h6>
                                <h6><b>Name: </b><span id="pname"></span></h6>
                                <p><b>Gender:</b><span id="pgender"></span><br>
                                    <b>Father:</b><span id="pfather"></span><br>
                                    <b>Mother:</b><span id="pmother"></span>
                                </p>
                                <address>
                                    <h6>Address:</h6>
                                    <p id="paddress">
                                    </p>
                                </address>
                                <p><b>NID:</b><span id="pnid"></span> <br>
                                    <b>Tax No:</b><span id="ptax_no"></span>
                                </p>
                            </div>
                            <div class="col-sm-5">
                                <h6 style="border-bottom:1px #ccc solid;">Payment Information</h6>
                                <p><b>Payment Date:</b> <span id="pdate"></span><br>
                                    <b>From Date:</b> <span id="pfrom_date"></span><br>
                                    <b>To Date:</b> <span id="pto_date"></span><br>
                                    <b>Year:</b> <span id="pyear"></span><br>
                                    <b>Payment No:</b> <span id="ppayment_no"></span>
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table-borderless custom-table" width="100%">
                                    <thead class="custom-header-table">
                                        <tr>
                                            <th
                                                class="item text text-semibold text-alignment-left text-left text-white border-radius-first">
                                                #sl</th>
                                            <th>Description</th>
                                            <th
                                                class="item text text-semibold text-alignment-left text-left text-white border-radius-last">
                                                Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody class="customer-table-boody">

                                        <tr>
                                            <td style="margin-left: 10px;">
                                                1
                                            </td>
                                            <td>
                                                <p>Tax Payment</p>
                                            </td>

                                            <td align="right" class="pamount"></td>
                                        </tr>
                                    </tbody>
                                    <tfoot class="custom-table-footer">
                                        <tr style="margin-top: 20px !important;">
                                            <td colspan="1"></td>
                                            <td align="right" style="border-bottom: 1px #003 solid;">
                                                Total:</td>
                                            <td align="right" class="pamount" style="border-bottom: 1px #003 solid;">
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary model-close" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="datainsertconfirm">Submit</button>
            </div>
        </div>
    </div>
</div>
