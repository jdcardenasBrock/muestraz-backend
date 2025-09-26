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
        <br>
        <br>
        <!-- Post 1 -->
        <li class="col">

            <!-- Post Img -->
            <div class="img-por"> <img src="{{asset('web/images/membresia.png')}}" alt="">
            </div>
            <article>
                <!-- Date And comment -->
                <div class="date"> <span class="huge">10</span> <span>Enero</span></div>
                <div class="com-sec"> <span><strong><a href="#."></a></strong></span>
                    <span><strong><a href="#."></a></strong></span>
                </div>
                <div class="clearfix"></div>
                <a href="#." class="b-tittle">Galleta Tosh Kiwi</a>
                <p>Produto muy buen sabor y saludable, lo recibi en el tiempo estimado!!!! <a
                        href="#."></a></p>
            </article>
        </li>

        <!-- Post 2 -->
        <li class="col">

            <!-- Post Img -->
            <div class="img-por"> <img src="{{ URL::asset('web/images/BacHumanComment.jpg') }}"
                    alt="">
            </div>
            <article>
                <!-- Date And comment -->
                <div class="date"> <span class="huge">25</span> <span>Febrero</span></div>
                <div class="com-sec"> <span><strong><a href="#."></a></strong></span>
                    <span><strong><a href="#."></a></strong></span>
                </div>
                <div class="clearfix"></div>
                <a href="#." class="b-tittle">Bac Human</a>
                <p>Muy efectivo el producto, lo quiero comprar...<a href="#."></a></p>
            </article>
        </li>

        <!-- Post 2 -->
        <li class="col">
            <!-- Post Img -->
            <div class="img-por"> <img src="{{ URL::asset('web/images/PetysComment.jpg') }}" alt="">
            </div>
            <article>
                <!-- Date And comment -->
                <div class="date"> <span class="huge">27</span> <span>Febrero</span></div>
                <div class="com-sec"> <span><strong><a href="#."></a></strong></span>
                    <span><strong><a href="#."></a></strong></span>
                </div>
                <div class="clearfix"></div>
                <a href="#." class="b-tittle">Petys Familia</a>
                <p>Le encanto a mi mascota, tan pronto lo acabe, lo comprare. Me llego en
                    optimas
                    condiciones<a href="#."></a></p>
            </article>
        </li>
    </ul>
</div>
@endsection
