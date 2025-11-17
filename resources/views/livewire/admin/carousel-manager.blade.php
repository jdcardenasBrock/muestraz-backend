<div>

    {{-- ===================== --}}
    {{--  LISTADO DE CAROUSELS --}}
    {{-- ===================== --}}
    <div class="row">
        <div class="col-xl-7">
            <div class="card">
                <div class="card-body">
                    <h5 class="font-size-16 mb-1">Listado</h5>

                    <div class="table-responsive mt-4">
                        <table class="table align-middle table-nowrap">
                            <thead class="table-light text-center">
                                <tr class="bg-gray-200">
                                    <th class="p-2">Título</th>
                                    <th class="p-2">Estatus</th>
                                    <th class="p-2">Orden</th>
                                    <th class="p-2">Imagen</th>
                                    <th class="p-2">Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($carousels as $carousel)
                                    <tr class="border-t text-center">
                                        <td class="p-2">{{ $carousel->title }}</td>
                                        <td class="p-2">{{ $carousel->active ? 'Activo' : 'Desactivado' }}</td>
                                        <td class="p-2">{{ $carousel->order }}</td>
                                        <td class="p-2">
                                            @if ($carousel->layout_type === 'full')
                                                <img src="{{ Storage::url($carousel->image_path) }}"
                                                    style="max-width:90px; border-radius:8px;">
                                            @else
                                                <div class="d-flex justify-content-center gap-2">
                                                    <img src="{{ Storage::url($carousel->image_left) }}"
                                                        style="max-width:90px; border-radius:8px;">
                                                    <img src="{{ Storage::url($carousel->image_right) }}"
                                                        style="max-width:90px; border-radius:8px;">
                                                </div>
                                            @endif
                                        </td>
                                        <td>
                                            <button wire:click="edit({{ $carousel->id }})"
                                                class="btn btn-link text-success">
                                                <i class="mdi mdi-pencil font-size-18"></i>
                                            </button>
                                            <button wire:click="delete({{ $carousel->id }})"
                                                class="btn btn-link text-danger">
                                                <i class="mdi mdi-delete font-size-18"></i>
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

        {{-- ======================= --}}
        {{-- FORMULARIO DE CREACIÓN --}}
        {{-- ======================= --}}
        <div class="col-xl-5">
            <div class="card checkout-order-summary">
                <div class="card-body">

                    <h5 class="font-size-16 mb-1">Creación o Edición de Banners</h5>

                    <form wire:submit.prevent="save" enctype="multipart/form-data" class="mt-4">

                        {{-- Título --}}
                        <div class="mb-3">
                            <label>Título</label>
                            <input wire:model="title" type="text" class="form-control">
                        </div>

                        {{-- Descripción --}}
                        <div class="mb-3">
                            <label>Descripción</label>
                            <textarea wire:model="description" class="form-control"></textarea>
                        </div>

                        {{-- Resto de tu formulario... --}}
                        {{-- ... --}}
                        {{-- ... --}}
                        {{-- ... --}}

                        <button class="btn btn-primary">Guardar</button>

                    </form>

                </div>
            </div>
        </div>
    </div>


    {{-- ============================ --}}
    {{--  EDITOR DE TEXTO EXTENDIDO --}}
    {{-- ============================ --}}
    <div class="row mt-4">
        <div class="card">
            <div class="card-body">

                <h5 class="font-size-16 mb-3">Texto Extendido del Banner</h5>
                <div wire:ignore>
                    <textarea id="richEditor" name="richEditor" class="editor form-control">{!! $content !!}</textarea>

                    <button class="btn btn-primary mt-2" wire:click="saveRich()">Guardar Texto</button>
                </div>
                <hr>

                @if ($content)
                    <div class="p-3 border rounded" style="max-height:140px; overflow:auto;">
                        {!! $content !!}
                    </div>
                @else
                    <p class="text-muted">No se ha agregado texto.</p>
                @endif

            </div>
            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show shadow-sm border-0 animate__animated animate__fadeInDown col-6"
                    style="font-size: 15px;" role="alert">
                    <i class="mdi mdi-check-circle-outline me-2"></i>
                    {{ session('success') }}

                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

        </div>
    </div>

</div>

@push('scripts')
    <script src="https://cdn.tiny.cloud/1/m2g93uxwnlglk2bbep6kbhxqyc7kt1nu8xv303r145ni14ou/tinymce/7/tinymce.min.js"
        referrerpolicy="origin"></script>
    <script>
        function initTiny() {

            tinymce.init({
                selector: "#richEditor",
                height: 380,
                plugins: "lists link image media table code fullscreen preview",
                toolbar: "undo redo | bold italic | fontsize | alignleft aligncenter alignright | bullist numlist | link image media",
                setup(editor) {
                    editor.on('change keyup', () => {
                        Livewire.dispatch("setRichFromEditor", {
                            content: editor.getContent()
                        });
                    });
                }
            });
        }

        document.addEventListener("livewire:load", () => initTiny());
        document.addEventListener("livewire:navigated", () => initTiny());
    </script>
@endpush
