@extends('layouts.master')
@section('title')
    Listado de Usuarios para Campaña Avanzada
@endsection
@section('page-title')
    Listado de Usuarios para Campaña Avanzada       
@endsection
@section('body')

    <body>
    @endsection
    @section('content')
        <livewire:admin.campaign_advanced-manager/>
    @endsection
    @section('scripts')
        <!-- App js -->
        <script src="{{ URL::asset('build/js/app.js') }}"></script>
    @endsection
