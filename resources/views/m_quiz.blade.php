@extends('layouts.master')
@section('title')
    Administrador de Encuesta
@endsection
@section('page-title')
    Administrador de Encuesta
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
