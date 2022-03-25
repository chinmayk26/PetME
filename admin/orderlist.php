<?php
session_start();
include("../db.php");
error_reporting(0);
if(isset($_GET['action']) && $_GET['action']!="" && $_GET['action']=='delete')
{
$product_id=$_GET['product_id'];
///////picture delete/////////
$result=mysqli_query($con,"select product_image from products where product_id='$product_id'")
or die("query is incorrect...");

list($picture)=mysqli_fetch_array($result);
$path="../product_images/$picture";

if(file_exists($path)==true)
{
  unlink($path);
}
else
{}
/*this is delet query*/
mysqli_query($con,"delete from products where product_id='$product_id'")or die("query is incorrect...");
}

///pagination

$page=$_GET['page'];

if($page=="" || $page=="1")
{
$page1=0;	
}
else
{
$page1=($page*10)-10;	
} 
include "sidenav.php";
include "topheader.php";
?>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
        
        
         <div class="col-md-14">
            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title"> User Details</h4>
                
              </div>
              <div class="card-body">
                <div class="table-responsive ps">
                  <table class="table tablesorter " id="page1">
                    <thead class=" text-primary">
                      <tr><th>User ID</th><th>Name</th><th>Email</th><th>Address</th><th>City</th><th>State</th><th>Payment Amount</th></tr></thead>
                    <tbody>
                      <?php 

                        $result=mysqli_query($con,"select order_id, f_name, email, address, city, state, total_amt from orders_info  where  order_id=1 or order_id=2 or order_id=3 or order_id=4 or order_id=5 or order_id=6 or order_id=7 or order_id=8 or order_id=9 or order_id=10 or order_id=11 or order_id=12 or order_id=13 or order_id=14 or order_id=15 or order_id=16 or order_id=17 or order_id=18 or order_id=19 or order_id=20 or order_id=21 or order_id=22 or order_id=23 or order_id=24 or order_id=25 Limit $page1,12")or die ("query 1 incorrect.....");
                        
                        while(list($order_id, $fname, $email, $address, $city, $state, $total_amt)=mysqli_fetch_array($result))
                        {
                        echo "<tr><td> $order_id </td><td>$fname</td><td>$email</td><td>$address</td><td>$city</td><td>$state</td>
                        <td>$total_amt</td>
                        <td>

                      
                        </td></tr>";
                        }

                        ?>
                    </tbody>
                  </table><br><br>

                  <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div></div></div>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">Product Ordered</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive ps">
                  <table class="table table-hover tablesorter " id="">
                    <thead class=" text-primary">
                        <tr><th>Product ID</th><th>User ID</th><th>Quantity</th><th>Product Amount</th>
                    </tr></thead>
                    <tbody>
                      <?php 
                      $result1=mysqli_query($con,"select product_id, order_id, qty, amt from order_products where product_id=80 or  product_id=81 or  product_id=82 or  product_id=83 or product_id=84 or product_id=85 or product_id=86 or product_id=87 or product_id=88 or product_id=89 or product_id=90 or product_id=91 or product_id=92 or product_id=93 or product_id=94 or product_id=95 or product_id=96 or product_id=97 or product_id=98 or product_id=99 Limit $page1,12")or die ("query 1 incorrect.....");

                        $i=1;
                          while(list($product_id,  $order_id, $qty, $amt)=mysqli_fetch_array($result1))
                          {
                        echo "<tr><td>$product_id</td><td>$order_id</td><td>$qty</td><td>$amt</td>
                        <td>

                      
                        </td></tr>";
                        }
                        ?>
                    </tbody>
                  </table>


                <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div></div></div>
              </div>
            </div>
            <nav aria-label="Page navigation example">
              <ul class="pagination">
                <li class="page-item">
                  <a class="page-link" href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                    <span class="sr-only">Previous</span>
                  </a>
                </li>
                 <?php 
//counting paging

                $paging=mysqli_query($con,"select order_id, fname, email, address, city, state, total_amt from order_info");
                $count=mysqli_num_rows($paging);

                $a=$count/10;
                $a=ceil($a);
                
                for($b=1; $b<=$a;$b++)
                {
                ?> 
                <li class="page-item"><a class="page-link" href="orderlist.php?page=<?php echo $b;?>"><?php echo $b." ";?></a></li>
                <?php	
}
?>
                <li class="page-item">
                  <a class="page-link" href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                    <span class="sr-only">Next</span>
                  </a>
                </li>
              </ul>
            </nav>
            
           

          </div>
          
          
        </div>
      </div>
      <?php
include "footer.php";
?>