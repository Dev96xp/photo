@extends('adminlte::page')

@section('codersfree', 'Clients')

@section('content_header')
    <h1 class="text-white font-semibold text-base">Clients</h1>
@stop

@section('content')
    <x-admin-layout>
        @livewire('admin.user.users-index')
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
