<style>
body {
    background: #1eb68a;
    font-family: Arial;
    margin: 0;
}

.header {
    padding: 10px;
    background: #D2D2CF;
    color: black;
    font-size: 30px;
    position: sticky;
    top: 0;
    height: 10vh;
    box-shadow: 0px 2px 5px black;
}

.wrapper {
    line-height: 15px;
    position: absolute;
    right: 5px;
    top: 50%;
    transform: translateY(-50%);
}

.button {
    border: none;
    color: white;
    padding: 16px 32px;
    text-align: center;
    text-decoration: none;
    font-size: 16px;
    margin: 4px 2px;
    transition-duration: 0.4s;
    cursor: pointer;
    vertical-align: middle;
    border-radius: 12px;
}

.button1 {
    background-color: #000000; 
    color: white;
}

.button1:hover {
    background-color: #525252;
}

img {
    display: inline-block;
    vertical-align: middle;
    width: 300px;
}

.text {
    display: inline-block;
    vertical-align: middle;
    width: calc(100% - 100px);
}

.formFields{
    -webkit-border-radius: 20px;
    border: none;
    color: #000000;
    width: 400px;
    height: 50px;
    padding-left: 10px;
}
    
.formFields:focus {
    outline: none;
}

.formWrapper {
    position:absolute;
    top:30%;
    right:0;
    left:0;
}

.error {
    -webkit-border-radius: 20px;
    color: #FFFFFF;
    background-color: #FF0000;
    padding: 15px;
}

.forgotButton {
    text-decoration-line: underline;
    border: none;
    background: none;
    cursor: pointer;
}

</style>

<script>
    let name = "Email=";
    let decodedCookie = decodeURIComponent(document.cookie);
    let ca = decodedCookie.split(';');
    for(let i = 0; i <ca.length; i++) {
        let c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            LogIn(c.substring(name.length, c.length));
        }
    }

    function LogIn(email) {
        const d = new Date();
        d.setTime(d.getTime() + (24*60*60*1000)); //Set to expire in 1 day
        let expires = "expires="+ d.toUTCString();
        document.cookie = "Email=" + email + ";" + expires + ";";
        document.location.href = "index.html";
    }
</script>

<?php
    $SERVER_HOST_NAME = "sql202.infinityfree.com";
    $DATABASE_USERNAME = "if0_36807122";
    $DATABASE_PASSWORD = "rpag0005";
    $DATABASE_NAME = "if0_36807122_userlogins";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST["Email"];
        $password = $_POST["Password"];

        // Create connection
        $conn = new mysqli($SERVER_HOST_NAME, $DATABASE_USERNAME, $DATABASE_PASSWORD, $DATABASE_NAME);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
            $error = '<span class="error">Connection Failed</span><br><br><br>';
        }

        $fullCheck = "SELECT * FROM `Username/Password` WHERE `Email` LIKE '" . $email . "' AND `Password` LIKE '" . $password . "'";
        $emailOnlyCheck = "SELECT * FROM `Username/Password` WHERE `Email` LIKE '" . $email . "'";
        
        if ($conn->query($fullCheck)->num_rows > 0) {
            echo '<script>LogIn("' . $email . '");</script>';
        }
        else if ($conn->query($emailOnlyCheck)->num_rows > 0) {
            $error = '<span class="error">Password is incorrect</span><br><br><br>';
        }
        else {
            $error = '<span class="error">Email is incorrect</span><br><br><br>';
        }

        $conn->close();
    }
?>

<html>
    <body>
        <div class="header">
            <div class="wrapper" style="left: 20px"><img class="logo" src="images/DiscendoLogoGrey.png"></div>
            <div class="wrapper" style="right: 20px"><button class="button button1" onclick='window.location.href = "index.html"'>Return Home</button></div>
        </div>

        <div class="formWrapper">
            <form action="login.php" method="post" align = "center">
                <?php echo $error;?>
                <input type = "email" name = "Email" placeholder = "Email" class = "formFields" required><br><br><br>
                <input type = "text" name = "Password" placeholder = "Password" class = "formFields" required><br>
                <button class = "forgotButton" onclick='window.location.href = ""'>Forgot Password</button><br><br>
                <input type = "submit" class = "button button1">
            </form>
        </div>
    </body>
</html>