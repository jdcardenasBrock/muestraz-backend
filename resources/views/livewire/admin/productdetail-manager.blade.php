<div>

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

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label>
                                        Estado <input type="checkbox" id="estado" name="estado" wire:model="estado" value="1" {{ $estado=="1" ? 'checked' : '' }}  />
                                    </label>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="nombre">Nombre del Producto</label>
                                <input wire:model="nombre" type="text" class="form-control" />
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label for="choices-single-default" class="form-label">Categoria</label>
                                        <select wire:model="category_id" class="form-select" style="width:200px">
                                            <option value="">-- Seleccione categoría --</option>
                                            @foreach ($category as $cat)
                                                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label for="">Tipo</label>
                                        <select wire:model="tipo" class="form-select" style="width:200px">
                                            <option value="">-- Seleccione --</option>
                                            <option value="1">Producto</option>
                                            <option value="0">Servicio</option>
                                        </select>

                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="">Clasificacion</label>
                                        <select wire:model="clasificacion" type="text" class="form-select"
                                            style="width:200px">
                                            <option value="Muestra">Muestra</option>
                                            <option value="Ventas">Ventas</option>
                                            <option value="Conozcanos">Conozcanos</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="nombre">Correo</label>
                                        <input wire:model="correo" type="email" class="form-control" />

                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label>
                                            Cupón <input type="checkbox" id="cupon" name="cupon" wire:model="cupon" value="1" {{ $cupon=="1" ? 'checked' : '' }}  />
                                        </label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label>
                                            Encuesta <input type="checkbox" id="encuesta" name="encuesta" wire:model="encuesta"  value="1" {{ $encuesta=="1" ? 'checked' : '' }}  />
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="nombre">Fecha Redencion</label>
                                        <input type="date" style="width:200px" wire:model="fecharedencion"
                                            type="text" class="form-control" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="nombre">Fecha Limite Publicacion</label>
                                        <input type="date" style="width:200px" wire:model="fechalimitepublicacion"
                                            type="text" class="form-control" />
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label>
                                            Destacado <input type="checkbox" id="destacado" name="destacado" wire:model="destacado" value="1" {{ $destacado=="1" ? 'checked' : '' }}  />
                                        </label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="row mb-4">
                                        <label class="form-label" for="nombre">Orden Destacado</label>
                                        <input type="number" wire:model="ordendestacado"
                                            placeholder="ordendestacado" class="form-control" style="width:200px">
                                    </div>
                                </div>
                            </div>

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
                                    <h5 class="font-size-16 mb-1">Imagenes del Producto</h5>
                                </div>
                                <div class="flex-shrink-0">
                                    <i class="mdi mdi-chevron-up accor-down-icon font-size-24"></i>
                                </div>

                            </div>

                        </div>
                    </a>

                    <div id="addproduct-img-collapse" class="collapse" data-bs-parent="#addproduct-accordion">

                        {{-- Imagen Uno --}}
                        <div class="p-4 border-top">
                            <div class="row mb-4">
                                <label for="">Imagen Uno</label>
                                <input wire:model="imageUno" type="file" class="form-control" />
                                
                            </div>

                            @if ($imagenuno_path)
                                <img src="{{ Storage::url($imagenuno_path) }}" alt="" style="width: 150px">
                                
                            @endif
                        </div>

                        {{-- Imagen Dos --}}
                        <div class="p-4 border-top">
                            <div class="row mb-4">
                                <label for="">Imagen Dos</label>
                                <input wire:model="imageDos" type="file" class="form-control" />
                            </div>
                            @if ($imagendos_path)
                                <img src="{{ Storage::url($imagendos_path) }}" alt="" style="width: 150px">
                            @endif
                        </div>

                        {{-- Imagen Tres --}}
                        <div class="p-4 border-top">
                            <div class="row mb-4">
                                <label for="">Imagen Tres</label>
                                <input wire:model="imageTres" type="file" class="form-control" />
                            </div>
                            @if ($imagentres_path)
                                <img src="{{ Storage::url($imagentres_path) }}" alt="" style="width: 150px">
                            @endif
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
                                    <h5 class="font-size-16 mb-1">Informacion Adicional y Valores</h5>
                                </div>
                                <div class="flex-shrink-0">
                                    <i class="mdi mdi-chevron-up accor-down-icon font-size-24"></i>
                                </div>

                            </div>

                        </div>
                    </a>

                    <div id="addproduct-metadata-collapse" class="collapse" data-bs-parent="#addproduct-accordion">
                        <div class="p-4 border-top">

                            <div class="mb-0">
                                <label class="form-label" for="descripcionlarga">Descripcion Larga</label>
                                <textarea class="form-control" wire:model="descripcionlarga" rows="4"></textarea>
                            </div>
                            <br>
                            <div class="mb-0">
                                <label class="form-label" for="textodestacado">Texto Destacado</label>
                                <textarea class="form-control" wire:model="textodestacado" rows="4"></textarea>
                            </div>
                            <br>
                            <div class="mb-0">
                                <label class="form-label" for="condiciones">Condiciones</label>
                                <textarea class="form-control" wire:model="condiciones" rows="4"></textarea>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="cantidadinventario">Cantidad Inventario</label>
                                        <input wire:model="cantidadinventario" name="cantidadinventario"
                                            type="text" class="form-control">
                                    </div>
                                </div>
                                <br>
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="linkmuestrasagotadas">Link Muestras
                                            Agotadas</label>
                                        <input wire:model="linkmuestrasagotadas" name="linkmuestrasagotadas"
                                            type="text" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="valor">Valor</label>
                                        <input wire:model="valor" name="valor" placeholder="Digite el Valor"
                                            type="text" class="form-control">
                                    </div>
                                </div>
                                <br>
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="valormembresia">Valor Membresia</label>
                                        <input wire:model="valormembresia" name="valormembresia"
                                            placeholder="Digite el Valor" type="text" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="descuento">Descuento</label>
                                        <input wire:model="descuento" name="descuento" placeholder="Digite el Valor"
                                            type="text" class="form-control">
                                    </div>
                                </div>
                                <br>
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="iva">Iva</label>
                                        <input wire:model="iva" name="iva" placeholder="Digite el Valor"
                                            type="text" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label>
                                            Cobro Envio <input wire:model="cobroenvio" type="checkbox" />
                                        </label>
                                    </div>
                                </div>
                                <br>
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label>
                                            Solo Membresia <input wire:model="solomembresia" type="checkbox" />
                                        </label>
                                    </div>
                                </div>
                                <br>
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label>
                                            Registrados <input wire:model="registrados" type="checkbox" />
                                        </label>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mb-4">
        <div class="col text-end">
            <a href="/m_product" class="btn btn-danger"> <i class="bx bx-x me-1"></i> Cancel </a>
            <button type="button" wire:click="save" class="btn btn-primary w-md">Guardar</button>
        </div>
    </div>

    <div class="row mb-4">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
                <meta http-equiv="refresh" content="1">                
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
    </div>
</div>
