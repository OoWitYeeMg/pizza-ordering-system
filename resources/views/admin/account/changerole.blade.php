@extends('admin.layouts.app')
@section('title', 'Account Profile')
@section('content')

    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">

                <div class="col-lg-10 offset-1">
                    <div class="card">
                        <div class="card-body">
                            <div class="">
                                <a href="{{ route('admin#list') }}"> <i class="zmdi zmdi-arrow-left text-dark ms-3"></i></a>
                                    {{-- <i class="zmdi zmdi-arrow-left text-dark ms-3" onclick="history.back()"></i> --}}
                            </div>
                            <div class="card-title">
                                <h3 class="text-center title-2">Account Profile</h3>
                            </div>
                            <hr>
                            <form action="{{ route('admin#change', $account->id) }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">

                                    <div class="col-4 offset-1">
                                        @if ($account->image == null)
                                            @if ($account->gender == 'Male')
                                                <img src="{{ asset('image/download.jfif') }}" alt="">
                                            @else
                                                <img src="{{ asset('image/female.jpg') }}" alt="">
                                            @endif
                                        @else
                                            <img src="{{ asset('storage/' . $account->image) }}" alt="">
                                        @endif

                                        <div class="mt-3 ">
                                            <button class="btn bg-dark text-white col-12" type="submit">
                                                Change
                                            </button>
                                        </div>

                                    </div>

                                    <div class="row col-6">
                                        <div class="form-group">
                                            <label class="control-label mb-1">Role</label>
                                            <select id="cc-pament" name="role" type="text"
                                                class="form-control @error('role') is-invalid @enderror"
                                                aria-required="true" aria-invalid="false"
                                                value="{{ old('role', $account->role) }}">
                                                <option value="admin" @if ($account->role == 'admin') selected @endif>
                                                    Admin</option>
                                                <option value="user" @if ($account->role == 'user') selected @endif>
                                                    User</option>
                                            </select>
                                            @error('role')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label mb-1">Name</label>
                                            <input id="cc-pament" disabled name="pizzaName" type="text"
                                                class="form-control  @error('pizzaName') is-invalid @enderror"
                                                aria-required="true" aria-invalid="false" placeholder="Enter Name..."
                                                value="{{ old('name', $account->name) }}">

                                            @error('pizzaName')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label mb-1">Email</label>
                                            <input id="cc-pament" disabled name="email" type="email"
                                                class="form-control @error('email') is-invalid @enderror"
                                                aria-required="true" aria-invalid="false" placeholder="Enter Email..."
                                                value="{{ old('name', $account->email) }}">
                                            @error('email')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label mb-1">Phone</label>
                                            <input id="cc-pament" disabled name="phone" type="text"
                                                class="form-control @error('phone') is-invalid @enderror"
                                                aria-required="true" aria-invalid="false" placeholder="Enter Phone..."
                                                value="{{ old('name', $account->phone) }}">
                                            @error('phone')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label class="control_label mb-1">Gender</label>
                                            <select name="gender" disabled id="" class="form-control">
                                                <option value="">Choose Gender...</option>
                                                <option value="Male" @if ($account->gender == 'Male') selected @endif>
                                                    Male</option>
                                                <option value="Female" @if ($account->gender == 'Female') selected @endif>
                                                    Female</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label mb-1">Address</label>
                                            <textarea name="address" disabled class="form-control @error('address') is-invalid @enderror"
                                                placeholder="Enter Address..." id="" cols="30" rows="10">{{ old('name', $account->address) }}</textarea>
                                            @error('address')
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
