@extends('layouts.master-without-nav')
@section('title')
    Editar Perfil 
@endsection

 
    @section('content')
        <livewire:admin.user-profileu :ut="$ut" />

    @endsection
    @section('scripts')
        <!-- App js -->
        <script src="{{ URL::asset('build/js/app.js') }}"></script>
    @endsection
