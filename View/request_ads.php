<?php
include_once 'cheakSession.php';
?>
<html>
    <head>
        <title>
            request_ads
        </title>
    </head>
    <body>
        <table>
            <form action="../controller/request_advertise.php" method="post">
                <tr>
                    <td> Adv_ID:</td>
                    <td> <input type="text" name="advid" > </td>
                </tr>
                
                <tr>
                    <td>Content:</td>
                    <td> <input type="text" name="content" > </td>
                </tr>
                
                <tr>
                    <td> Attachment:</td>
                    <td> <input type="text" name="attachment" > </td>
                </tr>
                
                <tr>
                    <td>Category:</td>
                    <td> <input type="text" name="category" > </td>
                </tr>
                
                <tr>
                    <td>State:</td>
                    <td> <input type="text" name="state" > </td>
                </tr>
                
                <tr>
                    <td>Period:</td>
                    <td> <input type="text" name="period" > </td>
                </tr>
                
                <tr>
                    <td>Renew_Number:</td>
                    <td> <input type="text" name="renewnumber" > </td>
                </tr>
                
                <tr>
                    <td>Priority:</td>
                    <td> <input type="text" name="priority" > </td>
                </tr>
                
                <tr>
                    <td colspan="2"> <input type="submit" name="submit" value="advertise" > </td>
                </tr>
            </form>
        </table>
    </body>
</html>
