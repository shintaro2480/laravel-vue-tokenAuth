<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//２行追記
use Hash;
use Illuminate\Validation\ValidationException;
use App\Models\User; // 追加

class LoginController extends Controller
{
    //関数を追記
    public function login(Request $request)
    {
        $email = $request->email;
        $password = $request->password;

        $user = User::where('email', $email)->first();

        // Hash::check(今入力されたパスワード、DBに保存された暗号化済みのパスワード)
        if (! $user || ! Hash::check($password, $user->password)) {
            //ユーザーがいない｜または｜DBのパスワードと合致していれば
            throw ValidationException::withMessages([
                'email' => ['メールが違うか、パスワードが違うか'],
            ]);
        }

        $token = $user->createToken('token')->plainTextToken;
        //tokenという名前で返す
        return response()->json(compact('token'), 200);
    }
}
