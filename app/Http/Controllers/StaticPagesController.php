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

	function HallUserLoggedIn($id)
	{
		return view('hall-users.dashboard');
	}

	function HallOwnerLoggedIn()
	{
		return view('hall-owner');
	}
}