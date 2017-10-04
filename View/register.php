<?php
include_once 'cheakSession.php';
?>
<html>
    <head>
        <title>
            register
        </title>
    </head>
    <body>
        <table>
            <form action="../controller/register_on.php" method="post">
                <tr>
                    <td> ID:</td>
                    <td> <input type="text" name="id"> </td>
                </tr>
                
                <tr>
                    <td> Type_ID:</td>
                    <td> <input type="text" name="typeid"> </td>
                </tr>
                
                <tr>
                    <td> Username:</td>
                    <td> <input type="text" name="username"> </td>
                </tr>
                
                <tr>
                    <td> Password:</td>
                    <td> <input type="password" name="password"> </td>
                </tr>
                
                <tr>
                    <td> First-Name:</td>
                    <td> <input type="text" name="firstname"> </td>
                </tr>
                
                <tr>
                    <td> Second-Name:</td>
                    <td> <input type="text" name="secondname"> </td>
                </tr>
                
                
                <tr>
                    <td> Last-Name:</td>
                    <td> <input type="text" name="lastname"> </td>
                </tr>
                
                <tr>
                    <td> Email:</td>
                    <td> <input type="text" name="email"> </td>
                </tr>
               
               <tr>
                    <td> Age:</td>
                    <td> <input type="text" name="age"> </td>
                </tr>
                
                <tr>
                    <td> Gender:</td>
                    <td> <input type="text" name="gender"> </td>
                </tr>
                
                <tr>
                    <td> SSN:</td>
                    <td> <input type="text" name="ssn"> </td>
                </tr>
                
                <tr>
                    <td> Birth-Day:</td>
                    <td> <input type="text" name="birthday"> </td>
                </tr>
                
                <tr>
                    <td> Birth-Month:</td>
                    <td> <input type="text" name="birthmonth"> </td>
                </tr>
                
                <tr>
                    <td> Birth-Year: </td>
                    <td> <input type="text" name="birthyear"> </td>
                </tr>
                
                <tr>
                    <td> Join-Date:</td>
                    <td> <input type="text" name="joindate"> </td>
                </tr>
                
                <tr>
                    <td colspan="2"> <input type="submit" name="submit" value="register"> </td>
                </tr>
            </form>
        </table>
    </body>
</html>
