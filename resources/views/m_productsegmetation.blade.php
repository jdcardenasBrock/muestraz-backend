@extends('layouts.master')
@section('title')
    Segmentar Producto
@endsection
@section('page-title')
    Segmentar Producto
@endsection
@section('body')

    <body>
    @endsection
    @section('content')   
        <livewire:admin.productsegmentation-manager :productid="$productid" />
    @endsection
    @section('scripts')
        <!-- App js -->
        <script src="{{ URL::asset('build/js/app.js') }}"></script>
    @endsection
