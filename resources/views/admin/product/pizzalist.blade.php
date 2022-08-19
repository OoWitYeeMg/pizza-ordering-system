@extends('admin.layouts.app')
@section('title', 'Product List')
@section('content')
    <!-- MAIN CONTENT-->
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="col-md-12">
                    <!-- DATA TABLE -->
                    <div class="table-data__tool">
                        <div class="table-data__tool-left">
                            <div class="overview-wrap">
                                <h2 class="title-1">Products List</h2>

                            </div>
                        </div>
                        <div class="table-data__tool-right">
                            <a href="{{ route('product#createPage') }}">
                                <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                                    <i class="zmdi zmdi-plus"></i>Add Pizza
                                </button>
                            </a>
                            <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                                CSV download
                            </button>
                        </div>
                    </div>


                    @if (session('deleteSuccess'))
                        <div class="col-3 offset-9">
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <i class="zmdi zmdi-delete"></i> {{ session('deleteSuccess') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-3">
                            <h4 class="text-secondary">Search Key : <span class="text-danger">{{ request('key') }} </span>
                                </h5>
                        </div>
                        <div class="col-3 offset-6">
                            <form action="{{ route('product#list') }}" method="GET">
                                @csrf
                                <div class="d-flex">
                                    <input type="text" name="key" class="form-control" placeholder="Search.."
                                        value="{{ request('key') }}">
                                    <button class="btn bg-dark  text-white" type="submit"><i
                                            class="zmdi zmdi-search"></i></button>
                                </div>
                            </form>
                        </div>
                        <div class="row mt-3">
                            <div class="col-1 offset-10 bg-white shadow-sm p-2 text-center">
                                <h4><i class="zmdi zmdi-info"></i> {{ $pizza->total() }}</h4>
                            </div>
                        </div>
                    </div>
                    @if (count($pizza) != 0)
                        <div class="table-responsive table-responsive-data2">
                            <table class="table table-data2 text-center">
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Price</th>
                                        <th>Category</th>
                                        <th>View Count</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pizza as $p)
                                        <tr class="tr-shadow my-2">
                                            <td class="col-3"><img src="{{ asset('storage/' . $p->image) }}" alt=""
                                                    class="img-thumbnail shadow-sm"> </td>
                                            <td>{{ $p->name }} </td>
                                            <td>{{ $p->price }} </td>
                                            <td>{{ $p->category_id }} </td>
                                            <td><i class="zmdi zmdi-eye"></i> {{ $p->view_count }}</td>

                                            <td>
                                                <div class="table-data-feature">
                                                    {{-- <button class="item" data-toggle="tooltip" data-placement="top"
                                                        title="Send">
                                                        <i class="zmdi zmdi-mail-send"></i>
                                                    </button> --}}
                                                    <a href="{{ route('product#edit', $p->id) }}" class="me-3">
                                                        <button class="item" data-toggle="tooltip" data-placement="top"
                                                            title="Edit">
                                                            <i class="zmdi zmdi-eye"></i>
                                                        </button>
                                                    </a>
                                                    <a href="{{ route('product#updatePage', $p->id) }}" class="me-3">
                                                        <button class="item" data-toggle="tooltip" data-placement="top"
                                                            title="Update">
                                                            <i class="zmdi zmdi-edit"></i>
                                                        </button>
                                                    </a>
                                                    <a href="{{ route('product#delete', $p->id) }}" class="me-3">
                                                        <button class="item" data-toggle="tooltip" data-placement="top"
                                                            title="Delete">
                                                            <i class="zmdi zmdi-delete"></i>
                                                        </button>
                                                    </a>


                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="mt-3">
                                {{ $pizza->appends(request()->query())->links() }}

                            </div>
                        </div>
                        @else
                        <h3 class="text-center mt-5 text-secondary">There is no Pizza Here!</h3>
                    @endif
                    <!-- END DATA TABLE -->
                </div>
            </div>
        </div>
    </div>
    <!-- END MAIN CONTENT-->
@endsection
