<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

<<<<<<< HEAD
class ForgotPasswordController extends Controller
=======
class ForgotPasswordController extends Controller 
>>>>>>> 2065fe6df8f57c5a0bc3b7f3aa6554cf54221e25
{
    public function forgotPassword(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return [
            'success' => $status === Password::RESET_LINK_SENT
        ];
<<<<<<< HEAD

    }
};
=======
    }
}
>>>>>>> 2065fe6df8f57c5a0bc3b7f3aa6554cf54221e25
