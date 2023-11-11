@extends('admin/layouts/main')

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Edit product</h1>
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
                        <form action="{{ route('admin.product.update', $product) }}" name="form" id="form" method="post" class="pl-2" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" name="title" value="{{ $product->title ?? old('title') }}" class="form-control" placeholder="Title">
                                <x-error name="title" />
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea name="description" class="summernote">{{ $product->description ?? old('description') }}</textarea>
                                <x-error name="description" />
                            </div>
                            <div class="form-group">
                                <label>Content</label>
                                <textarea name="content" class="summernote">{{ $product->content ?? old('content') }}</textarea>
                                <x-error name="content" />
                            </div>
                            <div class="form-group">
                                <label>Preview image</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" name="preview_image" class="custom-file-input">
                                        <label class="custom-file-label">Choose file</label>
                                    </div>
                                </div>
                                <x-error name="preview_image" />
                            </div>
                            <div class="form-group">
                                <label>Price</label>
                                <input type="text" name="price" value="{{ $product->price ?? old('price') }}" class="form-control" placeholder="Price">
                                <x-error name="price" />
                            </div>
                            <div class="form-group">
                                <label>Old price</label>
                                <input type="text" name="price_old" value="{{ $product->price_old ?? old('price_old') }}" class="form-control" placeholder="Old price">
                                <x-error name="price_old" />
                            </div>
                            <div class="form-group">
                                <label>Quantity</label>
                                <input type="text" name="count" value="{{ $product->count ?? old('count') }}" class="form-control" placeholder="Quantity">
                                <x-error name="count" />
                            </div>
                            <div class="form-group">
                                <label>Is published</label>
                                <select name="is_published" class="custom-select form-control">
                                    <option value="" disabled selected>Select...</option>
                                    <option value="1" {{ $product->is_published == '1' || old('is_published') == '1' ? 'selected' : '' }}>Yes</option>
                                    <option value="0" {{ $product->is_published == '0' || old('is_published') == '0' ? 'selected' : '' }}>No</option>
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
                                            {{ $category->id == $product->category_id || $category->id == old('category_id') ? 'selected' : '' }}
                                        >{{ $category->title }}</option>
                                    @endforeach
                                </select>
                                <x-error name="category_id" />
                            </div>
                            <div class="form-group">
                                <label>Tags</label>
                                <select name="tag_ids[]" class="select2" multiple="multiple" data-placeholder="Select your tags" style="width:100%;">
                                    @foreach($tags as $tag)
                                        <option
                                            value="{{ $tag->id }}"
                                            {{ is_array($product->tags->pluck('id')->toArray()) && in_array($tag->id, $product->tags->pluck('id')->toArray()) ? 'selected' : '' }}
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
                                            {{ is_array($product->colors->pluck('id')->toArray()) && in_array($color->id, $product->colors->pluck('id')->toArray()) ? 'selected' : '' }}
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
