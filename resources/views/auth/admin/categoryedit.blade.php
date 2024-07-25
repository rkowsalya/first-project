@extends('auth.admin.main')
@section('content')
<div class="container mt-5">

    <!-- row -->
    <div class="row tm-content-row">

        <div class="tm-block-col tm-col-account-settings">
            <div class="tm-bg-primary-dark tm-block tm-block-settings">
                <h2 class="tm-block-title">Edit category</h2>
                <form action="{{ route('admins.update_category',$b->id)}}" method="POST" class="tm-signup-form row">
                   @csrf
                   @method('POST')
                    <div class="form-group col-lg-6">
                        <label for="name">product Name</label>
                        <input id="name" name="category_name" type="text" value="{{$b->category_name}}"class="form-control validate" />
                    </div>


                    <div class="form-group col-lg-6">
                        <label class="tm-hide-sm">&nbsp;</label>
                        <button type="submit" class="btn btn-primary btn-block text-uppercase">
                            update
                        </button>
                    </div>


                    </div>

                </form>
            </div>
        </div>
    </div>

</div>
@endsection
