<?php


namespace App;


use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table	  = 'tbUsuario';
    protected $primaryKey = 'codUsuario';
    protected $fillable   = ['loginUsuario', 'senhaUsuario', 'codTipoUsuario'];

    public static $rules  = [
        'loginUsuario'   => 'required|string|max:100|unique:tbusuario',
        'senhaUsuario'   => 'required|string|max:256',
        'codTipoUsuario' => 'required|integer'
    ];

    public function TipoUsuario(){
        return $this->hasOne(TipoUsuario::class, 'codTipoUsuario', 'codTipoUsuario');
    }
}
