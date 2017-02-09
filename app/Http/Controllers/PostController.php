<?php

namespace App\Http\Controllers;

use App\Post;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;

class PostController extends Controller
{
    public function __constructor()
    {
        $thid->middleware('auth', [
            'only'=>['index','show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //cria os posts na ordem e armazena no banco de dados
        $posts = Post::orderBy('id','asc')->paginate(5);//incluindo paginação
        //passa uma lista com todos os posts
        return view('posts.index')->withPosts($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validação
        $this->validate($request, array(
                'titulo' => 'required|max:255',
                'texto' => 'required',
                'slug' => 'required|alpha_dash|min:5|max:255|unique:posts,slug'
            ));

        //armazenamento no banco de dados
        $post = new Post();
        $post->titulo =  $request->titulo;
        $post->slug =  $request->slug;
        $post->texto =  $request->texto;

        $post->save();
        Session::flash('success', 'Dados salvos com sucesso!');
        //redirecionar para a página
        return redirect()->route('posts.show',$post->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //instancia um post
        $post = new post;
        //busca por id
        $post = Post::find($id);
        //retorna o post enviando para a view show
        return view('posts.show')->with('post',$post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //instancia um post
        $post = new Post;
        //busca pelo id
        $post = Post::find($id); 
        //envia o post para a view edit
        return view('posts.edit')-> withPost($post);
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
       //Validação
        $this->validate($request, array(
                'titulo' => 'required|max:255',
                'texto' => 'required',
                'slug' => 'required|alpha_dash|min:5|max:255'
            ));

        //armazenamento no banco de dados
        $post =Post::find($id);
        $post->titulo =  $request->input('titulo');
        $post->texto =  $request->input('texto');
        $post->slug =  $request->input('slug');

        $post->save();
        Session::flash('success', 'Dados alterados com sucesso!');
        //redirecionar para a página
        return redirect()->route('posts.show',$post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        Session::flash('success','O Post foi deletado com sucesso!');
        return redirect()->route('posts.index');
    }
}
