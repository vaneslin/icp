<?php
session_start();
if(isset($_SESSION["user"])){
?>
<!DOCTYPE html>
<html>
<head>
    <!-- Bootstrap and CSS -->
    <link rel="stylesheet" href="//cdn.bootcss.com/bootstrap/3.3.1/css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="CSS/Preinjection.css">
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
            <li><a href=<?php echo "Preinjection.php?id=$id" ?>>Pre Injection</a></li>
            <li><a href=<?php echo "rangeOfMovement(U).php?id=$id"  ?>>Range of Movement (U)</a></li>
            <li><a href=<?php echo "rangeOfMovementL.php?id=$id"  ?>>Range of Movement (L)</a></li>
            <li><a href=<?php echo "Treatmentplan.php?id=$id"  ?>>Treatment Plan</a></li>
        </ul>
    </nav>


    <!-- Form -->
    <article class="article">
        <div style="font-size: x-large; text-align: center; margin-left: 80px;">
            Pre-Injection
            <button class="edit">Edit</button>
        </div>
        <div style="font-size: x-large; text-align: center; margin-right:150px;">
            ID: <?php echo $id; ?>
        </div>




         <?php require "config.php";
                        require "common.php";


                        $conn = new mysqli($host, $username, $password, $dbname);

        $sql = "SELECT * FROM preinjection WHERE PatientID = ".$id;
        $result = $conn->query($sql); ?>
                    <?php foreach ($result as $row) { ?>



        <form action=<?php echo "pp.php?id=$id"; ?> method="post">

            <div class="row">
                <div class="col-md-5  divform">
                    <p>
                        Date of Attendance:
                        <input class="date" type="date" size="3" draggable="true" name="DateA" value=<?php echo escape($row["DateA"]); ?>>
                    </p>
                    <p>
                        Injection Date:
                        <input class="date" type="date" size="3" name="DateI" value=<?php echo escape($row["DateI"]); ?>>
                    </p>
                    <p>
                        Assesment completed by: <input type="text" size="10" name="assessment" value=<?php echo escape($row["assessment"]); ?>>
                    </p>
                </div>
                <div class="col-md-5 divform">
                    <p>
                        Attending clinicians: <input type="text" size="20" name="attendingCli" value=<?php echo escape($row["attendingCli"]); ?>>
                    </p>
                    <p>
                        Local team members: <input type="text" size="20" name="localMembers" value=<?php echo escape($row["localMembers"]); ?>>
                    </p>
                    <p>
                        Attending family/carers: <input type="text" size="20" name="attendingFam" value=<?php echo escape($row["attendingFam"]); ?>>
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-5 divform">
                    <p>
                        Progress since last review:
                    </p>
                    <textarea class="largebox" type="text" name="progress">
                        <?php echo escape($row["progress"]); ?>
                    </textarea>

                </div>
                <div class="col-md-5 divform">
                    <p>
                        General health:
                    </p>
                    <textarea class="largebox" type="text" name="health">
                        <?php echo escape($row["health"]); ?>
                    </textarea>

                </div>
            </div>
            <div class="row">
                <div class="col-md-5 divform">
                    <p>
                        Medication - note any allergies on page 1**:
                    </p>
                    <textarea class="mediumbox" type="text" name="Medication">
                        <?php echo escape($row["Medication"]); ?>
                    </textarea>
                    <p>
                        Last hip X-ray (date and report of current hip status - green/amber/red):
                    </p>
                    <textarea class="mediumbox" type="text" name="hipX">
                        <?php echo escape($row["hipX"]); ?>
                    </textarea>

                </div>
                <div class="col-md-5 divform">
                    <p>
                        Orthotics:
                    </p>
                    <textarea class="largebox" type="text" name="orthotics">
                        <?php echo escape($row["orthotics"]); ?>
                    </textarea>
                </div>
            </div>
            <div class="row">
                <div class="col-md-5 divform">
                    <p>
                        Equipment:
                    </p>
                    <textarea class="largebox" type="text" name="equipment">
                        <?php echo escape($row["equipment"]); ?>
                    </textarea>
                </div>
                <div class="col-md-5 divform">
                    <p>
                        Examination (Posture, Tone, Selective Movement, Power, Gait):
                    </p>
                    <textarea class="largebox" type="text" name="examination">
                        <?php echo escape($row["examination"]); ?>
                    </textarea>
                </div>
            </div>
            <div class="row">
                <div class="col-md-10 divform">
                    <table id="PatientList" border="1">
                        <thead>
                        <th>ICF DOMAIN</th>
                        <th>COPM GOAL</th>
                        <th>PERFORMANCE (0-10)</th>
                        <th>SATISFACATION (0-10)</th>
                        </thead>
                        <tbody>
                        <tr>
                            <td><input type="text" name="domain1" value=<?php echo escape($row["domain1"]); ?>></td>
                            <td><input type="text" name="goal1" value=<?php echo escape($row["goal1"]); ?>></td>
                            <td><input type="text" name="performance1" value=<?php echo escape($row["performance1"]); ?>></td>
                            <td><input type="text" name="satisfaction1" value=<?php echo escape($row["satisfaction1"]); ?>></td>
                        </tr>
                        <tr>
                            <td><input type="text" name="domain2" value=<?php echo escape($row["domain2"]); ?>></td>
                            <td><input type="text" name="goal2" value=<?php echo escape($row["goal2"]); ?>></td>
                            <td><input type="text" name="performance2" value=<?php echo escape($row["performance2"]); ?>></td>
                            <td><input type="text" name="satisfaction2" value=<?php echo escape($row["satisfaction2"]); ?>></td>
                        </tr>
                        <tr>
                            <td><input type="text" name="domain3" value=<?php echo escape($row["domain3"]); ?>></td>
                            <td><input type="text" name="goal3" value=<?php echo escape($row["goal3"]); ?>></td>
                            <td><input type="text" name="performance3" value=<?php echo escape($row["performance3"]); ?>></td>
                            <td><input type="text" name="satisfaction3" value=<?php echo escape($row["satisfaction3"]); ?>></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-md-10 divform">
                    <p>
                        Summary of Standardised assessments:
                    </p>
                    <table id="PatientList" border="1">
                        <thead>
                        <th></th>
                        <th>A</th>
                        <th>B</th>
                        <th>C</th>
                        <th>D</th>
                        <th>E</th>
                        <th>QFM (y/n)</th>
                        </thead>
                        <tbody>
                        <tr>
                            <td>GMFM (scores)</td>
                            <td contenteditable="true"><input type="text" size="4" name="A" value=<?php echo escape($row["A"]); ?>></td>
                            <td contenteditable="true"><input type="text" size="4" name="B" value=<?php echo escape($row["B"]); ?>></td>
                            <td contenteditable="true"><input type="text" size="4" name="C" value=<?php echo escape($row["C"]); ?>></td>
                            <td contenteditable="true"><input type="text" size="4" name="D" value=<?php echo escape($row["D"]); ?>></td>
                            <td contenteditable="true"><input type="text" size="4" name="E" value=<?php echo escape($row["E"]); ?>></td>
                            <td contenteditable="true"><input type="text" size="2" name="QFM" value=<?php echo escape($row["QFM"]); ?>></td>
                        </tr>
                        </tbody>
                    </table>
                    <div class="row">
                        <div class="col-md-5 divform">
                            <p>
                                AHA:
                            </p>
                            <textarea class="largebox" type="text" name="AHA">
                                <?php echo escape($row["AHA"]); ?>
                            </textarea>
                        </div>
                        <div class="col-md-5 divform">
                            <p>
                                Other:
                            </p>
                            <textarea class="largebox" type="text" name="otherS">
                                <?php echo escape($row["otherS"]); ?>
                            </textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5 divform">
                            TUG: <input type="text" size="10" name="TUG" value=<?php echo escape($row["TUG"]); ?>> secs
                        </div>
                        <div class="col-md-5 divform">
                            1MFWT: <input type="text" size="10" name="1MFWT" value=<?php echo escape($row["1MFWT"]); ?>> m
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-5 divform">
                    <p>
                        Summary:
                    </p>
                    <textarea class="largebox" type="text" name="summary">
                        <?php echo escape($row["summary"]); ?>
                    </textarea>
                </div>
                <div class="col-md-5 divform">
                    <p>Decition to inject</p>
                    <lable><input type="radio" name="yes_no" value="yes" <?php if ($row["yes_no"]=="yes") {echo "checked";}?>>Yes</lable>
                    <lable><input type="radio" name="yes_no" value="no" <?php if ($row["yes_no"]=="no") {echo "checked";}?>>No</lable>
                    <br>
                    <lable><input type="checkbox" name="check1" value="y" <?php if ($row["check1"] == "y") {echo "checked";}?>>Complete checklist for day case</lable>
                    <br>
                    <lable><input type="checkbox" name="check2" value="y" <?php if ($row["check2"] == "y") {echo "checked";}?>>Preadmission letter given</lable>
                    <br>
                    <lable><input type="checkbox" name="check3" value="y" <?php if ($row["check3"] =="y") {echo "checked";}?>>Follow up plans on PIMS</lable>
                    <br>
                </div>
            </div>
            <div class="row text-justify">
                <div class="col-md-2 divform">
                    initials: <input type="text" size="10" name="initials" value=<?php echo escape($row["initials"]); ?>>
                </div>
                <div class="col-md-2 divform">
                    Date: <input type="date" size="10" name="date" value=<?php echo escape($row["date"]); ?>>
                </div>


                 <?php } ?>



                <div class="col-md-2 divform pull-right text-jestify" style="margin-right:120px;">
                    <input type="submit" name="submit" value="Submit">
                    <input type="submit" name="save" value="Save">
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
