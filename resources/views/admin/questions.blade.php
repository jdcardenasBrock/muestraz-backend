<x-layouts.app> {{-- o el layout que uses --}}
    <div class="p-4">
        <a href="{{ route('admin.dashboard') }}" class="text-blue-500 underline">← Volver</a>

        <h2 class="text-xl font-bold mb-4">Administrar preguntas del quiz</h2>

        <livewire:admin.quiz-question-manager :quiz="$quiz" />
    </div>
</x-layouts.app>
