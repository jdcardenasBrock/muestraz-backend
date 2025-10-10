@extends('layouts.layoutWeb')
@section('title')
    Membresia
@endsection
@section('styles')
<style>
 /* Estilos generales */
body {
    font-family: 'Poppins', sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f4f7f6;
    color: #333;
    line-height: 1.6;
}

header {
    text-align: center;
    padding: 40px 20px;
    background-color: #fff;
    border-bottom: 1px solid #ddd;
}

header h1 {
    color: #2c3e50;
    margin-bottom: 10px;
}

/* Contenedor de las tarjetas */
.membership-container {
    display: flex;
    justify-content: center;
    align-items: center;
    flex-wrap: wrap;
    gap: 30px;
    padding: 50px 20px;
}

/* Estilo de cada tarjeta */
.membership-card {
    background-color: #fff;
    border-radius: 12px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    padding: 30px;
    text-align: center;
    width: 300px;
    position: relative;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.membership-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
}

/* Destacar la tarjeta más popular */
.membership-card.featured {
    border: 3px solid #3498db;
}

.ribbon {
    position: absolute;
    top: 0;
    right: 20px;
    background-color: #3498db;
    color: #fff;
    padding: 5px 15px;
    border-bottom-left-radius: 8px;
    border-bottom-right-radius: 8px;
    font-size: 14px;
    font-weight: 600;
}

/* Títulos y precios */
.card-title {
    color: #3498db;
    font-size: 24px;
    margin-bottom: 10px;
}

.card-price {
    font-size: 48px;
    font-weight: 600;
    color: #2c3e50;
    margin: 0;
}

.card-periodo {
    font-size: 18px;
    color: #777;
}

/* Características de la membresía */
.card-features {
    list-style: none;
    padding: 0;
    text-align: left;
    margin-top: 20px;
}

.card-features li {
    padding: 10px 0;
    border-bottom: 1px solid #eee;
}

.card-features li:last-child {
    border-bottom: none;
}

/* Botón de selección */
.card-button {
    display: block;
    width: 100%;
    margin-top: 30px;
    padding: 15px;
    background-color: #3498db;
    color: #fff;
    text-decoration: none;
    border-radius: 8px;
    font-weight: 600;
    transition: background-color 0.3s ease;
}

.card-button:hover {
    background-color: #2980b9;
}

/* Adaptabilidad para móviles */
@media (max-width: 768px) {
    .membership-container {
        flex-direction: column;
    }

    .membership-card {
        width: 100%;
    }
}

</style>
@endsection

@section('content')
<!DOCTYPE html>
<html lang="es">

    <header>
        <h1>Elige tu Membresía</h1>
        <p>Selecciona el plan que mejor se adapte a tus necesidades.</p>
    </header>

<div class="knowledge-share">
    <ul class="row">
                
        <!--BASICA-->
        <li class="col" style="background-color: lightyellow;">
            <br>
            <br>
            <br>
            <div style="text-align: center;"> <h2  >BÁSICA</h2> </div>
            <div  style="text-align: center;" class="img-por"> <img aling="center" src="{{asset('web/images/MembresiaBasica.png')}}" alt="">
            </div>
            <article style="background-color: lightyellow;">
                <div  ></div> 
                <a  style="text-align: center;" class="b-tittle">Gratis</a>   
                <p style="text-align: center;" >Disfruta con esta Membresia 
                                                el pedido de 5 prodcutos gratis,
                                                la adquieres al completar tus datos perosnales <a></a></p>
                <a href="{{ route('admin.m_user_detail_u.edit', [
                                'ut' => Crypt::encrypt(Auth::user()->id),
                            ]) }}"
                                class="btn btn-login" style="float: right;">
                                <b> Mi Perfil</b>
                            </a>
            <br>
            <br>
            <br>
            </article>
        </li>

        <!--INTERMEDIA-->
        <li class="col" style="background-color: lightblue;">
            <br>
            <br>
            <br>
            <div style="text-align: center;"> <h2  >INTERMEDIA</h2> </div>
            <div  style="text-align: center;" class="img-por"> <img aling="center" src="{{asset('web/images/MembresiaMedium.png')}}" alt="">
            </div>
            <article style="background-color: lightblue;">
                <div ></div> 
                <a  style="text-align: center;" class="b-tittle">$30.000</a>   
                <p style="text-align: center;" >Disfruta con esta Membresia 
                                                seis (6) meses 
                                                para solicitar todos nuestros productos de muestra disponibles<a></a></p>
            <a href="*" class="btn btn-login" style="float: right;"><b> La Quiero...</b></a>
            <br>
            <br>
            <br>
            </article>
        </li>

        <!--PREMIUM-->
        <li class="col" style="background-color: lightgreen;">
            <br>
            <br>
            <br>
            <div style="text-align: center;"> <h2  >PREMIUM</h2> </div>
            <div  style="text-align: center;" class="img-por"> <img aling="center" src="{{asset('web/images/MembresiaPremium.png')}}" alt="">
            </div>
            <article style="background-color: lightgreen;">
                <div></div> 
                <a  style="text-align: center;" class="b-tittle">$48.000</a>   
                <p style="text-align: center;" >Disfruta con esta Membresia 
                                                doce (12) meses 
                                                para solicitar todos nuestros productos de muestra disponibles<a></a></p>
            <a href="*" class="btn btn-login" style="float: right;"><b> La Quiero...</b></a>
            <br>
            <br>
            <br>
            </article>
        </li>
    </ul>
</div>   
@endsection

