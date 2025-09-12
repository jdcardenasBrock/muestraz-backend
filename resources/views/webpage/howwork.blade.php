@extends('layouts.layoutWeb')
@section('title')
    Como Funciona?
@endsection
@section('styles')
    <style>
        .btn {
            padding: 8px 12px;
            border-radius: 5px;
            font-weight: bold;
            text-decoration: none;
        }

        .btn-yellow {
            background: #FFC107;
            color: #000;
        }

        .btn-yellow-outline {
            border: 2px solid #FFC107;
            color: #FFC107;
            padding: 6px 10px;
        }

        .btn-purple {
            background: #7E57C2;
            color: #fff;
        }

        .btn-large {
            display: inline-block;
            margin-top: 10px;
            font-size: 16px;
            padding: 12px 18px;
        }

        section {
            margin-bottom: 40px;
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
        }

        h2,
        h3 {
            color: #333;
            margin-top: 0;
        }

        ul {
            list-style: none;
            padding: 0;
        }

        ul li {
            margin-bottom: 10px;
            font-size: 16px;
        }
    </style>
@endsection

@section('content')
    <main class="container mb-4">
        <section class="intro mt-4">
            <h2>👋 Bienvenido a MUESTRAZ</h2>
            <p>Consumidores inteligentes prueban antes de comprar. Te llevamos productos y servicios a la puerta de tu casa.
            </p>
        </section>

        <section class="benefits">
            <h3>🎁 ¿Por qué unirte?</h3>
            <ul>
                <li>✅ Hasta <strong>8 productos GRATIS</strong> por pedido</li>
                <li>✅ Solo pagas el costo de envío</li>
                <li>🔒 Accede a productos exclusivos solo para miembros</li>
                <li>💸 Productos con descuentos especiales</li>
            </ul>
        </section>

        <section class="membership">
            <h3>💥 Únete a la comunidad</h3>
            <p><strong>¡Solo COP $48.000 al año!</strong> (~COP $4.000 al mes)</p>
            <a href="#" class="btn btn-yellow btn-large">Hazte miembro ahora</a>
        </section>

        <section class="register">
            <h3>📝 Completa tu registro</h3>
            <p>Cuanto mejor te conozcamos, mejores productos podrás recibir en tus pedidos.</p>
            <a href="#" class="btn btn-purple">Registrarse</a>
        </section>
    </main>
@endsection
