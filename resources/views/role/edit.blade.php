@extends('layouts.template')

@section('content')
    <div class="lg:flex px-5 py-2 lg:items-center lg:justify-between">
        <div class="min-w-0 flex justify-between flex-1">
            <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:truncate sm:text-3xl sm:tracking-tight">Funções</h2>
            <a href="{{route('role.index')}}" class="inline-flex items-center rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-gray-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-600">
                Voltar
            </a>
        </div>
    </div>

    <div class="p-4">
        <form action="{{route('role.update', $role->id)}}" method="post">
            @csrf
            @method('PUT')
                <div class="mb-3">
                    <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Nome</label>
                    <div class="mt-2">
                        <input type="text" value="{{$role->name}}" name="name" id="name" autocomplete="given-name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                    @error('name')
                        <span class="text-red-500">{{$message}}</span>
                    @enderror
                </div>
            <div class="mt-6 flex items-center justify-end gap-x-6">
                <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Salvar</button>
            </div>
        </form>
    </div>
@endsection 