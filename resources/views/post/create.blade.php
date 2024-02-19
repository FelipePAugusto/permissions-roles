@extends('layouts.template')

@section('content')
    <div class="lg:flex px-5 py-2 lg:items-center lg:justify-between">
        <div class="min-w-0 flex justify-between flex-1">
            <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:truncate sm:text-3xl sm:tracking-tight">Posts</h2>
            <a href="{{route('post.index')}}" class="inline-flex items-center rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-gray-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-600">
                Voltar
            </a>
        </div>
    </div>

    <div class="p-4">
        <form action="{{route('post.store')}}" method="post">
            @csrf
            <div class="grid gap-2 grid-cols-1">
                @if(auth()->user()->hasRoles(['Admin', 'Super Admin']))
                    @can('post_create')
                        <div class="mb-3">
                            <label for="user_id" class="block text-sm font-medium leading-6 text-gray-900">Autores</label>
                            <div class="mt-2">
                                <select name="user_id" id="user_id" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    <option value="">Selecione</option>
                                    @foreach($users as $user)
                                        <option value="{{$user->id}}">{{$user->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('user_id')
                                <span class="text-red-500">{{$message}}</span>
                            @enderror
                        </div>
                    @endcan
                @endif
                <div class="mb-3">
                    <label for="title" class="block text-sm font-medium leading-6 text-gray-900">Título</label>
                    <div class="mt-2">
                        <input type="text" name="title" id="title" autocomplete="given-name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                    @error('title')
                        <span class="text-red-500">{{$message}}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="content" class="block text-sm font-medium leading-6 text-gray-900">Conteúdo</label>
                    <div class="mt-2">
                        <textarea name="content" row="3" id="content" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"></textarea>
                    </div>
                    @error('content')
                        <span class="text-red-500">{{$message}}</span>
                    @enderror
                </div>
             </div>
            <div class="mt-6 flex items-center justify-end gap-x-6">
                <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Cadastrar</button>
            </div>
        </form>
    </div>
@endsection 