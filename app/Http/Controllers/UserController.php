<?php
/**
 * Created by PhpStorm.
 * User: MiguelHuerta
 * Date: 3/31/17
 * Time: 7:14 PM
 */

namespace App\Http\Controllers;

use App\Models\UserInterface;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function find($id)
    {
        dd(User::find($id));
    }
}