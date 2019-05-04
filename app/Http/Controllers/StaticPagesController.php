<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

/**
 * 
 */
class StaticPagesController extends Controller
{

	function index()
	{
		return view('home');
	}

	function HallUserLoggedIn()
	{
		return view('hall-user');
	}
}