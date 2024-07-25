@extends('auth.admin.main')
@section('content')
    <div class="container mt-5">

        <!-- row -->
        <div class="row tm-content-row">
            <div class="tm-block-col tm-col-avatar">
                <div class="tm-bg-primary-dark tm-block tm-block-avatar">
                    <h2 class="tm-block-title">Change Avatar</h2>
                    <div class="tm-avatar-container">
                        <img src="img/avatar.png" alt="Avatar" class="tm-avatar img-fluid mb-4" />
                        <a href="#" class="tm-avatar-delete-link">
                            <i class="far fa-trash-alt tm-product-delete-icon"></i>
                        </a>
                    </div>
                    <button class="btn btn-primary btn-block text-uppercase">
                        Upload New Photo
                    </button>
                </div>
            </div>
            <div class="tm-block-col tm-col-account-settings">
                <div class="tm-bg-primary-dark tm-block tm-block-settings">
                    <h2 class="tm-block-title">Register</h2>
                    <form action="{{ route('admins.update',$a->id) }}" method="POST" class="tm-signup-form row">
                        @csrf
                        @method('POST')

                        <div class="form-group col-lg-6">
                            <label for="name">Account Name</label>
                            <input id="name" name="name" type="text" value={{$a->name}}class="form-control validate" />
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="email">Account Email</label>
                            <input id="email" name="email" type="email" value={{$a->email}} class="form-control validate" />
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="password">Password</label>
                            <input id="password" name="password" type="password"  class="form-control validate" />
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="password2">Re-enter Password</label>
                            <input id="password2" name="password_confirmation" type="password" class="form-control validate" />
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="phone">Phone</label>
                            <input id="phone" name="phone" type="tel" value={{$a->phone}}class="form-control validate" />
                        </div>
                        <div class="form-group col-lg-6">
                            <label class="tm-hide-sm">&nbsp;</label>
                            <button type="submit" class="btn btn-primary btn-block text-uppercase">
                                Register
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    @endsection
