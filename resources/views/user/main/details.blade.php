@extends('user.main.layout.master')
@section('title', 'Details Page')
@section('content')
    <!-- Shop Detail Start -->
    <div class="container-fluid pb-5">
        <div class="row px-xl-5">
            <div class="col-lg-5 mb-30">

                <div class="">
                    {{-- <a href="{{ route('product#list') }}"> <i class="zmdi zmdi-arrow-left text-dark ms-3"></i> </a> --}}
                    <i class="fa-solid fa-arrow-left mb-3" onclick="history.back()"></i>
                </div>

                <div id="product-carousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner bg-light">
                        <div class="carousel-item active">
                            <img class="w-100 h-100" src="{{ asset('storage/' . $pizza->image) }}" alt="Image">
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-7 h-auto mb-30">
                <div class="h-100 bg-light p-30">
                    <h3>Product Name Goes Here</h3>
                    <div class="d-flex mb-3">
                        {{-- <div class="text-primary mr-2">
                        <small class="fas fa-star"></small>
                        <small class="fas fa-star"></small>
                        <small class="fas fa-star"></small>
                        <small class="fas fa-star-half-alt"></small>
                        <small class="far fa-star"></small>
                    </div> --}}
                        <small class="pt-1">{{ $pizza->view_count }} <i class="fa-solid fa-eye"></i></small>
                    </div>
                    <h3 class="font-weight-semi-bold mb-4">{{ $pizza->price }} Kyat</h3>
                    <p class="mb-4">{{ $pizza->description }}</p>
                    <form action="">
                        <input type="hidden" value="{{ Auth::user()->id }}" id="userId">
                        <input type="hidden" value="{{ $pizza->id }}" id="pizzaId">
                        <div class="d-flex align-items-center mb-4 pt-2">
                            <div class="input-group quantity mr-3" style="width: 130px;">

                                <div class="input-group-btn">
                                    <button type="button" class="btn btn-warning btn-minus" id="decrease"
                                        onclick="decreaseValue()">
                                        <i class="fa fa-minus"></i>
                                    </button>
                                </div>
                                <input type="text" class="form-control border-0 text-center" id="orderCount"
                                    value="0" min="0" max="20">
                                <div class="input-group-btn">
                                    <button type="button" class="btn btn-warning btn-plus" id="increase"
                                        onclick="increaseValue()">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                            <button class="btn btn-warning px-3" id="addCartBtn"><i class="fa fa-shopping-cart mr-1"></i>
                                Add </button>
                        </div>
                    </form>
                    <div class="d-flex pt-2">
                        <strong class="text-dark mr-2">Share on:</strong>
                        <div class="d-inline-flex">
                            <a class="text-dark px-2" href="">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a class="text-dark px-2" href="">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a class="text-dark px-2" href="">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                            <a class="text-dark px-2" href="">
                                <i class="fab fa-pinterest"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Shop Detail End -->


    <!-- Products Start -->
    <div class="container-fluid py-5">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4">
            <span class="bg-secondary pr-3">You May Also
                Like</span>
        </h2>
        <div class="row px-xl-5">
            @foreach ($pizzaList as $p)
                <div class="col">
                    <div class=" related-carousel">
                        <div class="product-item bg-light">
                            <div class="product-img position-relative overflow-hidden">
                                <img class="img-fluid w-100" src="{{ asset('storage/' . $p->image) }}"style="height: 250px;"
                                    alt="">
                                <div class="product-action">

                                    <a class="btn btn-outline-dark btn-square"
                                        href="{{ route('user#pizzaDetails', $p->id) }}"><i
                                            class="fa-solid fa-circle-info"></i></a>
                                </div>
                            </div>
                            <div class="text-center py-4">
                                <a class="h6 text-decoration-none text-truncate" href="">Product Name Goes Here</a>
                                <div class="d-flex align-items-center justify-content-center mt-2">
                                    <h5>{{ $p->price }} Kyat</h5>
                                </div>
                                <div class="d-flex align-items-center justify-content-center mb-1">
                                    <small class="fa fa-star text-primary mr-1"></small>
                                    <small class="fa fa-star text-primary mr-1"></small>
                                    <small class="fa fa-star text-primary mr-1"></small>
                                    <small class="fa fa-star text-primary mr-1"></small>
                                    <small class="fa fa-star text-primary mr-1"></small>
                                    <small>(99)</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="row px-xl-5">
            <div class="col">
                <div class="owl-carousel related-carousel">
                    @foreach ($pizzaList as $pizza)
                        <div class="product-item bg-light">
                            <div class="product-img position-relative overflow-hidden">
                                <img class="img-fluid w-100" src="{{ asset('storage/' . $pizza->image) }}" alt="">
                                <div class="product-action">
                                    <a class="btn btn-outline-dark btn-square" href=""><i
                                            class="fa fa-shopping-cart"></i></a>
                                    <a class="btn btn-outline-dark btn-square" href=""><i
                                            class="far fa-heart"></i></a>
                                    <a class="btn btn-outline-dark btn-square" href=""><i
                                            class="fa fa-sync-alt"></i></a>
                                    <a class="btn btn-outline-dark btn-square" href=""><i
                                            class="fa fa-search"></i></a>
                                </div>
                            </div>
                            <div class="text-center py-4">
                                <a class="h6 text-decoration-none text-truncate" href="">Product Name Goes Here</a>
                                <div class="d-flex align-items-center justify-content-center mt-2">
                                    <h5>$123.00</h5>
                                    <h6 class="text-muted ml-2"><del>$123.00</del></h6>
                                </div>
                                <div class="d-flex align-items-center justify-content-center mb-1">
                                    <small class="fa fa-star text-primary mr-1"></small>
                                    <small class="fa fa-star text-primary mr-1"></small>
                                    <small class="fa fa-star text-primary mr-1"></small>
                                    <small class="fa fa-star text-primary mr-1"></small>
                                    <small class="fa fa-star text-primary mr-1"></small>
                                    <small>(99)</small>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- Products End -->
@endsection

@section('scriptSource')
    <script>
        // inc dec number
        function increaseValue() {
            var value = parseInt(document.getElementById('orderCount').value, 10);
            value = isNaN(value) ? 0 : value;
            value++;
            document.getElementById('orderCount').value = value;
        }

        function decreaseValue() {
            var value = parseInt(document.getElementById('orderCount').value, 10);
            value = isNaN(value) ? 0 : value;
            value < 1 ? value = 1 : '';
            value--;
            document.getElementById('orderCount').value = value;
        }
        // end inc dec num
        // ajax
        $(document).ready(function() {
            $('#addCartBtn').click(function() {
                $count = $('#orderCount').val();
                $userId = $('$userId').val();
                $pizzaId = $('#pizzaId').val();
                $source = {
                    'userId': $userId,
                    'pizzaId': $pizzaId,
                    'count': $count
                };

                $.ajax({
                    type: 'get',
                    url: 'http://127.0.0.1:8000/user/ajax/addToCart',
                    data: $source,
                    dataType: 'json',
                    success: function(response) {
                        console.log(response)
                    }
                });


            });
        });
    </script>
@endsection
