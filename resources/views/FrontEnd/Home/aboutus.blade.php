<section class="">
    <div class="container">
        <div class="card custom-card">
            <div class="card-header custom-card-header">
                <h5>About Us</h5>
            </div>
            <div class="card-body">
                <div class="about-us">
                    @foreach($aboutus as $about)
                    <h5 style="border-bottom:1px #ccc solid;">{{ $about->title }}</h5>
                    <?php
$filename = 'about-' . $about->id . '.txt';
$files = storage_path("app/public/AboutUs/$filename");
if (file_exists($files)) {
    $file = fopen(storage_path("app/public/AboutUs/$filename"), "r") or exit("Unable to open file!");
    while (!feof($file)) {
        echo fgets($file);
    }

    fclose($file);
}

?>

                    @endforeach
                    <a href="{{ route('front.page.aboutus') }}" class="btn btn-danger">Learn More</a>
                </div>
            </div>
        </div>
    </div>
</section>