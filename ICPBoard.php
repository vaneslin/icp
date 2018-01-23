<?php
session_start();
if(isset($_SESSION["user"])){
?>
<!DOCTYPE html>
<html>
<head>
    <!-- Bootstrap and CSS -->
    <link rel="stylesheet" href="//cdn.bootcss.com/bootstrap/3.3.1/css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="CSS/ICPBoard.css">
    <link rel="stylesheet" href="//cdn.bootcss.com/font-awesome/4.2.0/css/font-awesome.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
    <script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

    <!-- 改动部分，此处引用bootstarp.js和jquery -->

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
                    <?php $id=$_GET['id']; ?>
                    <a href=<?php echo "ICPBoard.php?id=$id" ?>>
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


                <?php if($id==1){echo "<li>
                    <a href=\"showData.html\">
                        <button> Manage Users</button>
                    </a>
                </li>";}
                ?>

            </ul>
        </div>
    </nav>
    <!-- 改动部分结束 -->


    <div id="ICP"></div>
    <!-- ICP board -->
    <article class="article">
        <table id="PatientList" border="1">
            <thead>
            <th>Patient ID</th>
            <th>Name</th>
            <th>DOB</th>
            <th>Gender</th>
            <th>Date of ICP</th>
            <th>Allergies</th>
            <th>Delete</th>
            </thead>
            <tbody>
            <tr>
                <td>Tom Edison</td>
                <td>28/10/2007</td>
                <td>H00367</td>
                <td>28/10/2017</td>
                <td>Cerel Polcy</td>
                <td><a href="Demographics.html"><i class="fa fa-paperclip fa-lg"></i></a></td>
                <td><a><i class="fa fa-close fa-lg"></i></a></td>
            </tr>
            </tbody>
        </table>

        <script type="text/javascript" language="javascript">
             $(document).ready(function() {
                var dataTable = $('#PatientList').DataTable( {
                    "processing": true,
                    "serverSide": true,
                    "ajax": {
                        url: "getDataFromMySQL.php",
                        type: "post"
                    },
                } );

                /*$('#search_text').keyup(function(){
                    dataTable.search($(this).val()).draw();
                })*/
            });
        </script>


    </article>

    <footer>Copyright &copy; ICP Form</footer>

</div>

</body>
</html>

<?php }else{
    header("Location: Cover.php");
} ?>
