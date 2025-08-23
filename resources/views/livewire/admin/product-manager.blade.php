@php
    use Illuminate\Support\Facades\Crypt;
@endphp
<div class="m-4">
    <div class="row mb-4">
        <div class="col-xl-3 col-md-12">
            <div class="pb-3 pb-xl-0">
                <form class="email-search">
                    <div class="position-relative">
                        <input type="text" wire:model.live="search" placeholder="Buscar productos..."
                            class="form-control mb-3" />
                        <span class="bx bx-search font-size-18"></span>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-xl-9 col-md-12">
            <div class="pb-3 pb-xl-0">
                <div class="btn-toolbar float-end" role="toolbar">
                    <div class="btn-group me-2 mb-2">
                        <button type="button" class="btn btn-primary waves-light waves-effect dropdown-toggle"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Exportar <i class="mdi mdi-dots-vertical ms-2"></i>
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">Excel</a>
                            <a class="dropdown-item" href="#">PDF</a>
                            <a class="dropdown-item" href="#">JSON</a>
                        </div>
                    </div>

                    <div>
                        <a href="/m_product_detail">
                        <button type="button" class="btn btn-success">
                            Nuevo 
                        </button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row align-items-center">
        <div class="col-md-6">
            <div class="mb-3">
                <h5 class="card-title">Productos <span class="text-muted fw-normal ms-2"> 
                    </span></h5>
            </div>
        </div>
    </div>

    <!-- end row -->

    <div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div>
                        <h5 class="font-size-16 mb-1">Listado</h5>
                    </div>
                    <div class="table-responsive mt-4">
                        <table class="table table-nowrap align-middle">
                            <thead class="table-light">
                                <tr class="bg-gray-200">
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Categoria</th>
                                    <th scope="col">Estado</th>
                                    <th scope="col">Cantidad Inventario</th>
                                    <th scope="col">Imagen</th>
                                    <th scope="col">Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($product as $product)
                                    <tr>
                                        <td class="p-2">{{ $product->nombre }}</td>                                        
                                        <td class="p-2">{{ $product->category->name }} 
                                        <td class="p-2">{{ $product->estado == 1 ? 'Activo' : 'Desactivado' }}</td>
                                        <td class="p-2">{{ $product->cantidadinventario }}</td>
                                        <td class="p-2"><img src="{{ Storage::url($product->imagenuno_path) }}"
                                                alt="" style="width: 90px"> </td>
                                        </td>
                                        <td class="p-2 space-x-2">
                                            <li class="list-inline-item">
                                                     <a href="m_product_detail" data-bs-toggle="tooltip"
                                                        data-bs-placement="top" title="Edit"
                                                        class="px-2 text-primary">
                                                        <i class="bx bx-pencil font-size-18"></i></a>
                                            </li>
                                            
                                            <button wire:click="delete({{ $product->id }})"
                                                class="text-danger btn btn-link waves-effect"><i
                                                    class="mdi mdi-delete font-size-18"></i>
                                                </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


    
</div>
