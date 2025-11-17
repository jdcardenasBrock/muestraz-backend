@extends('layouts.layoutWeb')
@section('title')
    Editar Productos
@endsection
@section('page-title')
    Editar Productos
@endsection
 
    @section('content')
    
            <livewire:client.product-detail :id="$id" />
    @endsection
    @section('scripts')
        <!-- App js -->
        <script src="{{ URL::asset('build/js/app.js') }}"></script>
    @endsection
