<?php


namespace App;


use Illuminate\Database\Eloquent\Model;

class TipoUsuario extends Model
{
    protected $table 	  = 'tbTipoUsuario';
    protected $primaryKey = 'codTipoUsuario';
    protected $fillable   = ['nomeTipoUsuario'];

    public static $rules  = [
        'nomeTipoUsuario' => 'string|required|min:3|max:50'
    ];
}
