<div>
    <div class="mb-4 pb-2">
        
    </div>
    <div>
        <div class="col-xxl-12">
            <div class="card m-4 p-4">
                <div class="card-header">
                    <h4 class="card-title mb-0">Segmentar Producto</h4>
                </div>
                <div class="card-body">
                    <form>
                        <div class="col-md-6">
                                <div class="mb-3">
                                    <label>
                                        Todos los Usuarios <input type="checkbox" id="estado" name="estado" wire:model="estado" value="1"   />
                                    </label>
                                </div>
                            </div>

                        <div class="row">
                            <div class="col-md-5">
                                <div class="mb-3">
                                    <label for="formrow-firstname-input" class="form-label">Edad</label>
                                    <input type="text" class="form-control" wire:model="name">
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="mb-3">
                                    <label for="formrow-firstname-input" class="form-label">Estado Civil</label>
                                    <input type="text" class="form-control" wire:model="mobile_phone">
                                </div>
                            </div>
                        </div>
                        

                        <div class="mt-4">
                            <button type="button" wire:click="submit" class="btn btn-primary w-md">Guardar</button>
                            <a href="/index" class="btn btn-danger"> <i class="bx bx-x me-1"></i> Cancel </a>
                        </div>
                    </form>
                </div>
                <!-- end card body -->
            </div>
            <!-- end card -->
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


</div>


