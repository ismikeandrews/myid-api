<?php


namespace App;


use Illuminate\Database\Eloquent\Model;

class OrgaoEmissor extends Model
{
    protected $table	  = 'tbOrgaoEmissor';
    protected $primaryKey = 'codOrgaoEmissor';
    protected $fillable   = [];

    public static $rules  = [];

    public function Documento(){
        return $this->hasMany(Documento::class, 'codOrgaoEmissor', 'codOrgaoEmissor');
    }
}
