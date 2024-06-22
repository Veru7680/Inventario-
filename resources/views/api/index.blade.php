<x-app-layout>
{{-- USAMOS EL COMPONENTE SLOT CON NOMBRE CABECERA(HEADER) --}}
<x-slot name="header">
<h2 class="font-bold text-xl text-blue-800 leading-tight">
{{ __('LISTA DE PRODUCTOS') }} {{-- CAMBIAMOS EL NOMBRE DE LA 
CABECERA--}}
</h2>
</x-slot>
<!-- CONTENEDOR PARA LA TABLA DE PRODUCTOS -->
<div class="container m-auto size-11/12">
<!-- Dar estilo al boton Nuevo registro -->
<br>
<a href="{{ route('producto.crear') }}">
<button
class="bg-green-500 hover:bg-green-700 text-white fontbold py-1 px-2 border border-green-500 rounded">Nuevoregistro</button>
</a>
<br>
<br>
<table class="min-w-full border-collapse block md:table">
<thead class="block md:table-header-group">
<tr>
</x-app-layout>
