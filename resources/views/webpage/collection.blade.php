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
                    <!-- short-by -->
                    <div class="short-by"> Showing 1–10 of 20 results </div>
                    <!-- List and Grid Style -->
                    <div class="lst-grd"> <a href="#" id="list"><i class="flaticon-interface"></i></a> <a
                            href="#" id="grid"><i class="icon-grid"></i></a>
                        <!-- Select -->
                        <select>
                            <option> Short By: New</option>
                            <option> Top </option>
                            <option> Price</option>
                            <option> Products</option>
                            <option> Rating</option>
                        </select>
                    </div>
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
