<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rule;

class About extends Model
{
    protected $guarded = ['id'];
    /*
     * Validations
     */
    public static function rules($update = false, $id = null)
    {
        $rules = [
            'pengantar1'    => 'required',
            'pengantar2'         => 'required',
            'pengantar3'         => 'required'
        ];

        if ($update) {
            return $rules;
        }
        
        // return array_merge($rules, [
        //     'email'         => 'required|unique:colleagues,email',
        // ]);
    }
}
