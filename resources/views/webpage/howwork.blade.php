@extends('layouts.layoutWeb')
@section('title')
    Como Funciona?
@endsection
@section('styles')
    <style>
        /* Botones */
        .btn {
            padding: 12px 24px;
            border-radius: 8px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .btn-yellow {
            background: #FFC107;
            color: #000;
        }

        .btn-yellow:hover {
            background: #ffca28;
            color: #000;
        }

        .btn-yellow-outline {
            border: 2px solid #FFC107;
            color: #FFC107;
            padding: 10px 20px;
        }

        .btn-yellow-outline:hover {
            background: #FFC107;
            color: #000;
        }

        .btn-purple {
            background: #7E57C2;
            color: #fff;
        }

        .btn-purple:hover {
            background: #6d42ac;
        }

        .btn-large {
            font-size: 18px;
            padding: 14px 28px;
        }

        /* Secciones */
        section {
            margin-bottom: 50px;
            background: #fff;
            padding: 40px 30px;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
            max-width: 800px;
            margin-left: auto;
            margin-right: auto;
        }

        h2,
        h3 {
            color: #333;
            margin-top: 0;
            font-weight: 700;
        }

        .intro p,
        .benefits ul li,
        .membership p,
        .register p {
            font-size: 18px;
            color: #555;
            line-height: 1.6;
        }

        .benefits ul {
            list-style: none;
            padding: 0;
            margin-top: 20px;
        }

        .benefits ul li {
            margin-bottom: 12px;
            font-size: 18px;
        }

        /* Resaltar membresía */
        .membership p strong {
            color: #000;
            font-size: 20px;
        }

        /* Centrar botones */
        .membership a,
        .register a {
            display: inline-block;
            margin-top: 20px;
        }

        /* Responsive */
        @media (max-width: 768px) {
            section {
                padding: 30px 20px;
            }

            .btn-large {
                font-size: 16px;
                padding: 12px 22px;
            }
        }
    </style>
@endsection

@section('content')
    <main class="container mb-4">

    <!-- Intro -->
        <section class="intro text-center mt-4">
            <h2>👋 Bienvenido a MUESTRAZ</h2>
            <p>Consumidores inteligentes prueban antes de comprar. Te llevamos productos y servicios a la puerta de tu casa.
            </p>
        </section>
    
     @php
        $content = '';
        $content = DB::table('howitworks')->first();
        if ($content != '') {
            $content = $content->content;
        }
    @endphp
    <div class="pt-4  bg-white" style="max-height: 30vh; overflow-y: auto; width: 100%;">
        {!! $content !!}
    </div>


        @php
            use App\Models\MembershipType;

            // Traer la membresía gratuita
            $freeMembership = MembershipType::where('memberType', 'free')->first();
            $freeProducts = $freeMembership ? $freeMembership->quantitysamples : 'null';
        @endphp

        @php
            // Traer la membresía con el valor más alto
            $membership = MembershipType::orderByDesc('value')->first();

            if ($membership) {
                $months = max($membership->quantitymonths, 1);
                $monthlyCost = $membership->value / $months;
            }
        @endphp

        <!-- Membresía -->
        <section class="membership text-center mt-5" >
            <h3>💥 Únete a la comunidad</h3>

            @if ($membership)
                <p>
                    <strong>¡Solo COP ${{ number_format($membership->value, 0, ',', '.') }}
                        por {{ $membership->quantitymonths }} mes{{ $membership->quantitymonths > 1 ? 'es' : '' }}!</strong>
                    <br>
                    (~COP ${{ number_format($monthlyCost, 0, ',', '.') }} al mes)
                </p>
            @else
                <p>No hay membresías disponibles en este momento.</p>
            @endif

            @auth
                <a href="/m_membership" class="btn btn-yellow btn-large">Hazte miembro ahora</a>
            @else
                <a href="/login" class="btn btn-yellow btn-large">Hazte miembro ahora</a>
            @endauth
        </section>

        <!-- Registro -->
        <section class="register text-center">
            <h3>📝 Completa tu registro</h3>
            <p>Cuanto mejor te conozcamos, mejores productos podrás recibir en tus pedidos.</p>
            @auth
                <a href="{{ route('admin.m_user_detail_u.edit', ['ut' => Crypt::encrypt(Auth::user()->id)]) }}"
                    class="btn btn-purple btn-large">Llenar Perfil</a>
            @else
                <a href="/register" class="btn btn-purple btn-large">Registrarse</a>
            @endauth
        </section>
    </main>
@endsection
