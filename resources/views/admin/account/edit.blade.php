@extends('admin.layouts.app')
@section('title', 'Account Profile')
@section('content')

<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">

            <div class="col-lg-10 offset-1">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                            <h3 class="text-center title-2">Account Profile</h3>
                        </div>
                        <hr>
                        <form action="{{ route('admin#update',Auth::user()->id) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-4 offset-1">
                                    @if (Auth::user()->image == null)
                                        @if (Auth::user()->gender == 'Male')
                                            <img src="{{ asset('image/download.jfif') }}" class="img-thumbnail shadow-sm" alt="">
                                        @else
                                            <img src="{{ asset('image/female.jpg') }}" class="img-thumbnail shadow-sm" alt="">
                                        @endif
                                    @else
                                        <img src="{{ asset('storage/' . Auth::user()->image) }}" class="img-thumbnail shadow-sm" alt="">
                                    @endif
                                    <div class="mt-3 ">
                                        <input type="file" class="form-control @error('image') is-invalid @enderror"
                                            name="image">
                                        @error('image')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mt-3 ">
                                        <button class="btn bg-dark text-white col-12" type="submit">
                                            Update
                                        </button>
                                    </div>

                                </div>

                                <div class=" col-6">
                                    <div class="form-group">
                                        <label class="control-label mb-1">Name</label>
                                        <input id="cc-pament" name="name" type="text"
                                            class="form-control  @error('name') is-invalid @enderror"
                                            aria-required="true" aria-invalid="false" placeholder="Enter Name..."
                                            value="{{ old('name', Auth::user()->name) }}">

                                        @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label mb-1">Email</label>
                                        <input id="cc-pament" name="email" type="email"
                                            class="form-control @error('email') is-invalid @enderror"
                                            aria-required="true" aria-invalid="false" placeholder="Enter Email..."
                                            value="{{ old('email', Auth::user()->email) }}">
                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label mb-1">Phone</label>
                                        <input id="cc-pament" name="phone" type="text"
                                            class="form-control @error('phone') is-invalid @enderror"
                                            aria-required="true" aria-invalid="false" placeholder="Enter Phone..."
                                            value="{{ old('phone', Auth::user()->phone) }}">
                                        @error('phone')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label class="control_label mb-1"></label>
                                        <select name="gender" id="" class="form-control">
                                            <option value="">Choose Gender...</option>

                                            <option value="Male" @if (Auth::user()->gender == 'Male') selected @endif>
                                                Male</option>
                                            <option value="Female" @if (Auth::user()->gender == 'Female') selected @endif>
                                                Female</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label mb-1">Address</label>
                                        <textarea name="address" class="form-control @error('address') is-invalid @enderror" placeholder="Enter Address..."
                                            id="" cols="30" rows="10">{{ old('address', Auth::user()->address) }}</textarea>
                                        @error('address')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label mb-1">Role</label>
                                        <input id="cc-pament" name="role" type="text"
                                            class="form-control @error('role') is-invalid @enderror"
                                            aria-required="true" aria-invalid="false"
                                            value="{{ old('role', Auth::user()->role) }}" disabled>
                                        @error('role')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    {{-- <div>
                                    <button id="payment-button" type="submit"
                                        class="btn btn-lg btn-info btn-block">
                                        <span id="payment-button-amount">Change Password</span>

                                    </button>
                                </div> --}}
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


