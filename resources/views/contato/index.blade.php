@extends('layouts.app')

@section('title', 'Lista de Contatos')

@section('content')
<div class="container">

    <div class="d-flex justify-content-between my-4">
        <h1>Lista de Contatos</h1>
        <a href="{{ route('contato.create') }}" class="btn btn-primary mb-3">Novo Contato</a>
    </div>

    <table class="table">
    <thead>
        <tr>
            <th>Nome</th>
            <th>Email</th>
            <th>Telefone</th>
            <th>Peso (kg)</th>
            <th>Altura (cm)</th>
            <th>IMC</th>
            <th>Status</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($contatos as $contato)
        <tr>
            <td>{{ $contato->nome }}</td>
            <td>{{ $contato->email }}</td>
            <td>{{ $contato->telefone }}</td>
            <td>{{ $contato->peso }}</td>
            <td>{{ $contato->altura }}</td>
            <td>{{ number_format($contato->imc, 2) }}</td>
            <td>
                @if($contato->imc < 18.5)
                    Abaixo do peso
                @elseif($contato->imc < 24.9)
                    Peso normal
                @elseif($contato->imc < 29.9)
                    Sobrepeso
                @else
                    Obesidade
                @endif
            </td>
            <td>
                <a href="{{ route('contato.edit', $contato->id) }}" class="btn btn-warning btn-sm">Editar</a>
                <form action="{{ route('contato.destroy', $contato->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Excluir</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

</div>
@endsection
