<?php
    include 'header\main-header.php';
?>

<!DOCTYPE html>
<html>  
<head>  
        <title>Selecting or deselecting all CheckBoxes</title>  
        <script type="text/javascript">

            function chekAll(ele){
                var checkboxes = document.getElementsByName('chk');

                if (ele.checked) {
                    for(var i=0; i<checkboxes.length; i++){  
                        if(checkboxes[i].type=='checkbox')  
                            checkboxes[i].checked=true;  
                    }
                } else {
                    for(var i=0; i<checkboxes.length; i++){  
                        if(checkboxes[i].type=='checkbox')  
                            checkboxes[i].checked=false;   
                        }
                }

            }      
        </script>  
    </head>  
<body>  
    <h3>Select or Deselect all or some checkboxes as per your mood:</h3>  
    <input type="checkbox" name="chk" value="Smile">Smile<br>  
    <input type="checkbox" name="chk" value="Cry">Cry<br>  
    <input type="checkbox" name="chk" value="Laugh">Laugh<br>  
    <input type="checkbox" name="chk" value="Angry">Angry<br>  
     <br>  
    <input type="checkbox" onchange='chekAll(this)' value="Select All"/>  
      </body>  
</html>  