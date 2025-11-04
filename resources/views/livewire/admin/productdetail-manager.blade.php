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

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="nombre">Nombre del artículo</label>
                                        <input wire:model="nombre" type="text" class="form-control" />
                                        @error('nombre')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <br>
                                        <br>
                                        <label>
                                            ¿Deseas mantener acivo el producto? <input type="checkbox" id="estado"
                                                name="estado" wire:model="estado" value="1"
                                                {{ $estado == '1' ? 'checked' : '' }} />
                                        </label>
                                        @error('estado')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label for="">Selecciona el tipo de artículo </label>
                                        <select wire:model="tipo" class="form-select" style="width:400px">
                                            <option value="">-- Seleccione --</option>
                                            <option value="producto">Producto</option>
                                            <option value="servicio">Servicio</option>
                                        </select>
                                        @error('tipo')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label for="choices-single-default" class="form-label">Selecciona la
                                            Categoria</label>
                                        <select wire:model="category_id" class="form-select" style="width:400px">
                                            <option value="">-- Seleccione categoría --</option>
                                            @foreach ($category as $cat)
                                                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>


                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="">Selecciona la Clasificacion</label>
                                        <select wire:model="clasificacion" type="text" class="form-select"
                                            style="width:400px">
                                            <option value="">Seleccionar</option>
                                            <option value="muestra">Muestra</option>
                                            <option value="venta">Ventas</option>
                                        </select>
                                        @error('clasificacion')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="nombre">Fecha Limite Publicacion</label>
                                        <input type="date" style="width:200px" wire:model="fechalimitepublicacion"
                                            type="text" class="form-control" />
                                        @error('fechalimitepublicacion')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label>
                                            ¿Deseas que sea un producto Destacado? <input type="checkbox"
                                                id="destacado" name="destacado" wire:model="destacado"
                                                value="1" {{ $destacado == '1' ? 'checked' : '' }} />
                                            @error('destacado')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </label>
                                    </div>
                                </div>
                                @if ($destacado)
                                    <div class="col-md-6">
                                        <label class="form-label" for="nombre">Orden Destacado</label>
                                        <input type="number" wire:model="ordendestacado"
                                            placeholder="Orden Destacado" class="form-control" style="width:200px">
                                    </div>
                                @endif
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

                    <div id="addproduct-img-collapse" class="collapse show" data-bs-parent="#addproduct-accordion">

                        {{-- Imagen Uno --}}
                        <div class="p-4 border-top">
                            <div class="mb-2">
                                <label>Imagen Uno</label>
                                <input wire:model="imageUno" type="file" class="form-control" />
                            </div>

                            @if ($imagenuno_path && !$imageUno)
                                <div class="mt-2 d-flex align-items-center gap-3">
                                    <img src="{{ Storage::url($imagenuno_path) }}" alt=""
                                        style="width: 150px; border-radius: 5px;">
                                    <button type="button" class="btn btn-danger btn-sm"
                                        wire:click="eliminarImagen('uno')">Eliminar</button>
                                </div>
                            @endif
                        </div>
                        {{-- Imagen Dos --}}
                        <div class="p-4 border-top">
                            <div class="mb-2">
                                <label for="">Imagen Dos</label>
                                <input wire:model="imageDos" type="file" class="form-control" />
                            </div>

                            @if ($imagendos_path && !$imageDos)
                                <div class="mt-2 d-flex align-items-center gap-3">
                                    <img src="{{ Storage::url($imagendos_path) }}" alt="Imagen Dos"
                                        style="width: 150px; border-radius: 5px;">
                                    <button type="button" class="btn btn-danger btn-sm"
                                        wire:click="eliminarImagen('dos')">
                                        Eliminar
                                    </button>
                                </div>
                            @endif
                        </div>
                        {{-- Imagen Tres --}}
                        <div class="p-4 border-top">
                            <div class="mb-2">
                                <label for="">Imagen Tres</label>
                                <input wire:model="imageTres" type="file" class="form-control" />
                            </div>

                            @if ($imagentres_path && !$imageTres)
                                <div class="mt-2 d-flex align-items-center gap-3">
                                    <img src="{{ Storage::url($imagentres_path) }}" alt="Imagen Tres"
                                        style="width: 150px; border-radius: 5px;">
                                    <button type="button" class="btn btn-danger btn-sm"
                                        wire:click="eliminarImagen('tres')">
                                        Eliminar
                                    </button>
                                </div>
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

                    <div id="addproduct-metadata-collapse" class="collapse show"
                        data-bs-parent="#addproduct-accordion">
                        <div class="p-4 border-top">
                            <div class="row mt-4">
                                <div class="col-sm-12">
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="checkbox" id="controlarinventario" name="controlarinventario"
                                                wire:model.live="controlarinventario" 
                                                {{ $controlarinventario == '1' ? 'checked' : '' }} />
                                        <label class="form-check-label" for="controlarinventario">
                                            Controlar inventario para este producto
                                        </label>
                                    </div>
                                </div>
                                @if ($controlarinventario)
                                    <div class="col-sm-6 mt-4">
                                    <div class="mb-3">
                                        <label class="form-label mt-2" for="cantidadinventario">Cantidad de
                                            Inventario</label>
                                        <input wire:model="cantidadinventario" type="number" class="form-control"
                                            min="0">
                                        <label class="form-label mt-4" for="cantidadminima">Cantidad Minima</label>
                                        <input wire:model="cantidadminima" type="number" class="form-control"
                                            min="0">
                                    </div>
                                </div>
                                @endif
                                
                            </div>

                            <div class="row mt-4">
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="linkmuestrasagotadas">Link Muestras
                                            Agotadas</label>
                                        <input wire:model="linkmuestrasagotadas" name="linkmuestrasagotadas"
                                            type="text" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="valor">Valor del artículo</label>
                                        <input wire:model.blur="valor" type="text" class="form-control">
                                    </div>
                                </div>
                                <br>
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="valormembresia">Valor para Membresia</label>
                                        <input wire:model.blur="valormembresia" type="text" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="descuento">Porcentaje de Descuento</label>
                                        <input wire:model.blur="descuento" type="text" class="form-control">
                                    </div>
                                </div>
                                <br>
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="iva">Valor del Iva</label>
                                        <input wire:model.blur="iva" type="text" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="mt-4">
                                <label class="form-label" for="textodestacado">Ingresa el Texto Destacado</label>
                                <textarea class="form-control" wire:model="textodestacado" rows="4"></textarea>
                            </div>
                            <br>
                            <div class="mt-4">
                                <label class="form-label" for="descripcionlarga">Ingresa la descripcion Larga</label>
                                <textarea class="form-control" wire:model="descripcionlarga" rows="4"></textarea>
                            </div>
                            <br>
                            <div class="mt-4">
                                <label class="form-label" for="condiciones">Ingresa las condiciones</label>
                                <textarea class="form-control" wire:model="condiciones" rows="4"></textarea>
                            </div>
                            <br>
                            <div class="row mt-4">
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label>
                                            ¿Tiene Cobro el Envio? <input type="checkbox" id="cobroenvio"
                                                name="cobroenvio" wire:model="cobroenvio" value="1"
                                                {{ $cobroenvio == '1' ? 'checked' : '' }} />
                                        </label>
                                    </div>
                                </div>
                                <br>
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label>
                                            ¿Solo es para quienes tengan membresia? <input type="checkbox"
                                                id="solomembresia" name="solomembresia" wire:model="solomembresia"
                                                value="1" {{ $solomembresia == '1' ? 'checked' : '' }} />
                                        </label>
                                    </div>
                                </div>
                                <br>
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label>
                                            ¿Se habilitara tambien a quienes <b><u>no</u></b> esten registrados?
                                            <input type="checkbox" id="registrados" name="registrados"
                                                wire:model="registrados" value="1"
                                                {{ $registrados == '1' ? 'checked' : '' }} />
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
            <a href="/m_product" class="btn btn-danger"> <i class="bx bx-x me-1"></i> Volver </a>
            <button type="button" wire:click="save" class="btn btn-primary w-md">Guardar</button>
            @if ($productid)
                <a href="{{ route('admin.m_productsegmetation.edit', $productid) }}" button type="button"
                    class="btn btn-primary w-md">Segmentacion</a>
            @endif
        </div>
    </div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Por favor corrige los siguientes errores:</strong>
            <ul class="mt-2 mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
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
