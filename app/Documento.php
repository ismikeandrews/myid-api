<?php


namespace App;


use Illuminate\Database\Eloquent\Model;

class Documento extends Model
{
    protected $table	  = 'tbDocumento';
    protected $primaryKey = 'codDocumento';
    protected $fillable   = ['nomeDocumento', 'imagemDocumento', 'codOrgaoEmissor'];

    public static $rules  = [
        'nomeDocumento'   => 'required|max:100|string|unique:tbdocumento',
        'imagemDocumento' => 'required|string',
        'codOrgaoEmissor' => 'required|integer'
    ];

    public function OrgaoEmissor(){
        return $this->belongsTo(OrgaoEmissor::class, 'codOrgaoEmissor', 'codOrgaoEmissor');
    }
}
