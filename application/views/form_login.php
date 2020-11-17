<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>SISTEM BENDAHARA DISDIKPORA</title>

    <!-- Bootstrap -->
    <link href="<?= base_url('assets/'); ?>vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?= base_url('assets/'); ?>vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?= base_url('assets/'); ?>vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="<?= base_url('assets/'); ?>vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?= base_url('assets/'); ?>build/css/custom.min.css" rel="stylesheet">

    <style>
        .login {
            background-image: url("https://lh3.googleusercontent.com/proxy/yIF9TWaojPUMy13j5FVX6Ve29K-HG52qg5GxtuiCeHnCeuD8FYT4YG-8-vLLOVKpmqBsECHXB-yXV_9hmOyeFCZenHv4TAYJJ21Pd14_DSO1DYlqq8k");
            /* Full height */
            height: 650px;
            

            /* Center and scale the image nicely */
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>
</head>

<body class="login">
    <div>
        <a class="hiddenanchor" id="signup"></a>
        <a class="hiddenanchor" id="signin"></a>

        <div class="login_wrapper bg-light">
            <div class="animate form login_form">
                <section class="login_content">
                    <form action="<?= base_url('auth/login'); ?>" method="POST" enctype="multipart/form-data">
                        <h1>Login Form</h1>
                        <div>
                            <input type="text" class="form-control" placeholder="Username" name="username" required="" />
                        </div>
                        <div>
                            <input type="password" class="form-control" placeholder="Password" name="password" required="" />
                        </div>
                        <div>
                            <button class="btn btn-primary">Log in</button>

                        </div>

                        <div class="clearfix"></div>

                        <div class="separator">


                            <div class="clearfix"></div>
                            <br />

                            <div>
                                <h1><i class="fa fa-paw"></i>SILOKASPEN</h1>
                                <p>©<?= date('Y') ?> All Rights Reserved. SILOKASPEN</p>
                            </div>
                        </div>
                    </form>
                </section>
            </div>


        </div>
    </div>
</body>

</html>