<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
     
<title>HR Dashboard</title>
<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css'>
<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css'>
<!-- Graph CSS -->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- jQuery -->
<!-- lined-icons -->
<link rel="stylesheet" href="css/icon-font.min.css" type='text/css'>
<!-- //lined-icons -->
<!-- chart -->
<script src="js/Chart.js"></script>
<!-- //chart -->
<!--animate-->
<link href="css/animate.css" rel="stylesheet" type="text/css" media="all">
<script src="js/wow.min.js"></script>
  <script>
     new WOW().init();
  </script>
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<style>
body {
    background-image: url("background.jpg");
   
}
</style>
<body>
    <div class="container-fluid">
       <div class="row">
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        
        <h2 style="color:white"><center>HR EZone Dashboard</center></h2>
        <br>
        
           <div class="col-md-4 col-md-offset-4">
               <div class="login-panel panel panel-default">
                   <div class="panel-heading">
                       <h3 class="panel-title">Please Sign In</h3>
                   </div>
                   <div class="panel-body">
                       <form action="{{ url('authenticate_login') }}" method="POST">
                           <fieldset>
                               <div class="form-group">
                                   <input class="form-control" placeholder="User Name" name="user_name" type="text" autofocus>
                               </div>
                               <div class="form-group">
                                   <input class="form-control" placeholder="Password" name="user_password" type="password">
                               </div>
                               
                              {!! Form::token() !!}
                               <!-- Change this to a button or input when using this as a form -->
                               <input type="submit"class="btn btn-lg btn-success btn-block" value="Login">
                               <!-- <a href="" class="btn btn-lg btn-success btn-block">Login</a> -->
                           </fieldset>
                       </form>
                   </div>
               </div>
           </div>
          </div>
          </div> 
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
         <footer>
         <p>&copy 2016 SCL OSS. All Rights Reserved </p>
      </footer>
      

  <script src="js/jquery.nicescroll.js"></script>
<script src="js/scripts.js"></script>
<!-- Bootstrap Core JavaScript -->
   <script src="js/bootstrap.min.js"></script>
</body>

</html>