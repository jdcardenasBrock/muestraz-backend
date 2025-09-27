@extends('layouts.layoutWeb')
@section('title')
    Editar Productos
@endsection
@section('page-title')
    Editar Productos
@endsection
@section('body')

    <body>
    @endsection
    @section('content')
    
            <livewire:client.productdetail :id="$id" />
    @endsection
    @section('scripts')
        <!-- App js -->
        <script src="{{ URL::asset('build/js/app.js') }}"></script>
    @endsection
