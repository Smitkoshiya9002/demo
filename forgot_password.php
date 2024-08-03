<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .box {
            width: 300px;
            padding: 40px;
            background: lightgray;
            border: 0px solid rgb(44, 44, 43);
            border-radius: 15px;
            box-shadow: -5px -5px 5px #ffffff0d,
                5px 5px 5px #000000a6,
                10px 10px 10px #000000a6,
                15px 15px 15px #000000a6,
                20px 20px 20px #000000a6;
            text-align: center;
            position: relative;
        }

        .box h2 {
            color: #000;
            font-weight: 400;
            text-transform: uppercase;
            margin-bottom: 40px;
            justify-content: center;
        }

        .usid {
            border: 2px solid #968d8d;
            display: block;
            margin: 20px auto;
            text-align: center;
            box-shadow: 0 2px 0 #000;
            color: black;
            padding: 14px 10px;
            width: 200px;
            outline: none;
            font-size: 13px;
            font-weight: 400;
            text-shadow: 0 -1px 0 #000;
            border-radius: 15px;
            transition: 0.25;
            text-transform: uppercase;
        }


        .usid:focus {
            width: 280px;
            animation: glow 800ms ease-out infinite alternate;
            background: rgb(22, 22, 22);
            /* background: linear-gradient(#333933, #222922); */
            border-color: #393;
            box-shadow: 0 0 5px #00ff0033, inset 0 0 5px #00ff001a, 0 2px 0 #000;
            color: white;
            outline: none;
        }


        .button {
            background: linear-gradient(#333, #222);
            box-sizing: border-box;
            border: 2px solid white;
            box-shadow: 0 2px 0 #000;
            color: #efe;
            display: block;
            margin: 20px auto;
            text-align: center;
            padding: 14px 40px;
            border-radius: 24px;
            cursor: pointer;
            text-transform: uppercase;
        }

        .button:hover,
        .button:focus {
            animation: glow 800ms ease-out infinite alternate;
            outline: none;
        }

        @keyframes glow {
            0% {
                border-color: white;
                box-shadow: 0 0 5px white, inset 0 0 5px white, 0 2px 0 #000;
            }

            100% {
                border-color: rgb(128, 113, 113);
                box-shadow: 0 0 20px rgb(121, 110, 110), inset 0 0 10px black, 0 2px 0 #000;
            }
        }

        .box a {
            color: black;
            text-decoration: none;
            text-transform: uppercase;
        }

        @media screen and (max-width: 450px) {


            .box {
                padding: 10px;
            }

            .login {
                display: flex;
                position: relative;
                justify-content: center;
                top: -10px;
            }
        }
    </style>
</head>

<body>
    <?php
    // include 'header.php';
    ?>
    <form class="box" method="post" action="otp_forget.php">
        <h2>FORGOT PASSWORD</h2>
        <!-- <input type="text" placeholder="username" class="usid" required> -->
        <input type="email" name="email" placeholder="email" class="usid" required>
        <input type="submit" value="SEND OTP" name="submit" class="button">
        <!-- <a href="cpanel_login.php" class="change" >customer panel</a> -->
        <a href="login.php" class="login">login</a>
    </form>
</body>

</html>