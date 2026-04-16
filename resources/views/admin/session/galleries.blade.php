@extends('adminlte::page')

@section('content_header')
    <div class="flex items-center gap-2">
        <a href="{{ route('admin.project.sessions', $session->project) }}" class="text-gray-300 hover:text-white text-sm transition-colors">
            &larr; Back to Sessions
        </a>
        <span class="text-gray-500">/</span>
        <h1 class="text-base font-semibold text-white">Galleries — {{ $session->name }}</h1>
    </div>
@stop

@section('content')
    <x-admin-layout>
        @livewire('admin.session.galleries-index', ['session' => $session])
    </x-admin-layout>
@stop

@section('css')
<style>
    .content-wrapper { background-color: #111827 !important; }
    .content-header  { background-color: #111827 !important; border-bottom: 1px solid #1f2937; }
    .content-header h1, .content-header .breadcrumb-item, .content-header .breadcrumb-item a { color: #d1d5db !important; }
    .content > div, .content > div > div { background-color: transparent !important; }
</style>
@stop
