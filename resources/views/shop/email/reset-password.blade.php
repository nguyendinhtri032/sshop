<!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <h2>Reset password your account</h2>

        <div>
            Hi {{$name}},
            You have submitted a password reset request, please click here 
            {{ URL::to('shop/auth/reset-password/'. $token) }} to continue.<br/>
        </div>

    </body>
</html>