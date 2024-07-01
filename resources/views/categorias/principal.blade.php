<x-app-layout>
    <br>
    <header>
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold tracking-tight text-gray-900">Aquí se van a mostrar todas las categorías</h1>
        </div>
    </header>
    <div class="container size-11/12 m-auto">
        <a href="{{ route('categoria.crear') }}">
            <button class="bg-pink-500 hover:bg-green-700 text-white font-bold py-1 px-2 border border-red-500 rounded">Nuevo Registro de categoría</button>
        </a>
        <br>
        <table class="min-w-full border-collapse block md:table">
            <thead class="block md:table-header-group">
                <tr class="border border-grey-500 md:border-none block md:table-row absolute -top-full md:top-auto -left-full md:left-auto md:relative">
                    <th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">ID</th>
                    <th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Nombre</th>
                    <th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Operaciones</th>
                </tr>
            </thead>
            <tbody class="block md:table-row-group">
                            @foreach ($categorias as $categoria)
                    <tr class="bg-gray-300 border border-grey-500 md:border-none block md:table-row">
                        <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                            <span class="inline-block w-1/3 md:hidden font-bold">ID</span>{{ $categoria->id }}
                        </td>
                        <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                            <span class="inline-block w-1/3 md:hidden font-bold">Nombre</span>
                            <a href="{{ route('categoria.mostrar', $categoria->id) }}">{{ $categoria->nombre }}</a>
                        </td>
                        <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                            <span class="inline-block w-1/3 md:hidden font-bold">Operaciones</span>

                            <!-- Ver -->
                            <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-2 border border-green-500 rounded">
                                <a href="{{ route('categoria.mostrar', $categoria->id) }}" class="text-white">Ver</a>
                            </button>

                            <!-- Editar -->
                            <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 border border-red-500 rounded">
                                <a href="{{ route('categoria.editar', $categoria->id) }}" class="text-white">Editar</a>
                            </button>

                            <!-- Activar / Desactivar -->
                            @if ($categoria->deleted_at)
                                <!-- Activar -->
                                <button class="bg-green-500 hover:bg-blue-700 text-white font-bold py-1 px-2 border border-green-500 rounded">
                                    <a href="{{ route('categoria.activar', $categoria->id) }}" class="text-white">Activar</a>
                                </button>
                                
                                <!-- Borrar (permanente) -->
                                <form action="{{ route('categoria.borrar', $categoria->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 border border-red-500 rounded" value="Borrar" onclick="return confirm('¿Desea eliminar el registro: {{ $categoria->nombre }}?');"/>
                                </form>
                            @else
                                <!-- Desactivar -->
                                <button class="bg-pink-500 hover:bg-red-700 text-white font-bold py-1 px-2 border border-pink-500 rounded">
                                    <a href="{{ route('categoria.desactivar', $categoria->id) }}" class="text-white">Desactivar</a>
                                </button>
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
                </table>
                </div>
                <br>
                {{ $categorias->links() }}

</x-app-layout>
