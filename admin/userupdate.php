<?php
include  '../dbconnect/config.php';
if(isset($_GET['update']));
$id=$_GET['id'];
$firstname=$_POST['first_name'];
$last=$_POST['last_name'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$role=$_POST['role'];
$password=$_POST['password'];
$query="update user set firstname='$firstname',lastname='$last',email='$email,phone='$phone,role='$role' where id=$id";
 $result=mysqli_query($con,$query);
 if($result){
    echo "<script>
            alert('your date update successfulley');
            window.location.href='userlist.php';
            </script>";
 }
    else{
        echo mysqli_error($con);

    }
    if(isset($_GET['id'])){
        $id =$_GET['id'];
        $select="select*from user where id=$id";
        $selectresult=mysqli_query($con.$select);
        if(mysqli_num_rows($selectresult)>0){
            $row=mysqli_fetch_assoc($selectresult);
            ?>
            <section class="contact-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-1 col-md-12 col-sm-12"></div>
                    <div class="col-lg-10 contact-info col-md-12 col-sm-12">
                        <h1 style="text-decoration:underline;">Sign Up</h1>
                        <form class="row g-3 mt-4 contact-form" action="<?php echo $_SERVER['
                        '];?>" method="post">
                            <div class="col-lg-6 col-md-6">
                                <label for="fname">First Name</label>
                                <input type="hidden" value="<? $row['id'];?>"name="id"/>
                                <input type="text" value="<?=$row['firlstname']?>"class="form-control news-field" name="first_name"  id="fname">
                                
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <label for="lname">Last Name</label>
                                <input type="text" value="<? $row['lastname']?> class="form-control news-field" name="last_name" id="lname">
                            </div>
                            <div class="col-lg-6 col-md-6">
                            <label for="email">Email</label>
                                <input type="email"value="<? $row['email']?>  class="form-control news-field" name="email" id="email">
                                
                            </div>
                            <div class="col-lg-6 col-md-6">
                            <label for="phone">Phone</label>
                                <input type="text"value="<? $row['phone']?> class="form-control news-field" name="phone" id="phone">

                            </div>
                            <div class="col-lg-6 col-md-6">
                                <label for="msg">Password</label>
                                <input type="password"value="<? $row['password']?> name="password" id="msg" class="form-control" />
                                
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <label for="msg">Role/label>
                                <select name="role">
                                <option <?php echo $row['role']=='user' ?'selected' : '';?>value="user">User</option>
                                <option <?php echo $row['role']=='admin' ?'selected' : '';?>value="admin">Admin</option>
                                
                            </div>
                             <div class="col-auto">
                                <input type="submit" name="update" class="btn  mb-3 px-4 rounded-pill text-white news-field bg-dark" value="Sign Up" style="background:#3b5d50;">
                            </div> 
                        </form>
                    </div>
        
                </div>
        
                <div class="col-lg-1 col-md-12 col-sm-12"></div>
            </div>
            </div>
        </section>
        <?php
        }}
        else{
            header('location:userlist.php');
        }
        ?>
