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

.logo {
    display: inline-block;
    vertical-align: middle;
    width: 300px;
}

.verticalCenter {
    display: flex;
    align-items: center;
    height: 50vh;
}

.horizontalCenter {
    text-align: center;
    width: 20vw;
    margin: auto;
}

.text {
    -webkit-border-radius: 20px;
    display: inline-block;
    vertical-align: middle;
    width: 20vw;
    height: 5vh;
    text-align: center;
    line-height: 5vh;
    font-size: 3vh;
    background-color: #FFFFFF;
    padding: 5px;
    margin: 10px;
    border: solid;
    box-sizing: content-box;
}

.inputField {
    width: 15vw;
    height: 3vh;
    line-height: 3vh;
}

.createButton {
    width: 6vw;
    height: 3.5vh;
    line-height: 3.5vh;
    cursor: pointer;
}
</style>

<?php 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
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

    $name = $_POST['name'];

    $sql = "INSERT INTO quizzes
        VALUES (null,'$name','0')";

    $conn->query($sql);

    $sql_2 = "SELECT id FROM quizzes ORDER BY ID DESC LIMIT 1";
    $result = $conn->query($sql_2);
    
    $row = $result->fetch_assoc();
    $id = $row["id"];

    $sql_3 = "CREATE TABLE ".$name.$id."(id INT AUTO_INCREMENT,
    question VARCHAR(200) NOT NULL,  
    option_correct VARCHAR(50) NOT NULL, option_2 VARCHAR(50) NOT NULL,
    option_3 VARCHAR(50) NOT NULL,
    option_4 VARCHAR(50) NOT NULL,
    primary key (id))";  
    
    if (!mysqli_query($conn, $sql_3)) {
        die("Could not create table: ". mysqli_error($conn));  
    }

    setcookie("quiz", $name.$id);

    $conn->close();

    header('Location: http://error404.42web.io/questionMaker.php');
}
?>

<html>
    <body>
        <div class="header">
            <div class="wrapper" style="left: 20px"><img class="logo" src="images/DiscendoLogoGrey.png"></div>
            <div class="wrapper" style="right: 20px"><button class="button button1" onclick='window.location.href = "index.html"'>Return Home</button></div>
        </div>

        <div class="verticalCenter"><div class="horizontalCenter">
        <form method="post" action="create.php">
            <div class="text">Name your new quiz:</div>
            <input class="text inputField" type="text" name="name" placeholder="Name">
                
        
            <input class="text createButton" type='submit' name='submit' value="Create">
        </form>
        </div></div>
    </body>
</html>