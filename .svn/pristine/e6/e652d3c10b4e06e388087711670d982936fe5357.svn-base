@extends('admin.layouts.app')

@section('content')
    <div class="container">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        {{ __('lang.admin-create-admin-user-button-title') }}
                    </div>
                    <div class="card-body">


                        <form action="{{ route('admin.admin-user.store') }}" method="post">
                            {{ csrf_field() }}



                            @include('admin.admin-user._fields',['editMethod' => false,'roles' => $roles])

                            <div class="form-group">
                                <button class="btn btn-primary" type="submit">{{ __('lang.admin-create-admin-user-button-title') }}</button>
                                <a href="{{ route('admin.admin-user.index') }}" class="btn">{{ __('lang.cancel') }}</a>
                            </div>

                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection