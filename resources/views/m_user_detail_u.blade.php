@extends('layouts.layoutWeb')
@section('title')
    Editar Perfil 
@endsection

@section('body')

    <body>
    @endsection
    @section('content')
        @php
            $encryptedId = request()->get('ut');
        @endphp
        
        <livewire:admin.user-profileu :ut="$encryptedId" />

    @endsection
    @section('scripts')
        <!-- App js -->
        <script src="{{ URL::asset('build/js/app.js') }}"></script>
    @endsection
