<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\User;

class UserTransformer extends TransformerAbstract
{

    public function transform(User $user)
    {
        return [
            'id'			=> $user->id,
            'name'          => $user->name,
            'email'         => $user->email,
            'role'          => $user->role,
            'registered'	=> $user->created_at->diffForHumans(),
        ];
    }

}

?>