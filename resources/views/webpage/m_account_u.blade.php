@extends('layouts.layoutWeb')
@section('title')
    Perfil 
@endsection

@section('content')

    <!--======= CONATACT  =========-->
    <section class="contact padding-top-100 padding-bottom-100">
      <div class="container">
        <div class="contact-form">
          <h5>Datos del perfil de...</h5>
          <div class="row">
            <div class="col-md-8"> 
              
             <!--======= FORM  =========-->
              <form role="form" id="contact_form" class="contact-form" method="post" onSubmit="return false">
                <ul class="row">

                  <li class="col-sm-6">
                    <label>Nombre Completo *
                      <input type="text" class="form-control" name="name" id="name" placeholder="">
                    </label>
                   
                  <li class="col-sm-6">
                    <label>Email *
                      <input type="text" class="form-control" name="Email" id="Email" placeholder="">
                    </label>

                  <li class="col-sm-6">
                    <label>Celular *
                      <input type="text" class="form-control" name="Celular" id="EmCelularil" placeholder="">
                    </label>
                  
                  <li class="col-sm-6">
                    <label>Fecha de Nacimiento *
                      <input type="date" class="form-control" name="Nacimiento" id="Nacimiento" placeholder="">
                    </label>

                   <li class="col-sm-6">
                     <label for="formrow-inputState" class="form-label">Genero</label>
                    <select wire:model="gender" class="form-select">
                        <option value="" selected>Seleccionar...</option>
                        <option value="male">Masculino</option>
                        <option value="female">Femenino</option>
                        <option value="other">Otro</option>
                    </select>
                   
                  <li class="col-sm-6">
                      <label for="formrow-inputState" class="form-label">Tipo de Documento</label>
                          <select id="formrow-inputState" class="form-select" wire:model="type_document">
                              <option value="" selected>Seleccionar...</option>
                              <option value="CC">Cedula de Ciudadania</option>
                              <option value="CE">Cedula de Extranjeria</option>
                              <option value="PAS">Pasaporte</option>
                              <option value="NIT">NIT</option>
                          </select>

                  <li class="col-sm-6">
                    <label>Numero de Documento *
                      <input type="text" class="form-control" name="Documento" id="Documento" placeholder="">
                    </label>

                    <li class="col-sm-6">
                    <label>Ciudad *
                      <input type="text" class="form-control" name="Ciudad" id="Ciudad" placeholder="">
                    </label>

                    <li class="col-sm-6">
                    <label>Departamento *
                      <input type="text" class="form-control" name="Departamento" id="Departamento" placeholder="">
                    </label>

                  <li class="col-sm-6">
                    <label>Direccion Fisica *
                      <input type="text" name="Direccion" id="Direccion" placeholder="">
                    </label>
                    
                  
                  <li class="col-sm-12">
                    <button type="submit" value="submit" class="btn" id="btn_submit" onClick="proceed();">Actualizar</button>
                  </li>
                </ul>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
    
    
    <!-- About -->
    <section class="small-about">
      <div class="container-full">
        <div class="news-letter padding-top-150 padding-bottom-150">
          <div class="row">
            <div class="col-lg-6">
              <h3>We always stay with our clients and respect their business. We deliver 100% and provide instant response to help them succeed in constantly changing and challenging business world. </h3>
              <ul class="social_icons">
                <li><a href="#."><i class="icon-social-facebook"></i></a></li>
                <li><a href="#."><i class="icon-social-twitter"></i></a></li>
                <li><a href="#."><i class="icon-social-tumblr"></i></a></li>
                <li><a href="#."><i class="icon-social-youtube"></i></a></li>
                <li><a href="#."><i class="icon-social-dribbble"></i></a></li>
              </ul>
            </div>
            <div class="col-lg-6">
              <h3>Subscribe Our Newsletter</h3>
              <span>Phasellus lacinia fermentum bibendum. Interdum et malesuada fames ac.</span>
              <form>
                <input type="email" placeholder="Enter your email address" required>
                <button type="submit">Subscribe</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
@endsection