<x-layout title="Editar Série {{ $series->nome }}">
    <x-series.form :action="route('series.update', $series->id)" :nome="$series->nome" :update="true"/>
</x-layout>