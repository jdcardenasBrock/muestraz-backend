@extends('layouts.layoutWeb')
@section('title')
    Pedidos
@endsection

@section('content')
    <div id="content">
       <livewire:orders.customer-orders />
    </div>
@endsection

@section('encuesta')
    @auth
        <livewire:client.form-reminder />
    @endauth
@endsection
