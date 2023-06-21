<?php
include "header2.php";
if (isset($_SESSION['user_data'])) {
   echo $author=$_SESSION['user_data']['0'];
}
$sql="SELECT * FROM category";
$query=mysqli_query($config,$sql);
?>
    <div class="contanier ml-3">
    <h5 class="mb-2 text-gray-800">Blogs</h5>
        <div class="row">
            <div class="col-xl-7 col-lg-5">
                <div class="card">
                    <div class="card_header">
                        <h6 class="font-weight-bold text-primary mt-3 mb-4 ml-2">Add New</h6>
                        <div class="card_body">
                            <form action="" method="POST" enctype="multipart/form_data">
                                <div>
                                    <input type="text" name="blog_title" placeholder="Title" class="form-control " required>
                                    <div class="mb-3">
                                        <label >Body/Discription</label>
                                                <textarea class="form-control" placeholder="Body" name="blog_body" row="2" id="blog" required ></textarea>
                                            <div class="mb-3">
                                                    <input type="file" name="blog_image" class="form-control" required>
                                            </div>
                                                <div class="mb-3">
                                                         <select class="form-control" required>
                                                                    <option value="">Select Categories</option>
                                                    <?php while($cats=mysqli_fetch_assoc($query)){ ?>
                                                    <option><?= $cats['cat_name']?></option>
                                                    <?php }?>
                                                    </select>
                                                </div>
                                         </div>
                                 </div>
                                <div class="mb-3 mt-3">
                                    <input type="submit"  name="add_blog" value="Add" class="btn primary-btn" >
                                    <a href="category.php" class="btn secoundary-btn">Back</a>
                                </div>
                            </form>
                        </div>
                    
                    </div>
                </div>
            </div>
        </div>
</div>
<?php include "footer2.php";
if (isset($_POST['add_blog'])) {
    $title=mysqli_real_escape_string($config,$_POST['blog_title']);
    $body=mysqli_real_escape_string($config,$_POST['blog_body']);
    $filename=$_FILES['blog_image']['name'];
    $tmp_name=$_FILES['blog_image']['tmp_name'];
    $size=$_FILES['blog_image']['size'];
    $image_ext=strtolower(pathinfo($filename,PATHINFO_EXTENSION));
    $allow_type=['jpg','png','jpeg'];
    $destination="images/".$filename;
    if (in_array($image_ext,$allow_type)) {
        if ($size<= 20000000) {
            move_uploaded_file($tmp_name,$destination);
        }
        else{
            echo "File should not be greater then 2MB";
        }
    }
    else{
        echo"file type not allowed";
    }
}
?>