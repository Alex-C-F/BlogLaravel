<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
	public function getIndex(){
		return view('pages.welcome');
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
	
	
}
