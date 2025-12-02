<div>


    {{-- ============================ --}}
    {{--  EDITOR DE TEXTO EXTENDIDO --}}
    {{-- ============================ --}}
    <div class="row mt-4">
        <div class="card">
            <div class="card-body">

                <h5 class="font-size-16 mb-3">Texto para Como Funciona </h5>
                <div wire:ignore>
                    
                    <textarea id="richEditor" name="richEditor" class="editor form-control">{!! $content !!}</textarea>

                    <button class="btn btn-primary mt-2"    wire:click="saveRich()">Guardar Texto</button>
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
