<?php

namespace App\Http\Services;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class UserService
{
    public function create(User $user, mixed $request): bool|Model|Builder
    {
        DB::transaction(function() use($user, $request) {
            return $user->query()->updateOrCreate([
                'id' => $user->id
            ], [
                'name' => $request->get('name')
            ]);
        });

        return false;
    }
}
