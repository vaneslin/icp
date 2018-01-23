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
    <?php $id=$_GET['id']; ?>
    <nav class="nav" id="leftnav">
        <ul>
            <h2>ICP Form</h2>
            <li><a href=<?php echo "Demographics.php?id=$id" ?>>Demographics</a></li>
            <li><a href=<?php echo "PreAssement.php?id=$id" ?>>Pre Assessment</a></li>
            <li><a href=<?php echo "Preinjection.php?id=$id" ?>>Pre Injection</a></li>
            <li><a href=<?php echo "rangeOfMovement(U).php?id=$id"  ?>>Range of Movement (U)</a></li>
            <li><a href=<?php echo "rangeOfMovementL.php?id=$id"  ?>>Range of Movement (L)</a></li>
            <li><a href=<?php echo "Treatmentplan.php?id=$id"  ?>>Treatment Plan</a></li>
        </ul>
    </nav>


    <!-- Form -->
    <article class="article">
        <div style="font-size: x-large; text-align: center">
            Demographics
            <button>Edit</button>
        </div>
        <div style="font-size: x-large; text-align: center; margin-right:150px;">
            ID: <?php echo $id;  ?>
        </div>


                 <?php require "config.php";
                                require "common.php";


                                $conn = new mysqli($host, $username, $password, $dbname);

                $sql = "SELECT * FROM demographics WHERE patientID = ".$id;
                $result = $conn->query($sql); ?>
                            <?php foreach ($result as $row) { ?>

        <form action=<?php echo "Demographicsfinal.php?id=$id"; ?>  method = "post">

            <div class="row">
                <div class="col-md-5 divform">
                    <p>
                        Name of patient: <input type="text" size="10" name=" name" value= <?php echo escape($row["name"]); ?>>
                    </p>
                    <p>
                        Date of Birth:
                        <input class="date" type="date" size="3" draggable="true" name=" DOB" value= <?php echo escape($row["DOB"]); ?>>
                    </p>

                    <div class="row">
                        <div class="col-md-4">
                            Gender:

                        </div>

                        <!-- <div class="col-md-5 divform"> -->
                        <div class="col-md-4">
                            <select class="form-control" id="gender1" name=" gender">

                                <option <?php if ($row["gender"]=="Male") {echo "selected";}?>>Male</option>

                                <option <?php if ($row["gender"]=="Female") {echo "selected";}?>>Female</option>

                            </select>
                        </div>
                    </div>
                   <!-- </div> -->
                    <p>
                        Date ICP commenced: <input class="date" type="date" size="3" draggable="true" name="dateICP" value= <?php echo escape($row["dateICP"]); ?>>

                    </p>

                </div>


                <div class="col-md-5 divform">
                  <!--
                    <p>
                        Hospital number: <input type="text" size="20" name = "HospNo">
                    </p>
                    -->
                    <p>
                        NHS number: <input type="text" size="20" name="NHSNo" value= <?php echo escape($row["NHSNo"]); ?>>
                    </p>
                    <p>
                        Treatment number: <input type="text" size="20" name = "TreatmentNo" value= <?php echo escape($row["TreatmentNo"]); ?>>
                    </p>
                    <p>
                        Consultant: <input type="text" size="20" name = "consultant" value= <?php echo escape($row["consultant"]); ?>>
                    </p>



                </div>
            </div>







                <div class="row">
                    <div class="col-md-5 divform">

                        <p>
                            Height:  <input type="text" size="10" name ="height" value=<?php echo escape($row["height"]) ?>> cm - Recorded on:  <input class="date" type="date" size="20" draggable="true" name = "dateHeight" value= <?php echo escape($row["dateHeight"]); ?>>
                        </p>

                        <p>
                            Weight:  <input type="text" size="10" name = "weight" value=<?php echo escape($row["weight"]) ?>> kg - Recorded on:  <input class="date" type="date" size="20" draggable="true" name = "dateWeight" value= <?php echo escape($row["dateWeight"]); ?>>
                        </p>



                    </div>







                <div class="col-md-5 divform">
                    <p>
                        Allergies:
                    </p>
                    <textarea name = "Allergies" class="largebox" type="text"><?php echo escape($row["Allergies"]); ?></textarea>

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



           <?php }?>


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
