@extends('layouts.master')
@section('title')
    Editar Productos
@endsection
@section('css')
    <!-- choices css -->
    <link href="{{ URL::asset('build/libs/choices.js/public/assets/styles/choices.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- dropzone css -->
    <link href="{{ URL::asset('build/libs/dropzone/dropzone.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('page-title')
    Editar productos
@endsection
@section('body')

    <body>
    @endsection
    @section('content')
        <div class="row">
            <div class="col-lg-12">
                <div id="addproduct-accordion" class="custom-accordion">
                    <div class="card">
                        <a href="#addproduct-productinfo-collapse" class="text-body" data-bs-toggle="collapse"
                            aria-expanded="true" aria-controls="addproduct-productinfo-collapse">
                            <div class="p-4">

                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0 me-3">
                                        <div class="avatar">
                                            <div class="avatar-title rounded-circle bg-primary-subtle text-primary">
                                                <h5 class="text-primary font-size-17 mb-0">01</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 overflow-hidden">
                                        <h5 class="font-size-16 mb-1">General</h5>
                                        <p class="text-muted text-truncate mb-0"></p>
                                    </div>
                                    <div class="flex-shrink-0">
                                        <i class="mdi mdi-chevron-up accor-down-icon font-size-24"></i>
                                    </div>

                                </div>

                            </div>
                        </a>


 <div id="addproduct-productinfo-collapse" class="collapse show"
                            data-bs-parent="#addproduct-accordion">
                            <div class="p-4 border-top">
                                <form>
                                    <div class="mb-3">
                                        <label>
                                            Estado <input wire:model="estado" type="checkbox" value="1" {{ $product->estado ? 'checked':''}}
                                        </label>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label" for="nombre">Nombre del Producto</label>
                                        <input value="{{ $product->nombre }}" wire:model="nombre" type="text" class="form-control" />
                                    </div>

                                <div class="row">
                                        <div class="col-sm-6">
                                            <div class="mb-3">
                                                <label for="choices-single-default" class="form-label">Categoria</label>
                                                    <select wire:model.live="category_id" class="form-select" style="width:200px">
                                                            <option value="{{ $product->id }}"> @if ($product) {{ $product->category->name }} @endif</option>
                                                        @foreach ($category as $category)
                                                            <option value="{{ $category->id }}">@if ($category) {{ $category->name }} @endif</option> 
                                                        @endforeach
                                                    </select>

                                                 <div class="col-sm-6">
                                                    <div class="mb-3">
                                                        <label for="">Tipo</label>
                                                            <select wire:model="tipo" type="text" class="form-select" style="width:200px">
                                                                <option value="">{{ $product->tipo == 1 ? 'Producto' : 'Servicio' }}</option>
                                                                <option value="1">Producto</option>
                                                                <option value="0">Servicio</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            
                                        </div>
                                    </div> 

                                    <div>
                                        <div>
                                            
                                        </div>

                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="">Clasificacion</label>
                                                    <select wire:model="clasificacion" type="text" class="form-select" style="width:200px">
                                                        <option value="">{{ $product->clasificacion }}</option>
                                                        <option value="Muestra">Muestra</option>
                                                        <option value="Ventas">Ventas</option>
                                                        <option value="Conozcanos">Conozcanos</option>
                                                    </select>
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <label>
                                                Cupon <input wire:model="cupon" type="checkbox" value="1" {{ $product->cupon ? 'checked':''}}
                                            </label>
                                        </div>

                                        <div class="mb-3">
                                            <label>
                                                Encuesta <input wire:model="encuesta" type="checkbox" value="1" {{ $product->encuesta ? 'checked':''}}
                                            </label>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label" for="nombre">Fecha Redencion</label>
                                            <input type="date" style="width:200px" wire:model="fecharedencion" type="text" class="form-control" value={{ $product->fecharedencion }} />
                                        </div>
                                                      
                                        <div class="mb-3">
                                            <label class="form-label" for="nombre">Fecha Limite Publicacion</label>
                                            <input type="date" style="width:200px" wire:model="fechalimitepublicacion" type="text" class="form-control" value={{ $product->fechalimitepublicacion }} />
                                        </div>

                                        <div class="mb-3">
                                            <label>
                                                Destacado <input wire:model="destacado" type="checkbox" value="1" {{ $product->destacado ? 'checked':''}}
                                            </label>
                                        </div>

                                        <div class="row mb-4">
                                            <label class="form-label" for="nombre">Orden Destacado</label>
                                            <input type="number" value="{{ $product->ordendestacado }}" wire:model="Orden" placeholder="ordendestacado" class="form-control" style="width:200px" >
                                        </div> 
                                    

                                    </div>
                                                                       
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                    <div class="card">
                        <a href="#addproduct-img-collapse" class="text-body collbodyd" data-bs-toggle="collapse"
                            aria-haspopup="true" aria-expanded="false" aria-haspopup="true"
                            aria-controls="addproduct-img-collapse">
                            <div class="p-4">

                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0 me-3">
                                        <div class="avatar">
                                            <div class="avatar-title rounded-circle bg-primary-subtle text-primary">
                                                <h5 class="text-primary font-size-17 mb-0">02</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 overflow-hidden">
                                        <h5 class="font-size-16 mb-1">Product Image</h5>
                                        <p class="text-muted text-truncate mb-0">Fill all information below</p>
                                    </div>
                                    <div class="flex-shrink-0">
                                        <i class="mdi mdi-chevron-up accor-down-icon font-size-24"></i>
                                    </div>

                                </div>

                            </div>
                        </a>

                        <div id="addproduct-img-collapse" class="collapse" data-bs-parent="#addproduct-accordion">
                            <div class="p-4 border-top">
                                <form action="#" class="dropzone">
                                    <div class="fallback">
                                        <input name="file" type="file" multiple="multiple">
                                    </div>
                                    <div class="dz-message needsclick">
                                        <div class="mb-3">
                                            <i class="display-4 text-muted mdi mdi-cloud-upload"></i>
                                        </div>

                                        <h4 class="mb-0">Drop files here or click to upload.</h4>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <a href="#addproduct-metadata-collapse" class="text-body collbodyd" data-bs-toggle="collapse"
                            aria-haspopup="true" aria-expanded="false" aria-haspopup="true"
                            aria-controls="addproduct-metadata-collapse">
                            <div class="p-4">

                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0 me-3">
                                        <div class="avatar">
                                            <div class="avatar-title rounded-circle bg-primary-subtle text-primary">
                                                <h5 class="text-primary font-size-17 mb-0">03</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 overflow-hidden">
                                        <h5 class="font-size-16 mb-1">Meta Data</h5>
                                        <p class="text-muted text-truncate mb-0">Fill all information below</p>
                                    </div>
                                    <div class="flex-shrink-0">
                                        <i class="mdi mdi-chevron-up accor-down-icon font-size-24"></i>
                                    </div>

                                </div>

                            </div>
                        </a>

                        <div id="addproduct-metadata-collapse" class="collapse" data-bs-parent="#addproduct-accordion">
                            <div class="p-4 border-top">
                                <form>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="metatitle">Meta Title</label>
                                                <input id="metatitle" name="metatitle" placeholder="Enter Title"
                                                    type="text" class="form-control" value= "{{ $product->category->name }}">
                                            </div>

                                        </div>

                                        <div class="col-sm-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="metakeywords">Meta Keywords</label>
                                                <input id="metakeywords" name="metakeywords" placeholder="Enter Keywords"
                                                    type="text" class="form-control">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-0">
                                        <label class="form-label" for="metadescription">Meta Description</label>
                                        <textarea class="form-control" id="metadescription" placeholder="Enter Description" rows="4"></textarea>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- end row -->
 
        <div class="row mb-4">
            <div class="col text-end">
                <a href="#" class="btn btn-danger"> <i class="bx bx-x me-1"></i> Cancel </a>


                <div class="mt-">
                                @if ($productId)
                                    <button type="submit" class="btn btn-primary w-md">Actualizar</button>
                                @else
                                    <button type="submit" class="btn btn-success w-md">Crear</button>
                                @endif
                            </div>

               <!-- <a href="#" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#success-btn"> <i
                        class=" bx bx-file me-1"></i> Save </a> -->
            </div> <!-- end col -->
        </div> <!-- end row-->
    @endsection
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
