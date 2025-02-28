@extends('layouts.app')

@section('title', 'Editar Contato')

@section('content')
<div class="container">
    <h1 class="mt-4">Editar Contato</h1>

    <form action="{{ route('contato.update', $contato->id) }}" method="POST" id="imcForm">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Nome <span class="text-danger">*</span></label>
            <input type="text" name="nome" class="form-control" value="{{ $contato->nome }}" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">E-mail <span class="text-danger">*</span></label>
            <input type="email" name="email" id="email" class="form-control" value="{{ $contato->email }}" required>
            
            @error('email')
                <div class="text-danger">Esse e-mail já foi cadastrado</div>
            @enderror
        </div>


        <div class="mb-3">
            <label class="form-label">Telefone <span class="text-danger">*</span></label>
            <input id="telefone" type="text" name="telefone" class="form-control" value="{{ $contato->telefone }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Mensagem</label>
            <textarea name="mensagem" class="form-control" rows="3">{{ $contato->mensagem }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Peso (kg) <span class="text-danger">*</span></label>
            <input type="number" step="0.1" name="peso" class="form-control" value="{{ $contato->peso }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Altura (m) <span class="text-danger">*</span></label>
            <input type="number" step="0.01" name="altura" class="form-control" value="{{ $contato->altura }}" required>
        </div>

        <button type="submit" class="btn btn-warning">Atualizar</button>
    </form>
</div>
@endsection
