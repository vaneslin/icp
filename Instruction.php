<?php
session_start();
if(isset($_SESSION["user"])){
?>
<!DOCTYPE html>
<html>
<head>
    <!-- Bootstrap and CSS -->
    <link rel="stylesheet" href="//cdn.bootcss.com/bootstrap/3.3.1/css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="CSS/Cover_Instruction.css">
</head>
<body>

<div class="flex-container">


    <!-- Title -->
    <header>
        <img class="img" src="img/NHS_Logo.png">
        <h1>Individual Care Pathway</h1>

    <!-- Navigation -->
  </header>

    <!--
    改动部分
    修改成下面这样，然后把源代码的a元素里的href复制过来。
    另外css里面需要把部分＃topbar改为＃navibar，
    再加个.navbar-default和.navbar-toggle，里面的height和back－color属性可以调整，详情见css文件
     -->


    <nav id="topbar" class="navbar navbar-default" role="navigation">
        <button class="navbar-toggle collapsed" style="margin-right:30px" type="button" data-toggle="collapse" data-target="#navibar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>

        <div class="collapse navbar-collapse" id="navibar">
            <ul class="nav navbar-nav">
                <li>
                    <a href="AddPatient.php">
                        <button>Add Patient</button>
                    </a>
                </li>
                <li>

                    <a href="ICPBoard.php">
                        <button>ICP Board</button>
                    </a>
                </li>

                <li>
                    <a href="Instruction.php">
                        <button>Instructions</button>
                    </a>
                </li>
                <li>
                    <a href="Cover.php">
                        <button class="logOut">Log Out</button>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
    <!-- 改动部分结束 -->



    <div id="fff"></div>


    <div class="article">
        <h2 style="padding-left: 130px">Instructions for using this ICP
            <h2>
                <ul style="list-style-type: disc; font-size: large; padding-left: 150px; padding-right: 150px">
                    <li>The ICP incorporates the detail and information required for this patient journey/episode
                        together with specific activities and variance tracking, which compares planned and actual care.
                    </li>
                    <li>To update your password, contact Administrators of this website to change it for you.
                    </li>
                    <li>To create a new patient profile, click "Add patient" button at the navigtion bar. Note that identical patient ID would be required to register new patient information.
                    </li>
                    <li>To edit patient profile,  go to ICP board by clicking "ICP Board" on navigation and then click pencil tag for the patient profile you want to edit. You can quick find the patient by searching their name or patientID.
                    </li>
                    <li>To delete a patient profile, click delete tag on ICP board.
                    </li>
                    <br>
                    <div style="font-size: 20px; float: right">
                        <button><a href="ICPBoard.php">Continue</a></button>
                    </div>
    </div>


    <footer>Copyright &copy; ICP Form</footer>

</div>

</body>
<?php }else{
    header("Location: Cover.php");
} ?>
