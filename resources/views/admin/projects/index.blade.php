@extends('adminlte::page')

@section('codersfree', 'Projects')

@section('content_header')
    <h1 class="text-white font-semibold text-base">Photographics Projects</h1>
@stop

@section('content')
    <x-admin-layout>

        {{-- Workflow guide --}}
        <div class="bg-gray-800 border border-gray-700 rounded-xl px-5 py-4 mb-5 flex items-center gap-8 flex-wrap">
            <div class="text-xs text-gray-400 font-semibold uppercase tracking-wider flex-shrink-0">Workflow</div>
            <div class="flex items-center gap-3 flex-wrap text-sm font-mono">

                <div class="flex flex-col gap-0.5">
                    <span class="text-indigo-400 font-semibold">Project</span>
                    <span class="pl-3 text-gray-500">├── <span class="text-blue-400">PhotoSession 1</span></span>
                    <span class="pl-7 text-gray-500">└── <span class="text-green-400">Gallery 1</span></span>
                    <span class="pl-3 text-gray-500">└── <span class="text-blue-400">PhotoSession 2</span></span>
                    <span class="pl-7 text-gray-500">├── <span class="text-green-400">Gallery 1</span></span>
                    <span class="pl-7 text-gray-500">├── <span class="text-green-400">Gallery 2</span></span>
                    <span class="pl-7 text-gray-500">├── <span class="text-green-400">Gallery 3</span></span>
                    <span class="pl-7 text-gray-500">└── <span class="text-green-400">Gallery 4</span></span>
                </div>

                <div class="hidden lg:flex items-center gap-3 ml-4 border-l border-gray-700 pl-6">
                    <div class="flex flex-col gap-2">
                        <div class="flex items-center gap-2">
                            <span class="w-2 h-2 rounded-full bg-indigo-500 inline-block"></span>
                            <span class="text-gray-400 text-xs">Create a <span class="text-white">Project</span> and assign a client</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <span class="w-2 h-2 rounded-full bg-blue-500 inline-block"></span>
                            <span class="text-gray-400 text-xs">Add <span class="text-white">Sessions</span> with date, type & location</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <span class="w-2 h-2 rounded-full bg-green-500 inline-block"></span>
                            <span class="text-gray-400 text-xs">Create <span class="text-white">Galleries</span> and upload photos via Dropzone</span>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        @livewire('admin.project.projects-index')
    </x-admin-layout>
@stop

@section('css')
<style>
    .content-wrapper {
        background-color: #111827 !important;
    }
    .content-header {
        background-color: #111827 !important;
        border-bottom: 1px solid #1f2937;
    }
    .content-header h1 {
        color: #f9fafb !important;
    }
    .content > div,
    .content > div > div {
        background-color: transparent !important;
    }
</style>
@stop

@section('js')
@stop
