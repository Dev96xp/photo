{{-- Se estiende la plantilla LTEAdmin para administrador --}}
{{-- ESTO SE COPIO DEL WEBSITE DE LTEAdmin - PLANTILLA PRINCIPAL --}}

@extends('adminlte::page')

@section('codersfree', 'Dashboard')

@section('content_header')

    <h1>Expenses / Gastos, Salidas, Pagos</h1>

@stop

@section('content')
    <x-admin-layout>
        @livewire('admin.expense.expenses-index')
    </x-admin-layout>
@stop

@section('css')

@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop
