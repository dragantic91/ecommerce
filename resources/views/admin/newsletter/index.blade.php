@extends('admin.layouts.app')
@section('content')
    <div class="container">
        {!! $dataGrid->render() !!}
        <div class="text-right">
            <p>
                <a class="btn btn-secondary" style="text-decoration: none;" href="{{ route('pdfview',['download'=>'pdf']) }}">PDF Herunterladen</a>
            </p>
        </div>
    </div>

@stop