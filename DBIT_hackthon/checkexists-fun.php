    <?php

  function checkexists($colname,$TBname,$insertingvalue)
       {
         include 'dbconnection.php';
         $cname=$colname;
         $tname=$TBname;
         $ivalue=$insertingvalue;
         $sql2="select $cname from $tname where $cname='$ivalue'";//
         $result2=mysqli_query($conn,$sql2);
            if($result2)
            {
              //echo"fetched:";
            }
            else
            {
                echo"error in checking".mysqli_error($conn);
                die();
            }
         $row=mysqli_num_rows($result2);
         return $row;
       }// end of function
?>