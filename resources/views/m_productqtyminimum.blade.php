@extends('layouts.master')
@section('title')
    Listado de Productos con Cantidad Mínima
@endsection
@section('page-title')
    Listado de Productos con Cantidad Mínima
@endsection
 
    @section('content')
        <livewire:admin.productqtyminimum-manager/>
    @endsection
    @section('scripts')
        <!-- App js -->
        <script src="{{ URL::asset('build/js/app.js') }}"></script>
    @endsection
