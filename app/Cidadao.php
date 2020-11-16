<?php


namespace App;


use Illuminate\Database\Eloquent\Model;

class Cidadao extends Model
{
    protected $table	  = 'tbCidadao';
    protected $primaryKey = 'codCidadao';
    protected $fillable   = ['cpfCidadao', 'codUsuario'];

    public static $rules  = [
        'cpfCidadao' => 'required|string|size:11|unique:tbcidadao',
        'codUsuario' => 'required|integer'
    ];

    public function Usuario(){
        return $this->belongsTo(Usuario::class, 'codUsuario', 'codUsuario');
    }
}
