@extends('layouts.master')

@section('title', 'Términos y Políticas')

@section('css')
    <link href="{{ asset('build/libs/choices.js/public/assets/styles/choices.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('build/libs/dropzone/dropzone.css') }}" rel="stylesheet" />

    {{-- TinyMCE --}}
    <script src="https://cdn.tiny.cloud/1/m2g93uxwnlglk2bbep6kbhxqyc7kt1nu8xv303r145ni14ou/tinymce/7/tinymce.min.js"
        referrerpolicy="origin"></script>

    <style>
        .modal-lg {
            max-width: 900px !important;
        }
    </style>
@endsection

@section('page-title', 'Términos y Políticas')

@section('content')

    <form action="{{ route('policy.update', $policia->id ?? 1) }}" method="POST" id="policyForm"
        class="card p-4 shadow-sm border-0">
        @csrf
        @method('PUT')

        {{-- Errores --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Corrige los siguientes errores:</strong>
                <ul class="mt-1 mb-0">
                    @foreach ($errors->all() as $error)
                        <li>• {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Éxito --}}
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif


        <!-- =============================
                 Términos
            ============================== -->
        <div class="mb-4">
            <label for="term" class="form-label fw-bold">Términos</label>
            <textarea id="term" name="term" class="editor form-control" rows="15">
@if (isset($policia))
{{ $policia->term }}
@endif
</textarea>
        </div>

        <!-- =============================
                 Políticas
            ============================== -->
        <div class="mb-4">
            <label for="policy" class="form-label fw-bold">Políticas</label>
            <textarea id="policy" name="policy" class="editor form-control" rows="15">
            @if (isset($policia))
{{ $policia->policy }}
@endif
        </textarea>
        </div>


        <div class="d-flex justify-content-between align-items-center mt-4">

            {{-- PREVISUALIZAR --}}
            <button type="button" class="btn btn-secondary px-4" onclick="openPreview()">
                <i class="bx bx-show me-1"></i> Previsualizar
            </button>

            {{-- GUARDAR --}}
            <button type="submit" class="btn btn-success px-4">
                <i class="bx bx-save me-1"></i> Guardar
            </button>
        </div>

    </form>


    <!-- =============================
             MODAL PREVISUALIZACIÓN
        ============================== -->
    <div class="modal fade" id="previewModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content shadow-lg">
                <div class="modal-header">
                    <h5 class="modal-title">Previsualización de Contenido</h5>
                    <button class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <h5 class="fw-bold">Términos</h5>
                    <div id="previewTerm" class="border rounded p-3 mb-4 bg-light"></div>

                    <h5 class="fw-bold">Políticas</h5>
                    <div id="previewPolicy" class="border rounded p-3 bg-light"></div>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-dark" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

@endsection


@section('scripts')
    <script src="{{ asset('build/libs/choices.js/public/assets/scripts/choices.min.js') }}"></script>
    <script src="{{ asset('build/libs/dropzone/dropzone-min.js') }}"></script>
    <script src="{{ asset('build/js/app.js') }}"></script>


    <script>
        // =============================
        // Inicialización del Editor
        // =============================
        tinymce.init({
            selector: '.editor',
            height: 500,
            menubar: true,

            plugins: `
        link image media table lists code fullscreen preview
        anchor autoresize
    `,

            toolbar: `
        undo redo |
        fontselect fontsizeselect |
        bold italic underline forecolor backcolor |
        alignleft aligncenter alignright alignjustify |
        bullist numlist |
        link image media table |
        code preview fullscreen
    `,

            branding: false,
            convert_urls: false,

            // 🔥 Permitir video YouTube (iframes)
            extended_valid_elements: "iframe[src|style|width|height|scrolling|marginwidth|marginheight|frameborder|allowfullscreen|allow|referrerpolicy|name|align|class]",
            valid_children: "+body[style],+div[iframe]",

            // 🔥 Opciones de fuente
            font_formats: `
        Arial=arial,helvetica,sans-serif;
        Inter=Inter, sans-serif;
        Georgia=georgia,palatino;
        Times New Roman=times new roman,times;
        Courier New=courier new,courier;
        Verdana=verdana,geneva;
        Roboto=Roboto,sans-serif;
        Open Sans=Open Sans,sans-serif;
    `,

            // 🔥 Tamaños
            fontsize_formats: "10px 12px 14px 16px 18px 20px 24px 28px 32px 36px 48px 60px 72px",

            content_style: "body { font-family: Inter, sans-serif; font-size: 16px; }",

            media_live_embeds: true,
        });



        // =============================
        // Previsualización en vivo
        // =============================
        function openPreview() {
            const term = tinymce.get("term").getContent();
            const policy = tinymce.get("policy").getContent();

            document.getElementById("previewTerm").innerHTML = term || "<em>No hay contenido</em>";
            document.getElementById("previewPolicy").innerHTML = policy || "<em>No hay contenido</em>";

            new bootstrap.Modal(document.getElementById("previewModal")).show();
        }


        // =============================
        // Validación en frontend
        // =============================
        document.getElementById("policyForm").addEventListener("submit", function(event) {
            const term = tinymce.get("term").getContent({
                format: "text"
            }).trim();
            const policy = tinymce.get("policy").getContent({
                format: "text"
            }).trim();

            if (term.length === 0 || policy.length === 0) {
                event.preventDefault();

                alert("⚠️ Debes completar ambos campos: Términos y Políticas.");

                return false;
            }
        });
    </script>
@endsection
