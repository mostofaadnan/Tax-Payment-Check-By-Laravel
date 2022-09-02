<footer class="text-center text-lg-start text-muted">
    <!-- Section: Links  -->
    <section class="">
        <div class="container text-center text-md-start mt-5">
            <!-- Grid row -->
            <div class="row mt-3">
                <!-- Grid column -->
                <!--    <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
               
                    <h6 class="text-uppercase fw-bold mb-4">
                        <i class="fas fa-gem me-3"></i>{{ config('company.company_name') }}
                    </h6>
                
                </div> -->
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                    <!-- Links -->
                    <h6 class="text-uppercase fw-bold mb-4">
                        Useful links
                    </h6>
                    <p>
                        <a href="{{ route('front.unions')}}" class="text-reset">Union Inquery</a>
                    </p>
                    <p>
                        <a href="{{ route('front.page.aboutus')}}" class="text-reset">About Us</a>
                    </p>
                    <p>
                        <a href="{{ route('front.notices') }}" class="text-reset">Notice</a>
                    </p>
                    <p>
                        <a href="{{ route('front.page.contactus') }}" class="text-reset">Contact Us</a>
                    </p>
                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <!--        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
               
                    <h6 class="text-uppercase fw-bold mb-4">
                        Useful links
                    </h6>
                    <p>
                        <a href="#!" class="text-reset">Pricing</a>
                    </p>
                    <p>
                        <a href="#!" class="text-reset">Settings</a>
                    </p>
                    <p>
                        <a href="#!" class="text-reset">Orders</a>
                    </p>
                    <p>
                        <a href="#!" class="text-reset">Help</a>
                    </p>
                </div> -->
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                    <!-- Links -->
                    <h6 class="text-uppercase fw-bold mb-4">Contact</h6>
                    <p><i class="fas fa-home me-3"></i>{{ config('company.company_name') }}</p>
                    <p>
                        <i class="fas fa-envelope me-3"></i>{{ config('company.email') }}
                    </p>
                    <p><i class="fas fa-phone me-3"></i> {{ config('company.phone') }}</p>
                    <!--   <p><i class="fas fa-print me-3"></i> + 01 234 567 89</p> -->
                </div>
                <!-- Grid column -->
            </div>
            <!-- Grid row -->
        </div>
    </section>
    <!-- Section: Links  -->

    <!-- Copyright -->
    <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">{{ config('company.copy_rights') }}
    </div>
    <!-- Copyright -->
</footer>
<script>
$('.single-select').select2({
    theme: 'bootstrap4',
    width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
    placeholder: $(this).data('placeholder'),
    allowClear: Boolean($(this).data('allow-clear')),
});
$('.multiple-select').select2({
    theme: 'bootstrap4',
    width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
    placeholder: $(this).data('placeholder'),
    allowClear: Boolean($(this).data('allow-clear')),
});
</script>