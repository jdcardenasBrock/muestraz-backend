@extends('layouts.master')
@section('title')
    Segmentar Producto Avanzado
@endsection
@section('page-title')
    Segmentar Producto Avanzado
@endsection
@section('body')

    <body>
    @endsection
    @section('content')   
        <livewire:admin.productsegmentationadvanced-manager :productid="$productid" />
    @endsection
    @section('scripts')
        <!-- App js -->
        <script src="{{ URL::asset('build/js/app.js') }}"></script>
    @endsection
