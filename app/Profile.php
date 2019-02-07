<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $guarded = ['id'];
    /*
     * Validations
     */
    public static function rules($update = false, $id = null)
    {
        $rules = [
            'name'    => 'required',
            'facebook'         => 'required',
            'instagram'         => 'required',
            'email'         => 'required',
            'telp'         => 'required',
            'pengantar1'         => 'required',
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
