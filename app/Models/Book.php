<?php
/**
 * Created by PhpStorm.
 * User: MiguelHuerta
 * Date: 4/2/17
 * Time: 9:03 AM
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class Book extends Model
{

    // table name
    protected $table = 'books';

    // fillable
    protected $fillable = ['name', 'author', 'description', 'year_release'];
}