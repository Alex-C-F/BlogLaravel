<?php

namespace App\Http\Controllers;

use App\Post;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use Image;
use Storage;
use App\Categoria;
use App\Tag;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //armazena os posts na variavel $posts na ordem ascendente
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
        //obtendo tags
        $tags = Tag::all();
        //adicionando as tags a um array
        $tg = array();
        foreach ($tags as $tag) {
            $tg[$tag->id] = $tag->name;
        }
        //obtendo todas as categorias
        $categorias = Categoria::all();
        //adicionando as categorias a um array
        $cats = array();
        foreach ($categorias as $categoria) {
            $cats[$categoria->id] = $categoria->nome;
        }
        return view('posts.create')->withCats($cats)->withTags($tg);
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
                'titulo'        => 'required|max:255',
                'texto'         => 'required',
                'slug'          => 'required|alpha_dash|min:5|max:255|unique:posts,slug',
                'categoria_id'  =>'required|integer',
                'file_imagem'   => 'sometimes|image'

            ));

        //armazenamento no banco de dados
        $post = new Post();
        $post->titulo =  $request->titulo;
        $post->slug =  $request->slug;
        $post->categoria_id = $request->categoria_id;
        $post->texto =  $request->texto;
        //adiciona imagem
        if($request->hasFile('file_imagem')){
            $image = $request->file('file_imagem');
            $nomeImagem = time().'.'.$image->getClientOriginalExtension();
            $local = public_path('images/'.$nomeImagem);
            Image::make($image)->resize(1500,600)->save($local);
            $post->imagem = $nomeImagem;
        }
        $post->save();
        //após salvar, adiciona todas as tags ao banco de dados com o comando sync
        $post->tags()->sync($request->tags,false);
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
        //obtendo tags
        $tags = Tag::all();
        //adicionando as tags a um array
        $tg = array();
        foreach ($tags as $tag) {
            $tg[$tag->id] = $tag->name;
        }
        //obtendo todas as categorias
        $categorias = Categoria::all();
        $cats = array();
        foreach ($categorias as $categoria) {
            $cats[$categoria->id] = $categoria->nome;
        }
        //instancia um post
        $post = new Post;
        //busca pelo id
        $post = Post::find($id); 
        //envia o post para a view edit
        return view('posts.edit')-> withPost($post)->withCats($cats)->withTags($tg);
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
        $post=Post::find($id);

        if ($request->input('slug') == $post->slug) {
            # code...
             $this->validate($request, array(
                'titulo' => 'required|max:255',
                'texto' => 'required',
                'categoria_id'  =>'required|integer',
                'file_imagem' => 'sometimes|image'
            ));
        }else {
            # code...
             $this->validate($request, array(
                'titulo' => 'required|max:255',
                'texto' => 'required',
                'slug' => 'required|alpha_dash|min:5|max:255|unique:posts,slug',
                'categoria_id'  =>'required|integer',
                'file_imagem' => 'sometimes|image'
            ));
        }
        //armazenamento no banco de dados
        //$post =Post::find($id);
        $post->titulo =         $request->input('titulo');
        $post->texto =          $request->input('texto');
        $post->slug =           $request->input('slug');
        $post->categoria_id =   $request->input('categoria_id');

        if ($request->hasFile ('file_imagem')) {
            //adiciona a nova fot
            $image = $request->file('file_imagem');
            $nomeImagem = time().'.'.$image->getClientOriginalExtension();
            $local = public_path('images/'.$nomeImagem);
            Image::make($image)->resize(1500,600)->save($local);
            $imagemAntiga = $post->imagem;
            //atualiza o banco de dados
            $post->imagem = $nomeImagem;
            //deleta a outra foto
            Storage::delete($imagemAntiga);
        }
        $post->save();
        $post->tags()->sync($request->tags,false);
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
        Storage::delete($post->imagem);
        $post->delete();
        Session::flash('success','O Post foi deletado com sucesso!');
        return redirect()->route('posts.index');
    }
    //Hello, this is a snippet.
 
}
