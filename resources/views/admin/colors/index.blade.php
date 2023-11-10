@extends('admin/layouts/main')

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Colors</h1>
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
                        <a href="{{ route('admin.color.create') }}" class="btn btn-block btn-primary">Add new</a>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Color</th>
                                            <th>View</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(count($colors) > 0)
                                            @foreach ($colors as $color)
                                                <tr>
                                                    <td>{{ $color->id }}</td>
                                                    <td>
                                                        <div style="width:16px; height:16px; background:{{ $color->title }}; display:inline-block;"></div>
                                                        <div style="display:inline-block;">{{ $color->title }}</div>
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('admin.color.show', ['color' => $color]) }}"><i class="fas fa-eye"></i></a>
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('admin.color.edit', ['color' => $color]) }}"><i class="fas fa-edit"></i></a>
                                                    </td>
                                                    <td>
                                                        <form action="{{ route('admin.color.delete', ['color' => $color]) }}" method="post">
                                                            @csrf

                                                            <button type="submit" class="border-0 bg-transparent">
                                                                <i class="fas fa-trash text-danger" role="button"></i>
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="10">No data</td>
                                            </tr>
                                        @endif
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
