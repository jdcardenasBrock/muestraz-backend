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

                            <div class="mb-3">
                                <label>
                                    Estado <input wire:model="estado" type="checkbox" 
                                        @if (isset($product) && $product->estado) value="1" checked @endif>
                                </label>
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="nombre">Nombre del Producto</label>
                                <input value="{{ isset($product) ? $product->nombre : '' }}" wire:model="nombre" type="text"
                                    class="form-control" />
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label for="choices-single-default" class="form-label">Categoria</label>
                                        <select wire:model.live="category_id" class="form-select" style="width:200px">
                                            <option value="{{ isset($product) ? $product->id : "" }}">
                                                @if ($product)
                                                    {{ $product->category->name }}
                                                @endif
                                            </option>
                                            @foreach ($category as $category)
                                                <option value="{{ $category->id }}">
                                                    @if ($category)
                                                        {{ $category->name }}
                                                    @endif
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label for="">Tipo</label>
                                        <select wire:model="tipo" type="text" class="form-select"
                                            style="width:200px">
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
                                        <input value="{{ isset($product) ? $product->correo : "" }}" wire:model="nombre" type="text"
                                            class="form-control" />
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label>
                                            Cupon <input wire:model="cupon" type="checkbox" 
                                             @if (isset($product) && $product->estado) value="1" checked @endif />
                                            </label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label>
                                            Encuesta <input wire:model="encuesta" type="checkbox" 
                                          @if (isset($product) && $product->estado) value="1" checked @endif />
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="nombre">Fecha Redencion</label>
                                        <input type="date" style="width:200px" wire:model="fecharedencion"
                                            type="text" class="form-control" value={{ isset($product) ? $product->fecharedencion : ""}} />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="nombre">Fecha Limite Publicacion</label>
                                        <input type="date" style="width:200px" wire:model="fechalimitepublicacion"
                                            type="text" class="form-control"
                                            value={{ isset($product) ? $product->fechalimitepublicacion : "" }} />
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label>
                                            Destacado <input wire:model="destacado" type="checkbox" 
                                          @if (isset($product) && $product->destacado) value="1" checked @endif />
                                        </label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="row mb-4">
                                        <label class="form-label" for="nombre">Orden Destacado</label>
                                        <input type="number" value="{{ isset($product) ? $product->ordendestacado : "" }}"
                                            wire:model="Orden" placeholder="ordendestacado" class="form-control"
                                            style="width:200px">
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
                        <div class="p-4 border-top">

                            <div class="row mb-4">
                                <label for="">Imagen Uno </label>
                                <input wire:model="{{ isset($product) ? $product->imagenuno_path : "" }}" type="file"
                                    class="form-control" id="{{ isset($product) ? $product->imagenuno_path : "" }}" />
                            </div>
                            <td class="p-2"><img src="{{ Storage::url($product->imagenuno_path) }}"
                                    alt="" style="width: 90px"> </td>

                        </div>

                        <div class="p-4 border-top">

                            <div class="row mb-4">
                                <label for="">Imagen Dos </label>
                                <input wire:model="{{ isset($product) ? $product->imagendos_path : "" }}" type="file"
                                    class="form-control" />
                            </div>
                            <td class="p-2"><img src="{{ isset($product) ?  Storage::url($product->imagendos_path) : "" }}"
                                    alt="" style="width: 90px"> </td>

                        </div>

                        <div class="p-4 border-top">

                            <div class="row mb-4">
                                <label for="">Imagen Tres </label>
                                <input wire:model="{{ isset($product) ? $product->imagentres_path : "" }}" type="file"
                                    class="form-control" />
                            </div>
                            <td class="p-2"><img src="{{ Storage::url($product->imagentres_path) }}"
                                    alt="" style="width: 90px"> </td>

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
                                <label class="form-label" for="metadescription">Descripcion Larga</label>
                                <textarea class="form-control" id="descripcionlarga" placeholder="Enter Description" rows="4">{{ $product->descripcionlarga }}</textarea>
                            </div>
                            <br>
                            <div class="mb-0">
                                <label class="form-label" for="metadescription">Texto Destacado</label>
                                <textarea class="form-control" id="textodestacado" placeholder="Enter Description" rows="4">{{ $product->textodestacado }}</textarea>
                            </div>
                            <br>
                            <div class="mb-0">
                                <label class="form-label" for="metadescription">Condiciones</label>
                                <textarea class="form-control" id="textodestacado" placeholder="Enter Description" rows="4">{{ $product->condiciones }}</textarea>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="metatitle">Cantidad Inventario</label>
                                        <input id="metatitle" name="metatitle" placeholder="Enter Title"
                                            type="text" class="form-control"
                                            value= "{{ $product->cantidadinventario }}">
                                    </div>
                                </div>
                                <br>
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="metakeywords">Link Muestras Agotadas</label>
                                        <input id="metakeywords" name="metakeywords" placeholder="Enter Keywords"
                                            type="text" class="form-control"
                                            value= "{{ $product->linkmuestrasagotadas }}">
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="Valor">Valor</label>
                                        <input id="Valor" name="metatitle" placeholder="Digite el Valor"
                                            type="text" class="form-control" value= "{{ $product->valor }}">
                                    </div>
                                </div>
                                <br>
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="valormembresia">Valor Membresia</label>
                                        <input id="valormembresia" name="metakeywords" placeholder="Digite el Valor"
                                            type="text" class="form-control"
                                            value= "{{ $product->valormembresia }}">
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="descuento">Descuento</label>
                                        <input id="descuento" name="metatitle" placeholder="Digite el Valor"
                                            type="text" class="form-control" value= "{{ $product->descuento }}">
                                    </div>
                                </div>
                                <br>
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="iva">Iva</label>
                                        <input id="iva" name="metakeywords" placeholder="Digite el Valor"
                                            type="text" class="form-control" value= "{{ $product->iva }}">
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label>
                                            Cobro Envio <input wire:model="cobroenvio" type="checkbox" value="1"
                                                {{ $product->cobroenvio ? 'checked' : '' }} </label>
                                    </div>
                                </div>
                                <br>
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label>
                                            Solo Membresia <input wire:model="solomembresia" type="checkbox"
                                                value="1" {{ $product->solomembresia ? 'checked' : '' }} </label>
                                    </div>
                                </div>
                                <br>
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label>
                                            Registrados <input wire:model="registrados" type="checkbox"
                                                value="1" {{ $product->registrados ? 'checked' : '' }} </label>
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
</div>
