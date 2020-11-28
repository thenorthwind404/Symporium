<?php
include('serverlogin.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <header class="user__header">
        <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/3219/logo.svg" alt="" /><br/><br><br>
    </header>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Page</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            color:white;
        }
        
        body {
            font-family: Georgia, 'Times New Roman', Times, serif;
            font-size: 14px;
            background-size: 200% 100% !important;
            animation: move 10s ease infinite;
            transform: translate3d(0, 0, 0);
            background: linear-gradient(45deg, #725aca 10%, #2b2dbe 90%);
            height: 100vh;
        }
        
        .user {
            width: 90%;
            max-width: 340px;
            margin: 10vh auto;
        }
        
        .user__header {
            margin-top:10%;
            text-align: center;
            opacity: 0;
            transform: translate3d(0, 500px, 0);
            animation: arrive 500ms ease-in-out 0.7s forwards;
        }
        
        .user__title {
            font-size: 20px;
            margin-bottom: -10px;
            font-weight: 500;
            color: white;                 
            text-align: center;  
            font-size:25px;
        }
        
        .form 
        {
            margin-top: 40px;
            border-radius: 6px;
            opacity: 0;
            transform: translate3d(0, 500px, 0);
            animation: arrive 500ms ease-in-out 0.9s forwards;
        }
        
        .form--no {
            animation: NO 1s ease-in-out;
            opacity: 1;
            transform: translate3d(0, 0, 0);
        }
        
        .form__input {
            display: block;
            width: 100%;
            padding: 20px;
            font-family: Georgia, 'Times New Roman', Times, serif;
            -webkit-appearance: none;
            border: 0;
            outline: 0;
            transition: 0.3s;
            background-color: black;
            color: white;
            -webkit-box-shadow: 9px 5px 15px 5px #000000; 
            box-shadow: 9px 5px 15px 5px #000000;
            border-radius:10px;
        }
        .form__input:valid
        {
            background-color: rgb(226, 235, 241);
            color: black;
            box-shadow: inset 5px 5px 13px -2px #000000;
        }
        .btn 
        {
            display: block;
            width: 100%;
            padding: 20px;
            border: 5px 5px 5px 5px solid black;
            font-family: Georgia, 'Times New Roman', Times, serif;
            -webkit-appearance: none;
            outline: 0;
            color: black;
            background:#3662c2;
            transition: 0.3s;
            -webkit-box-shadow: 9px 5px 15px 5px #000000; 
            box-shadow: 9px 5px 15px 5px #000000;
            border-radius:7px;
        }
        .btn:hover
        {
            background: #5A4DFF;
            color:white;
            -webkit-box-shadow: 3px 5px 15px 5px #000000; 
            box-shadow: 3px 5px 15px 5px #000000;
        }
	    color:white;
        }
        @keyframes NO {
          from, to {
            -webkit-transform: translate3d(0, 0, 0);
            transform: translate3d(0, 0, 0);
          }
        
          10%, 30%, 50%, 70%, 90% {
            -webkit-transform: translate3d(-10px, 0, 0);
            transform: translate3d(-10px, 0, 0);
          }
        
          20%, 40%, 60%, 80% {
            -webkit-transform: translate3d(10px, 0, 0);
            transform: translate3d(10px, 0, 0);
          }
        }
        
        @keyframes arrive {
            0% {
                opacity: 0;
                transform: translate3d(0, 50px, 0);
            }
            
            100% {
                opacity: 1;
                transform: translate3d(0, 0, 0);
            }
        }
        
        @keyframes move {
            0% {
                background-position: 0 0
            }
        
            50% {
                background-position: 100% 0
            }
        
            100% {
                background-position: 0 0
            }
        }
        .submitbutton
        {
            text-decoration: none;
            font-size: 40px;
            font-weight: bold;
        }
        h5
        {
            text-align:center;
        }
        a 
        {
            text-decoration:none;
            color:white;
        }
        a:hover
        {
            text-decoration:none;
            color:black;
        }
        .link
        {
            font-size: 15px;
            margin-bottom: -10px;
            font-weight: 500;
            color: white;                 
            text-align: center;  
            font-size:25px;
        }
        input[type = 'radio']
        {
            border: 0px;
            width: 8%;
            align: left;
            height:20px; width:20px;
        }
        #x 
        {
            font-size: 20px;
        }
        </style>
</head>

<body >
    <div class="container" style="width:500px;margin:auto;margin-top:0px;">

            <div class="card-body">
                <div  class = "user__title">Enter your information to Login</div>
                <form id="form" action="./serverlogin.php" method="POST" class="form">
                    <div class="from__group">
                        <input type="text" name="username" class="form__input" id="uname" placeholder="Enter username" required>

                    </div>
                    <br/>
                    <div class="form__group">

                        <input type="password" name="password" class="form__input" id="pass" placeholder="Enter Password" required>

                    </div><br>
                    <div class="form__group">

                    <input type="radio" id="conv" name="category" value="Convenor">
                    <label id = 'x' for="Convenor">Convenor</label><br>
                    <input type="radio" id="rev" name="category" value="Reviewer">
                    <label id = 'x' for="Reviewer">Reviewer</label><br>
                    <input type="radio" id="auth" name="category" value="Author">
                    <label id = 'x' for="Author">Author</label>

                    </div><br>



                    <button type="submit" class="btn" name="login"> Submit</button>
                    <br/>
                    

                    <div>
                    <div  class = "link">Don't have an account? <a href="registertest.php" >Register here</a></div>
                    </div><br>


                </form>

            </div>

    </div>

</body>

</html>