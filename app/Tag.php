<?php
/**
 * Created by PhpStorm.
 * User: JosueJr
 * Date: 29/02/2020
 * Time: 14:46
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $table = 'tag';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'name', 'id_user'
    ];
}