<!DOCTYPE html>
<html lang="en" class="h-full">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../../public/css/tailwind.css">
    <link rel="stylesheet" href="../../public/css/login.css">
    <link rel="stylesheet" href="../../public/css/toast.css">
    <script language="javascript" src="http://code.jquery.com/jquery-2.0.0.min.js"></script>
    <script src='https://www.google.com/recaptcha/api.js' async defer></script>
    <script src='../../public/js/login.js' async defer></script>
    <script src='../../public/js/toast.js' async defer></script>

</head>

<body class="font-sans">
    <div class="translate-x-full login-box absolute top-1/2 left-1/2 p-7 rounded-lg">
        <!-- -translate-x-1/2 -translate-y-1/2 -->
        <h2 class="font-bold text-2xl text-white text-center pt-1 pb-6">Login</h2>
        <form method="POST" autocomplete="off">
            <div class="user-box relative">
                <input autocomplete="off" type="text" name="username" required="required" class="w-full bg-transparent outline-none text-white py-3 mb-8 username">
                <label class="text-white absolute top-0 left-0 py-3 pointer-events-none">User name</label>
            </div>
            <div class="user-box relative">
                <input autocomplete="off" type="password" name="password" required="required" class="w-full bg-transparent text-white outline-none py-3 mb-8 password">
                <label class="text-white absolute top-0 left-0 py-3 pointer-events-none">Password</label>
            </div>
            <div class="flex justify-between">
                <div class="submit-box relative overflow-hidden inline-block">
                    <span></span><span></span><span></span><span></span>
                    <input type="submit" name="submit" value="Submit" class="inline-block py-2 px-4 no-underline uppercase tracking-wide bg-transparent overflow-hidden">
                </div>
                <div class="register-box pt-1">
                    <a href='/Register' class="text-xs block cursor-pointer">You don't have an account? Register now</a>
                    <a href='/Login' class="text-xs text-left pt-2 cursor-pointer">Forgot password</a>
                </div>
            </div>
            <!-- top-0 left w-full -->
        </form>
    </div>
</body>

</html>