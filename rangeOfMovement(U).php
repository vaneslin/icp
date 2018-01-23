<?php
session_start();
if(isset($_SESSION["user"])){
?>
<!DOCTYPE html>
<html>
<head>
    <!-- Bootstrap and CSS -->
    <link rel="stylesheet" href="//cdn.bootcss.com/bootstrap/3.3.1/css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="CSS/rangeOfMovementU.css">
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
            <li><a href=<?php echo "Treatmentplan.php?id=$id"  ?>>Treatment Plan</a></li>
        </ul>
    </nav>


    <!-- Form -->
    <article class="article">
        <div style="font-size: x-large; text-align: center">
            Range of Movement (U)
            <button class="edit">Edit</button>
        </div>
        <div style="font-size: x-large; text-align: center; margin-right:150px;">
            ID: <?php echo $id; ?>
        </div>

        <?php require "config.php";
                       require "common.php";


                       $conn = new mysqli($host, $username, $password, $dbname);

       $sql = "SELECT * FROM rangeofmovementl WHERE patientID = ".$id;
       $result = $conn->query($sql); ?>
                   <?php foreach ($result as $row) { ?>

        <form action=<?php echo "rangeofmovementuphp.php?id=$id"; ?> method="post">
            <div class="row">
                <table id="PatientList" border="1">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Date/Examiners</th>
                        <th colspan="2">Pre</th>
                        <th colspan="2">Post 1</th>
                        <th colspan="2">Post 2</th>
                    </tr>
                    <tr>
                        <th>Joint</th>
                        <th>Movement</th>
                        <th>Right</th>
                        <th>Left</th>
                        <th>Right</th>
                        <th>Left</th>
                        <th>Right</th>
                        <th>Left</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td rowspan="6">Shoulder</td>
                        <td>Flexion</td>
                        <td contenteditable="true"><input name="shoulderFpreR" type="text" style="width:95%" value=<?php echo escape($row["shoulderFpreR"]); ?>></td>
                        <td contenteditable="true"><input name="shoulderFpreL" type="text" style="width:95%" value=<?php echo escape($row["shoulderFpreL"]); ?>></td>
                        <td contenteditable="true"><input name="shoulderFP1R" type="text" style="width:95%" value=<?php echo escape($row["shoulderFP1R"]); ?>></td>
                        <td contenteditable="true"><input name="shoulderFP1L" type="text" style="width:95%" value=<?php echo escape($row["shoulderFP1L"]); ?>></td>
                        <td contenteditable="true"><input name="shoulderFP2R" type="text" style="width:95%" value=<?php echo escape($row["shoulderFP2R"]); ?>></td>
                        <td contenteditable="true"><input name="shoulderFP2L" type="text" style="width:95%" value=<?php echo escape($row["shoulderFP2L"]); ?>></td>
                    </tr>
                    <tr>
                        <td>Extension</td>
                        <td contenteditable="true"><input name="shoulderEpreR" type="text" style="width:95%" value=<?php echo escape($row["shoulderEpreR"]); ?>></td>
                        <td contenteditable="true"><input name="shoulderEpreL" type="text" style="width:95%" value=<?php echo escape($row["shoulderEpreR"]); ?>></td>
                        <td contenteditable="true"><input name="shoulderEP1R" type="text" style="width:95%" value=<?php echo escape($row["shoulderEP1RpreR"]); ?>></td>
                        <td contenteditable="true"><input name="shoulderEP1L" type="text" style="width:95%" value=<?php echo escape($row["shoulderEP1LpreR"]); ?>></td>
                        <td contenteditable="true"><input name="shoulderEP2R" type="text" style="width:95%" value=<?php echo escape($row["shoulderEP2RpreR"]); ?>></td>
                        <td contenteditable="true"><input name="shoulderEP2L" type="text" style="width:95%" value=<?php echo escape($row["shoulderEP2LpreR"]); ?>></td>
                    </tr>
                    <tr>
                        <td>Abduction</td>
                        <td contenteditable="true"><input name="shoulderAbpreR" type="text" style="width:95%" value=<?php echo escape($row["shoulderAbpreR"]); ?>></td>
                        <td contenteditable="true"><input name="shoulderAbpreL" type="text" style="width:95%" value=<?php echo escape($row["shoulderAbpreL"]); ?>></td>
                        <td contenteditable="true"><input name="shoulderAbP1R" type="text" style="width:95%" value=<?php echo escape($row["shoulderAbP1R"]); ?>></td>
                        <td contenteditable="true"><input name="shoulderAbP1L" type="text" style="width:95%" value=<?php echo escape($row["shoulderAbP1L"]); ?>></td>
                        <td contenteditable="true"><input name="shoulderAbP2R" type="text" style="width:95%" value=<?php echo escape($row["shoulderAbP2R"]); ?>></td>
                        <td contenteditable="true"><input name="shoulderAbP2L" type="text" style="width:95%" value=<?php echo escape($row["shoulderAbP2L"]); ?>></td>
                    </tr>
                    <tr>
                        <td>Adduction</td>
                        <td contenteditable="true"><input name="shoulderAdpreR" type="text" style="width:95%" value=<?php echo escape($row["shoulderAdpreR"]); ?>></td>
                        <td contenteditable="true"><input name="shoulderAdpreL" type="text" style="width:95%" value=<?php echo escape($row["shoulderAdpreL"]); ?>></td>
                        <td contenteditable="true"><input name="shoulderAdP1R" type="text" style="width:95%" value=<?php echo escape($row["shoulderAdP1R"]); ?>></td>
                        <td contenteditable="true"><input name="shoulderAdP1L" type="text" style="width:95%" value=<?php echo escape($row["shoulderAdP1L"]); ?>></td>
                        <td contenteditable="true"><input name="shoulderAdP2R" type="text" style="width:95%" value=<?php echo escape($row["shoulderAdP2R"]); ?>></td>
                        <td contenteditable="true"><input name="shoulderAdP2L" type="text" style="width:95%" value=<?php echo escape($row["shoulderAdP2L"]); ?>></td>
                    </tr>
                    <tr>
                        <td>Internal Rotation</td>
                        <td contenteditable="true"><input name="shoulderIRpreR" type="text" style="width:95%" value=<?php echo escape($row["shoulderIRpreR"]); ?>></td>
                        <td contenteditable="true"><input name="shoulderIRpreL" type="text" style="width:95%" value=<?php echo escape($row["shoulderIRpreL"]); ?>></td>
                        <td contenteditable="true"><input name="shoulderIRp1R" type="text" style="width:95%" value=<?php echo escape($row["shoulderIRp1R"]); ?>></td>
                        <td contenteditable="true"><input name="shoulderIRp1L" type="text" style="width:95%" value=<?php echo escape($row["shoulderIRp1L"]); ?>></td>
                        <td contenteditable="true"><input name="shoulderIRp2R" type="text" style="width:95%" value=<?php echo escape($row["shoulderIRp2R"]); ?>></td>
                        <td contenteditable="true"><input name="shoulderIRp2L" type="text" style="width:95%" value=<?php echo escape($row["shoulderIRp2L"]); ?>></td>
                    </tr>
                    <tr>
                        <td>External Rotation</td>
                        <td contenteditable="true"><input name="shoulderERpreR" type="text" style="width:95%" value=<?php echo escape($row["shoulderERpreR"]); ?>></td>
                        <td contenteditable="true"><input name="shoulderERpreL" type="text" style="width:95%" value=<?php echo escape($row["shoulderERpreL"]); ?>></td>
                        <td contenteditable="true"><input name="shoulderERp1R" type="text" style="width:95%" value=<?php echo escape($row["shoulderERp1R"]); ?>></td>
                        <td contenteditable="true"><input name="shoulderERp1L" type="text" style="width:95%" value=<?php echo escape($row["shoulderERp1L"]); ?>></td>
                        <td contenteditable="true"><input name="shoulderERp2R" type="text" style="width:95%" value=<?php echo escape($row["shoulderERp2R"]); ?>></td>
                        <td contenteditable="true"><input name="shoulderERp2L" type="text" style="width:95%" value=<?php echo escape($row["shoulderERp2L"]); ?>></td>
                    </tr>
                    </tbody>
                    <tbody>
                    <tr>
                        <td>Additional comments</td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                    </tr>
                    </tbody>
                    <tbody>
                    <tr>
                        <td rowspan="6">Elbow and forearm</td>
                        <td>Flexion</td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                    </tr>
                    <tr>
                        <td>Extension</td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                    </tr>
                    <tr>
                        <td>Abduction</td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                    </tr>
                    <tr>
                        <td>Adduction</td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                    </tr>
                    <tr>
                        <td>Internal Rotation</td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                    </tr>
                    <tr>
                        <td>External Rotation</td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                    </tr>
                    </tbody>
                    <tbody>
                    <tr>
                        <td>Additional comments</td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                    </tr>
                    </tbody>
                    <tbody>
                    <tr>
                        <td rowspan="6">Wrist</td>
                        <td>Flexion</td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                    </tr>
                    <tr>
                        <td>Extension</td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                    </tr>
                    <tr>
                        <td>Abduction</td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                    </tr>
                    <tr>
                        <td>Adduction</td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                    </tr>
                    <tr>
                        <td>Internal Rotation</td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                    </tr>
                    <tr>
                        <td>External Rotation</td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                    </tr>
                    </tbody>
                    <tbody>
                    <tr>
                        <td>Fingers</td>
                        <td>Flex/Ext</td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                    </tr>
                    </tbody>
                    <tbody>
                    <tr>
                        <td rowspan="2">Thumb</td>
                        <td>Abduction</td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                    </tr>
                    <tr>
                        <td>Extension</td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                    </tr>
                    </tbody>
                    <tbody>
                    <tr>
                        <td>Additional comments</td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="row text-justify">
                <div class="col-md-2 divform">
                    initials: <input type="text" size="10" name="initials" value=<?php echo escape($row["initials"]); ?> >
                </div>
                <div class="col-md-2 divform">
                    Date: <input type="text" size="10" name="date"  value=<?php echo escape($row["date"]); ?>>
                </div>

              <?php } ?>

                <div class="col-md-2 divform pull-right text-jestify" style="margin-right:120px;">
                    <input name="submit" type="submit" value="submit">
                    <input name="save" type="submit" value="save">
                </div>
            </div>
        </form>
        <div>

        </div>


    </article>
    <footer>Copyright &copy; ICP Form</footer>

</div>

</body>
</html>

<?php }else{
    header("Location: Cover.php");
} ?>
