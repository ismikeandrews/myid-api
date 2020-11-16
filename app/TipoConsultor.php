<?php


namespace App;


use Illuminate\Database\Eloquent\Model;

class TipoConsultor extends Model
{
    protected $table      = 'tbTipoConsultor';
    protected $primaryKey = 'codTipoConsultor';
    protected $fillable   = ['nomeTipoConsultor'];

    public static $rules  = [
        'nomeTipoConsultor'        => 'string|required|min:3|max:100'
    ];
}
