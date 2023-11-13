@extends('admin/layouts/main')

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6 d-flex align-items-center">
                        <h1 class="m-0 mr-5">Category: {{ $category->title }}</h1>
                    </div>
                </div>

                <x-topsuccess />
                <x-toperrors />
            </div>
        </div>

        <section class="content">
            <div class="container-fluid">
                <div class="row pb-4">
                    <div class="col-1">
                        <a href="{{ route('admin.category.edit', $category) }}" class="btn btn-block btn-primary">Edit</a>
                    </div>
                    <div class="col-1">
                        <form action="{{ route('admin.category.delete', ['category' => $category]) }}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-block btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <tbody>
                                        <tr>
                                            <th>ID</th>
                                            <td>{{ $category->id }}</td>
                                        </tr>
                                        <tr>
                                            <th>Title</th>
                                            <td>{{ $category->title }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
