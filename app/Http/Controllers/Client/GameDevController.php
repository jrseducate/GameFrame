<?php
namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;

/**
 * Created by PhpStorm.
 * User: Jeremy
 * Date: 2/15/2018
 * Time: 8:58 PM
 */

class GameDevController extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        return view('game');
    }
}