<div>
   @if ($shouldShow && $quiz)
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const modal = new bootstrap.Modal(document.getElementById('quizModal'));
            modal.show();
        });
    </script>

    <livewire:client.quiz-viewer :quiz="$quiz" />
@endif

</div>
