<?php
session_start();
session_unset();
session_destroy();
?>
<!DOCTYPE html>
<html>
<head>
    <!-- Bootstrap and CSS -->
    <link rel="stylesheet" href="//cdn.bootcss.com/bootstrap/3.3.1/css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="CSS/Cover_Instruction.css">

    <!-- bootstarp.js and jquery -->
    <script src="http://cdn.gbtags.com/jquery/2.1.1/jquery.min.js" type="text/javascript" charset="utf-8"></script>
    <script src="http://apps.bdimg.com/libs/bootstrap/3.3.4/js/bootstrap.min.js" type="text/javascript" charset="utf-8"></script>
    <!-- end -->


</head>
<body>

<div class="flex-container">


    <!-- Title -->
    <header>
        <img class="img" src="img/NHS_Logo.png">
        <h1>Individual Care Pathway</h1>
    </header>
    <!-- Navigation -->

    <!--
    css: ＃topbar to ＃navibar，
    add: .navbar-default  and .navbar-toggle，
       -->
       <nav id="topbar" class="navbar navbar-default" role="navigation">
    


           <div class="collapse navbar-collapse" id="navibar">

           </div>
       </nav>
       <!-- end -->

<article>


    <div class="login">
        <form action="Coverphp.php" method="post">
            <br><br>
            <br><br><br><br><br><br>
            Username:<br>
            <input type="text" name="name"><br>
            Password:<br>
            <input type="password" name="pw"><br><br>
            <input type="submit" name="submit" value="Submit">
            <a id="mark">?</a>
            <div class="pop">
                <span>✖</span>
                <h1>Login Instruction</h1>
                <P>Please contact Administrator to get your Username and Password.</P>
                <P>If you want to manage users information, using account of administrator to login the system.</P>
            </div>
            <?php $err=$_GET['err'];
            if($err==1){echo "<p style=\"color:red\">Invalid username or password. Please contact the Administrator to find or update your username/password</p>";} ?>

        </form>
    </div>


    </article>
    <footer>Copyright &copy; ICP Form</footer>

</div>

</body>
</html>

</body>

<script type="text/javascript">
     $(document).ready(function () {
     $("#mark").click(function () {
         $(".pop").fadeIn(300);
         positionPopup();
     });

     $(".pop > span, .pop").click(function () {
         $(".pop").fadeOut(300);
     });
 });
</script>
