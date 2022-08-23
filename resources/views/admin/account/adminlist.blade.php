@extends('admin.layouts.app')
@section('title', 'Admin List')
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
                                <h2 class="title-1">Admin List</h2>

                            </div>
                        </div>
                        <div class="table-data__tool-right">
                            <a href="{{ route('catergory#createPage') }}">
                                <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                                    <i class="zmdi zmdi-plus"></i>Add Category
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
                            <form action="{{ route('admin#list') }}" method="GET">
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
                                <h4><i class="zmdi zmdi-info"></i>
                                    - {{ $admin->total() }}
                                </h4>
                            </div>
                        </div>
                    </div>

                        <div class="table-responsive table-responsive-data2 text-center">
                            <table class="table table-data2">
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Gender</th>
                                        <th>Phone</th>
                                        <th>Address</th>

                                        {{-- <th>Category Date</th> --}}

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($admin as $category)
                                        <tr class="tr-shadow my-2">
                                            <td>
                                                @if ($category->image == null)
                                                    @if ($category->gender == 'Male')
                                                        <img src="{{ asset('image/download.jfif') }}" alt="">
                                                    @else
                                                        <img src="{{ asset('image/female.jpg') }}" alt="">
                                                    @endif
                                                @else
                                                    <img src="{{ asset('storage/' . $category->image) }}" alt="">
                                                @endif

                                            </td>
                                            <td>{{ $category->name }} </td>
                                            <td>{{ $category->email }} </td>
                                            <td>{{ $category->gender }} </td>
                                            <td>{{ $category->phone }} </td>
                                            <td>{{ $category->address }} </td>

                                            {{-- <td>{{ $category->created_at->format('j-F-Y') }} </td> --}}

                                            <td>
                                                <div class="table-data-feature">

                                                    {{-- <a href="@if (Auth::user()->id == $category->id) #
                                                    @else
                                                    {{ route('admin#delete', $category->id) }} @endif"
                                                        class="me-3">
                                                        <button class="item" data-toggle="tooltip" data-placement="top"
                                                            title="Edit">
                                                            <i class="zmdi zmdi-delete"></i>
                                                        </button>
                                                    </a> --}}

                                                    {{--  or --}}


                                                    @if (Auth::user()->id == $category->id)
                                                    @else
                                                    <a href="{{ route('admin#changeRole',$category->id) }}">
                                                        <button class="item" data-toggle="tooltip"
                                                            data-placement="top" title="Change Admin Role">
                                                            <i class="zmdi zmdi-account"></i>
                                                        </button>
                                                    </a>
                                                        <a href="{{ route('admin#delete',$category->id) }}" class="ms-3">
                                                            <button class="item" data-toggle="tooltip"
                                                                data-placement="top" title="Delete">
                                                                <i class="zmdi zmdi-delete"></i>
                                                            </button>
                                                        </a>
                                                    @endif
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="mt-3">
                                {{ $admin->links() }}
                                {{-- {{  $categories->appends(request()->query())->links() }} --}}

                            </div>
                        </div>

                    <!-- END DATA TABLE -->
                </div>
            </div>
        </div>
    </div>
    <!-- END MAIN CONTENT-->
@endsection
