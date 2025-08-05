@extends('layouts.master')

@section('title')
   Administrar Preguntas
@endsection

@section('page-title')
    Administrar Preguntas
@endsection

@section('body')
<body>
@endsection

@section('content')
    <a href="{{ route('admin.quiz.manager') }}" class="text-blue-500 underline mb-4 inline-block">← Volver a Listdo de Encuesta</a>

    <livewire:admin.quiz-question-manager :quiz="$quiz" />
@endsection

@section('scripts')
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
