<!DOCTYPE html>
<html lang="en">
<head>
<title>Matrix Admin</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="css/bootstrap.min.css" />
<link rel="stylesheet" href="css/bootstrap-responsive.min.css" />
<link rel="stylesheet" href="css/uniform.css" />
<link rel="stylesheet" href="css/select2.css" />
<link rel="stylesheet" href="css/matrix-style.css" />
<link rel="stylesheet" href="css/matrix-media.css" />
<link href="font-awesome/css/font-awesome.css" rel="stylesheet" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
</head>
<body>

<!--Header-part-->
<div id="header">
  <h1><a href="dashboard.html">Matrix Admin</a></h1>
</div>
<!--close-Header-part--> 

<!--top-Header-menu-->
<div id="user-nav" class="navbar navbar-inverse">
  <ul class="nav">
    <li  class="dropdown" id="profile-messages" ><a title="" href="#" data-toggle="dropdown" data-target="#profile-messages" class="dropdown-toggle"><i class="icon icon-user"></i>  <span class="text">Welcome User</span><b class="caret"></b></a>
      <ul class="dropdown-menu">
        <li><a href="#"><i class="icon-user"></i> My Profile</a></li>
        <li class="divider"></li>
        <li><a href="#"><i class="icon-check"></i> My Tasks</a></li>
        <li class="divider"></li>
        <li><a href="login.html"><i class="icon-key"></i> Log Out</a></li>
      </ul>
    </li>
    <li class="dropdown" id="menu-messages"><a href="#" data-toggle="dropdown" data-target="#menu-messages" class="dropdown-toggle"><i class="icon icon-envelope"></i> <span class="text">Messages</span> <span class="label label-important">5</span> <b class="caret"></b></a>
      <ul class="dropdown-menu">
        <li><a class="sAdd" title="" href="#"><i class="icon-plus"></i> new message</a></li>
        <li class="divider"></li>
        <li><a class="sInbox" title="" href="#"><i class="icon-envelope"></i> inbox</a></li>
        <li class="divider"></li>
        <li><a class="sOutbox" title="" href="#"><i class="icon-arrow-up"></i> outbox</a></li>
        <li class="divider"></li>
        <li><a class="sTrash" title="" href="#"><i class="icon-trash"></i> trash</a></li>
      </ul>
    </li>
    <li class=""><a title="" href="#"><i class="icon icon-cog"></i> <span class="text">Settings</span></a></li>
    <li class=""><a title="" href="login.html"><i class="icon icon-share-alt"></i> <span class="text">Logout</span></a></li>
  </ul>
</div>

<!--start-top-serch-->
<div id="search">
  <input type="text" placeholder="Search here..."/>
  <button type="submit" class="tip-bottom" title="Search"><i class="icon-search icon-white"></i></button>
</div>
<!--close-top-serch--> 

<!--sidebar-menu-->

<div id="sidebar"> <a href="#" class="visible-phone"><i class="icon icon-th"></i>Category</a>
  <ul>
    <li><a href="#"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li><a href="#"><i class="icon icon-inbox"></i> <span>Categories</span></a> </li>
    <li class="active"><a href="#"><i class="icon icon-th"></i> <span>Products</span></a></li>
    <li><a href="#"><i class="icon icon-inbox"></i> <span>Customer</span></a> </li>
    <li class="active"><a href="#"><i class="icon icon-th"></i> <span>Users</span></a></li>
    <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Product Operator</span> <span class="label label-important">3</span></a>
      <ul>
        <li><a href="?action=add_new_product">Add New</a></li>
        <li><a href="?action=list_products">Search</a></li>
        <li><a href="#">Edit</a></li>
      </ul>
    </li>
    <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Category Operator</span> <span class="label label-important">3</span></a>
      <ul>
        <li><a href="#">Add New</a></li>
        <li><a href="#">Search</a></li>
        <li><a href="#">Edit</a></li>
      </ul>
    </li>


 
    <li class="content"> <span>Monthly Bandwidth Transfer</span>
      <div class="progress progress-mini progress-danger active progress-striped">
        <div style="width: 77%;" class="bar"></div>
      </div>
      <span class="percent">77%</span>
      <div class="stat">21419.94 / 14000 MB</div>
    </li>
    <li class="content"> <span>Disk Space Usage</span>
      <div class="progress progress-mini active progress-striped">
        <div style="width: 87%;" class="bar"></div>
      </div>
      <span class="percent">87%</span>
      <div class="stat">604.44 / 4000 MB</div>
    </li>
  </ul>
</div>
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Product</a> </div>
    <h1>Product</h1>
  </div>
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">  
          <div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>          
           <a href="?action=add_new_product"> <button type="button" class="btn btn-default" style="margin-top:2px;">Add new</button>
            </a>
            <h5>List of products</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>ProductID</th>
                  <th>ProductName</th>
                  <th>CategoryID</th>
                  <th>Price</th>
                  <th>Description</th>
                  <th>Image</th>
                  <th>Create_at</th>
                  <th>By_user</th>
                  <th colspan="2">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($products as $key => $value): ?>
                <tr class="odd gradeX">
                  <td><?php echo $value['productid']; ?></td>
                  <td><?php echo $value['productname']; ?></td>
                  <td><?php echo $value['categoryid']; ?></td>
                  <td><?php echo $value['price']; ?></td>
                  <td><?php echo $value['description']; ?></td>
                  <td><img src="images/products/<?php echo $value['image']; ?>" alt="" height="70"></td>             
                  <td class="center"> <?php echo $value['create_at']; ?></td>
                  <td class="center"><?php echo $value['by_user']; ?></td>
                  <td><a href="?action=edit_product&productid=<?php echo $value['productid'];?>">Edit</a></td>
                  <td><a href="?action=delete_product&productid=<?php echo $value['productid'];?>">Delete</a></td>
                </tr>
              <?php endforeach; ?>
                
              </tbody>
            </table>
          </div>
        </div>
        
      </div>
    </div>
  </div>
</div>
<!--Footer-part-->
<div class="row-fluid">
  <div id="footer" class="span12"> 2013 &copy; Matrix Admin. Brought to you by <a href="http://themedesigner.in">Themedesigner.in</a> </div>
</div>
<!--end-Footer-part-->
<script src="js/jquery.min.js"></script> 
<script src="js/jquery.ui.custom.js"></script> 
<script src="js/bootstrap.min.js"></script> 
<script src="js/jquery.uniform.js"></script> 
<script src="js/select2.min.js"></script> 
<script src="js/jquery.dataTables.min.js"></script> 
<script src="js/matrix.js"></script> 
<script src="js/matrix.tables.js"></script>
</body>
</html>
