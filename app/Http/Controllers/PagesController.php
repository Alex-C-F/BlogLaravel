<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

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
	
	public function getdetalhes(){

	}
	
}
