<?php
session_start();
if(isset($_SESSION["user"])){
?>
<!DOCTYPE html>
<!--MAMP -->
<html>
<head>
    <!-- Bootstrap and CSS -->
    <link rel="stylesheet" href="//cdn.bootcss.com/bootstrap/3.3.1/css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="CSS/Demographics.css">

    <!-- 改动部分，此处引用bootstarp.js和jquery -->
    <script src="http://cdn.gbtags.com/jquery/2.1.1/jquery.min.js" type="text/javascript" charset="utf-8"></script>
    <script src="http://apps.bdimg.com/libs/bootstrap/3.3.4/js/bootstrap.min.js" type="text/javascript" charset="utf-8"></script>
    <!-- 改动部分结束 -->

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
    <!-- Navigation of ICP form -->
    <!--
    <nav class="nav">
        <ul>
            <h2>ICP Form</h2>
            <li><a href="#">Demographics</a></li>
            <li><a href="PreAssement_new.html">Pre Assessment</a></li>
            <li><a href="PreinjectionBACKUP.html">Pre Injection</a></li>
            <li><a href="rangeOfMovement(U).html">Range of Movement (U)</a></li>
            <li><a href="rangeOfMovementL.html">Range of Movement (L)</a></li>
            <li><a href="Treatment plan.html">Treatment Plan</a></li>
        </ul>
    </nav>
    -->


    <!-- Form -->
    <article class="article">
       <!-- <div style="font-size: x-large; text-align: center"> -->
            <div style="font-size: x-large; text-align: center; margin-right:150px; font-weight:bold">
            Add a new patient

        </div>
        <?php $idErr=$_GET['val']; $nameErr=$_GET['val1']; ?>

<!-- LINK TO THE PHP FILE -->
        <form action="AddPatientphp.php" method = "post">
          <div style="font-size: large; text-align: center; margin-right:150px;">
              Enter Hospital ID:<br>
              <input type="text" name="patientID"   ><?php echo $_GET['val'];?></span>
              <br><br>


          </div>

            <div class="row">
                <div class="col-md-5 divform">
                    <p>
                        Name of patient: <input type="text" size="10" name="name" ><?php echo $_GET['val1'];?>
                    </p>
                    <p>
                        Date of Birth:
                        <input class="date" type="date" size="3" draggable="true" name="DOB">
                    </p>

                    <div class="row">
                        <div class="col-md-4">
                            Gender:

                        </div>

                        <!-- <div class="col-md-5 divform"> -->
                        <div class="col-md-4">
                            <select class="form-control" id="gender1" name="gender">

                                <option>Male</option>

                                <option>Female</option>

                            </select>
                        </div>
                    </div>
                   <!-- </div> -->
                    <p>
                        Date ICP commenced: <input class="date" type="date" size="3" draggable="true" name="dateICP">

                    </p>

                </div>


                <div class="col-md-5 divform">
                  <!--
                    <p>
                        Hospital number: <input type="text" size="20" name = "HospNo">
                    </p>
                    -->
                    <p>
                        NHS number: <input type="text" size="20" name="NHSNo">
                    </p>
                    <p>
                        Treatment number: <input type="text" size="20" name = "TreatmentNo">
                    </p>
                    <p>
                        Consultant: <input type="text" size="20" name = "consultant">
                    </p>



                </div>
            </div>







                <div class="row">
                    <div class="col-md-5 divform">

                        <p>
                            Height:  <input type="text" size="10" name ="height"> cm - Recorded on:  <input class="date" type="date" size="20" draggable="true" name = "dateHeight">
                        </p>

                        <p>
                            Weight:  <input type="text" size="10" name = "weight"> kg - Recorded on:  <input class="date" type="date" size="20" draggable="true" name = "dateWeight">
                        </p>



                    </div>







                <div class="col-md-5 divform">
                    <p>
                        Allergies:
                    </p>
                    <textarea name = "Allergies" class="largebox" type="text"></textarea>

                </div>


            </div>



            <!--
            <div class="row">
                <div class="col-md-5 divform">

                    <p>
                        Height:  <input type="text" size="10"> cm - Recorded on:  <input class="date" type="date" size="20" draggable="true">
                    </p>

                    <p>
                        Weight:  <input type="text" size="10"> kg - Recorded on:  <input class="date" type="date" size="20" draggable="true">
                    </p>



                </div>

            </div>
             -->






            <div class="row text-justify">




                <div class="col-md-2 divform pull-right text-jestify" style="margin-right:120px;">

                      <input name="submit2" type="submit" value="Submit">
                      <input name="save" type="submit" value="save">


            </div>
            </div>
        </form>
    </article>
    <footer>Copyright &copy; ICP Form</footer>

</div>

</body>
</html>
<?php }else{
    header("Location: Cover.php");
} ?>
