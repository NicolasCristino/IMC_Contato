<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contato;

class ContatoController extends Controller
{
    // Exibe o formulário de cadastro
    public function create()
    {
        return view('contato.create');
    }

    // Salva o contato no banco
    public function store(Request $request)
    {
        $request->validate([
            'nome'     => 'required|string|max:255',
            'email' => 'required|email|unique:contatos,email',
            'telefone' => 'required|string|max:20',
            'mensagem' => 'nullable|string',
            'peso'     => 'required|numeric',
            'altura'   => 'required|numeric',
        ]);

        Contato::create($request->all());

        return redirect()->route('contato.index')->with('success', 'Contato salvo com sucesso!');
    }

    // Lista todos os contatos
    public function index()
    {
        $contatos = Contato::all()->map(function ($contato) {
            $alturaEmMetros = $contato->altura / 100;
            $contato->imc = $contato->peso / ($alturaEmMetros * $alturaEmMetros);
            return $contato;
        });
    
        return view('contato.index', compact('contatos'));
    }
    

    // Exibe o formulário de edição
    public function edit($id)
    {
        $contato = Contato::findOrFail($id);
        return view('contato.edit', compact('contato'));
    }

    // Atualiza os dados no banco
    public function update(Request $request, $id)
    {
        $contato = Contato::findOrFail($id);
        
        $request->validate([
            'nome'     => 'required|string|max:255',
            'email'    => 'required|email',
            'telefone' => 'required|string|max:20',
            'mensagem' => 'nullable|string',
            'peso'     => 'required|numeric',
            'altura'   => 'required|numeric',
        ]);

        $contato->update($request->all());

        return redirect()->route('contato.index')->with('success', 'Contato atualizado com sucesso!');
    }

    // Deleta um contato
    public function destroy($id)
    {
        Contato::findOrFail($id)->delete();
        return redirect()->route('contato.index')->with('success', 'Contato excluído com sucesso!');
    }
}
