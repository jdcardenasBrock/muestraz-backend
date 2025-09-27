@extends('layouts.layoutWeb')
@section('title')
    Membresia
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

img{

    border-left: 1000px;
}

</style>
@endsection

@section('content')
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
                <div class="com-sec"> <span><strong><a href="#."></a></strong></span>
                    <span><strong><a href="#."></a></strong></span>
                </div>
                <div  class="clearfix"></div> 
                <a  style="text-align: center;" class="b-tittle">$25.000</a>   
                <p style="text-align: center;" >Disfruta con esta Membresia 
                                                tres (3) meses 
                                                para solicitar todos nuestros productos de muestra disponibles<a></a></p>
            <a href="*" class="btn btn-login" style="float: right;"><b> La Quiero...</b> </a>
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
                <div class="com-sec"> <span><strong><a href="#."></a></strong></span>
                    <span><strong><a href="#."></a></strong></span>
                </div>
                <div  class="clearfix"></div> 
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
                <div class="com-sec"> <span><strong><a href="#."></a></strong></span>
                    <span><strong><a href="#."></a></strong></span>
                </div>
                <div  class="clearfix"></div> 
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
