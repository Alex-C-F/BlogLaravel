<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categoria;
use Session;


class CategoriasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
    $categorias = Categoria::orderBy('id','asc')->paginate(10);
       return view('categorias.index')->withCategorias($categorias);
     
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categorias.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //valida
        $this->validate( $request, array(
            'nome'=>'required|max:255'
        ));
        //armazena
        $cat = new Categoria();
        $cat->nome = $request->nome;
        $cat->save();
        Session::flash('success', 'Dados salvos com sucesso!');
        //redireciona
        return redirect()->route('categorias.show',$cat->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cat = new Categoria();
        $cat = Categoria::find($id);
        return view('categorias.show')->withCat($cat);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cat = new Categoria();
        $cat = Categoria::find($id);

        return view('categorias.edit')->withCat($cat);

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
        //busca
        $cat = Categoria::find($id);
        //valida dados
        $this->validate($request, array(
            'nome'=>'required|max:255'
            ));
        //captura dados e salva
        $cat->nome = $request->input('nome');
        $cat->save();
        Session::flash('success','Dados alterados com sucesso!');
        //redireciona
        return redirect()->route('categorias.show',$cat->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categoria = Categoria::find($id);
        $categoria->delete();
        Session::flash('success','Deletado com sucesso!');
        return redirect()->route('categorias.index');
    }
}
