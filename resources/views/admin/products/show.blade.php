@extends('admin/layouts/main')

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6 d-flex align-items-center">
                        <h1 class="m-0 mr-5">Product: {{ $product->title }}</h1>
                        <a href="{{ route('admin.product.edit', $product) }}"><i class="fas fa-edit"></i></a>
                    </div>
                </div>

                <x-topsuccess />
                <x-toperrors />
            </div>
        </div>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <tbody>
                                        <tr>
                                            <th>ID</th>
                                            <td>{{ $product->id }}</td>
                                        </tr>
                                        <tr>
                                            <th>Title</th>
                                            <td>{{ $product->title }}</td>
                                        </tr>
                                        <tr>
                                            <th>Description</th>
                                            <td style="text-wrap:initial;">{!! $product->description !!}</td>
                                        </tr>
                                        <tr>
                                            <th>Content</th>
                                            <td style="text-wrap:initial;">{!! $product->content !!}</td>
                                        </tr>
                                        <tr>
                                            <th>Preview image 1</th>
                                            <td>
                                                @if($product->preview_image_1 != null && Storage::exists($product->preview_image_1))
                                                    <img src="{{ Storage::url($product->preview_image_1) }}" style="height:60px;" alt="" />
                                                @else
                                                    No image
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Preview image 2</th>
                                            <td>
                                                @if($product->preview_image_2 != null && Storage::exists($product->preview_image_2))
                                                    <img src="{{ Storage::url($product->preview_image_2) }}" style="height:60px;" alt="" />
                                                @else
                                                    No image
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Preview image 3</th>
                                            <td>
                                                @if($product->preview_image_3 != null && Storage::exists($product->preview_image_3))
                                                    <img src="{{ Storage::url($product->preview_image_3) }}" style="height:60px;" alt="" />
                                                @else
                                                    No image
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Price</th>
                                            <td>{{ $product->price }}</td>
                                        </tr>
                                        <tr>
                                            <th>Old price</th>
                                            <td>{{ $product->price_old }}</td>
                                        </tr>
                                        <tr>
                                            <th>Count</th>
                                            <td>{{ $product->count }}</td>
                                        </tr>
                                        <tr>
                                            <th>Published</th>
                                            <td>{{ $product->is_published == '1' ? 'Yes' : 'No' }}</td>
                                        </tr>
                                        <tr>
                                            <th>Category</th>
                                            <td>{{ $product->category->title }}</td>
                                        </tr>
                                        <tr>
                                            <th>Group</th>
                                            <td>{{ $product->group->title }}</td>
                                        </tr>
                                        <tr>
                                            <th>Tags</th>
                                            <td>
                                                @if(count($product->tagsArray) > 0)
                                                    @foreach($product->tagsArray as $tag)
                                                        {{ $tag }}<br />
                                                    @endforeach
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Colors</th>
                                            <td>
                                                @if(count($product->colorsArray) > 0)
                                                    @foreach($product->colorsArray as $color)
                                                        <div style="width:16px; height:16px; background:{{ $color }}; display:inline-block;"></div>
                                                        <div style="display:inline-block;">{{ $color }}</div><br />
                                                    @endforeach
                                                @endif
                                            </td>
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
