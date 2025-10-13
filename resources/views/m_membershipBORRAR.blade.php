@extends('layouts.layoutWeb')
@section('title')
    Membresias
@endsection
@section('page-title')
    Membresias
@endsection
@section('body')

    <body>
    @endsection
    @section('content')
        <livewire:admin.membership-manager />
    @endsection
    @section('scripts')
        <!-- App js -->
        <script src="{{ URL::asset('build/js/app.js') }}"></script>
    @endsection
