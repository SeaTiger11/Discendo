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
    height: 100px;
    box-shadow: 0px 2px 5px black;
}

.wrapper {
    line-height: 15px;
    position: absolute;
    right: 5px;
    top: 50%;
    transform: translateY(-50%);
}

nav ul {
    margin:auto;
    height:80%; 
    width:70%;
    overflow:hidden; 
    overflow-y:scroll;
    text-align: center;
}

::-webkit-scrollbar {
    width: 0;  /* Remove scrollbar space */
    background: transparent;  /* Optional: just make scrollbar invisible */
}
/* Optional: show position indicator in red */
::-webkit-scrollbar-thumb {
    background: #FF0000;
}

.button {
    border: none;
    color: white;
    text-align: center;
    text-decoration: none;
    font-size: 16px;
    transition-duration: 0.4s;
    cursor: pointer;
    vertical-align: middle;
    border-radius: 12px;
    background-color: #000000; 
    color: white;
    margin: 4px 2px;
}

.button:hover {
    background-color: #525252;
}

.button1 {
    padding: 16px 32px;
}

.logo {
    display: inline-block;
    vertical-align: middle;
    width: 300px;
}

.text {
    -webkit-border-radius: 20px;
    display: inline-block;
    vertical-align: middle;
    width: 500px;
    text-align: center;
    background-color: #FFFFFF;
    padding: 5px;
    margin: 10px;
    cursor: pointer;
}

.button2 {
    display: inline-block;
    padding: 8px 16px;
}

</style>

<?php
    $dmServername = "sql202.infinityfree.com";
    $dbUsername = "if0_36807122";
    $dbPassword = "rpag0005";
    $dbname = "if0_36807122_quizzes";

    // Create connection
    $conn = new mysqli($dmServername, $dbUsername, $dbPassword, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $check = "SELECT * FROM quizzes";
    
    $result = $conn->query($check);

    $quizzes = "";
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $quizzes .= '<div class="text" onclick="document.cookie = \'Quiz='.$row["name"].$row["id"].'\'; document.cookie = \'Question=0\'; window.location.href = \'quiz.php\';">Likes: '.$row["likes"].'<br>'.$row["name"].'</div>';
        }
    }
    else {
        echo "0 results";
    }

    $conn->close();
?>

<html>
    <body>
        <div class="header">
            <div class="wrapper" style="left: 20px"><img class="logo" src="images/DiscendoLogoGrey.png"></div>
            <div class="wrapper" style="right: 20px"><button class="button button1" onclick='window.location.href = "index.php"'>Return Home</button></div>
        </div>
        
        <nav>
            <ul>
                <?php echo $quizzes; ?>
            </ul>
        </nav>
    </body>
</html>