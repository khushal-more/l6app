<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function data(){
        $data = [
            ['name'=>'AK', 'company'=>'Namo'],
            ['name'=>'KB', 'company'=>'KBM']
        ];
        return $data;
    }
}
