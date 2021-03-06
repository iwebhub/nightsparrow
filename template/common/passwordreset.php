<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Promijenite lozinku -- Nightsparrow</title>
    <link rel="stylesheet" href="template/common/base.css">
    <style>
        body {
            padding-top: 40px;
            padding-bottom: 40px;
            background-color: #E4E6E7;
        }

        .form-signin {
            max-width: 330px;
            padding: 15px;
            margin: 0 auto;
            margin-top: 15%;

        }

        .form-signin .form-signin-heading,
        .form-signin .checkbox {
            margin-bottom: 10px;
        }

        .form-signin .checkbox {
            font-weight: normal;
        }

        .form-signin .form-control {
            position: relative;
            height: auto;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
            padding: 10px;
            font-size: 16px;
        }

        .form-signin .form-control:focus {
            z-index: 2;
        }

        .form-signin input[type="email"] {
            margin-bottom: -1px;
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0;
        }

        .form-signin input[type="password"] {
            margin-bottom: 10px;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
        }

        .signin-logo {
            margin: 5px;
            padding: 5px;
            margin-bottom: 7px;
        }
    </style>
</head>
<body>
<div class="container">
    <form action="password.php" class="form-signin" method="post">
        <img src="template/icons/nightsparrow.png" class="signin-logo">
        <p><b>Događa se i najboljima.</b> Unesite svoju adresu e-pošte kako bi promijenili lozinku.</p>
        <input type="email" name="email" placeholder="Email adresa" class="form-control" required>
        <button class="btn btn-lg btn-primary btn-block">Promijeni lozinku</button>
        <a href="login.php">Ipak se prisjećate?</a>
    </form>
</div>
</body>
