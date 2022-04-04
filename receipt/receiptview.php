<?php 

   $conn = mysqli_connect("127.0.0.1:3307", "root", "", "receipt");
       if ($conn->connect_error) {
        die("Connection Failed:". $conn->connect_error);
        }


        $sql = "SELECT * FROM pledgetable ORDER BY id DESC";
        $result = $conn-> query($sql);
                            
        if ($result-> num_rows > 0) {
        while ($row = $result-> fetch_array())
 {?>

<script src="jquery/jquery-3.6.0.min.js"></script>
 <script>
     function activate(element){

     }

     function updateValue(element,column,id){
               var value = element.innerText 
               
               $.ajax({
                   url:'backend.php',
                   type:'POST',
                   data:{
                       value: value,
                       column: column,
                       id: id
                   },
                    success: function(php_result){
                        console.log(php_result);
                    }
               });
     }
 </script>
    <tr>
        <td contenteditable="true"><?php echo $row['serialno'];?></td>
        <td contenteditable="true" onBlur="updateValue(this)"><?php echo $row['pdate'];?></td>
        <td contenteditable="true" onBlur="updateValue(this,'pname','<?php echo $row['id']; ?>')" onClick="activate(this)"><?php echo $row['pname'];?></td>
        <td contenteditable="true" onBlur="updateValue(this,'pamount','<?php echo  $row['id']; ?>')" onClick="activate(this)"><?php echo number_format($row['pamount']);?></td>
        <td contenteditable="true" onBlur="updateValue(this,'paid','<?php echo  $row['id']; ?>')" onClick="activate(this)"><?php echo number_format($row['paid']);?></td>
        <td contenteditable="true" onBlur="updateValue(this,'balance','<?php echo  $row['id']; ?>')" onClick="activate(this)"><?php echo number_format($row['balance']);?></td>
        <td contenteditable="true" onBlur="updateValue(this,'payment','<?php echo  $row['id']; ?>')" onClick="activate(this)"><?php echo $row['payment'];?></td>
        <td contenteditable="true" onBlur="updateValue(this,'contact','<?php echo  $row['id']; ?>')" onClick="activate(this)"><?php echo $row['contact'];?></td>
        <td><a href="generate.php?id=<?php echo $row['id']; ?>" class="generate">RECEIPT</a></td>
    </tr>
    <?php 
        }
        echo "</table>";
        }else {
        echo " ";
        }
        $conn-> close();

      
?>    