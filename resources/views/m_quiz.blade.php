@extends('layouts.master')
@section('title')
    Administrador de Segmentación
@endsection
@section('page-title')
    Administrador de Segmentación
@endsection
@section('body')

    <body>
    @endsection
    @section('content')
        <livewire:admin.quiz-manager />
    @endsection
    @section('scripts')
        <!-- App js -->
        <script src="{{ URL::asset('build/js/app.js') }}"></script>
    @endsection
