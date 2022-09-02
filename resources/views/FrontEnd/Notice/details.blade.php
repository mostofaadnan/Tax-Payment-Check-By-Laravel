@extends('FrontEnd.layouts.master')
@section('content')
<div class="row">
    <div class="col-sm-8">
        <section class="Notice-section">
            <div class="container">
                <div class="card custom-card">
                    <div class="card-header custom-card-header">
                        <h5>Notice Details</h5>
                    </div>
                    <div class="card-body">

                        <span style="font-size:25px; font-weight:700px"> {{ $Notice->title }}</span><br>
                        <span style="font-size:14px; color:#555b57">{{ $Notice->date }}</span>

                        <?php
$filename = 'notice-' . $Notice->id . '.txt';
$files = storage_path("app/public/Notice/$filename");
if (file_exists($files)) {
    $file = fopen(storage_path("app/public/Notice/$filename"), "r") or exit("Unable to open file!");
    while (!feof($file)) {
        echo fgets($file);
    }

    fclose($file);
}
?>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <div class="col-sm-4">
        <section class="Notice-section">
            <div class="container">
                <div class="card custom-card">
                    <div class="card-header custom-card-header">
                        <h5>Notice</h5>
                    </div>
                    <div class="card-body Notice">
                        <ul style="list-style:none;">
                            @foreach($NoticesTitle as $notice)
                            <li><a href="{{ route('front.notice.details',$notice->id) }}">{{ $notice->title }} <span
                                        style="margin-left:20px;">({{$notice->date }})</span></a></li>
                            @endforeach
                        </ul>
                    </div>
                    @if($NoticesTitle->count()>16)
                    <div class="card-footer">
                        {{ $NoticesTitle->links() }}
                    </div>
                    @endif

                </div>
            </div>
        </section>
    </div>
</div>

@endsection