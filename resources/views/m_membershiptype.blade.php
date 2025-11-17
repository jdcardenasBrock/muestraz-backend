@extends('layouts.master')
@section('title')
    Administrador de Membresias
@endsection
@section('page-title')
    Administrador de Membresias
@endsection
 
    @section('content')
        <livewire:admin.membershiptype-manager />
    @endsection
    @section('scripts')
        <!-- App js -->
        <script src="{{ URL::asset('build/js/app.js') }}"></script>
    @endsection
