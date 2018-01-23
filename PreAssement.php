<?php
session_start();
if(isset($_SESSION["user"])){
?>
<!DOCTYPE html>
<html>
<head>
    <!-- Bootstrap and CSS -->
    <link rel="stylesheet" href="//cdn.bootcss.com/bootstrap/3.3.1/css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="CSS/PreAssessment_new.css">
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
    <?php $id = $_GET['id']; ?>


    <nav class="nav" id="leftnav">
        <ul>
            <h2>ICP Form</h2>
            <li><a href=<?php echo "Demographics.php?id=$id" ?>>Demographics</a></li>
            <li><a href=<?php echo "PreAssement.php?id=$id" ?>>Pre Assessment</a></li>
            <li><a href=<?php echo "Preinjection.php?id=$id" ?>>Pre Injection</a></li>
            <li><a href=<?php echo "rangeOfMovement(U).php?id=$id"  ?>>Range of Movement (U)</a></li>
            <li><a href=<?php echo "rangeOfMovementL.php?id=$id"  ?>>Range of Movement (L)</a></li>
            <li><a href=<?php echo "Treatmentplan.php?id=$id" ?>>Treatment Plan</a></li>
        </ul>
    </nav>


    <!-- Form -->
    <article class="article" action="preassessment.php" method="post">
        <div style="font-size: x-large; text-align: center;margin-left: 100px">
            Pre-Assessment
            <button style="float:right;margin-right: 180px">Edit</button>
        </div>
        <div style="font-size: x-large; text-align:center; margin-right:150px;">
          ID: <?php echo $id; ?>
        </div>

        <form action=<?php echo "preassessmentphp.php?id=$id" ?> method="post">
            <div class="row">
                <div class="col-md-5 divform">
                    <div>
                        <p style="font-weight: bold">Referer</p>
                        <div>

<?php require "config.php";
      require "common.php";

      $conn = new mysqli( $host,$username,$password,$dbname) or die($conn->connect_error);


      // read one data from database
      $sql = "SELECT * FROM preassessment WHERE patientID =".$id;
      $result = $conn -> query($sql);
?>
<?php foreach ($result as $row) {?>




                            <label>Name:</label> <input type="text" name="refName" value=<?php echo escape($row["refName"]);?>> <br><br>

                            <label>Base: </label> <input type="text" name="refBase" value=<?php echo escape($row["refBase"]);?>><br>
                        </div>
                        <div>

                            <div style="width: 2%">
                                  <label> Tel/Email:</label><input type="text" name="refContact" value=<?php echo escape($row["refContact"]);?>><br>
                                  </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5 divform" style="height: 150%">
                  <h4>Current therapy provision</h4>
                  <div>
                      <textarea type="text" name="currentThPr" rows="4.8" style="width: 100%"><?php echo escape($row["currentThPr"]);?></textarea>
                      <br>
                  </div>

                </div>
            </div>

                <div class="row">
                    <div class="col-md-5 divform">
                        <div>
                            <p style="font-weight: bold">Physiotherapist</p>
                            <div>
                                <label>Name:</label> <input type="text" name="phName" value=<?php echo escape($row["phName"]);?>> <br><br>
                                <label>Base: </label> <input type="text" name="phBase" value=<?php echo escape($row["phBase"]);?> ><br>
                            </div>
                            <div>
                            <div>
                                      <label> Tel/Email:</label><input type="text" name="phContact" value=<?php echo escape($row["phContact"]);?>><br>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5 divform" style="height: 150%">
                        <h4>Additional Physical Activity</h4>
                        <div>
                            <textarea type="text" name="currentThPr" rows="4.8" style="width: 100%"><?php echo escape($row["currentThPr"]);?></textarea>
                            <br>
                        </div>
                    </div>
                </div>

                <div>
                    <div class="row">
                        <div class="col-md-5 divform">
                            <div>
                                <p style="font-weight: bold">Occupational therapist</p>
                                <div>
                                    <label>Name:</label> <input type="text" name="OcName" value=<?php echo escape($row["OcName"]);?>> <br><br>
                                    <label>Base: </label> <input type="text" name="OcBase" value=<?php echo escape($row["OcBase"]);?>><br>
                                </div>


                              <div>
                                  <label> Tel/Email:</label><input type="text" name="OcContact" value=<?php echo escape($row["OcContact"]);?>><br>
                              </div>
                             </div>
                        </div>
                        <div class="col-md-5 divform" style="height: 150%">


                            <h4>Diagnostic Descriptor</h4>
                            <div>
                                <textarea type="text" name="Diagnostic" rows="4.8" style="width: 100%" value=<?php echo escape($row["Diagnostic"]);?>></textarea>
                                <br>
                            </div>


                        </div>
                    </div>


                    <div class="row">
                            <span class="col-md-5 divform">
                              <h4>  Therapy feedback form


                                  <input type="radio" name="yesorno" value="yes" <?php if ($row["yesorno"]=="yes") {echo "checked";}?>>Yes
                                  <input type="radio" name="yesorno" value="no" <?php if ($row["yesorno"]=="no") {echo "checked";}?>>No

                                </h4>

                            </span>

                    </div>



                    <div class="row">





                    </div>

                    <div class="row">
                        <div class="col-md-5 divform">
                            <div>
                                <h4>Gross motor function classification</h4>
                                <input type="radio" name="G" value="0" <?php if ($row["G"] == "0"){echo "checked";} ?>>I
                                <input type="radio" name="G" value="1" <?php if ($row["G"] == "1"){echo "checked";} ?>>II
                                <input type="radio" name="G" value="2" <?php if ($row["G"] == "2"){echo "checked";} ?>>III
                                <input type="radio" name="G" value="3" <?php if ($row["G"] == "3"){echo "checked";} ?>>IV
                                <input type="radio" name="G" value="4" <?php if ($row["G"] == "4"){echo "checked";} ?>> V
<br>
                              <!--  <div oninput="x.value=parseInt(a.value)">

                                    <input type="range" id="a" name="a" value="0">

                                    <output name="Gx" for="a" ></output>
                                </div>-->

                            </div>

                            <div>
                                <h4>Manual ability classification</h4>
                                <input type="radio" name="M" value="0" <?php if ($row["M"] == "0"){echo "checked";} ?>>I
                                <input type="radio" name="M" value="1" <?php if ($row["M"] == "1"){echo "checked";} ?>>II
                                 <input type="radio" name="M" value="2" <?php if ($row["M"] == "2"){echo "checked";} ?>>III
                                  <input type="radio" name="M" value="3" <?php if ($row["M"] == "3"){echo "checked";} ?>>IV
                                <input type="radio" name="M" value="4" <?php if ($row["M"] == "4"){echo "checked";} ?>> V

<br>
                              <!--  <div>

                                    <input type="range" id="a" name="a" value="0">

                                    <output name="x" for="a"></output>
                                </div>-->
                            </div>

                            <div>
                                <h4>Pain Score</h4>
                                <input type="radio" name="P" value="0" <?php if ($row["P"] == "0"){echo "checked";} ?>>0
                                <input type="radio" name="P" value="2" <?php if ($row["P"] == "2"){echo "checked";} ?>>2
                                <input type="radio" name="P" value="4" <?php if ($row["P"] == "4"){echo "checked";} ?>>4
                                <input type="radio" name="P" value="6" <?php if ($row["P"] == "6"){echo "checked";} ?>>6
                                <input type="radio" name="P" value="8" <?php if ($row["P"] == "8"){echo "checked";} ?>> 8
                                <input type="radio" name="P" value="10" <?php if ($row["P"] == "10"){echo "checked";} ?>>10

                            <!--    <div oninput="x.value=parseInt(a.value)">

                                    <input type="range" id="a" name="a" value="0">

                                    <output name="x" for="a"></output>
                                </div>-->
                            </div>

                        </div>
                        <div class="col-md-5 divform" style="height: 100%">
                            <h4> FMS 0-6</h4>
                    <!--        <table style="width:100%">
                                <tr>
                                    <th>5m</th>
                                    <th>10m</th>
                                    <th>500m</th>
                                </tr>
                                <tr>
                                  <th><input type="radio" name="5m0" value="0">0 <input type="radio" name="5m1" value="1">1 <input type="radio" name="5m2" value="2">2 <input type="radio" name="5m3" value="3">3
                                  <input type="radio" name="5m4" value="4"> 4 <input type="radio" name="5m5" value="5">5
                                </th>
                                  <th><input type="radio" name="10m0" value="0">0 <input type="radio" name="10m1" value="1">1 <input type="radio" name="10m2" value="2">2 <input type="radio" name="10m3" value="3">3
                                  <input type="radio" name="10m4" value="4"> 4 <input type="radio" name="10m5" value="5">5
                                  </th>
                                  <th><input type="radio" name="100m0" value="0">0 <input type="radio" name="100m1" value="1">1 <input type="radio" name="100m2" value="2">2 <input type="radio" name="100m3" value="3">3
                                  <input type="radio" name="100m4" value="4"> 4 <input type="radio" name="100m5" value="5">5</th>
                                </tr>

                              -->

                                        5m :<input type="radio" name="5m" value="0" <?php if ($row["5m"] == "0"){echo "checked";} ?>>0
                                        <input type="radio" name="5m" value="1" <?php if ($row["5m"] == "1"){echo "checked";} ?>>1
                                        <input type="radio" name="5m" value="2" <?php if ($row["5m"] == "2"){echo "checked";} ?>>2
                                        <input type="radio" name="5m" value="3 <?php if ($row["5m"] == "3"){echo "checked";} ?>">3
                                        <input type="radio" name="5m" value="4" <?php if ($row["5m"] == "4"){echo "checked";} ?>> 4
                                        <input type="radio" name="5m" value="5" <?php if ($row["5m"] == "5"){echo "checked";} ?>>5
                                      <br>
                                        10m:
                                        <input type="radio" name="10m" value="0" <?php if ($row["10m"] == "0"){echo "checked";} ?>>0
                                        <input type="radio" name="10m" value="1" <?php if ($row["10m"] == "1"){echo "checked";} ?>>1
                                        <input type="radio" name="10m" value="2"  <?php if ($row["10m"] == "2"){echo "checked";} ?>>2
                                        <input type="radio" name="10m" value="3" <?php if ($row["10m"] == "3"){echo "checked";} ?>>3
                                        <input type="radio" name="10m" value="4" <?php if ($row["10m"] == "4"){echo "checked";} ?>> 4
                                        <input type="radio" name="10m" value="5" <?php if ($row["10m"] == "5"){echo "checked";} ?>>5
                                          <br>
                                        500m:  <input type="radio" name="100m" value="0" <?php if ($row["100m"] == "0"){echo "checked";} ?>>0
                                        <input type="radio" name="100m" value="1" <?php if ($row["100m"] == "1"){echo "checked";} ?>>1
                                        <input type="radio" name="100m" value="2" <?php if ($row["100m"] == "2"){echo "checked";} ?>>2
                                        <input type="radio" name="100m" value="3" <?php if ($row["100m"] == "3"){echo "checked";} ?>>3
                                            <input type="radio" name="100m" value="4" <?php if ($row["100m"] == "4"){echo "checked";} ?>> 4
                                            <input type="radio" name="100m" value="5" <?php if ($row["100m"] == "5"){echo "checked";} ?>>5




                                <!--<tr>
                                    <th>
                                        <div oninput="x.value=parseInt(a.value)" style="width: 100%">

                                            <input type="range" id="a" name="a" value="0">

                                            <output name="x" for="a"></output>
                                        </div>
                                    </th>
                                    <th>
                                        <div oninput="x.value=parseInt(a.value)" style="width: 100%">

                                            <input type="range" id="a" name="a" value="0">

                                            <output name="x" for="a"></output>
                                        </div>
                                    </th>
                                    <th>
                                        <div action="/action_page.php"
                                              oninput="x.value=parseInt(a.value)" style="width: 100%">

                                            <input type="range" id="a" name="a" value="0">

                                            <output name="x" for="a"></output>
                                        </div>
                                    </th>
                                </tr>-->
                            </table>
                        </div>

                    </div>




                    <div class="row text-justify">
                        <div class="col-md-2 divform">
                            initials: <input type="text" size="10" name="initials" value=<?php echo escape($row["initials"]); ?>>
                        </div>
                        <div class="col-md-2 divform">
                          <!--  Date: <input type="date" class="date">-->

                            <!--date:<input class="text"   name="iniDate" value=< echo escape($row["iniDate"]);>-->
                            Date: <input class="date" type="date" size="3" draggable="true" name="iniDate" value=<?php echo escape($row["iniDate"]); ?>>
                        </div>


                                                 <?php } ?>

                        <div class="col-md-2 divform pull-right text-jestify" style="margin-right:120px;">
                            <input name="submit" type="submit" value="submit">
                            <input name="save" type="submit" value="save">
                        </div>
                    </div>

</form>

<footer>Copyright &copy; ICP Form</footer>

</div>

</body>
</html>

<?php }else{
    header("Location: Cover.php");
} ?>
