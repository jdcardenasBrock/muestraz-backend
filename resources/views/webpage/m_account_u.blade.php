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
        
            <livewire:admin.userdetail-manager :userId="$user->id" />
        
    @endsection
    @section('scripts')
        <!-- App js -->
        <script src="{{ URL::asset('build/js/app.js') }}"></script>
    @endsection
