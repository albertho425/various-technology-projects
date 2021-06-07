<?php
include 'functions.php';
displays_errors();


template_header(" Form Valiadation with JavaScript", "far fa-check-square");
?>
<ink href="style.css">


  <div class="container mt-5 mb-5" style="" id="wrapper">
   <form method="POST" action="index.php" onsubmit="return Validate()" name="vform" class="" >

    <div class="form-group mt-5 col-md-10">

      <div id="username_div" class="col-md-10 mt-5">
        <label class="form-label"> <i class="fa fa-user fa-lg"></i> Username</label> <br>
         <input type="text" name="username" class="textInput form-control">



        <div id="name_error"></div>
      </div>
      <div id="email_div" class="col-md-10 mt-3">
        <label class="form-label"><i class="fas fa-envelope fa-lg"></i> Email</label> <br>
        <input type="email" name="email" class="textInput form-control">
        <div id="email_error"></div>
      </div>
      <div id="password_div" class="col-md-10 mt-3">
        <label class="form-label"><i class="fas fa-key fa-lg"></i> Password</label> <br>
        <input type="password" name="password" class="textInput form-control" >
      </div>
      <div id="pass_confirm_div" class="col-md-10 mt-3">
         <label class="form-label"><i class="fas fa-key fa-lg"></i> Password confirm</label> <br>
         <input type="password" name="password_confirm" class="textInput form-control" >
         <div id="password_error"></div>
      </div>
      <div class="col-auto">
      <input type="submit" name="register" value="Register" class="btn btn-primary mt-5 mb-5">
      </div>
   </form>

  </div>
</body>
<script src="script.js"></script>
</html>
