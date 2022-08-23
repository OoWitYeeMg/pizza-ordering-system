@extends('admin.layouts.app')
@section('title', 'Account Details')
@section('content')

    <div class="main-content">
        {{-- <div class="row">
            <div class="col-3 offset-7 mb-3">
                @if (session('updateSuccess'))
                <div class="col-3 offset-9">
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="zmdi zmdi-delete"></i> {{ session('updateSuccess') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                            aria-label="Close"></button>
                    </div>
                </div>
            @endif
            </div>
        </div> --}}
        <div class="section__content section__content--p30">
            <div class="container-fluid">

                <div class="col-lg-10 offset-1">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title">
                                <h3 class="text-center title-2">Account Info</h3>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-3 offset-2">
                                    @if (Auth::user()->image == null)
                                        @if (Auth::user()->gender == 'male')
                                            <img src="{{ asset('image/download.jfif') }}" alt="">
                                        @else
                                            <img src="{{ asset('image/female.jpg') }}" alt="">
                                        @endif
                                    @else
                                        <img src="{{ asset('storage/' . Auth::user()->image) }}" alt="">
                                    @endif
                                </div>
                                <div class="col-5 offset-1">
                                    <h4 class="mt-2"><i class="zmdi zmdi-account me-2"></i>{{ Auth::user()->name }}</h4>
                                    <h4 class="mt-2"><i class="zmdi zmdi-email me-2"></i> {{ Auth::user()->email }}</h4>
                                    <h4 class="mt-2"><i class="zmdi zmdi-phone me-2"></i> {{ Auth::user()->phone }}</h4>
                                    <h4 class="mt-2"><i class="zmdi zmdi-map me-2"></i> {{ Auth::user()->address }}</h4>
                                    <h4 class="mt-2"><i class="zmdi zmdi-phone me-2"></i> {{ Auth::user()->gender }}</h4>
                                    <h4 class="mt-2"><i class="zmdi zmdi-calendar me-2"></i>
                                        {{ Auth::user()->created_at->format('j-F-Y') }}</h4>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4 offset-4 mt-3">
                                    <a href="{{ route('admin#edit') }}">
                                        <button class="btn bg-dark text-white">
                                            <i class="zmdi zmdi-account me-2"></i>Edit Profile </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
