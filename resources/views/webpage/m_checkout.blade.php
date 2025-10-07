@extends('layouts.layoutWeb')
@section('title')
    Pago de Productos
@endsection
@section('page-title')
    Pago de Productos
@endsection

    @section('content')
        <livewire:checkout />
    @endsection
    @section('scripts')
        <!-- App js -->
        <script src="{{ URL::asset('build/js/app.js') }}"></script>
    @endsection
