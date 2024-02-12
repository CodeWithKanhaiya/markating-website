<?php include 'layout/header.php';
include '../dbconnect/config.php';
if($_SERVER['REQUEST_METHOD']=="POST"){
    if(isset($_POST['addproduct'])){
        if(empty($_POST['productname']) || $_POST['productname']==''){
            $pnameerr="*Please Enter your product name";
        }else if(empty($_POST['category']) || $_POST['category']==''){
            $caterr="*Please Enter your category";
        }else if(empty($_POST['brand']) || $_POST['brand']==''){
            $branderr="*Please Enter your brand";
        }else if(empty($_POST['price']) || $_POST['price']==''){
            $priceerr="*Please Enter your price";
        }else if((empty($_FILES['image']['name']) || $_FILES['image']['name']=='')){
            $imageerr="*Enter your image";
        }
        else{
            $imagename=$_FILES['image']['name'];
            $tmpname=$_FILES['image']['tmp_name'];
            move_uploaded_file($tmpname,'productimage/'.$imagename);
            $productname = $_POST['productname'];
            $cataegory = $_POST['category'];
            $brand = $_POST['brand'];
            $price = $_POST['price'];
            $description = $_POST['description'];
            $query = "INSERT INTO product(productname,category,brand,price,image,description) 
            values('$productname','$cataegory','$brand','$price','$imagename','$description')";
            $result = mysqli_query($con,$query);
            if($result){
                echo "<script>
                    alert('Your product addded successfully');
                    window.location.href='product.php';
                </script>";
            }else{
                echo "something went wrong".mysqli_error($con);
            }
        }
    }
}
?>
<div class="addproduct">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <h3 class="text-center">Addproduct</h3>
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label fw-bold">PoroductName:</label>
                        <input type="text" class="form-control" name="productname" placeholder="Enter your product name">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label  fw-bold">Product Image:</label>
                        <input type="file" name="image" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label  fw-bold">Category:</label>
                        <!-- <input type="text" class="form-control" name="category" placeholder="Enter your category name"> -->
                        <select name="category" id="">
                            <option>--select--</option>
                            <option value="Wooden">Wooden</option>
                            <option value="Fiber">Fiber</option>
                            <option value="plastic">plastic</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label  fw-bold">Brand:</label>
                        <!-- <input type="text" class="form-control" name="brand" placeholder="Enter your brand name"> -->
                        <select name="brand" id="">
                            <option>--select--</option>
                            <option value="sleepwell">sleepwell</option>
                            <option value="fiber">fiber</option>
                            <option value="plastic">plastic</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label  fw-bold">TotalPrice:</label>
                        <input type="text" class="form-control" name="price" placeholder="Enter your productprice name">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label  fw-bold">Description:</label>
                        <input type="text" class="form-control" name="description" placeholder="Enter your description name">
                    </div>
                    <input type="submit" class="btn btn-primary" name="addproduct" value="Add product">
                </form>
            </div>
        </div>
    </div>
</div>
<?php include 'layout/footer.php' ?>