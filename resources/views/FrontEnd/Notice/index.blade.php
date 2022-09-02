@extends('FrontEnd.layouts.master')
@section('content')
<div class="row">
    <div class="col-md-8 col-lg-8 col-sm-12 mx-auto">
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