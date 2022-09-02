@extends('FrontEnd.layouts.master')
@section('content')
<section style="margin-top:20px;">
    <div class="container">
        <h3 class="text-center">Contact us</h3><br />
        <div class="row">
            <div class="col-md-8">
                @include('FrontEnd.layouts.ErrorMessage')
                <form action="{{ route('front.page.contactus.store') }}" method="Post">
                    @csrf
                    <input class="form-control" type="text" name="name" placeholder="Name..." required /><br />
                    <input class="form-control" type="phone" name="phone" placeholder="Phone..." required /><br />
                    <input class="form-control" type="email" name="email" placeholder="E-mail..." required /><br />
                    <textarea class="form-control" name="message" placeholder="How can we help you?"
                        style="height:150px;" required></textarea><br />
                    <input class="btn btn-primary" type="submit" value="Send" /><br /><br />
                </form>
            </div>
            <div class="col-md-4">
                <b>Address:</b> <br />
                {{ config('company.company_name') }}, <br />
                {{ config('company.address') }}<br />
                Phone: {{ config('company.phone') }}<br />
                <a href="{{ config('company.email') }}">{{ config('company.email') }}</a><br />
            </div>
        </div>
    </div>
</section>
@endsection