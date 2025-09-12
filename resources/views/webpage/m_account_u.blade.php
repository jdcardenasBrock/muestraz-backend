@extends('layouts.master')
@section('title')
    Editar Productos
@endsection
@section('page-title')
    Editar Perfil
@endsection
@section('body')

    <body>
    @endsection
    @section('content')
     
            <livewire:admin.user_profileu :ut="$userId" />
        
    @endsection
    @section('scripts')
        <!-- App js -->
        <script src="{{ URL::asset('build/js/app.js') }}"></script>