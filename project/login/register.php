<?php
    include("../signup.php");
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
    <link rel="stylesheet" href="">

    <!-- main.js -->
    <script src=""></script>

    <!-- Favicon and Tab Head -->
    <title>Sign Up | NAME</title>
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
        <div class="signup" id="mySignUp">
            <form action="../signup.php" method="POST">
            <h3>Sign In</h3><br><br>
                <div class="form" id="myForm">
                    <!-- First Name -->
                    <label for="fname">First Namee</labl><br>
                    <input type="text" placeholder="Jane" name="fname" required><br><br>
                    <!-- Last Name -->
                    <label for="lname">Last Name</labl><br>
                    <input type="text" placeholder="Doe" name="lname" required><br><br>
                    <!-- College --> 
                    <label for="college">College</labl><br>
                    <input type="text" placeholder="myCollege" name="college" required><br><br>
                    <!-- Major -->
                    <label for="major">Major</labl><br>
                    <input type="text" placeholder="myMajor" name="major" required><br><br>
                    <!-- Get Login Email -->
                    <label for="email">Email</label><br>
                    <input type="email" placeholder="myemail@email.com" name="email"
                    pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required><br><br>
                    <!-- Get Password -->
                    <label for="password">Set Password</label><br>
                    <input type="password" placeholder="mypassword" name="password" 
                    required><br><br>
                    <label for="password">Re-Enter Password</label><br>
                    <input type="password" placeholder="mypassword" name="confirm" 
                    required><br><br>
                    <!-- Sign Up -->
                    <input type="submit" class="submit" name="signUp" value="Sign Up"
		                onclick="window.location.href = '../login.php';"><br>
                </div>
            </form>
        </div>
    </main>
    
</body>

<footer>
        <div class="footer" id="myFooter">
                <!-- <span class="text-muted">&copy; OUR NAMES, 2019 |  
                    Terms Of Use  |  Privacy Statement</span> -->
        </div>
</footer>

</html>
