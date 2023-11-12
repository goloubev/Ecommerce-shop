@extends('admin/layouts/main')

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Groups</h1>
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
                        <a href="{{ route('admin.group.create') }}" class="btn btn-block btn-primary">Add new</a>
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
                                            <th>Title</th>
                                            <th>View</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(count($groups) > 0)
                                            @foreach ($groups as $group)
                                                <tr>
                                                    <td>{{ $group->id }}</td>
                                                    <td>{{ $group->title }}</td>
                                                    <td>
                                                        <a href="{{ route('admin.group.show', ['group' => $group]) }}"><i class="fas fa-eye"></i></a>
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('admin.group.edit', ['group' => $group]) }}"><i class="fas fa-edit"></i></a>
                                                    </td>
                                                    <td>
                                                        <form action="{{ route('admin.group.delete', ['group' => $group]) }}" method="post">
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
