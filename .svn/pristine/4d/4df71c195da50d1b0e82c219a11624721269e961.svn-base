@extends('admin.layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">{{ __('lang.category-index-edit') }}</div>

                <div class="card-body">
                    <form action="{{ route('admin.category.update', $model->id) }}" method="POST">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="put">

                        @include('admin.category._fields')

                        <button type="submit" disabled class="btn category-save-button">{{ __('lang.category-index-edit') }}</button>

                        <a href="{{ route('admin.category.index') }}" class="btn btn-default">{{ __('lang.cancel') }}</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection