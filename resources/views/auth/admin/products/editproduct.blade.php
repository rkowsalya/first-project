@extends('auth.admin.main')
@section('content')
<div class="row">
    <div class="col-xl-9 col-lg-10 col-md-12 col-sm-12 mx-auto">
        <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
            <div class="row">
                <div class="col-12">
                    <h2 class="tm-block-title d-inline-block">Edit Product</h2>
                </div>
            </div>
            <div class="row tm-edit-product-row">
                <div class="col-xl-6 col-lg-6 col-md-12">
                    <form action="{{ route('admins.update_product',$b->id) }}" method="POST" enctype="multipart/form-data"
                        class="tm-edit-product-form">
                        @csrf
                        @method('POST')
                        <div class="form-group mb-3">
                            <label for="name">Product Name
                            </label>
                            <input id="product_name" name="product_name" type="text" value="{{$b->product_name}}"
                                class="form-control validate" required />
                        </div>
                        <div class="form-group mb-3">
                            <label for="description">Description</label>
                            <textarea name="description" class="form-control validate" rows="3" required>{{$b->description}}</textarea>
                        </div>
                        <div class="form-group mb-3">
                            <label for="price">price
                            </label>
                            <input id="price" name="price" type="text" value="{{$b->price}}" class="form-control validate"
                                required />
                        </div>
                        <div class="form-group mb-3">
                            <label for="selling_price">selling_price
                            </label>
                            <input id="selling_price" name="selling_price" type="text" value="{{$b->selling_price}}"
                                class="form-control validate" required />
                        </div>
                        <div class="form-group mb-3">
                            <label for="category_id">category_id
                            </label>
                            <select name="category_id">
                                <option selected>select</option>
                                @foreach ($categories as $item)
                                    <option value="{{ $item->id }}"{{ $item->id == $b->category_id ?'selected':'' }}>{{$item->category_name}}</option>
                                @endforeach
                            </select>

                        </div>


                        <div class="form-group mb-3">
                            <label for="quantity">quantity
                            </label>
                            <input id="quantity" name="quantity" type="text" value="{{$b->quantity}}" class="form-control validate"
                                required />
                        </div>
                        <div class="row">
                            <div class="form-group mb-3 col-xs-12 col-sm-6">
                                <label for="expire_date">Expire Date
                                </label>
                                <input id="expire_date" name="expire_date" type="date" value="{{$b->expire_date}}"
                                    class="form-control validate" data-large-mode="true" />
                            </div>
                            <select class="custom-select tm-select-accounts" id="stock" name="stock" value="{{$b->stock}}" >
                                <option selected>select </option>
                                <option value="out_of_stock" {{$b ->stock == 'out_of_stock'?'selected':''}}>out_of_stock</option>
                                <option value="in_stock" {{$b ->stock ==  'in_stock'?'selected':''}} >in_stock</option>
                                <option value="on_hold"  {{$b ->stock == 'on_hold'?'selected':''}}>on_hold</option>

                            </select>
                        </div>
                        <div class="form-group mb-3 ">
                            <label for="thumb_img">Thumb_img
                            </label>
                            <input id="thumb_img" name="thumb_img" type="file"  class="form-control validate"
                                data-large-mode="true" value="{{$b->thumb_img}}" />
                                <img src="{{$b->thumb_img}}" style="width:30px;" value="{{$b->thumb_img}}"/>
                        </div>
                        <div class="form-group mb-3 ">
                            <label for="image">Image
                            </label>
                            <input id="image" name="image" type="file"  class="form-control validate"
                                data-large-mode="true" value="{{$b->image}}" />
                                <img src="{{$b->image}}" style="width:30px;" value="{{$b->image}}"/>
                        </div>

                </div>

                <div class="col-12">
                    <button type="submit" class="btn btn-primary btn-block text-uppercase">update</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
