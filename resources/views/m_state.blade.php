@extends('layouts.master')
@section('title')
    Administrador de Departamentos
@endsection
@section('page-title')
    Administrador de Departamentos
@endsection
@section('body')

    <body>
    @endsection
    @section('content')
        <livewire:admin.state-manager />
    @endsection
    @section('scripts')
        <!-- App js -->
        <script src="{{ URL::asset('build/js/app.js') }}"></script>
    @endsection
