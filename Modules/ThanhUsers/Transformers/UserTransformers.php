<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 9/26/2018
 * Time: 3:12 PM
 */

namespace Modules\ThanhUsers\Transformers;


use League\Fractal\TransformerAbstract;
use Modules\User\Entities\Sentinel\User;

class UserTransformers extends TransformerAbstract
{
    public function transform(User $user){
        return [
            'id'=>$user->id,
            'email'=>$user->email,
            'first_name'=>$user->first_name,
            'last_name'=>$user->last_name,
        ];
    }
}