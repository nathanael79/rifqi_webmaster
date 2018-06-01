<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\User;
use App\Models\Resident;
use App\Models\Kelas;

class UserKelasTransformer extends TransformerAbstract
{

    public function transform(User $user, Kelas $kelas, $user2)
    {
        return [
            'id'            => $kelas->id,
            'name'          => $kelas->name,
            'id'			=> $user->id,
            'name'          => $user->name,
        ];
    }

}

?>