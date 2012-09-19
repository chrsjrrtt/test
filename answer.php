<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>Daniel Jarrett's Calulator Answer Page</title>
        <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
        <link rel="shortcut icon" href="images/default-avatar-profile.png" />
    </head>
    <body>
        <?php
        if(!isset($_POST['number1']) || !isset($_POST['number2'])) {
            print "Please enter a value for both numbers.";
        } elseif(!is_numeric($_POST['number1']) || !is_numeric($_POST['number2'])) {
            print "Please only enter numeric values.";
        } else {
            switch($_POST['action']) {
                case '+':
                    $answer = $_POST['number1'] + $_POST['number2'];
                    $symbol = "+";
                    break;

                case '-':
                    $answer = $_POST['number1'] - $_POST['number2'];
                    $symbol = "-";
                    break;

                case '*':
                    $answer = $_POST['number1'] * $_POST['number2'];
                    $symbol = "*";
                    break;

                case '/':
                    $answer = $_POST['number1'] / $_POST['number2'];
                    $symbol = "/";
                    break;

                default:
                    $symbol = null;
            }
            if($symbol != null) {
                print "<table border='1' style='background-color:#E1E4DA; color:blue; font-size: 16px;' cellpadding='5'>";
                print "<tr><td>". $_POST['number1']. "</td><td><span style='font-weight:bold;'>". $symbol. "</span></td><td>". $_POST['number2']. "</td></tr>";
                print "<tr><td colspan='3'><span style='font-weight:bold;'>=</span> ". $answer. "</td></tr></table>";
            } else {
                print "Invalid symbol";
            }
        }
        ?>
        <p>
            <img src="img/pic2.png" alt="another random pic i made" />
        </p>
    </body>
</html>