@extends('layouts.master')
@section('title')
    Listado de Usuarios
@endsection
@section('page-title')
    Listado de Usuarios
@endsection
 
    @section('content')
        <livewire:admin.users/>
    @endsection
    @section('scripts')
        <!-- App js -->
        <script src="{{ URL::asset('build/js/app.js') }}"></script>
    @endsection
