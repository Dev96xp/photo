@extends('adminlte::page')

@section('content_header')
    <div class="flex items-center gap-2">
        <a href="{{ route('admin.session.galleries', $session) }}" class="text-gray-300 hover:text-white text-sm transition-colors">
            &larr; Back to Galleries
        </a>
        <span class="text-gray-500">/</span>
        <h1 class="text-base font-semibold text-white">Upload Photos — {{ $gallery->name }}</h1>
    </div>
@stop

@section('content')
    <x-admin-layout>
        <div class="container">

            {{-- Gallery info --}}
            <div class="bg-gray-800 rounded-xl p-4 mb-5 border border-gray-700 flex items-center justify-between">
                <div>
                    <div class="text-white font-semibold">{{ $gallery->name }}</div>
                    <div class="text-xs text-gray-400">Session: {{ $session->name }} &bull; Code: <span class="font-mono text-indigo-400">{{ $gallery->code }}</span></div>
                </div>
                <div class="text-2xl font-bold text-indigo-400">
                    {{ $gallery->images->count() }} <span class="text-xs text-gray-400 font-normal">photos</span>
                </div>
            </div>

            {{-- Display uploaded images --}}
            @livewire('admin.session.display-gallery', ['gallery' => $gallery], key($gallery->id))

            {{-- Dropzone form --}}
            <form action="{{ route('admin.session.gallery.save_images', [$session, $gallery]) }}"
                method="POST" class="dropzone" id="session-gallery-dropzone">
            </form>

        </div>
    </x-admin-layout>
@stop

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.css"
        integrity="sha512-jU/7UFiaW5UBGODEopEqnbIAHOI8fO6T99m7Tsmqs2gkdujByJfkCbbfPSN4Wlqlb9TGnsuC0YgUgWkRBK7B9A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .content-wrapper { background-color: #111827 !important; }
        .content-header  { background-color: #111827 !important; border-bottom: 1px solid #1f2937; }
        .content-header h1, .content-header .breadcrumb-item a { color: #d1d5db !important; }
        .content > div, .content > div > div { background-color: transparent !important; }
        .dropzone {
            background: #1f2937 !important;
            border: 2px dashed #4b5563 !important;
            border-radius: 0.75rem !important;
            color: #9ca3af !important;
        }
        .dropzone:hover { border-color: #6366f1 !important; }
    </style>
@stop

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.js"></script>
    <script>
        Dropzone.options.sessionGalleryDropzone = {
            headers: { 'X-CSRF-TOKEN': "{{ csrf_token() }}" },
            dictDefaultMessage: "Drag photos here or click to upload",
            acceptedFiles: 'image/*',
            paramName: 'file',
            complete: function(file) { this.removeFile(file); },
            queuecomplete: function() {
                Livewire.dispatch('refresh-session-gallery');
            },
        }
    </script>
@stop
