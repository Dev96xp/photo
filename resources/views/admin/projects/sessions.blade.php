@extends('adminlte::page')

@section('codersfree', 'Photo Sessions')

@section('content_header')
    <div class="flex items-center gap-2">
        <a href="{{ route('admin.project.index') }}" class="text-gray-300 hover:text-white text-sm transition-colors">
            &larr; Back to Projects
        </a>
        <span class="text-gray-500">/</span>
        <h1 class="text-base font-semibold text-white">Sessions — {{ $project->name }}</h1>
    </div>
@stop

@section('content')
    <x-admin-layout>
        @livewire('admin.project.sessions-index', ['project' => $project])
    </x-admin-layout>
@stop

@section('css')
<style>
    /* Fondo general del área de contenido */
    .content-wrapper {
        background-color: #111827 !important; /* gray-900 */
    }

    /* Header de la página */
    .content-header {
        background-color: #111827 !important;
        border-bottom: 1px solid #1f2937;
    }

    .content-header h1,
    .content-header .breadcrumb-item,
    .content-header .breadcrumb-item a,
    .content-header .breadcrumb-item.active {
        color: #d1d5db !important;
    }

    /* Quita el fondo blanco del x-admin-layout wrapper */
    .content > div,
    .content > div > div {
        background-color: transparent !important;
    }
</style>
@stop

@section('js')
@stop
