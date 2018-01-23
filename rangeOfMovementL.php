<?php
session_start();
if(isset($_SESSION["user"])){
?>
<!DOCTYPE html>
<html>
<head>
    <!-- Bootstrap and CSS -->
    <link rel="stylesheet" href="//cdn.bootcss.com/bootstrap/3.3.1/css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="CSS/rangeOfMovementL.css">

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


    <div id="fff"></div>
    <!-- Navigation of ICP form -->

    <?php $id = $_GET['id']; ?>

    <nav class="nav" id="leftnav">
        <ul>
            <h2>ICP Form</h2>
            <li><a href=<?php echo "Demographics.php?id=$id" ?>>Demographics</a></li>
            <li><a href=<?php echo "PreAssement.php?id=$id" ?>>Pre Assessment</a></li>
            <li><a href=<?php echo "Preinjection.php?id=$id"  ?>>Pre Injection</a></li>
            <li><a href=<?php echo "rangeOfMovement(U).php?id=$id"  ?>>Range of Movement (U)</a></li>
            <li><a href=<?php echo "rangeOfMovementL.php?id=$id"  ?>>Range of Movement (L)</a></li>
            <li><a href=<?php echo "Treatmentplan.php?id=$id"  ?>>Treatment Plan</a></li>
        </ul>
    </nav>


    <!-- Form -->
    <article class="article">
        <div style="font-size: x-large; text-align: center">
            Range of Movement (L)
            <button class="edit">Edit</button>
        </div>
        <div style="font-size: x-large; text-align: center; margin-right:150px;">
            ID: <?php echo $id; ?>
        </div>

        <?php require "config.php";
                       require "common.php";


                       $conn = new mysqli($host, $username, $password, $dbname);

       $sql = "SELECT * FROM rangeofmovementu WHERE patientID = ".$id;
       $result = $conn->query($sql); ?>
                   <?php foreach ($result as $row) { ?>

        <form action=<?php echo "rangeofmovementLphp.php?id=$id"; ?> method="post">
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
                        <td rowspan="8">Hip (Supine)</td>
                        <td>Flexion (0-125)</td>
                        <td contenteditable="true" name="HipFlexionPreR" type="text"><input name="HipFlexionPreR"  type="text" style="width:95%" value=<?php echo escape($row["HipFlexionPreR"]); ?>></td>
                        <td contenteditable="true" name="HipFlexionPreL" type="text"><input name="HipFlexionPreL" type="text" style="width:95%" value=<?php echo escape($row["HipFlexionPreL"]); ?>></td>
                        <td contenteditable="true" name="HipFlexionP1R" type="text"><input name="HipFlexionP1R" type="text" style="width:95%" value=<?php echo escape($row["HipFlexionP1R"]); ?>></td>
                        <td contenteditable="true" name="HipFlexionP1L" type="text"><input name="HipFlexionP1L" type="text" style="width:95%" value=<?php echo escape($row["HipFlexionP1L"]); ?>></td>
                        <td contenteditable="true" name="HipFlexionP2R" type="text"><input name="HipFlexionP2R" type="text" style="width:95%" value=<?php echo escape($row["HipFlexionP2R"]); ?>></td>
                        <td contenteditable="true" name="HipFlexionP2L" type="text"><input name="HipFlexionP2L" type="text" style="width:95%" value=<?php echo escape($row["HipFlexionP2L"]); ?>></td>
                    </tr>
                    <tr>
                        <td>Extension (Thomas Test)</td>
                        <td contenteditable="true" name="HipExPreR" type="text"><input name="HipExPreR" type="text" style="width:95%" value=<?php echo escape($row["HipExPreR"]); ?>></td>
                        <td contenteditable="true" name="HipExPreL" type="text"><input name="HipExPreL" type="text" style="width:95%" value=<?php echo escape($row["HipExPreL"]); ?>></td>
                        <td contenteditable="true" name="HipExP1R" type="text"><input name="HipExP1R" type="text" style="width:95%" value=<?php echo escape($row["HipExP1R"]); ?>></td>
                        <td contenteditable="true" name="HipExP1L" type="text"><input name="HipExP1L" type="text" style="width:95%" value=<?php echo escape($row["HipExP1L"]); ?>></td>
                        <td contenteditable="true" name="HipExP2R" type="text"><input name="HipExP2R" type="text" style="width:95%" value=<?php echo escape($row["HipExP2R"]); ?>></td>
                        <td contenteditable="true" name="HipExP2L" type="text"><input name="HipExP2L" type="text" style="width:95%" value=<?php echo escape($row["HipExP2L"]); ?>></td>
                    </tr>
                    <tr>
                        <td>Abduction in Flexion (R2)</td>
                        <td contenteditable="true" name="HipAbPreR" type="text"><input name="HipAbPreR" type="text" style="width:95%" value=<?php echo escape($row["HipAbPreR"]); ?>></td>
                        <td contenteditable="true" name="HipAbPreL" type="text"><input name="HipAbPreL" type="text" style="width:95%" value=<?php echo escape($row["HipAbPreL"]); ?>></td>
                        <td contenteditable="true" name="HipAbP1R" type="text"><input name="HipAbP1R" type="text" style="width:95%" value=<?php echo escape($row["HipAbP1R"]); ?>></td>
                        <td contenteditable="true" name="HipAbP1L" type="text"><input name="HipAbP1L" type="text" style="width:95%" value=<?php echo escape($row["HipAbP1L"]); ?>></td>
                        <td contenteditable="true" name="HipAbP2R" type="text"><input name="HipAbP2R" type="text" style="width:95%" value=<?php echo escape($row["HipAbP2R"]); ?>></td>
                        <td contenteditable="true" name="HipAbP2L" type="text"><input name="HipAbP2L" type="text" style="width:95%" value=<?php echo escape($row["HipAbP2L"]); ?>></td>
                    </tr>
                    <tr>
                        <td>Dynamic Catch (R1)</td>
                        <td contenteditable="true" name="HipDCR1P1R" type="text"><input name="HipDCR1P1R" type="text" style="width:95%"></td>
                        <td contenteditable="true" name="HipDCR1preR" type="text"><input name="HipDCR1preR" type="text" style="width:95%" value=<?php echo escape($row["HipDCR1preR"]); ?>></td>
                        <td contenteditable="true" name="HipDCR1preL" type="text"><input name="HipDCR1preL" type="text" style="width:95%" value=<?php echo escape($row["HipDCR1preL"]); ?>></td>
                        <td contenteditable="true" name="HipDCR1P1L" type="text"><input name="HipDCR1P1L" type="text" style="width:95%" value=<?php echo escape($row["HipDCR1P1L"]); ?>></td>
                        <td contenteditable="true" name="HipDCR1P2R" type="text"><input name="HipDCR1P2R" type="text" style="width:95%" value=<?php echo escape($row["HipDCR1P2R"]); ?>></td>
                        <td contenteditable="true" name="HipDCR1P2L" type="text"><input name="HipDCR1P2L" type="text" style="width:95%" value=<?php echo escape($row["HipDCR1P2L"]); ?>></td>
                    </tr>
                    <tr>
                        <td>Abduction in Extension (0-45) (R2)</td>
                        <td contenteditable="true" name="HipAEpreR" type="text"><input name="HipAEpreR" type="text" style="width:95%" value=<?php echo escape($row["HipAEpreR"]); ?>></td>
                        <td contenteditable="true" name="HipAEpreL" type="text"><input name="HipAEpreL" type="text" style="width:95%" value=<?php echo escape($row["HipAEpreL"]); ?>></td>
                        <td contenteditable="true" name="HipAEP1R" type="text"><input name="HipAEP1R" type="text" style="width:95%" value=<?php echo escape($row["HipAEP1R"]); ?>></td>
                        <td contenteditable="true" name="HipAEP1L" type="text"><input name="HipAEP1L" type="text" style="width:95%" value=<?php echo escape($row["HipAEP1L"]); ?>></td>
                        <td contenteditable="true" name="HipAEP2R" type="text"><input name="HipAEP2R" type="text" style="width:95%" value=<?php echo escape($row["HipAEP2R"]); ?>></td>
                        <td contenteditable="true" name="HipAEP2L" type="text"><input name="HipAEP2L" type="text" style="width:95%" value=<?php echo escape($row["HipAEP2L"]); ?>></td>
                    </tr>
                    <tr>
                        <td>Dynamic Catch (R1)</td>
                        <td contenteditable="true" name="HipDCR2preR" type="text"><input name="HipDCR2preR" type="text" style="width:95%" value=<?php echo escape($row["HipDCR2preR"]); ?>></td>
                        <td contenteditable="true" name="HipDCR2preL" type="text"><input name="HipDCR2preL" type="text" style="width:95%" value=<?php echo escape($row["HipDCR2preL"]); ?>></td>
                        <td contenteditable="true" name="HipDCR2P1R" type="text"><input name="HipDCR2P1R" type="text" style="width:95%" value=<?php echo escape($row["HipDCR2P1R"]); ?>></td>
                        <td contenteditable="true" name="HipDCR2P1L" type="text"><input name="HipDCR2P1L" type="text" style="width:95%" value=<?php echo escape($row["HipDCR2P1L"]); ?>></td>
                        <td contenteditable="true" name="HipDCR2P2R" type="text"><input name="HipDCR2P2R" type="text" style="width:95%" value=<?php echo escape($row["HipDCR2P2R"]); ?>></td>
                        <td contenteditable="true" name="HipDCR2P2L" type="text"><input name="HipDCR2P2L" type="text" style="width:95%" value=<?php echo escape($row["HipDCR2P2L"]); ?>></td>
                    </tr>
                    <tr>
                        <td>Adduction in Flextion</td>
                        <td contenteditable="true" name="HipAinFpreR" type="text"><input name="HipAinFpreR" type="text" style="width:95%" value=<?php echo escape($row["HipAinFpreR"]); ?>></td>
                        <td contenteditable="true" name="HipAinFpreL" type="text"><input name="HipAinFpreL" type="text" style="width:95%" value=<?php echo escape($row["HipAinFpreL"]); ?>></td>
                        <td contenteditable="true" name="HipAinFP1R" type="text"><input name="HipAinFP1R" type="text" style="width:95%" value=<?php echo escape($row["HipAinFP1R"]); ?>></td>
                        <td contenteditable="true" name="HipAinFP1L" type="text"><input name="HipAinFP1L" type="text" style="width:95%" value=<?php echo escape($row["HipAinFP1L"]); ?>></td>
                        <td contenteditable="true" name="HipAinFP2R" type="text"><input name="HipAinFP2R" type="text" style="width:95%" value=<?php echo escape($row["HipAinFP2R"]); ?>></td>
                        <td contenteditable="true" name="HipAinFP2L" type="text"><input name="HipAinFP2L" type="text" style="width:95%" value=<?php echo escape($row["HipAinFP2L"]); ?>></td>
                    </tr>
                    <tr>
                        <td>Dynamic Catch (R1)</td>
                        <td contenteditable="true" name="HipDCR3preR" type="text"><input name="HipDCR3preR" type="text" style="width:95%" value=<?php echo escape($row["HipDCR3preR"]); ?>></td>
                        <td contenteditable="true" name="HipDCR3preL" type="text"><input name="HipDCR3preL" type="text" style="width:95%" value=<?php echo escape($row["HipDCR3preL"]); ?>></td>
                        <td contenteditable="true" name="HipDCR3P1R" type="text"><input name="HipDCR3P1R" type="text" style="width:95%" value=<?php echo escape($row["HipDCR3P1R"]); ?>></td>
                        <td contenteditable="true" name="HipDCR3P1L" type="text"><input name="HipDCR3P1L" type="text" style="width:95%" value=<?php echo escape($row["HipDCR3P1L"]); ?>></td>
                        <td contenteditable="true" name="HipDCR3P2R" type="text"><input name="HipDCR3P2R" type="text" style="width:95%" value=<?php echo escape($row["HipDCR3P2R"]); ?>></td>
                        <td contenteditable="true" name="HipDCR3P2L" type="text"><input name="HipDCR3P2L" type="text" style="width:95%" value=<?php echo escape($row["HipDCR3P2L"]); ?>></td>
                    </tr>
                    </tbody>
                    <tbody>
                    <tr>
                        <td rowspan="4">Hip (Prone)</td>
                        <td>Phelps (Gracilis) (+/-)</td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                    </tr>
                    <tr>
                        <td>Internal rotation</td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                    </tr>
                    <tr>
                        <td>External rotation (50)</td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                    </tr>
                    <tr>
                        <td>Est. Femoral Anti Version</td>
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
                        <td rowspan="9">Knee</td>
                        <td>Flextion (140)</td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                    </tr>
                    <tr>
                        <td>Extension (0)</td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                    </tr>
                    <tr>
                        <td>Patella Alta</td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                    </tr>
                    <tr>
                        <td>Popliteal Angle Bilateral</td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                    </tr>
                    <tr>
                        <td>Popliteal Angle Unilateral(R2)</td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                    </tr>
                    <tr>
                        <td>Dundee Angle</td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                    </tr>
                    <tr>
                        <td>Dynamic catch (R1)</td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                    </tr>
                    <tr>
                        <td>Duncan Ely Test (+/++/+++) (Rectus Femoris) (R2)</td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                    </tr>
                    <tr>
                        <td>Dynamic catch (R1)</td>
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
                        <td rowspan="4">Ankle</td>
                        <td>Dorsi Flexion Knee Flexed </td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                    </tr>
                    <tr>
                        <td>Dorsi Flexion Knee Extended (R2)</td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                    </tr>
                    <tr>
                        <td>Dynamic Catch (Knee Flexed/ Extended)</td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                    </tr>
                    <tr>
                        <td>Clonus</td>
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
                        <td rowspan="3">Foot</td>
                        <td>Hind foot/ (Mid foot)</td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                    </tr>
                    <tr>
                        <td>Forefoot</td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                    </tr>
                    <tr>
                        <td>Selective Motor Control (0-4) (see chart)</td>
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
                        <td rowspan="5">Alignment</td>
                        <td>Foot on thigh angle</td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                    </tr>
                    <tr>
                        <td>Tibial torsion</td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                    </tr>
                    <tr>
                        <td>Knee varus/valgus</td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                    </tr>
                    <tr>
                        <td>Leg length</td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                    </tr>
                    <tr>
                        <td>Spine</td>
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
                        <td rowspan="5">Alignment</td>
                        <td>Foot on thigh angle</td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                    </tr>
                    <tr>
                        <td>Tibial torsion</td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                    </tr>
                    <tr>
                        <td>Knee varus/valgus</td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                    </tr>
                    <tr>
                        <td>Leg length</td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                    </tr>
                    <tr>
                        <td>Spine</td>
                        <td contenteditable="true" colspan="2"></td>
                        <td contenteditable="true" colspan="2"></td>
                        <td contenteditable="true" colspan="2"></td>
                    </tr>
                    </tbody>
                    <tbody>
                    <tr>
                        <td rowspan="5">Modified Ashworth Scale MAS (0-4) (see chart)</td>
                        <td>Adductors</td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                    </tr>
                    <tr>
                        <td>Gracilis</td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                    </tr>
                    <tr>
                        <td>Hamstrings</td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                    </tr>
                    <tr>
                        <td>Rectus femoris</td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                        <td contenteditable="true"></td>
                    </tr>
                    <tr>
                        <td>Gastrocnemius</td>
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
                    initials: <input type="text" size="10" name="initials" value=<?php echo escape($row["initials"]); ?>>
                </div>
                <div class="col-md-2 divform">
                    Date: <input type="text" size="10" name="date" value=<?php echo escape($row["date"]); ?>>
                </div>

              <?php }?>

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
