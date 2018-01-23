
<!DOCTYPE html>

<html>
<head>
    <!-- Bootstrap and CSS -->
    <link rel="stylesheet" href="//cdn.bootcss.com/bootstrap/3.3.1/css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="CSS/Demographics.css">

</head>
<body>

<div class="flex-container">


    <!-- Title -->
    <header>
        <img class="img" src="img/NHS_Logo.png">
        <h1>Individual Care Pathway</h1>
    </header>
    <!-- Navigation -->
    <div id="topbar" style="background-color: lightgreen" class="row">

        <div class="col-md-2">
            <button><a href="#">Add Patient</a></button>
        </div>
        <div class="col-md-2">
            <button><a href="#">ICP Board</a></button>
        </div>
        <div class="col-md-2">
            <button><a href="#">Instruction</a></button>
        </div>
        <div class="col-md-2">
            <button><a href="#">Log Out</a></button>
        </div>
        <div class="col-md-4">Search ID: <input type=”submit” action=”#” placeholder＝”Search”></div>

    </div>


    <div id="fff"></div>
    <!-- Navigation of ICP form -->




    <!-- Form -->
    <article class="article">
        <div style="font-size: x-large; text-align: center">
            Add a patient
            <button>Edit</button>
        </div>
        <form action="AAA.php" method="post">
            <div class="row">
                <div class="col-md-5 divform">
                    <p>
                        Name of patient: <input type="text" size="10" name="Name">
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
                            <select class="form-control" id="gender1" name="Gender">

                                <option>Male</option>

                                <option>Female</option>

                            </select>
                        </div>
                    </div>
                    <!-- </div> -->
                    <p>
                        Date ICP commenced: <input class="date" type="date" size="3" draggable="true" name="Date of ICP">

                    </p>

                </div>


                <div class="col-md-5 divform">
                    <p>
                        Hospital number: <input type="text" size="20">
                    </p>
                    <p>
                        NHS number: <input type="text" size="20" name="Patient id">
                    </p>
                    <p>
                        Treatment number: <input type="text" size="20">
                    </p>
                    <p>
                        Consultant: <input type="text" size="20">
                    </p>


                </div>
            </div>

            <div class="row">

                <div class="row">
                    <div class="col-md-5 divform">

                        <p>
                            Height:  <input type="text" size="10"> cm - Recorded on:  <input class="date" type="date" size="20" draggable="true">
                        </p>

                        <p>
                            Weight:  <input type="text" size="10"> kg - Recorded on:  <input class="date" type="date" size="20" draggable="true">
                        </p>



                    </div>





                    <div class="col-md-5 divform">
                        <p>
                            Allergies:
                        </p>
                        <textarea class="largebox" type="text"></textarea>

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
                        <input type="submit" name="submit" value="submit">
                        <button>save</button>

                    </div>
                </div>
        </form>
    </article>
    <footer>Copyright &copy; ICP Form</footer>

</div>

</body>
</html>
