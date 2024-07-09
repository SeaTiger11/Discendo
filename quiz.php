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
}

.optionWrapper {
    text-align: center;
    width: 30vw;
    margin:auto;
}

input[type=radio] {
    border: 0px;
    height: 2em;
}

</style>

<html>
    <body>
        <div class="header">
            <div class="wrapper" style="left: 20px"><img class="logo" src="images/DiscendoLogoGrey.png"></div>
            <div class="wrapper" style="right: 20px"><button class="button button1" onclick='window.location.href = "index.php"'>Return Home</button></div>
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

    echo $_COOKIE['Question'];

    if ($_COOKIE['Question'] >= $count) {
        echo "END OF QUIZ";
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

        echo '<h1>'.$question.'</h1>';

        $options = array($optioncorrect,$option2,$option3,$option4);
        shuffle($options);

        $optionElements = "";

        foreach ($options as $value) {
            if ($value == $optioncorrect) {
                $optionElements .= "<div class='text'><input type='radio' name ='option' id='correct'>$value</div>";
            }
            else {
                $optionElements .= "<div class='text'><input type='radio' name='option'>$value</div>";
            }
        }
    }

    $conn->close();
?>

<html>
    <body>
        <div class="optionWrapper">
            <form action="">
            <?php echo $optionElements ?>
            </form>

            <br><button id="submit">Verify</button>
            <button id="clear">Clear</button>
            <h4 id="message"> </h4>  
            <br><br>
            <a href="index.php">Go to index</a>
            <a onclick="IncrementQuestion(1)" href="#">Next question</a>
        </div>
    </body>
</html>

<script>
    let submit_btn = document.querySelector('#submit');
    let clear_btn = document.querySelector('#clear');
    let msg = document.getElementById("message")

    submit_btn.addEventListener('click',checkButton);
    clear_btn.addEventListener('click',clear);

    function checkButton() {    
        var getSelectedValue = document.querySelector(   
            'input[name="option"]:checked');   
            
    
        if (getSelectedValue == null){   
            msg.style.color = "red";
            msg.innerHTML = "You have not selected any option"; 
        }   
        else if (getSelectedValue.id == "correct"){
            msg.style.color = "green";
            msg.innerHTML = "Correct Answer!";
        }
        else{
            msg.style.color = "red";
            msg.innerHTML = "Incorrect Answer!";
        }
        
    }

    function clear() {
        var getSelectedValue = document.querySelector('input[name="option"]:checked');
        getSelectedValue.checked = false;
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