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
    width: 25vw;
    height: 5vh;
    text-align: center;
    line-height: 5vh;
    font-size: 3vh;
    background-color: #FFFFFF;
    padding: 5px;
    margin: 10px;
    cursor: pointer;
    border: solid;
}

.question {
    font-size: 5vh;
    width: 40vw;
    height: 7vh;
    line-height: 7vh;
    margin: 3vh;
}

.quizButton {
    width: 10vw;
    height: 3.5vh;
    line-height: 3.5vh;
}

.pageSelectors {
    width: 3.5vh;
    height: 3.5vh;
    line-height: 3.5vh;
}

.verticalCenter {
    display: flex;
    align-items: center;
    height: 85vh;
}

.optionWrapper {
    text-align: center;
    width: 50vw;
    margin:auto;
}

input[type=radio] {
    display: none;
}

.text:has(input[type=radio]:checked) {
    background-color: #D7D7D7;
}

</style>

<html>
    <body>
        <div class="header">
            <div class="wrapper" style="left: 20px"><img class="logo" src="images/DiscendoLogoGrey.png"></div>
            <div class="wrapper" style="right: 20px"><button class="button button1" onclick='window.location.href = "index.html"'>Return Home</button></div>
        </div>
    </body>
</html>

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

    $sql = "SELECT COUNT(id) FROM ".$_COOKIE['Quiz'];

    $result = $conn->query($sql);
    $count = ($result->fetch_assoc())["COUNT(id)"];

    if ($_COOKIE['Question'] >= $count) {
        header( "Location: http://error404.42web.io/" );
    }

    else {
        $sql = "SELECT * FROM ".$_COOKIE['Quiz']."
        ORDER BY id
        LIMIT 1
        OFFSET ".$_COOKIE['Question'];

        $result = $conn->query($sql);

        $row = $result->fetch_assoc();

        $id = $row["id"];
        $question = $row["question"];

        $optioncorrect = $row["option_correct"];
        $option2 = $row["option_2"];
        $option3 = $row["option_3"];
        $option4 = $row["option_4"];

        $optionElements = '<div class="text question">'.$question.'</div>';

        $options = array($optioncorrect,$option2,$option3,$option4);
        shuffle($options);

        $optionCount = 0;
        foreach ($options as $value) {
            if ($value == $optioncorrect) {
                $optionElements .= "<label for='correct' class='text'><input type='radio' name ='option' id='correct'>$value</label>";
            }
            else {
                $optionElements .= "<label for='wrong".$optionCount."' class='text'><input type='radio' name='option' id='wrong".$optionCount++."'>$value</label>";
            }
        }
    }

    $conn->close();
?>

<html>
    <body>
        <div class="verticalCenter">
        <div class="optionWrapper">
            <form action="">
            <?php echo $optionElements ?>
            </form>

            <br>
            <div class="text quizButton" onclick="Reveal()">Reveal</div>
            <div class="text quizButton" onclick="Clear()">Clear</div>
            <br>
            <div class="text pageSelectors" onclick="IncrementQuestion(-1)"><</div>
            <div class="text pageSelectors"><?php echo $_COOKIE['Question'] ?></div>
            <div class="text pageSelectors" onclick="IncrementQuestion(1)">></div>
        </div>
        </div>
    </body>
</html>

<script>
    function Reveal() {
        document.getElementById("correct").parentElement.style.backgroundColor = "#DEF9C4";
    }

    function Clear() {
        document.querySelector('input[name="option"]:checked').checked = false;
        document.getElementById("correct").parentElement.style.backgroundColor = "#FFFFFF";
    }

    function IncrementQuestion(amount) {
        let name = "Question=";
        let decodedCookie = decodeURIComponent(document.cookie);
        let ca = decodedCookie.split(';');
        for(let i = 0; i <ca.length; i++) {
            let c = ca[i];
            while (c.charAt(0) == ' ') {
                c = c.substring(1);
            }
            if (c.indexOf(name) == 0) {
                document.cookie = "Question="+(parseInt(c.substring(name.length, c.length)) + amount);
                location.reload();
            }
        }
    }
</script>