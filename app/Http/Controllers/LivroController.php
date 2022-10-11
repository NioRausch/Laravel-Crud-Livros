<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Livro;
use Session;

class LivroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $livros = Livro::all();
        return view('livros.index',array('livros' => $livros));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('livros.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $contato = new Livro();
        $contato->titulo = $request->input('titulo');
        $contato->descricao = $request->input('descricao');
        $contato->autor = $request->input('autor');
        $contato->editora = $request->input('editora');
        $contato->ano = $request->input('ano');
        if($contato->save()) {
            return redirect('livros');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $livro = Livro::find($id);
        return view('livros.show',array('livro' => $livro));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $livro = Livro::find($id);
        return view('livros.edit',array('livro' => $livro));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $livro = Livro::find($id);
        $livro->titulo = $request->input('titulo');
        $livro->descricao = $request->input('descricao');
        $livro->autor = $request->input('autor');
        $livro->editora = $request->input('editora');
        $livro->ano = $request->input('ano');
        if($livro->save()) {
            Session::flash('mensagem','Livro alterado com sucesso');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $livro = Livro::find($id);
        $livro->delete();
        Session::flash('mensagem','Livro Excluído com Sucesso');
        return redirect(url('livros/'));
    }
}
