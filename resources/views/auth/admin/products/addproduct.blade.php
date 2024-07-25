@extends('auth.admin.main')
@section('content')
    <div class="container tm-mt-big tm-mb-big">
        <div class="row">
            <div class="col-xl-9 col-lg-10 col-md-12 col-sm-12 mx-auto">
                <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
                    <div class="row">
                        <div class="col-12">
                            <h2 class="tm-block-title d-inline-block">Add Product</h2>
                        </div>
                    </div>
                    <div class="row tm-edit-product-row">
                        <div class="col-xl-6 col-lg-6 col-md-12">
                            <form action="{{ route('admins.store_product') }}" method="POST" enctype="multipart/form-data"
                                class="tm-edit-product-form">
                                @csrf
                                @method('POST')
                                <div class="form-group mb-3">
                                    <label for="name">Product Name
                                    </label>
                                    <input id="product_name" name="product_name" type="text"
                                        class="form-control validate" required />
                                </div>
                                <div class="form-group mb-3">
                                    <label for="description">Description</label>
                                    <textarea name="description" class="form-control validate" rows="3" required></textarea>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="price">price
                                    </label>
                                    <input id="price" name="price" type="text" class="form-control validate"
                                        required />
                                </div>
                                <div class="form-group mb-3">
                                    <label for="selling_price">selling_price
                                    </label>
                                    <input id="selling_price" name="selling_price" type="text"
                                        class="form-control validate" required />
                                </div>
                                <div class="form-group mb-3">
                                    <label for="category_id">category_id
                                    </label>
                                    <select name="category_id">
                                        <option selected>select</option>
                                        @foreach ($categories as $item)
                                            <option value="{{ $item->id }}">{{ $item->category_name }}</option>
                                        @endforeach
                                    </select>

                                </div>


                                <div class="form-group mb-3">
                                    <label for="quantity">quantity
                                    </label>
                                    <input id="quantity" name="quantity" type="text" class="form-control validate"
                                        required />
                                </div>
                                <div class="row">
                                    <div class="form-group mb-3 col-xs-12 col-sm-6">
                                        <label for="expire_date">Expire Date
                                        </label>
                                        <input id="expire_date" name="expire_date" type="date"
                                            class="form-control validate" data-large-mode="true" />
                                    </div>
                                    <select class="custom-select tm-select-accounts" id="stock" name="stock">
                                        <option selected>select </option>
                                        <option value="1">out_of_stock</option>
                                        <option value="2">in_stock</option>
                                        <option value="3">on_hold</option>
                                    </select>
                                </div>
                                <div class="form-group mb-3 ">
                                    <label for="thumb_img">Thumb_img
                                    </label>
                                    <input id="thumb_img" name="thumb_img" type="file" class="form-control validate"
                                        data-large-mode="true" />
                                </div>
                                <div class="form-group mb-3 ">
                                    <label for="image">Image
                                    </label>
                                    <input id="image" name="image" type="file" class="form-control validate"
                                        data-large-mode="true" />
                                </div>

                        </div>

                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block text-uppercase">Add Product Now</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="tm-bg-primary-dark tm-block tm-block-taller tm-block-scroll ">
            <h2 class="tm-block-title">Products List</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">product_no</th>
                        <th scope="col">product_name</th>
                        <th scope="col">description</th>
                        <th scope="col">price</th>
                        <th scope="col">selling_price</th>
                        <th scope="col">quantity</th>
                        <th scope="col">category_id</th>
                        <th scope="col">expire_date</th>
                        <th scope="col">stock</th>
                        <th scope="col">thumb_img</th>
                        <th scope="col">image</th>
                        <th scope="col">action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        @foreach ($products as $item )
                        <td>{{$item->id}}</td>
                        <td>{{$item->product_name}}</td>
                        <td>{{$item->description}}</td>
                        <td>{{$item->price}}</td>
                        <td>{{$item->selling_price}}</td>
                        <td>{{$item->quantity}}</td>
                        <td>{{$item->categoryname->category_name ?? null}}</td>
                        <td>{{$item->expire_date}}</td>
                        <td selected>{{$item->stock}}</td>
                        <td><img src="{{asset($item->thumb_img)}}" style="width:30px;"></td>

                        <td><img src="{{asset($item->image)}}" style="width:30px;"></td>
                        <td><a href="{{route('admins.edit_product',$item->id)}}"><button>Edit</button>
                            <form action="{{ route('admins.destroy_product', $item->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <button >Delete</button>
                        </form></a></td>
                    </tr>

                        @endforeach

                </tbody>
            </table>
        </div>


    </div>
@endsection
