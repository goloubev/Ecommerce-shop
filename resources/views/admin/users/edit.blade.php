@extends('admin/layouts/main')

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Edit user</h1>
                    </div>
                </div>

                <x-topsuccess />
                <x-toperrors />
            </div>
        </div>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-6">
                        <form action="{{ route('admin.user.update', $user) }}" name="form" id="form" method="post" class="pl-2">
                            @csrf

                            <div class="form-group">
                                <label>First name</label>
                                <input type="text" name="first_name" value="{{ $user->first_name ?? old('first_name') }}" class="form-control" placeholder="First name">
                                <x-error name="first_name" />
                            </div>
                            <div class="form-group">
                                <label>Last name</label>
                                <input type="text" name="last_name" value="{{ $user->last_name ?? old('last_name') }}" class="form-control" placeholder="Last name">
                                <x-error name="last_name" />
                            </div>
                            <div class="form-group">
                                <label>Age</label>
                                <input type="text" name="age" value="{{ $user->age ?? old('age') }}" class="form-control" placeholder="Age">
                                <x-error name="age" />
                            </div>
                            <div class="form-group">
                                <label>Address</label>
                                <input type="text" name="address" value="{{ $user->address ?? old('address') }}" class="form-control" placeholder="Address">
                                <x-error name="address" />
                            </div>
                            <div class="form-group">
                                <label>Gender</label>
                                <select name="gender" class="custom-select form-control">
                                    <option value="" disabled selected>Select...</option>
                                    <option value="1" {{ $user->gender == '1' || old('gender') == '1' ? 'selected' : '' }}>Male</option>
                                    <option value="2" {{ $user->gender == '2' || old('gender') == '2' ? 'selected' : '' }}>Female</option>
                                </select>
                                <x-error name="gender" />
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="Save">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
