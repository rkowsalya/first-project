@extends('auth.customer_layout.main')
@section('content')
    <div class="row tm-content-row">
        <div class="col-12 tm-block-col">
            <div class="tm-bg-primary-dark tm-block tm-block-taller tm-block-scroll">
                <h2 class="tm-block-title">Orders List</h2>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">CATEGORY NO</th>
                            <th scope="col">CATEGORY_NAME</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $key => $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->category_name }}</td>

                            {{-- <td><a href="{{ route('admins.edit_category', $item->id) }}"><button>Edit</button>
                                    <form action="{{ route('admins.destroy_category', $item->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button>Delete</button>
                                    </form>
                                </a></td> --}}
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
