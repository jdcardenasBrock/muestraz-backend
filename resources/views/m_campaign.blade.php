@extends('layouts.master')
@section('title')
    Listado de Usuarios para Campaña
@endsection
@section('page-title')
    Listado de Usuarios para Campaña
@endsection
    @section('content')
        <livewire:admin.campaign-manager/>
    @endsection
    @section('scripts')
        <!-- App js -->
        <script src="{{ URL::asset('build/js/app.js') }}"></script>
    @endsection
