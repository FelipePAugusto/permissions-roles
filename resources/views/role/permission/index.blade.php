@extends('layouts.template')

@section('content')
<div class="lg:flex px-5 py-2 lg:items-center lg:justify-between">
        <div class="min-w-0 flex justify-between flex-1">
            <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:truncate sm:text-3xl sm:tracking-tight">Permissões</h2>
            <a href="{{route('role.index')}}" class="inline-flex items-center rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-gray-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-600">
                Voltar
            </a>
        </div>
    </div>

    <div class="flex px-4 flex-col mt-6">
       <form action="{{route('roles.permissions.store', $role->id)}}" method="post">
            @csrf
            @foreach($permissions as $permission)
                <div class="relative flex gap-x-3">
                    <div class="flex h-6 items-center">
                        <input 
                            id="permissions.{{$permission->id}}" 
                            name="permissions[{{$permission->id}}]" 
                            type="checkbox" 
                            class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600"
                            @checked($role->permissions->contains($permission->id))
                        >
                    </div>
                    <div class="text-sm leading-6">
                        <label for="permissions.{{$permission->id}}" class="font-medium text-gray-900">{{$permission->label}}</label>
                    </div>
                </div>  
            @endforeach
            <div class="mt-6 flex items-center justify-start gap-x-6">
                <button type="submit" 
                    class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Salvar</button>
            </div>
        </form>
    </div>
@endsection