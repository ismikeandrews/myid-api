<?php


namespace App;


use Illuminate\Database\Eloquent\Model;

class OrgaoEmissor extends Model
{
    protected $table	  = 'tbOrgaoEmissor';
    protected $primaryKey = 'codOrgaoEmissor';
    protected $fillable   = ['nomeOrgaoEmissor', 'siglaOrgaoEmissor'];

    public static $rules  = [
        'nomeOrgaoEmissor' => 'required|string|unique:tbOrgaoEmissor',
        'siglaOrgaoEmissor' => 'required|string|size:2'
    ];

    public function Documento(){
        return $this->hasMany(Documento::class, 'codOrgaoEmissor', 'codOrgaoEmissor');
    }
}
