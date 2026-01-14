<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{

    public function show($id)
    {
        return Profile::with('user')->find($id);

        // $sql = "
        //     SELECT 
        //         users.*,
        //         profiles.*
        //     FROM users
        //     JOIN profiles 
        //         ON profiles.user_id = users.id
        //     WHERE users.id = ?
        //     LIMIT 1
        //      ";

        // $result = DB::selectOne($sql, [$id]);

        // return response()->json($result);
    }
}
