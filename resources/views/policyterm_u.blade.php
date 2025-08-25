@extends('layouts.layoutWeb')
@section('title')
    Politicas | Terminos y Condiciones
@endsection

@section('content')
    <!-- Intro Section -->
    <section class="light-gray-bg padding-top-100 padding-bottom-100">
        <div class="container">
            <div class="intro-sec">
                <div class="center-block">
                    <h1 class="mb-4">Terminos y Condiciones</h1> 
                        @if ($policia_u)
                            <h4 style="text-align: justify;"> {{ $policia_u->term }} </h4>
                        @endif
                </div>
            </div>
        </div>

        <section class="light-gray-bg padding-top-100 padding-bottom-100">
            <div class="container">
                <div class="intro-sec">
                    <div class="center-block">
                        <h1 class="mb-4">Politica de tratamiento de datos</h1>
                            @if ($policia_u)
                                <h4 style="text-align: justify;"> {{ $policia_u->policy }} </h4>
                            @endif
                    </div>
                </div>
            </div>
        </section>
    </section>
@endsection
