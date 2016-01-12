<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Components extends Model
{
    protected $table='components';
    
    public function getComponents(){
        return $this->get();
    }
}
