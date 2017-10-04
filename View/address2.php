
<html>
    <title>address</title>
    <head>
        
        <script>
function showHint(str) {
    if (str.length == 0) { 
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("get", "searchuser2.php?key=" + str, true);
        xmlhttp.send();
    }
}
    </script>
   
</head>

    <body>
     <form>
         <input type="search" onkeyup="showHint(this.value)" >
    </form>
         <div id ="txtHint">result</div>
          
            
 
</body>

</html>


