<?php
include "header2.php";
$id=$_GET['id'];
$sql="SELECT * FROM category WHERE cat_id='$id'";
$query=mysqli_query($config,$sql);
$row=mysqli_fetch_assoc($query);
?>
<head>
<style>
    .btn-primary-btn{
        background-color: blue;
    }
</style>
</head>
  <body>
    
  
    
    <div class="contanier">
    <h5 class="mb-2 text-gray-800">Category</h5>
        <div class="row">
            <div class="col-xl-6 col-lg-5">
                <div class="card">
                    <div class="card_header">
                        <h6 class="font-weight-bold text-primary mt-3 mb-4 ml-2">Edit Category</h6>
                        <div class="card_body">
                            <form action="" method="POST">
                                <div>
                                    <input type="text" name="cat_name" placeholder="Category Name" class="form-control " required value="<?= $row['cat_name']?>">
                                </div>
                                <div class="mb-3 mt-3">
                                    <input type="submit"  name="update_cat" value="Update" class="btn primary-btn" >
                                    <a href="category.php" class="btn secoundary-btn">Back</a>
                                </div>
                            </form>
                        </div>
                    
                    </div>
                </div>
            </div>
        </div>
</div>
</body>
<?php include "footer2.php";
if (isset($_POST['update_cat'])) {
    $cat_name=mysqli_real_escape_string($config,$_POST['cat_name']);
    $sql2="UPDATE category SET cat_name='{$cat_name}' WHERE cat_id='{$id}'";
    $update=mysqli_query($config,$sql2);
    
        if ($update) {
            $msg=['Category Has Been Updated','alert-success'];
            $_SESSION['msg']=$msg;
            header("location:category.php");
        }
        else{
            $msg=['Falied, Please try again','alert-danger'];
            $_SESSION['msg']=$msg;
            header("location:category.php");
        }
    }

?>