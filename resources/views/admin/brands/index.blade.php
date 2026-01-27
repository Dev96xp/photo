@extends('adminlte::page')

@section('codersfree', 'Dashboard')

@section('content_header')
    <a class="btn btn-secondary btn-sm float-right" href="{{ route('admin.brands.create') }}">Nueva Marca</a>
    <h1>Brands / Marcas</h1>

@stop

@section('content')

    {{-- COMPONENTE DE LIVEWIRE - LISTA DE USUARIOS --}}
    {{-- Ojo se usa un guion en livewire --}}
    {{-- @livewire('admin.sales-pos', ['user' => $user], key('sales-pos' . $user->id)) --}}

    @if (session('info'))
        <div class="alert alert-success">
            {{ session('info') }}
        </div>
    @endif


    <div class="card">
        <div class="ml-4 mt-4">
            NOTE:
            ONLINE - Significa que SOLO, estas marcas se muestran EN LINEA al publico para la venta.
        </div>
        <div class="ml-4 mt-2">
            NOTE:
            TIEMPO DE ENTREGA - Es el tiempo que aproximadamente tarda en llegar un producto de esta compañia al almacen.
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Code</th>
                        <th>Company</th>
                        <th>Tiempo de entrega</th>
                        <th>Status</th>
                        <th>Online status</th>
                        <th colspan="2"></th> {{--  colspan="2" - Que ocupe dos espacios --}}
                    </tr>
                </thead>
                <tbody>
                    @foreach ($brands as $brand)
                        <tr>
                            <td>
                                {{ $brand->id }}
                            </td>
                            <td>
                                {{ $brand->code }}
                            </td>
                            <td>
                                {{ $brand->name }}
                            </td>
                            <td>
                                {{ $brand->time }}
                            </td>
                            <td>
                                {{ $brand->status }}
                            </td>

                            <td>
                                @if ($brand->categories->count() > 0)
                                    <div class="text-green">
                                        ONLINE
                                    </div>
                                @else
                                @endif


                            </td>
                            {{-- OJO,  width="10px" - Ayuda a mandar los botones al lado derecho --}}
                            <th width="10px" class="p-1">
                                <a class="btn btn-primary btn-sm" href="{{ route('admin.brands.edit', $brand) }}">Editar</a>
                            </th>
                            <th width="10px" class="p-1">
                                <form action="{{ route('admin.brands.destroy', $brand) }}" method="POST">
                                    @csrf
                                    @method('delete')

                                    <button class="btn btn-danger btn-sm" type="submit">Eliminar</button>

                                </form>
                            </th>
                        </tr>
                    @endforeach
                </tbody>

            </table>
        </div>

        <!-- Include this script tag or install `@tailwindplus/elements` via npm: -->
        <!-- <script src="https://cdn.jsdelivr.net/npm/@tailwindplus/elements@1" type="module"></script> -->
        <button command="show-modal" commandfor="dialog"
            class="rounded-md bg-white/10 px-2.5 py-1.5 text-sm font-semibold text-white inset-ring inset-ring-white/5 hover:bg-white/20">Open
            dialog</button>

        <el-dialog>
            <dialog id="dialog" aria-labelledby="dialog-title"
                class="fixed inset-0 size-auto max-h-none max-w-none overflow-y-auto bg-transparent backdrop:bg-transparent">
                <el-dialog-backdrop
                    class="fixed inset-0 bg-gray-900/50 transition-opacity data-closed:opacity-0 data-enter:duration-300 data-enter:ease-out data-leave:duration-200 data-leave:ease-in"></el-dialog-backdrop>

                <div tabindex="0"
                    class="flex min-h-full items-end justify-center p-4 text-center focus:outline-none sm:items-center sm:p-0">
                    <el-dialog-panel
                        class="relative transform overflow-hidden rounded-lg bg-gray-800 px-4 pt-5 pb-4 text-left shadow-xl outline -outline-offset-1 outline-white/10 transition-all data-closed:translate-y-4 data-closed:opacity-0 data-enter:duration-300 data-enter:ease-out data-leave:duration-200 data-leave:ease-in sm:my-8 sm:w-full sm:max-w-sm sm:p-6 data-closed:sm:translate-y-0 data-closed:sm:scale-95">
                        <div>
                            <div class="mx-auto flex size-12 items-center justify-center rounded-full bg-green-500/10">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                                    data-slot="icon" aria-hidden="true" class="size-6 text-green-400">
                                    <path d="m4.5 12.75 6 6 9-13.5" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </div>
                            <div class="mt-3 text-center sm:mt-5">
                                <h3 id="dialog-title" class="text-base font-semibold text-white">Payment successful</h3>
                                <div class="mt-2">
                                    <p class="text-sm text-gray-400">Lorem ipsum dolor sit amet consectetur adipisicing
                                        elit. Consequatur amet labore.</p>
                                </div>
                            </div>
                        </div>
                        <div class="mt-5 sm:mt-6">
                            <button type="button" command="close" commandfor="dialog"
                                class="inline-flex w-full justify-center rounded-md bg-indigo-500 px-3 py-2 text-sm font-semibold text-white hover:bg-indigo-400 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">Go
                                back to dashboard</button>
                        </div>
                    </el-dialog-panel>
                </div>
            </dialog>
        </el-dialog>


    </div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

    <script>
        console.log('Hi!');
    </script>
@stop
