@extends('admin/layouts/main')

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Add new product</h1>
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
                        <form action="{{ route('admin.product.store') }}" name="form" id="form" method="post" class="pl-2" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" name="title" value="{{ old('title') }}" class="form-control" placeholder="Title">
                                <x-error name="title" />
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea name="description" class="summernote">{{ old('description') }}</textarea>
                                <x-error name="description" />
                            </div>
                            <div class="form-group">
                                <label>Content</label>
                                <textarea name="content" class="summernote">{{ old('content') }}</textarea>
                                <x-error name="content" />
                            </div>
                            <div class="form-group">
                                <label>Product image</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" name="product_images[]" class="custom-file-input">
                                        <label class="custom-file-label">Choose file</label>
                                    </div>
                                </div>
                                <x-error name="product_images" />
                            </div>
                            <div class="form-group">
                                <label>Product image</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" name="product_images[]" class="custom-file-input">
                                        <label class="custom-file-label">Choose file</label>
                                    </div>
                                </div>
                                <x-error name="product_images" />
                            </div>
                            <div class="form-group">
                                <label>Product image</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" name="product_images[]" class="custom-file-input">
                                        <label class="custom-file-label">Choose file</label>
                                    </div>
                                </div>
                                <x-error name="product_images" />
                            </div>
                            <div class="form-group">
                                <label>Price</label>
                                <input type="text" name="price" value="{{ old('price') }}" class="form-control" placeholder="Price">
                                <x-error name="price" />
                            </div>
                            <div class="form-group">
                                <label>Old price</label>
                                <input type="text" name="price_old" value="{{ old('price_old') }}" class="form-control" placeholder="Old price">
                                <x-error name="price_old" />
                            </div>
                            <div class="form-group">
                                <label>Quantity</label>
                                <input type="text" name="count" value="{{ old('count') }}" class="form-control" placeholder="Quantity">
                                <x-error name="count" />
                            </div>
                            <div class="form-group">
                                <label>Is published</label>
                                <select name="is_published" class="custom-select form-control">
                                    <option value="" disabled selected>Select...</option>
                                    <option value="1" {{ old('is_published') == '1' ? 'selected' : '' }}>Yes</option>
                                    <option value="0" {{ old('is_published') == '0' ? 'selected' : '' }}>No</option>
                                </select>
                                <x-error name="is_published" />
                            </div>
                            <div class="form-group">
                                <label>Category</label>
                                <select name="category_id" class="custom-select form-control" style="width:100%;">
                                    <option value="">Select...</option>

                                    @foreach($categories as $category)
                                        <option
                                            value="{{ $category->id }}"
                                            {{ $category->id == old('category_id') ? 'selected' : '' }}
                                        >{{ $category->title }}</option>
                                    @endforeach
                                </select>
                                <x-error name="category_id" />
                            </div>
                            <div class="form-group">
                                <label>Group</label>
                                <select name="group_id" class="custom-select form-control" style="width:100%;">
                                    <option value="">Select...</option>

                                    @foreach($groups as $group)
                                        <option
                                            value="{{ $group->id }}"
                                            {{ $group->id == old('group_id') ? 'selected' : '' }}
                                        >{{ $group->title }}</option>
                                    @endforeach
                                </select>
                                <x-error name="group_id" />
                            </div>
                            <div class="form-group">
                                <label>Tags</label>
                                <select name="tag_ids[]" class="select2" multiple="multiple" data-placeholder="Select your tags" style="width:100%;">
                                    @foreach($tags as $tag)
                                        <option
                                            value="{{ $tag->id }}"
                                            {{ is_array(old('tag_ids')) && in_array($tag->id, old('tag_ids')) ? 'selected' : '' }}
                                        >{{ $tag->title }}</option>
                                    @endforeach
                                </select>
                                <x-error name="tag_id" />
                            </div>
                            <div class="form-group">
                                <label>Colors</label>
                                <select name="color_ids[]" class="select2" multiple="multiple" data-placeholder="Select your colors" style="width:100%;">
                                    @foreach($colors as $color)
                                        <option
                                            value="{{ $color->id }}"
                                            {{ is_array(old('color_ids')) && in_array($color->id, old('color_ids')) ? 'selected' : '' }}
                                        >{{ $color->title }}</option>
                                    @endforeach
                                </select>
                                <x-error name="color_id" />
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
