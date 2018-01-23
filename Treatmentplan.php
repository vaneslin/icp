<?php
session_start();
if(isset($_SESSION["user"])){
?>
<!DOCTYPE html>
<html>
<head>
    <!-- Bootstrap and CSS -->
    <link rel="stylesheet" href="//cdn.bootcss.com/bootstrap/3.3.1/css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="CSS/Demographics.css">

</head>
<body>

<div class="flex-container">


    <style>

        table, th, td {
            border: 1px solid black;
        }
    </style>

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
            Treatment Plan
            <button>Edit</button>
        </div>
        <div style="font-size: x-large; text-align:center; margin-right:150px;">
            ID: <?php echo $id; ?>
        </div>


                 <?php require "config.php";
                                require "common.php";


                                $conn = new mysqli($host, $username, $password, $dbname);

                $sql = "SELECT * FROM treatmentplan WHERE patientID = ".$id;
                $result = $conn->query($sql); ?>
                            <?php foreach ($result as $row) { ?>

        <form action=<?php echo "treatmentplanphp.php?id=$id"; ?> method="post">
            <div class="row">



                <div class="col-md-5 divform">




                    <p>
                        Decision to inject?
                        <INPUT TYPE="radio" name="q1" value="y" <?php if ($row["q1"] == "y"){echo "checked";} ?>>Yes
                        <INPUT TYPE="radio" name="q1" value="n" <?php if ($row["q1"] == "n"){echo "checked";} ?>>No

                    </p>


                    <p>
                        Contraindications to oral sedation?
                        <INPUT TYPE="radio" name="q2" value="y" <?php if ($row["q2"] == "y"){echo "checked";}?>>Yes
                        <INPUT TYPE="radio" name="q2" value="n"<?php if ($row["q2"] == "n"){echo "checked";} ?>>No

                    </p>


                    <p>
                        If yes, precautions needed: e.g. Factor VIII infusion, tranexamic acid.
                    </p>
                    <textarea class="mediumbox" type="text" name="ifyes"><?php echo escape($row["ifyes"]); ?></textarea>



                    <p>
                        *BLEEDING TENDENCY?*
                        <INPUT TYPE="radio" name="q3" value="y" <?php if ($row["q3"] == "y"){echo "checked";} ?>>Yes
                        <INPUT TYPE="radio" name="q3" value="n" <?php if ($row["q3"] == "n"){echo "checked";} ?>>No

                    </p>
                    <br>



                </div>




                <div class="col-md-5 divform">



                    <p>
                        Add child to General Anaesthetic list
                    <lable><input type="checkbox"  value="y" name="addChild" value="y" <?php if ($row["addChild"] == "y"){echo "checked";} ?>></lable>


                    <br>
                    </p>

                    <p>
                        Any other special precautions? e.g hydrocortisone
                        <lable><input type="checkbox" value="y" name="specialPre" value="y" <?php if ($row["specialPre"] == "y"){echo "checked";} ?>></lable>
                        <br>
                    </p>



                     Sedation decision:

                    <select name  = "dropdown1">
                        <option value="Oral midazolam" <?php if ($row["dropdown1"] == "Oral midazolam"){echo "selected";} ?>>Oral midazolam</option>
                        <option value="EntonoxR" <?php if ($row["dropdown1"] == "EntonoxR"){echo "selected";} ?>>EntonoxR</option>
                        <option value="Chloral"<?php if ($row["dropdown1"] == "Chloral"){echo "selected";} ?>>Chloral</option>
                        <option value="None" <?php if ($row["dropdown1"] == "None"){echo "selected";} ?>>None</option>
                    </select>
                    <br>
                    <br>



                    Skin anaesthesia:

                    <select name = "dropdown2" >
                        <option value="AmetopR"  <?php if ($row["dropdown2"] == "AmetopR"){echo "selected";} ?>>AmetopR</option>
                        <option value="Ethyl chloride spray" <?php if ($row["dropdown2"] == "Ethyl chloride spray"){echo "selected";} ?>>Ethyl chloride spray</option>
                        <option value="other" <?php if ($row["dropdown2"] == "other"){echo "selected";} ?>>other</option>


                    </select>
                    <br>
                    <br>

                    <p>
                        DysportR calculation completed:
                        <INPUT TYPE="radio" name="q4" value="y" <?php if ($row["q4"] == "y"){echo "checked";} ?>>Yes
                        <INPUT TYPE="radio" name="q4" value="n" <?php if ($row["q4"] == "n"){echo "checked";} ?>>No

                    </p>

                    <p>
                        Consent obtained
                        <INPUT TYPE="radio" name="q5" value="y" <?php if ($row["q5"] == "y"){echo "checked";} ?>>Yes
                        <INPUT TYPE="radio" name="q5" value="n" <?php if ($row["q5"] == "n"){echo "checked";} ?>>No

                    </p>

                    <p>
                        Video consent obtained
                        <INPUT TYPE="radio" name="q6" value="y" <?php if ($row["q6"] == "y"){echo "checked";} ?>>Yes
                        <INPUT TYPE="radio" name="q6" value="n" <?php if ($row["q6"] == "n"){echo "checked";} ?>>No

                    </p>



                </div>


                <div class="col-md-5 divform">

                    <p>
                        Target muscles:
                    </p>
                    <textarea class="largebox" type="text" name="targetmuscles" ><?php echo escape($row["targetmuscles"]); ?></textarea>

                </div>

                <div class="col-md-5 divform">

                    <p>
                        Treatment goals:
                    </p>
                    <textarea class="largebox" type="text" name="treatmentgoals"><?php echo escape($row["treatmentgoals"]); ?> </textarea>

                </div>





            </div>



            <div class="col-md-11 divform">
                <p>
                    Child/Family goals
                    (using Modified Canadian Occupational Performance (COPM) scores 0-10)
                </p>
                <br>


                <table style="width:100%">
                    <tr>
                        <th></th>

                        <th class = "FirstColumn">P</th>
                        <th class = "FirstColumn">S</th>
                    </tr>

                    <tr class="boxHeight1">

                        <td > <textarea type="text" name="COPM1" ><?php echo escape($row["COPM1"]); ?></textarea></td>
                        <td ><textarea type="text" name="COPM2" ><?php echo escape($row["COPM2"]); ?></textarea></td>
                        <td ><textarea type="text" name="COPM3"><?php echo escape($row["COPM3"]); ?></textarea></td>
                    </tr>

                </table>


            </div>


            <div class="col-md-11 divform">

                <p>
                Therapy intervention frequency:
                </p>
                <textarea class="customLbox" type="text" name="ThInF"><?php echo escape($row["ThInF"]); ?></textarea>


            </div>

            <div class="col-md-11 divform">

                <p>
                    Physical activity (non therapy):
                </p>
                <textarea class="customLbox" type="text" name="PhAc"><?php echo escape($row["PhAc"]); ?></textarea>


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

            <div class="col-md-11 divform">
                <div style="font-size: medium; text-align: center">
                    Post injection management

                </div>
                <br>


                <p>
                    Special therapeutic intervention?
                    <INPUT TYPE="radio" name="q7" value="y" <?php if ($row["q7"] == "y"){echo "checked";} ?>>Yes
                    <INPUT TYPE="radio" name="q7" value="n" <?php if ($row["q7"] == "n"){echo "checked";} ?>>No

                </p>


                <p>
                    Details:
                </p>
                <textarea class="customLbox" type="text" name="details1"> <?php echo escape($row["details1"]); ?></textarea>


                <p>
                    <br>
                    Casting?
                    <INPUT TYPE="radio" name="q8" value="y" <?php if ($row["q8"] == "y"){echo "checked";} ?>>Yes
                    <INPUT TYPE="radio" name="q8" value="n" <?php if ($row["q8"] == "n"){echo "checked";} ?>>No

                </p>
                <p>
                    Details:
                </p>
                <textarea class="customLbox" type="text" name="details2"><?php echo escape($row["details2"]); ?></textarea>


                <p>

                <br>
                <p>
                    Planned orthotic changes?

                    <INPUT TYPE="radio" name="q9" value="y" <?php if ($row["q9"] == "y"){echo "checked";} ?>>Yes
                    <INPUT TYPE="radio" name="q9" value="n" <?php if ($row["q9"] == "n"){echo "checked";} ?>>No

                </p>

                <p>
                    Details:
                </p>
                <textarea class="customLbox" type="text" name="details3" > <?php echo escape($row["details3"]); ?></textarea>


                <p>
                    <br>


            </div>
          <?php } ?>

        <div class="row text-justify">

                    <div class="col-md-2 divform pull-right text-jestify" style="margin-right:120px;">
                          <input type="submit" name="submit" value="Submit">
                        <input type="submit" name="save" value="Save">
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
