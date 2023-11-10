@extends('admin/layouts/main')

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Edit color</h1>
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
                        <form action="{{ route('admin.color.update', $color) }}" name="form" id="form" method="post" class="pl-2">
                            @csrf

                            <div class="form-group">
                                <label>Color</label>

                                <div class="input-group my-colorpicker2 colorpicker-element" data-colorpicker-id="2">
                                    <input type="text" name="title" value="{{ $color->title ?? old('title') }}" class="form-control" placeholder="Color">
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="fas fa-square" style="color: {{ $color->title ?? old('title') }}"></i></span>
                                    </div>
                                </div>
                                <x-error name="title" />
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
