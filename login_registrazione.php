<!DOCTYPE html>
<html>
    <head>
        <script>
            function Invia()
            {
                if(document.getElementById("email").value=="" || document.getElementById("password").value=="")
                {
                    if(document.getElementById("password").value=="")
                    {
                        document.getElementById("password").style.background = "yellow";
                        document.getElementById("password").focus();
                    }
                    if(document.getElementById("email").value=="")
                    {
                        document.getElementById("email").style.background ="yellow";
                        document.getElementById("email").focus();
                    }
                }
                else
                    document.getElementById("form").submit();
                }
        </script>
    </head>
    <body>
        <?php
            include_once 'db.php';
            if(isset($_POST['email']))
            {
                echo("echo");
                $email = $_POST['email'];
                $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
                $data=date("Y-m-d");
                $controllo = $connectionToServerDB->query("insert into users(email,password) values ('$email,$password,$date');");
            
                if($controllo===true)
                {
                    echo("Registrazione eseguita con successo");
                    header("index.php");
                }
                else
                {
                    $result = $connectionToServerDB->query("select * from user WHERE email = " . $email);
                    if(mysqli_num_rows($result>0))
                    {
                        echo $result;
                    }
                }
            }
            else
            {
                echo ('<form method="post" action="' . $_SERVER["PHP_SELF"] . '" id="form">
                <span>Inserisci email:</span><input type="text" id="email" name="email"></input>
                <span>Inserisci password:</span><input type="password" id="password" name="password"></input>
                </form><button onclick="Invia()">Invia</button>');
            }
        ?>
    </body>
</html>