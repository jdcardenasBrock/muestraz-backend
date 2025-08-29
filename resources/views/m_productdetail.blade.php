@extends('layouts.master')
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
        @if (isset($product))
            {{-- Edición --}}
            <livewire:admin.productdetail-manager :productId="$product->id" />
        @else
            {{-- Creación --}}
            <livewire:admin.productdetail-manager />
        @endif
    @endsection
    @section('scripts')
        <!-- App js -->
        <script src="{{ URL::asset('build/js/app.js') }}"></script>
    @endsection
