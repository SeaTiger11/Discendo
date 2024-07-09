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
    height: 90vh;
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
    width: 15vw;
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

.inputLabel {
    width: 11vw;
    height: 3vh;
    line-height: 3vh;
}

.inputField {
    width: 20vw;
    height: 2vh;
    line-height: 2vh;
    font-size: 2vh;
}

.createButton {
    width: 6vw;
    height: 3.5vh;
    line-height: 3.5vh;
    cursor: pointer;
}

.select {
    width: 3vw;
    height: 1vh;
    line-height: 1vh;
    cursor: pointer;
    font-size: 1vh;
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

    $question =  $_POST['question'];
    $option_correct = $_POST['correct-option'];
    $option_2 = $_POST['option-2'];
    $option_3 = $_POST['option-3'];
    $option_4= $_POST['option-4'];
    $db =  $_COOKIE['quiz'];

    $sql = "INSERT INTO $db VALUES
    (null,
    '$question',
    '$option_correct',
    '$option_2',
    '$option_3',
    '$option_4')";

    if ($conn->query($sql)){
        echo "Question added";
    }
    else{
        echo "insertion failed";
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

        <div class="verticalCenter"><div class="horizontalCenter">
        <div class="text">Create a question</div>
        <form action="">
            <select class="text select" name="question-types" id="question-type">
                <option value="mcq">MCQ</option>
            </select>
        </form>
        
        <form action="questionMaker.php" method="POST">
            <label class="text inputLabel" for="question">Question:</label>
            <input class="text inputField" type="text" name="question" placeholder="Enter your question here"><br><br>

            <label class="text inputLabel" for="option">Correct Option:</label>
            <input class="text inputField" type="text" name="correct-option" placeholder="Enter the correct answer here"><br>
            
            <label class="text inputLabel" for="option">Option 2:</label>
            <input class="text inputField" type="text" name="option-2" placeholder="Enter the 2nd option here"><br>

            <label class="text inputLabel" for="option">Option 3:</label>
            <input class="text inputField" type="text" name="option-3" placeholder="Enter the 3rd option here"><br>

            <label class="text inputLabel" for="option">Option 4:</label>
            <input class="text inputField" type="text" name="option-4" placeholder="Enter the 4th option here"><br>
            
            <input class="text createButton" type="submit" value="Create">
            <div class="text createButton" onclick='window.location.href = "index.html"'>Finish</div>
        </form>
        </div></div>
    </body>
</html>