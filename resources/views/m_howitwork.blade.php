@extends('layouts.master')
@section('title')
    Administrador de Como Funciona
@endsection
@section('page-title')
    Administrador de Como Funciona
@endsection
 
    @section('content')
    
        <livewire:admin.howitwork-manager />
    @endsection
    @section('scripts')
        <!-- App js -->
        <script src="{{ URL::asset('build/js/app.js') }}"></script>
    @endsection

