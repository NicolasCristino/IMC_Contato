@extends('layouts.app')

@section('title', 'Cadastrar Contato')

@section('content')
<div class="container">
    <h1 class="mt-4">Cadastrar Contato</h1>

    <form action="{{ route('contato.store') }}" method="POST" id="imcForm">
        @csrf

        <div class="mb-3">
            <label class="form-label">Nome <span class="text-danger">*</span></label>
            <input type="text" name="nome" class="form-control" value="{{ old('nome') }}" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">E-mail <span class="text-danger">*</span></label>
            <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required>
            
            @error('email')
                <div class="text-danger">Esse e-mail já foi cadastrado</div>
            @enderror
        </div>


        <div class="mb-3">
            <label class="form-label">Telefone <span class="text-danger">*</span></label>
            <input id="telefone" type="text" name="telefone" class="form-control" value="{{ old('telefone') }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Mensagem</label>
            <textarea name="mensagem" class="form-control" rows="3" value="{{ old('mensagem') }}"></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Peso (kg) <span class="text-danger">*</span></label>
            <input type="number" step="0.1" name="peso" class="form-control" value="{{ old('peso') }}" required>
        </div>

        <div class="mb-3">
            <label for="altura" class="form-label">Altura (cm) <span class="text-danger">*</span></label>
            <input type="number" class="form-control" id="altura" name="altura" min="50" max="250" value="{{ old('altura') }}" required>
        </div>

        <button type="submit" class="btn btn-success">Salvar</button>
    </form>
</div>
@endsection
