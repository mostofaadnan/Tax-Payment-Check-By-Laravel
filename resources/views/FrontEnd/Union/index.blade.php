@extends('FrontEnd.layouts.master')
@section('content')

<section class="union-section">
    <div class="container">
        <div class="row">
            <!--   <h4 >Union</h4> -->
            @foreach($unions as $union)
            <div class="col-lg-3 col-md-3 col-sm-3">
                <div class="card custom-card">
                    <div class="card header custom-card-header text-center"><a class="text-light" href="{{ route('front.union.details', $union->id)}}">{{ $union->name }}</a></div>
                </div>
                <div class="card-body">
                    <ul>
                        @foreach($union->AreaDetails as $area)
                        <li><a href="{{ route('front.area.details',$area->id) }}">{{ $area->name }}</a></li>
                        @endforeach

                    </ul>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection