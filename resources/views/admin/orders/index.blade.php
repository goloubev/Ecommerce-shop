@extends('admin/layouts/main')

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Orders</h1>
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
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>User</th>
                                            <th>Product</th>
                                            <th>Qty</th>
                                            <th>Unit price</th>
                                            <th>Total</th>
                                            <th>Payment status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(count($orders) > 0)
                                            @foreach ($orders as $order)
                                                <tr>
                                                    <td>{{ $order->id }}</td>
                                                    <td>
                                                        <a href="{{ route('admin.user.show', ['user' => $order->user]) }}">
                                                            {{ $order->user->name }}
                                                        </a>
                                                    </td>
                                                    <td>
                                                        @foreach($order->products as $product)
                                                            <a href="{{ route('admin.product.show', ['product' => $product->id]) }}">
                                                                {{ $product->title }}
                                                            </a><br />
                                                        @endforeach
                                                    </td>
                                                    <td>
                                                        @foreach($order->products as $product)
                                                            {{ $product->qty }}<br />
                                                        @endforeach
                                                    </td>
                                                    <td>
                                                        @foreach($order->products as $product)
                                                            {{ $product->price }} $<br />
                                                        @endforeach
                                                    </td>
                                                    <td>{{ $order->total_price }} $</td>
                                                    <td>{{ $order->payment_status == '1' ? 'OK' : '' }}</td>
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
