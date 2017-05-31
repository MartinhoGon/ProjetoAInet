<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    
    protected $fillable = [
        'quantity', 'paper_size', 'paper_type', 'file', 'colored', 'stapled', 'front_back'
    ];

	//Establecer relações com a BD
    public function user() 
    {
    	return $this->belongsTo('App\User','owner_id', 'id');
    }

    public function comment() 
    {
    	return $this->hasMany('App\Comment');
    }

    public function printer() 
    {
    	return $this->hasOne('App\Printer');
    }

    //---------------------------------------

    public function statusToStr()
    {
        switch ($this->status) {
            case 0:
                return 'por imprimir';
            case 1:
                return 'concluido';
            case 2:
                return 'recusado';
        }

        return 'Unknown';
    }

    public function stapledToStr()
    {
        switch ($this->stapled) {
            case 0:
                return 'Sem agrafo';
            case 1:
                return 'Agrafado';
        }

        return 'Unknown';
    }

    public function tipoFolhaToStr()
    {
        switch ($this->paper_type) {
            case 0:
                return 'Rascunho';
            case 1:
                return 'Normal';
            case 2:
                return 'Fotografico';
        }

        return 'Unknown';
    }


    public function tamanhoFolhaToStr()
    {
        switch ($this->paper_size) {
            case 3:
                return 'A3';
            case 4:
                return 'A4';
        }

        return 'Unknown';
    }




}
