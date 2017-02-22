<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Mail;
use Session;

class PagesController extends Controller
{
	
	public function getIndex(){
		//$posts = new Post();
		$posts = Post::orderBy('created_at','des')->paginate(5);
		return view('pages.welcome')->with('posts',$posts);
	}
	
	public function getAbout(){
		$firstName = "Alex";
		$lastName = "Ferreira";
		$fullName = $firstName." ".$lastName;
		$email = "alex.cc20@hotmail.com";
		
		return view('pages.about',compact('fullName'), compact('email'));
	}
	
	public function getContact(){
		return view('pages.contact');
	}
	
	public function postContact(Request $request){
		$this->validate($request, array(
			'email' => 'sometimes|required|email',
			'subject'=> 'required|min:3',
			'message' => 'required|min:10'
			));
		$dados = array(
			'email' => $request->email,
			'subject' => $request->subject,
			'bodyMessage' => $request->message
		);
		Mail::send('emails.contact', $dados, function($message) use ($dados){
			$message->from($dados['email']);
			$message->to('alex-3756b8@inbox.mailtrap.io');
			$message->subject($dados['subject']);
		});
		Session::flash('success','Obrigado por entrar em contato, sua mensagem foi enviada com sucesso!');

		return redirect('/');
	}
	
}
