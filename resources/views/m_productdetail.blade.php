@extends('layouts.master')
@section('title')
    Editar Productos
@endsection
@section('page-title')
    Editar Productos
@endsection
@section('content')

    @if (isset($product))
        {{-- Edición --}}
        <livewire:admin.product-detail-manager :productId="$product->id" />
    @else
        {{-- Creación --}}
        <livewire:admin.product-detail-manager />

    @endif
@endsection
@section('scripts')
    <!-- App js -->
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
