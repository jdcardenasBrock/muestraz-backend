@extends('layouts.layoutWeb')
@section('title')
    Politicas | Terminos y Condiciones
@endsection
@section('styles')
<style>
    .legal-page {
    background-color: #f9f9f9;
    font-family: 'Inter', sans-serif;
}

.legal-wrapper {
    max-width: 900px;
    margin: 0 auto;
    padding: 40px 20px;
    background-color: #ffffff;
    border-radius: 12px;
    box-shadow: 0 4px 16px rgba(0,0,0,0.05);
}

.legal-title {
    font-size: 28px;
    font-weight: 700;
    color: #222;
    border-bottom: 2px solid #FFC107;
    padding-bottom: 10px;
}

.legal-content {
    font-size: 16px;
    color: #444;
    line-height: 1.8;
    text-align: justify;
    white-space: pre-wrap;
    margin-top: 20px;
}

hr {
    border: none;
    border-top: 1px solid #eee;
    margin: 40px 0;
}

</style>
@endsection
@section('content')
<section class="legal-page light-gray-bg py-5">
    <div class="container">
        <div class="legal-wrapper">
            {{-- Términos y Condiciones --}}
            <div class="legal-section mb-5">
                <h2 class="legal-title mb-4">Términos y Condiciones</h2>
                @if ($policia_u)
                    <div class="legal-content">
                        {!! nl2br(e($policia_u->term)) !!}
                    </div>
                @else
                    <p>No se han cargado los Términos y Condiciones.</p>
                @endif
            </div>

            <hr class="my-5">

            {{-- Política de tratamiento de datos --}}
            <div class="legal-section">
                <h2 class="legal-title mb-4">Política de Tratamiento de Datos</h2>
                @if ($policia_u)
                    <div class="legal-content">
                        {!! nl2br(e($policia_u->policy)) !!}
                    </div>
                @else
                    <p>No se ha cargado la política de datos.</p>
                @endif
            </div>
        </div>
    </div>
</section>
@endsection
