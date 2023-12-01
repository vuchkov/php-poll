<?php

session_start();

require_once 'config.php';

/* User Authentication */

// Session.
echo $_SESSION['session_id'] = session_id();
//echo $_SESSION['user_id'] = mysqli_insert_id();

// Cookie.
setcookie("user_id", '123', time()+3600); // Expire in 1 hour.
//echo $_COOKIE['user_id'];

// Device.
$user_agent = $_SERVER['HTTP_USER_AGENT'];
echo '<br>Device: ' . $user_agent;

// IP.

/* End - User Authentication */
?>
<html>
<head>
    <script>
        function getVote(int) {
            var xmlhttp=new XMLHttpRequest();
            xmlhttp.onreadystatechange=function() {
                if (this.readyState==4 && this.status==200) {
                    document.getElementById("poll").innerHTML=this.responseText;
                }
            }
            xmlhttp.open("GET","poll_vote.php?vote="+int,true);
            xmlhttp.send();
        }
    </script>
</head>
<body>

<div id="poll">
    <h3>Do you like PHP and AJAX so far?</h3>
    <form>
        Yes: <input type="radio" name="vote" value="0" onclick="getVote(this.value)"><br>
        No: <input type="radio" name="vote" value="1" onclick="getVote(this.value)">
    </form>
</div>

</body>
</html>