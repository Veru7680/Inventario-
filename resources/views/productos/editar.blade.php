@extends('layout.plantilla')

@section('titulo', 'crear')

@section('contenido')

<header>
    <div class="mx-auto max-w-7x1 px-4 py-6 sm:px-6 lg:px-8">
        <h1 class="text-3x1 font-bold tracking-tight text-blue-900">Editar un nuevo Registro</h1>
    </div>
</header>
<!-- component -->
<div class="flex items-center justify-center min-h-screen from-purple-100 via-purple-300 to-purple-500 bg-gradient-to-br">
    <div class='w-full max-w-lg px-10 py-8 mx-auto bg-white rounded-lg shadow-xl'>
        <div class='max-w-md mx-auto space-y-6'>

            <form action="{{route('producto.update', $producto)}}" method="POST">
                @csrf
                @method('put')
                <h2 class="text-2xl font-bold ">actualizar datos del produto {{$producto->id}}</h2>
                <p class="my-4 opacity-70">modifique los datos que necesecite</p>
                <hr class="my-6">
                <label class="uppercase text-sm font-bold opacity-70">Nombre</label>
                <input type="text" name="nombre" value="{{$producto->nombre}}" class="p-3 mt-2 mb-4 w-full bg-slate-200 rounded border-2 border-slate-200 focus:border-slate-600 focus:outline-none">
                <label class="uppercase text-sm font-bold opacity-70">Precio</label>
                <input type="text" name="precio" value="{{$producto->precio}}" class="p-3 mt-2 mb-4 w-full bg-slate-200 rounded">
                <label class="uppercase text-sm font-bold opacity-70">Descripcion</label>
                <input type="text" name="descripcion" value="{{$producto->descripcion}}" class="p-3 mt-2 mb-4 w-full bg-slate-200 rounded">
                <label class="uppercase text-sm font-bold opacity-70">Categoria</label>
                <input type="text" name="categoria" value="{{$producto->categoria}}" class="p-3 mt-2 mb-4 w-full bg-slate-200 rounded">

                <label class="uppercase text-sm font-bold opacity-70">Categoria_tabla</label>
                <select name="categoria_id" class="p-3 mt-2 mb-4 w-full bg-slate-200 rounded" required>
                <option value="{{$categoria_actual->id}}">{{$categoria_actual->nombre}}</option>
                @foreach($categorias as $cat)
                <option value="{{$cat->id}}">{{$cat->nombre}}</option>
                @endforeach


                <br>
                <input type="submit" class="py-3 px-6 my-2 bg-emerald-500 text-white font-medium rounded hover:bg-indigo-500 cursor-pointer ease-in-out duration-300" value="Guardar cambios">
            </form>
            <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 border border-red-500 rounded"><a href="{{route('producto.principal')}}">Cancelar </a></button>

        </div>
    </div>
</div>


@endsection