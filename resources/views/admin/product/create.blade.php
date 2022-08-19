@extends('admin.layouts.app')
@section('title', 'Pizza Create')
@section('content')

    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-3 offset-8">
                        <a href="{{ route('product#list') }}"><button class="btn bg-dark text-white my-3">List</button></a>
                    </div>
                </div>
                <div class="col-lg-6 offset-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title">
                                <h3 class="text-center title-2">Create Your Pizza </h3>
                            </div>
                            <hr>
                            <form action="{{ route('product#create') }}" enctype="multipart/form-data" method="post" novalidate="novalidate">
                                @csrf
                                <div class="form-group">
                                    <label class="control-label mb-1">Name</label>
                                    <input id="cc-pament" name="pizzaName" value="{{ old('pizzaName') }}" type="text"
                                        class="form-control @error('pizzaName') is-invalid @enderror" aria-required="true"
                                        aria-invalid="false" placeholder="Seafood...">
                                    @error('pizzaName')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="control-label mb-1">Category</label>
                                    <select name="category" id="" class="form-control @error('category') is-invalid @enderror">
                                        <option value=" ">Choose Your Category</option>
                                        @foreach ($categories as $c)
                                            <option value="{{ $c->id }}">{{ $c->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('category')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                </div>
                                <div class="form-group">
                                    <label class="control-label mb-1">Description</label>
                                    <textarea name="pizzaDescription" class="form-control @error('pizzaDescription') is-invalid @enderror"
                                        placeholder="Enter Description..." id="" cols="30" rows="10">{{ old('pizzaDescription') }}</textarea>
                                    @error('pizzaDescription')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="control-label mb-1">Image</label>
                                    <input type="file" class="form-control @error('pizzaImage') is-invalid @enderror"
                                        name="pizzaImage">
                                    @error('pizzaImage')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="control-label mb-1">Waiting Time</label>
                                    <input id="cc-pament" name="waitingtime" value="{{ old('waitingtime') }}" type="text"
                                        class="form-control @error('waitingtime') is-invalid @enderror" aria-required="true"
                                        aria-invalid="false" placeholder="Waiting Time...">
                                    @error('waitingtime')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="control-label mb-1">Price</label>
                                    <input id="cc-pament" name="pizzaPrice" value="{{ old('pizzaPrice') }}" type="number"
                                        class="form-control @error('pizzaPrice') is-invalid @enderror" aria-required="true"
                                        aria-invalid="false" placeholder="Price...">
                                    @error('pizzaPrice')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div>
                                    <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                        <span id="payment-button-amount">Create</span>
                                        <span id="payment-button-sending" style="display:none;">Sending…</span>
                                        <i class="fa-solid fa-circle-right"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
