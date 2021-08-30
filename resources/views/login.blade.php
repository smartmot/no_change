<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login - {{ config("app.name") }}</title>
    <link rel="stylesheet" href="{{ asset("css/style.css", true) }}">
</head>
<body>
<div class="cwc pt_20">
    <div class="pt_20">
        <div class="pr_20 pl_20 pt_10 pb_20 b_r_8 box-s2">
            <h1 class="fm-popp">Login</h1>
            <div class="h_1 bc_1"></div>
            <div>
                <div class="mt_10">
                    <form action="{{ route("login.submit") }}" method="post" id="login">
                        @csrf
                        @method("post")
                        <label for="email" class="fm-popp fs_18">Email</label>
                        <div class="ds_f">
                            <input id="email" type="email" name="email" value="{{ old("email") }}" class="input-1 fm-popp b_r_3 pr_10 pl_10 pt_5 pb_5 wp_100 box-s2 fs_16" placeholder="Email">
                        </div>

                        <div class="h_10 wp_100"></div>

                        <label for="password" class="fm-popp fs_18">Password</label>
                        <div class="ds_f pb_10">
                            <input id="password" type="password" name="password" class="input-1 fm-popp b_r_3 pr_10 pl_10 pt_5 pb_5 wp_100 box-s2 fs_16" placeholder="Password">
                        </div>

                        <div class="mt_10 t_a_r">
                            <button class="fs_14 pr_20 pl_20 pt_5 pb_5 fm-popp c_2 bc_5 oln_n bd_n b_r_3 csr-p hbc-warning">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
