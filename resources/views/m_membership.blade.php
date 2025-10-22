@extends('layouts.layoutWeb')

@section('title', 'Membresías')

@section('styles')
<style>
    body {
        font-family: 'Poppins', sans-serif;
        margin: 0;
        color: #2d3436;
    }

    header {
        text-align: center;
        padding: 60px 20px 40px;
    }

    header h1 {
        font-size: 2.8rem;
        font-weight: 700;
        color: #2c3e50;
        margin-bottom: 10px;
    }

    header p {
        color: #636e72;
        font-size: 1.1rem;
        margin-top: 0;
    }

    .membership-container {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 2rem;
        padding: 0 40px 80px;
        max-width: 1300px;
        margin: 0 auto;
    }

    .membership-card {
        background: #fff;
        border-radius: 16px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        text-align: center;
        padding: 40px 30px;
        position: relative;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .membership-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 12px 30px rgba(0, 0, 0, 0.12);
    }

    .membership-card.featured {
        border: 2px solid #3498db;
        background: linear-gradient(180deg, #e8f4ff, #fff);
    }

    .ribbon {
        position: absolute;
        top: 18px;
        right: -40px;
        background: #3498db;
        color: #fff;
        padding: 6px 50px;
        transform: rotate(45deg);
        font-size: 13px;
        font-weight: 600;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.15);
    }

    .card-image img {
        width: 100px;
        height: 100px;
        object-fit: contain;
        margin-bottom: 20px;
    }

    .card-title {
        font-size: 1.6rem;
        color: #2980b9;
        font-weight: 700;
        margin-bottom: 10px;
    }

    .card-price {
        font-size: 2.5rem;
        font-weight: 700;
        color: #2d3436;
    }

    .card-periodo {
        font-size: 0.95rem;
        color: #636e72;
        margin-bottom: 25px;
    }

    .card-features {
        list-style: none;
        text-align: left;
        padding: 0;
        margin: 20px 0;
    }

    .card-features li {
        padding: 10px 0;
        border-bottom: 1px solid #eee;
        font-size: 1.15rem;
    }

    .card-features li:last-child {
        border-bottom: none;
    }

    .card-button {
        display: inline-block;
        background: #3498db;
        color: #fff;
        padding: 14px 30px;
        border-radius: 10px;
        text-decoration: none;
        font-weight: 600;
        transition: background 0.3s ease;
        margin-top: 20px;
    }

    .card-button:hover {
        background: #2980b9;
    }

    .card-free {
        background: linear-gradient(180deg, #fffbea, #ffffff);
    }

    .card-premium {
        background: linear-gradient(180deg, #e8f0ff, #ffffff);
    }

    .card-vip {
        background: linear-gradient(180deg, #eaffea, #ffffff);
    }

    @media (max-width: 768px) {
        header h1 {
            font-size: 2rem;
        }
        .membership-container {
            padding: 0 20px 60px;
        }
    }
</style>
@endsection

@section('content')
<header class="mb-4" style="background: #f5f6fa;margin: 0 auto;">
    <h1>Elige tu Membresía</h1>
    <p>Selecciona la membresía que mejor se adapte a tus necesidades</p>
</header>

<div class="knowledge-share">
    <ul class="row">
             
        <!--BASICA-->
        @if($membership[0])
        <li class="col" style="background-color: lightyellow;">
            <br>
            <br>
            <br>
            <div style="text-align: center;"> <h2  >{!! ($membership[0]->type) !!}</h2> </div>
            <div  style="text-align: center;" class="img-por"> <img aling="center" src="{{ Storage::url($membership[0]->image_path) }}" alt="">
            <article style="background-color: lightyellow;">
                <div  ></div> 
                <a  style="text-align: center;" class="b-tittle">Gratis</a>

                <p style="text-align: center;">Cantidad de productos que puedes solicitar <b>{!! ($membership[0]->quantitysamples) !!}</b></p>
                <p style="text-align: center;">Duracion de la Membresia <b>{!! ($membership[0]->quantitymonths) !!} meses</b></p>
                <a 
                                href="{{ route('admin.m_user_detail_u.edit', [
                                'ut' => Crypt::encrypt(Auth::user()->id),
                            ]) }}" class="btn btn-login" style="float: right;">
                                <b> Mi Perfil</b>
                            </a>
            <br>
            <br>
            <br>
            </article>
            @endif

            <div class="card-image">
                <img src="{{ Storage::url($m->image_path) }}" alt="{{ $m->type }}">
            </div>

            <h2 class="card-title">{{ ucfirst($m->type) }}</h2>
            <p class="card-price">
                {{ $m->value > 0 ? '$' . number_format($m->value, 2) : 'Gratis' }}
            </p>
            <p class="card-periodo">Duración: {{ $m->quantitymonths }} mes(es)</p>

            <ul class="card-features">
                <li><strong>{{ $m->quantitysamples }}</strong> muestras por producto</li>
                 @if($m->value == 0 || $m->type == "free")
                    <li>Envio de muestraz segun peticiones</li>
                @else
                <li>Renovación cada {{ $m->quantitymonths }} mes(es)</li>
                @endif
                @if($m->value == 0 || $m->type == "free")
                    <li>Acceso <b>limitado</b> a productos.</li>
                @else
                    <li>Acceso <b>completo</b> a productos VIP</li>
                    <li>Envió Rapido y Atención Inmediata</li>
                @endif
            </ul>

            @if ($m->value == 0)
                <a href="{{ route('admin.m_user_detail_u.edit', ['ut' => Crypt::encrypt(Auth::user()->id)]) }}" 
                   class="card-button">Mi Perfil</a>
            @else
                <a href="#" class="card-button">La Quiero</a>
            @endif
        </div>
</div>
@endsection
