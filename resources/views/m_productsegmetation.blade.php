@extends('layouts.master')
@section('title')
    Segmentar Producto
@endsection
@section('page-title')
    Segmentar Producto
@endsection
 
    @section('content')   
        <livewire:admin.product-segmentation-manager :productid="$productid" />
    @endsection
    @section('scripts')
        <!-- App js -->
        <script src="{{ URL::asset('build/js/app.js') }}"></script>
    @endsection
