@extends('auth.customer_layout.main')
@section('content')
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
                {{-- <td><a href="{{route('admins.edit_product',$item->id)}}"><button>Edit</button>
                    <form action="{{ route('admins.destroy_product', $item->id) }}" method="post">
                    @csrf
                    @method('delete')
                    <button >Delete</button>
                </form></a></td> --}}
            </tr>

                @endforeach

        </tbody>
    </table>
</div>
@endsection
