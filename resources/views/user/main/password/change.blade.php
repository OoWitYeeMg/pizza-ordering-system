@extends('user.main.layout.master')
@section('title', 'Change Password')
@section('content')
<div class="row mt-5 px-xl-5">
    <div class="col-6 offset-3 ">
        <div class="main-content">
            <div class="section__content section__content--p30">
                <div class="container-fluid">
                    <div class="">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-title">
                                    <h3 class="text-center title-2">Change Password</h3>
                                </div>
                                <hr>

                                <form action="{{ route('user#changePasswordPage') }}" method="post" novalidate="novalidate">
                                    @csrf
                                    <div class="form-group mt-3">
                                        <label class="control-label mb-1">Old Password</label>
                                        <input id="cc-pament" name="oldPassword" type="password"
                                            class="form-control  @if (session('notMatch')) is-invalid @endif
                                            @error('oldPassword') is-invalid @enderror"
                                            aria-required="true" aria-invalid="false" placeholder="Enter Old Password...">
                                            @error('oldPassword')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        @if (session('notMatch'))
                                            <div class="invalid-feedback">{{ session('notMatch') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group mt-3">
                                        <label class="control-label mb-1">New Password</label>
                                        <input id="cc-pament" name="newPassword" type="password"
                                            class="form-control @error('newPassword') is-invalid @enderror" aria-required="true"
                                            aria-invalid="false" placeholder="Enter New Password...">
                                        @error('newPassword')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group mt-3">
                                        <label class="control-label mb-1">Confirm Password</label>
                                        <input id="cc-pament" name="confirmPassword" type="password"
                                            class="form-control @error('confirmPassword') is-invalid @enderror"
                                            aria-required="true" aria-invalid="false" placeholder="Enter Confirm Password...">
                                        @error('confirmPassword')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mt-3">
                                        <button id="payment-button" type="submit" class="w-100 btn btn-lg btn-dark btn-block">
                                            <span id="payment-button-amount">Change Password</span>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
