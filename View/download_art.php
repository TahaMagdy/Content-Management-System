<?php
include_once 'cheakSession.php';
?>

<html>
    <head>
        <title>
            download
        </title>
    </head>
    <body>
        <table>
            <form action="../controller/download_article.php" method="post">
                <tr>
                    <td> User_ID: </td>
                    <td> <input type="text" name="userid"> </td>
                </tr>
                
                <tr>
                    <td> Article_ID: </td>
                    <td> <input type="text" name="articleid"> </td>
                </tr>
                
                <tr>
                    <td> Date: </td>
                    <td> <input type="text" name="date"> </td>
                </tr>
                
                <tr>
                    <td colspan="2"> <input type="submit" name="submit" value="download"> </td>
                </tr>
                
                
            </form>
        </table>
        
    </body>
</html>
