@extends('layouts.master')
@section('title')
    Terminos y Politicas
@endsection
@section('css')
    <!-- choices css -->
    <link href="{{ URL::asset('build/libs/choices.js/public/assets/styles/choices.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- dropzone css -->
    <link href="{{ URL::asset('build/libs/dropzone/dropzone.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('page-title')
    Terminos y Politicas
@endsection
@section('body')



    <body>

<form action= "{{ route('policy.update', 1) }}" method="POST">

@csrf

@method('put')
 
    @endsection
    @section('content')

  


        <div class="mb-0">
            <label type="text" name="term" class="form-label" for="Terminosdesc">Terminos</label>
            <textarea type="text" input class="form-control" id="Terminos" placeholder="Enter Description" rows="4"  name="term"> @if($policia) {{ $policia->term }} @endif
            </textarea>
        </div>
            <br>
            <br>

   
       <div class="mb-0">
            <label  type="text" name="policy" class="form-label" for="Terminosdesc">Politicas</label>
            <textarea type="text" class="form-control" id="Terminos" placeholder="Enter Description" rows="4"  name="policy"> @if($policia) {{ $policia->policy }} @endif        
            </textarea>
                <br>
                <br>
        </div>

<div id="mensaje-exito" style="display: none;">
  <p>¡Registro actualizado con éxito!</p>
</div>
 <button onclick="mostrarMensajeExito()" type="submit"> Guardar </button>          

<div class="row mb-4">
    <div class="col text-end">
        <a href="#" class="btn btn-danger"> <i class="bx bx-x me-1"></i> Cancelar </a>
        <a href="#" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#success-btn"> <i
                class=" bx bx-file me-1" type = "submit"></i> Guardar </a>
    </div> <!-- end col -->
</div> <!-- end row-->
@endsection
</form>

@section('scripts')
<!-- choices js -->
<script src="{{ URL::asset('build/libs/choices.js/public/assets/scripts/choices.min.js') }}"></script>

<!-- dropzone plugin -->
<script src="{{ URL::asset('build/libs/dropzone/dropzone-min.js') }}"></script>

<!-- init js -->
<script src="{{ URL::asset('build/js/pages/ecommerce-choices.init.js') }}"></script>
<!-- App js -->
<script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection


<script>

function mostrarMensajeExito() {
  document.getElementById("mensaje-exito").style.display = "block";
  // Opcional: Ocultar el mensaje después de unos segundos
  setTimeout(function() {
    document.getElementById("mensaje-exito").style.display = "none";}, 5000000); // Ocultar después de 5 segundos
}
</script>



