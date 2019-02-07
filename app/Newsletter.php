<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Newsletter extends Model
{
    protected $guarded = ['id'];
    /*
     * Validations
     */
    public static function rules($update = false, $id = null)
    {
        $rules = [
            'email'    => 'required'
        ];

        if ($update) {
            return $rules;
        }
        
        // return array_merge($rules, [
        //     'email'         => 'required|unique:colleagues,email',
        // ]);
    }
}
