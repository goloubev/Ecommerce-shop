@php
    use App\Models\User;
@endphp

@extends('admin/layouts/main')

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6 d-flex align-items-center">
                        <h1 class="m-0 mr-5">User: {{ $user->title }}</h1>
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
                        <a href="{{ route('admin.user.edit', $user) }}" class="btn btn-block btn-primary">Edit</a>
                    </div>
                    <div class="col-1">
                        <form action="{{ route('admin.user.delete', ['user' => $user]) }}" method="post">
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
                                            <th>First name</th>
                                            <td>{{ $user->first_name }}</td>
                                        </tr>
                                        <tr>
                                            <th>Last name</th>
                                            <td>{{ $user->last_name }}</td>
                                        </tr>
                                        <tr>
                                            <th>Email</th>
                                            <td>{{ $user->email }}</td>
                                        </tr>
                                        <tr>
                                            <th>Age</th>
                                            <td>{{ $user->age }}</td>
                                        </tr>
                                        <tr>
                                            <th>Address</th>
                                            <td>{{ $user->address }}</td>
                                        </tr>
                                        <tr>
                                            <th>Gender</th>
                                            <td>{{ User::getGenderTitle($user->gender) }}</td>
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
