@extends('auth.admin.main')
@section('content')
    <div class="container mt-5">

        <!-- row -->
        <div class="row tm-content-row">

            <div class="tm-block-col tm-col-account-settings">
                <div class="tm-bg-primary-dark tm-block tm-block-settings">
                    <h2 class="tm-block-title">category</h2>
                    <form action="{{ route('admins.store_category')}}" method="POST" class="tm-signup-form row">
                       @csrf
                       @method('POST')
                        <div class="form-group col-lg-6">
                            <label for="name">product Name</label>
                            <input id="name" name="category_name" type="text" class="form-control validate" />
                        </div>


                        <div class="form-group col-lg-6">
                            <label class="tm-hide-sm">&nbsp;</label>
                            <button type="submit" class="btn btn-primary btn-block text-uppercase">
                                Add category
                            </button>
                        </div>


                        </div>

                    </form>
                </div>
            </div>
        </div>

    </div>

    <div class="row tm-content-row">
        <div class="col-12 tm-block-col">
            <div class="tm-bg-primary-dark tm-block tm-block-taller tm-block-scroll">
                <h2 class="tm-block-title">Orders List</h2>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">CATEGORY NO</th>
                            <th scope="col">CATEGORY_NAME</th>
                            <th scope="col">ACTION</th>

                        </tr>
                    </thead>
                    <tbody>
                          <tr>
                              @foreach ($category as $item )
                              <td>{{$item->id}}</td>
                               <td>{{$item->category_name}}</td>

                            <td><a href="{{route('admins.edit_category',$item->id)}}"><button>Edit</button>
                                <form action="{{ route('admins.destroy_category', $item->id) }}" method="post">
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
    </div>
@endsection
