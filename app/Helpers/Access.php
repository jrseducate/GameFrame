<?php
/**
 * Created by PhpStorm.
 * User: Jeremy
 * Date: 2/17/2018
 * Time: 5:49 PM
 */

if(!function_exists('user'))
{
    /**
     * User
     *
     * @return \App\Models\User
     */
    function user()
    {
        /** @var \App\Models\User $user */
        $user = Illuminate\Support\Facades\Auth::user();
        return $user;
    }
}