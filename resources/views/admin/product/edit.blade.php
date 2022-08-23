@extends('admin.layouts.app')
@section('title', 'Edit Pizza')
@section('content')

    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="col-lg-10 offset-1">
                    <div class="card">
                        <div class="card-body">
                            <div class="">
                                {{-- <a href="{{ route('product#list') }}"> <i class="zmdi zmdi-arrow-left text-dark ms-3"></i> --}}
                                    <i class="zmdi zmdi-arrow-left text-dark ms-3" onclick="history.back()"></i>
                            </div>
                            <div class="card-title">
                                <h3 class="text-center title-2">Pizza Detail</h3>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-3 offset-1">
                                    <img src="{{ asset('storage/' . $pizza->image) }}" class="img-tumbnai shadow-sm">
                                </div>
                                <div class="col-8   ">
                                    <div class="my-3 btn bg-danger text-white d-block fs-5">{{ $pizza->name }}</div>
                                    <span class="my-3 btn bg-dark text-white"><i class="zmdi fs-5  zmdi-money"></i> {{ $pizza->price }}</span>
                                    <span class=" btn bg-dark text-white"><i class="zmdi  fs-5 zmdi-time"></i> {{ $pizza->waiting_time }}Mins</span>
                                    <span class=" btn bg-dark text-white"><i class="zmdi fs-5 zmdi-eye"></i> {{ $pizza->view_count }}</span>
                                    <span class=" btn bg-dark text-white"><i class="zmdi fs-5 zmdi-menu"></i> {{ $pizza->category_name }}</span>
                                    <span class=" btn bg-dark text-white"><i class="zmdi fs-5 zmdi-calendar"></i> {{ $pizza->created_at->format('j-F-Y') }}</span>
                                        <div class="my-3"><i class="zmdi  fs-5 zmdi-file-text me-2"></i>Details</div>
                                        <div class=" "> {{ $pizza->description }}
                                        </div>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
<div class="account-item clearfix js-item-menu">
    <div class="image ">
        @if (Auth::user()->image == null)
            @if (Auth::user()->gender == 'male')
                <img src="{{ asset('image/download.jfif') }}" alt="">
            @else
                <img src="{{ asset('image/female.jpg') }}" alt="">
            @endif
        @else
            <img src="{{ asset('storage/' . Auth::user()->image) }}"
                alt="">
        @endif
    </div>
    <div class="content">
        <a class="js-acc-btn" href="#">{{ Auth::user()->name }}</a>
    </div>
    <div class="account-dropdown js-dropdown">
        <div class="info clearfix">
            <div class="image">
                <a href="">
                    @if (Auth::user()->image == null)
                        @if (Auth::user()->gender == 'male')
                            <img src="{{ asset('image/download.jfif') }}"
                                alt="">
                        @else
                            <img src="{{ asset('image/female.jpg') }}"
                                alt="">
                        @endif
                    @else
                        <img src="{{ asset('storage/' . Auth::user()->image) }}"
                            alt="">
                    @endif
                </a>
            </div>
            <div class="content">
                <h5 class="name">
                    <a href="#">{{ Auth::user()->name }}</a>
                </h5>
                <span class="email">{{ Auth::user()->email }}</span>
            </div>
        </div>
        <div class="account-dropdown__body">
            <div class="account-dropdown__item">
                <a href="{{ route('admin#details') }}">
                    <i class="zmdi zmdi-account"></i>Account</a>
            </div>
        </div>
        <div class="account-dropdown__body">
            <div class="account-dropdown__item">
                <a href="{{ route('admin#list') }}">
                    <i class="zmdi zmdi-accounts"></i>Admin List</a>
            </div>
        </div>
        <div class="account-dropdown__body">
            <div class="account-dropdown__item">
                <a href="{{ route('admin#changePasswordPage') }}">
                    <i class="zmdi zmdi-key"></i>Change Password</a>
            </div>
        </div>
        <div class="account-dropdown__footer mb-3">
            <form action="{{ route('logout') }}"
                class="d-flex justify-content-center" method="POST">
                @csrf
                <button class="btn bg-dark text-white text-center col-10"
                    type="submit">
                    <i class="zmdi zmdi-power "> </i> Logout
                </button>
            </form>
        </div>
    </div>
</div>
