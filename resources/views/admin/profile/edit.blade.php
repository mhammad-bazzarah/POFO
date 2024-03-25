@extends('admin.layouts.layout')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Profile</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
                <div class="breadcrumb-item">Profile</div>
            </div>
        </div>
        <div class="section-body">
            <h2 class="section-title">Hi, {{ $user->name }}!</h2>
            <p class="section-lead">
                Change information about yourself on this page.
            </p>

            <div class="row mt-sm-4">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
                            @csrf
                            @method('patch')
                            <div class="card-header">
                                <h4>Edit Profile</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-md-6 col-12">
                                        <label> Name</label>
                                        <input type="text" name="name" class="form-control"
                                            value="{{ $user->name }}" required autofocus>
                                        @if ($errors->has('name'))
                                            <code> {{ $errors->first('name') }}</code>
                                        @endif
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label>Email</label>
                                        <input type="email" name="email" class="form-control"
                                            value="{{ $user->email }}" required>
                                        @if ($errors->has('email'))
                                            <code> {{ $errors->first('email') }}</code>
                                        @endif
                                    </div>
                                </div>

                                <div class="card-footer text-right">
                                    <button class="btn btn-warning">Save Changes</button>
                                </div>
                        </form>
                    </div>
                    {{-- Edit password --}}
                    <div class="card">
                        <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
                            @csrf
                            @method('put')
                            <div class="card-header">
                                <h4>Edit Password</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-md-4 col-12">
                                        <label> Current Password</label>
                                        <input type="password" name="current_password" class="form-control" required>
                                        @if ($errors->updatedPassword->has('current_password'))
                                            <code>{{ $errors->first('current_password') }} </code>
                                        @endif
                                    </div>
                                    <div class="form-group col-md-4 col-12">
                                        <label>New Password</label>
                                        <input type="password" name="password" class="form-control" required>
                                        @if ($errors->updatePassword->has('password'))
                                            <code> {{ $errors->first('password') }}</code>
                                        @endif
                                    </div>
                                    <div class="form-group col-md-4 col-12">
                                        <label>Confirme New Password</label>
                                        <input type="password" name="password_confirmation" class="form-control" required>
                                        @if ($errors->updatePassword->has('password_confirmation'))
                                            <code> {{ $errors->first('password_confirmation') }}</code>
                                        @endif
                                    </div>
                                </div>
                                <div class="card-footer text-right">
                                    <button class="btn btn-warning">Save Changes</button>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

