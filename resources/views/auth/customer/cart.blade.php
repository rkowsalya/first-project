@extends('auth.customer_layout.main')
@section('content')
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Product</th>
                            <th scope="col">quantity</th>
                            <th scope="col">total_price</th>
                            <th scope="col">action</th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <tr>
                            @foreach ($product as $item)
                                <th scope="row">
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset($item->thumb_img) }}" class="img-fluid me-5 rounded-circle"
                                            style="width: 80px; height: 80px;" alt="">

                                    </div>

                                </th>
                                <td>{{ $item->quantity }}</td>
                                <td>{{ $item->selling_price }}</td>
                                <td>
                                    <form action="{{ route('customers.remove', $item->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button>remove</button>
                                </td>

                        </tr>
                        @endforeach
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="mt-5">
                <input type="text" class="border-0 border-bottom rounded me-5 py-3 mb-4" placeholder="Coupon Code">
                <button class="btn border-secondary rounded-pill px-4 py-3 text-primary" type="button">Apply
                    Coupon</button>
            </div>
            <div class="row g-4 justify-content-end">
                <div class="col-8"></div>
                <div class="col-sm-8 col-md-7 col-lg-6 col-xl-4">
                    <div class="bg-light rounded">
                        <div class="p-4">
                            <h1 class="display-6 mb-4">Cart <span class="fw-normal">Total</span></h1>
                            <div class="d-flex justify-content-between mb-4">
                                <h5 class="mb-0 me-4">Subtotal:</h5>
                                <p class="mb-0">$96.00</p>
                            </div>
                            <div class="d-flex justify-content-between">
                                <h5 class="mb-0 me-4">Shipping</h5>
                                <div class="">
                                    <p class="mb-0">Flat rate: $3.00</p>
                                </div>
                            </div>
                            <p class="mb-0 text-end">Shipping to Ukraine.</p>
                        </div>
                        <div class="py-4 mb-4 border-top border-bottom d-flex justify-content-between">
                            <h5 class="mb-0 ps-4 me-4">Total</h5>
                            <p class="mb-0 pe-4">$99.00</p>
                        </div>
                        <button class="btn border-secondary rounded-pill px-4 py-3 text-primary text-uppercase mb-4 ms-4"
                            type="button">Proceed Checkout</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
