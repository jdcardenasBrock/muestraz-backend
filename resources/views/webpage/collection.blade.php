@extends('layouts.layoutWeb')
@section('title')
    Catalogo
@endsection

@section('content')
    <div id="content">
        <!-- New Arrival -->
        <section class="gray-bg padding-top-100 padding-bottom-100">
            <div class="container mb-4">
                <!-- Categorías -->
                <livewire:client.categories />
            </div>

            <!-- Filtros y productos -->
            <div class="container-full m-4">
                <div class="item-fltr">
                    <div class="short-by"> Mostrando {{ count($products ?? []) }} resultados </div>
                    <!-- ... -->
                </div>

                <!-- Productos con Livewire -->
                <livewire:client.products />
            </div>
        </section>
    </div>
@endsection

@section('encuesta')
    @auth
        <livewire:client.form-reminder />
    @endauth
@endsection
