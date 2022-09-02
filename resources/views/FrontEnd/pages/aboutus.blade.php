@extends('FrontEnd.layouts.master')
@section('content')
<div class="row">
    <div class="col-sm-12">
        <section class="Notice-section">
            <div class="container">
                <div class="card custom-card">
                    <div class="card-header custom-card-header">
                        <h5>About Us</h5>
                    </div>
                    <div class="card-body">
                        @foreach($aboutuses as $aboutus)
                        <h5 style="border-bottom:1px #ccc solid;">{{ $aboutus->title }}</h5>

                        <?php
$filename = 'about-' . $aboutus->id . '.txt';
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


                    </div>
                </div>
            </div>
        </section>
    </div>
</div>

@endsection