<?php require_once '../config/dbConnect.php'; ?>
         
<?php 

$sql = "SELECT * 
        FROM category_tbl 
        ORDER BY category_id ASC" ;

$counter = 1;
$getcategorys = mysqli_query($connectionString,$sql)or die(mysqli_error($connectionString));

while($eachcategory = mysqli_fetch_array($getcategorys)){  
    $get_category_Id = $eachcategory['category_id'];
    $get_category_name = $eachcategory['category_name'];
    $get_category_timestamp = $eachcategory['category_timestamp'];
   ?>
    <tr>
    <td><b><?php echo $counter;   ?></b></td>
    <td><?php echo $get_category_name  ?></td>
    <td><?php echo $get_category_timestamp  ?></td>                                                                           
    <td>
        <button type="button" class="btn btn-outline-success btn-sm btn-edit" id="<?php echo $get_category_Id  ?>">Edit</button>
        <button type="button" class="btn btn-outline-danger btn-sm btn-delete" id="<?php echo $get_category_Id  ?>">Delete</button>
    </td>
</tr>


<?php $counter++; }
?>
                                       