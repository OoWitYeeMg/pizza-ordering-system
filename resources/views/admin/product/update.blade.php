@extends('admin.layouts.app')
@section('title', 'Update Pizza')
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
                                <h3 class="text-center title-2">Pizza Update  </h3>
                            </div>
                            <hr>
                            <form action="{{ route('product#update') }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <input type="hidden" name="pizzaId" value="{{ $pizza->id }}">
                                    <div class="col-4 offset-1">
                                        <img src="{{ asset('storage/' . $pizza->image) }}" alt="John Doe">
                                        <div class="mt-3 ">
                                            <input type="file"
                                                class="form-control @error('pizzaImage') is-invalid @enderror"
                                                name="pizzaImage">
                                            @error('pizzaImage')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="mt-3 ">
                                            <button class="btn bg-dark text-white col-12" type="submit">
                                                Update
                                            </button>
                                        </div>

                                    </div>

                                    <div class="row col-6">
                                        <div class="form-group">
                                            <label class="control-label mb-1">Name</label>
                                            <input id="cc-pament" name="pizzaName" type="text"
                                                class="form-control  @error('pizzaName') is-invalid @enderror"
                                                aria-required="true" aria-invalid="false" placeholder="Enter Name..."
                                                value="{{ old('pizzaName', $pizza->name) }}">

                                            @error('pizzaName')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        {{-- <div class="form-group">
                                            <label class="control-label mb-1">View Count</label>
                                            <input id="cc-pament" name="viewcount" type="email"
                                                class="form-control @error('viewcount') is-invalid @enderror"
                                                aria-required="true" aria-invalid="false" placeholder="Enter Email..."
                                                value="{{ old('name', $pizza->view_count) }}">
                                            @error('viewcount')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div> --}}
                                        <div class="form-group">
                                            <label class="control-label mb-1">Price</label>
                                            <input id="cc-pament" name="pizzaPrice" type="text"
                                                class="form-control @error('pizzaPrice') is-invalid @enderror"
                                                aria-required="true" aria-invalid="false"
                                                value="{{ old('pizzaPrice', $pizza->price) }}">
                                            @error('pizzaPrice')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label mb-1">Waiting Time</label>
                                            <input id="cc-pament" name="waitingtime" type="text"
                                                class="form-control @error('waitingtime') is-invalid @enderror"
                                                aria-required="true" aria-invalid="false"
                                                placeholder="Enter Waiting Time..."
                                                value="{{ old('waitingtime', $pizza->waiting_time) }}">
                                            @error('waitingtime')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label class="control_label mb-1">Category</label>
                                            <select name="category" id="" class="form-control">
                                                <option value="">Choose Category...</option>

                                                @foreach ($category as $c)
                                                    <option value="{{ $c->id }}"
                                                        @if ($pizza->category_id == $c->id)selected @endif>{{ $c->name }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label mb-1">Description</label>
                                            <textarea name="pizzaDescription" class="form-control @error('pizzaDescription') is-invalid @enderror"
                                                placeholder="Enter Description..." id="" cols="30" rows="10">{{ old('pizzaDescription', $pizza->description) }}</textarea>
                                            @error('pizzaDescription')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label mb-1">View Count</label>
                                            <input id="cc-pament" name="viewcount" type="email" class="form-control"
                                                aria-required="true" aria-invalid="false" disabled
                                                placeholder="Enter Email..."
                                                value="{{ old('viewcount', $pizza->view_count) }}">

                                        </div>
                                        <div class="form-group">
                                            <label class="control-label mb-1">Created At</label>
                                            <input id="cc-pament" name="createdat" type="email" class="form-control"
                                                aria-required="true" aria-invalid="false" disabled
                                                placeholder="Enter Email..."
                                                value="{{ old('created_at', $pizza->created_at->format('j-F-Y')) }}">

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
