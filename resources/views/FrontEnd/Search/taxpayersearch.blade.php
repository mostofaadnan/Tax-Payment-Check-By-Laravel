<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js"></script>
<div class="row">
    <div class="col-sm-6 mx-auto mb-2">
        <form action="{{ route('front.taxholder.profile') }}" method="get">
        <label for="search">Search <span style="font-size:12px; color:#000;">(Please Enter Holing Number Or Memo
                Number)</span></label>
        <p id="error-label" style="color:red;"></p>
        <input type="serach" class="form-control" placeholder="Search" name="searchdata" id="searchdata">
        <button type="submit" class="btn btn-danger wrn-btn datacheck">Search</button>
        </form>
    </div>
</div>
