<nav class="navbar navbar-expand-lg navbar-light">
    <div class="container">
        <a href="{{ route('fronthome') }}" class="navbar-brand text-light"><b>{{ config('company.company_name') }}</b></a>
        <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav">
                <a href="{{ route('fronthome') }}" class="nav-item nav-link active">Home</a>
                <a href="{{ route('front.unions') }}" class="nav-item nav-link">Union Inquery</a>
                <a href="{{ route('front.page.aboutus') }}" class="nav-item nav-link">About Us</a>
                <a href="{{ route('front.notices') }}" class="nav-item nav-link">Notice</a>
                <a href="{{ route('front.page.contactus') }}" class="nav-item nav-link">Contact Us</a>
            </div>
            <div class="navbar-nav ms-auto">
              <!--   <a href="#" class="nav-item nav-link">English</a> -->
            </div>
        </div>
    </div>
</nav>