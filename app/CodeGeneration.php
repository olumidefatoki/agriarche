<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CodeGeneration extends Model
{
    protected $table = 'code_generation';
    public function genCode($id)
    {
        $codegen = CodeGeneration::find($id);
        $affected = DB::update("UPDATE code_generation SET next_num = next_num + 1 WHERE id =?",[$id]);
         return  $codegen->prefix .'/' .$codegen->next_num;
           
    }
}
