@extends('FrontEnd.layouts.master')
@section('content')
<style>
.pagination {
    /* float: right; */
    margin-top: 10px;
}
</style>
<!-- banner section -->
@include('FrontEnd.Home.locationaForm')
@if($NoticesTitle->count()>0)
@include('FrontEnd.Home.NoticeCarusal')
@endif
<div class="row">
    <div class="col-sm-9">
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
        </section>
        @include('FrontEnd.Home.aboutus')
        <!-- <section class="team-member-section main-bg py-5">
  <div class="container">
    <div class="row">
      <div class="col-lg-2"></div>
      <div class="col-lg-8">
        <div class="finix-text text-center">
          <h6>Expert People</h6>
          <h2>Meet leadership team</h2>
          <p class="w-75 m-auto">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
            do eiusmod tempor incididunt ut labore et dolore magna aliqua.
          </p>
        </div>
      </div>
      <div class="col-lg-2"></div>
    </div>

    <div class="row py-5">
      <div class="col-lg-3">
        <div class="team-member">
          <div class="team-member-pic">
            <img src="img/team1.jpg" alt="" />
            <div class="member-social-icon">
              <ul>
                <li><i class="fa fa-facebook" aria-hidden="true"></i></li>
                <li><i class="fa fa-twitter" aria-hidden="true"></i></li>
                <li><i class="fa fa-linkedin" aria-hidden="true"></i></li>
                <li>
                  <i class="fa fa-instagram" aria-hidden="true"></i>
                </li>
              </ul>
            </div>
          </div>
          <div class="member-info">
            <h4>Jerome Le Luel</h4>
            <p>Managing Director</p>
          </div>
        </div>
      </div>
      <div class="col-lg-3">
        <div class="team-member">
          <div class="team-member-pic">
            <img src="img/team2.jpg" alt="" />
            <div class="member-social-icon">
              <ul>
                <li><i class="fa fa-facebook" aria-hidden="true"></i></li>
                <li><i class="fa fa-twitter" aria-hidden="true"></i></li>
                <li><i class="fa fa-linkedin" aria-hidden="true"></i></li>
                <li>
                  <i class="fa fa-instagram" aria-hidden="true"></i>
                </li>
              </ul>
            </div>
          </div>
          <div class="member-info">
            <h4>Andrew Learoyd</h4>
            <p>Chief Executive Officer</p>
          </div>
        </div>
      </div>
      <div class="col-lg-3">
        <div class="team-member">
          <div class="team-member-pic">
            <img src="img/team3.jpg" alt="" />
            <div class="member-social-icon">
              <ul>
                <li><i class="fa fa-facebook" aria-hidden="true"></i></li>
                <li><i class="fa fa-twitter" aria-hidden="true"></i></li>
                <li><i class="fa fa-linkedin" aria-hidden="true"></i></li>
                <li>
                  <i class="fa fa-instagram" aria-hidden="true"></i>
                </li>
              </ul>
            </div>
          </div>
          <div class="member-info">
            <h4>Harry Nelis</h4>
            <p>Technology Officer</p>
          </div>
        </div>
      </div>
      <div class="col-lg-3">
        <div class="team-member">
          <div class="team-member-pic">
            <img src="img/image4.jpg" alt="" />
            <div class="member-social-icon">
              <ul>
                <li><i class="fa fa-facebook" aria-hidden="true"></i></li>
                <li><i class="fa fa-twitter" aria-hidden="true"></i></li>
                <li><i class="fa fa-linkedin" aria-hidden="true"></i></li>
                <li>
                  <i class="fa fa-instagram" aria-hidden="true"></i>
                </li>
              </ul>
            </div>
          </div>
          <div class="member-info">
            <h4>Lucy Vernall</h4>
            <p>Chief Financial Officer</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section> -->
    </div>
    <div class="col-sm-3">
        @include('FrontEnd.Home.union')
    </div>
</div>
@endsection