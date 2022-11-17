<!DOCTYPE html>
<html lang="en" class="h-full">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="../public/css/tailwind.css">
    <link rel="stylesheet" href="../public/css/register.css">
    <link rel="stylesheet" href="../public/css/toast.css">
    <script language="javascript" src="http://code.jquery.com/jquery-2.0.0.min.js"></script>
    <script src='https://www.google.com/recaptcha/api.js' async defer></script>
    <script src='../../public/js/register.js' async defer></script>
    <script src='../../public/js/toast.js'></script>
</head>

<body class="font-sans">
    <div class="register-box absolute top-1/2 left-1/2 p-7 rounded-lg">
        <!-- -translate-x-1/2 -translate-y-1/2 -->
        <h2 class="font-bold text-2xl text-white text-center pt-1 pb-6">Register</h2>
        <form method="POST" autocomplete="off">
            <div class="user-box relative">
                <input autocomplete="off" type="text" name="username" required="required" class="w-full bg-transparent outline-none text-white py-3 mb-8 username">
                <label class="text-white absolute top-0 left-0 py-3 pointer-events-none">User name</label>
            </div>
            <div class="user-box relative">
                <input autocomplete="off" type="password" name="password" required="required" class="w-full bg-transparent text-white outline-none py-3 mb-8 password">
                <label class="text-white absolute top-0 left-0 py-3 pointer-events-none">Password</label>
            </div>
            <div class="g-recaptcha transform scale-75 origin-top-left" data-sitekey="6LekqeMiAAAAANC_Vp-bc7xcR2AIAtcS2-pj94RY"></div>
            <div class="flex justify-between">
                <div class="submit-box relative overflow-hidden inline-block">
                    <span></span><span></span><span></span><span></span>
                    <input type="submit" name="submit" value="Submit" class="inline-block py-2 px-4 no-underline uppercase tracking-wide bg-transparent overflow-hidden">
                </div>
                <div class="handle-box pt-1">
                    <a href='/Login' class="text-xs block cursor-pointer">Do you already have an account? Log in</a>
                    <a href='/Register' class="text-xs text-left pt-2 cursor-pointer">Need help</a>
                </div>
            </div>
            <!-- top-0 left w-full -->
        </form>
    </div>
</body>

</html>