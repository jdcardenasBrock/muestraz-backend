@extends('layouts.layoutWeb')

@section('title', 'Políticas | Términos y Condiciones')

@section('styles')
<style>
    body {
        font-family: 'Inter', sans-serif;
    }

    .legal-page {
        background-color: #f5f6f8;
        padding: 60px 0;
    }

    .legal-wrapper {
        max-width: 900px;
        margin: auto;
        background: #fff;
        padding: 40px 35px;
        border-radius: 16px;
        box-shadow: 0 10px 25px rgba(0,0,0,0.08);
    }

    .legal-title {
        font-size: 30px;
        font-weight: 700;
        color: #1a1a1a;
        margin-bottom: 20px;
        padding-bottom: 12px;
        border-bottom: 3px solid #ffc107;
    }

    .legal-content {
        font-size: 17px;
        line-height: 1.9;
        color: #333;
        text-align: justify;
    }

    .legal-content p {
        margin-bottom: 18px;
    }

    .separator {
        height: 1px;
        background: #e2e2e2;
        margin: 50px 0;
    }
</style>
@endsection

@section('content')
<section class="legal-page">
    <div class="legal-wrapper">

        {{-- Términos y Condiciones --}}
        <div class="legal-section mb-5">
            <h2 class="legal-title">Términos y Condiciones</h2>

            @if ($policia_u && $policia_u->term)
                <div class="legal-content">
                    {!! $policia_u->term !!}
                </div>
            @else
                <p>No se han cargado los Términos y Condiciones.</p>
            @endif
        </div>

        <div class="separator"></div>

        {{-- Políticas de Privacidad / Datos --}}
        <div class="legal-section">
            <h2 class="legal-title">Política de Tratamiento de Datos</h2>

            @if ($policia_u && $policia_u->policy)
                <div class="legal-content">
                    {!! $policia_u->policy !!}
                </div>
            @else
                <p>No se ha cargado la política de datos.</p>
            @endif
        </div>

    </div>
</section>
@endsection
