<?php
    include("signin.php");
    valLogin();
?>

<!DOCTYPE html>
<html lang="em">

<head>
    <!-- meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1,
        shrink-to-fit=no">
    <!-- main.css -->
    <link rel="stylesheet" href="main.css">

    <!-- main.js -->
    <script src="checkLogin.js"></script>

    <!-- Favicon and Tab Head -->
    <title>Sign In | NAME</title>
</head>

<body>
    <header>
	    <div class="header" id="myHeader">
            <h1>NAME</h1>
        </div>
    </header>

    <main>
	<!-- Background Image -->
        <!-- Sign In Form -->
        <div class="signin" id="mySignIn">
            <form action="signin.php" method="POST">
            <h3>Sign In</h3><br><br>
                <div class="form" id="myForm">
                    <!-- Login Email -->
                    <label for="email">Email</label><br>
                    <input type="email" id="email" placeholder="myemail@email.com" name="email"
                    pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required><br><br>
                    <!-- Password -->
                    <label for="password">Password</label><br>
                    <input type="password" id="password" placeholder="mypassword" name="password" 
                    required><br><br>
                    <!-- Sign In -->
                    <input type="submit" class="submit" name="signIn" value="Sign In"
			onclick="checkEmpty();"><br><br>
		    <input type="submit" class="submit" name="signUp" value="Sign Up"
			onclick="window.location.href = 'register.php';"><br><br>
		</div>
            </form>
        </div>
    </main>
    
</body>

<footer>
        <div class="footer" id="myFooter">
                <span class="text-muted">&copy; OUR NAMES, 2019 |  
                    Terms Of Use  |  Privacy Statement </span>
        </div>
</footer>

</html>
