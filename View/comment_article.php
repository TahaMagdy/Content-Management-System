
<html>
    <head>
        <title>
            comment on article
        </title>
    </head>
    <body>
        <table>
            <form action="../controller/comment_article.php" method="post">
                <tr>
                    <td> User_ID:</td>
                    <td> <input type="text" name="userid"> </td>
                </tr>
                
                 <tr>
                    <td> Comment_Date:</td>
                    <td> <input type="text" name="commentdate"> </td>
                </tr>
                
                 <tr>
                    <td> Content:</td>
                    <td> <input type="text" name="content"> </td>
                </tr>
                
                 <tr>
                    <td> State:</td>
                    <td> <input type="text" name="state"> </td>
                </tr>
                
                 <tr>
                    <td> Article_ID:</td>
                    <td> <input type="text" name="articleid"> </td>
                </tr>
                
                 <tr>
                     <td colspan="2"> <input type="submit" name="do_comment" value="comment"> </td>
                </tr>
                
            </form>
        </table>
        
    </body>
</html>

