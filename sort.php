<div style="
        margin: 0;
        position: absolute;
        top: 50%;
        left: 50%;
        -ms-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
      ">
    <?php
    session_start();
    if (empty($_SESSION['ids'])) {
        echo "No students";
        echo "<br /><a href='index.php'> Go Home </a>";
        echo "<br /><a href='add.html'> Add Students </a>";
    } else {
        require 'connection.php';
        $ids = array();
        $ids = $_SESSION['ids'];
        $current_student = $_SESSION['current_student'];



        if (isset($_GET['next'])) {
            runMyFunction();
        }

        if (isset($_GET['house'])) {
            $id = $ids[$_SESSION['current_student']];
            if ($_GET['house'] == 1) {
                $sql = "UPDATE students SET hatId=1 WHERE id=$id";
                if ($conn->query($sql) === TRUE) {
                    $sql = "SELECT * FROM students WHERE id= $id";
                    $result = $GLOBALS['conn']->query($sql);
                    $data =  $result->fetch_assoc();
                    echo $data["firstname"] . " " . $data["lastname"] . " is now Griffindor";
                } else {
                    echo "Error updating record: " . $conn->error;
                }
            }
            if ($_GET['house'] == 2) {
                $sql = "UPDATE students SET hatId=2 WHERE id=$id";
                if ($conn->query($sql) === TRUE) {
                    $id = $ids[$_SESSION['current_student']];
                    $sql = "SELECT * FROM students WHERE id= $id";
                    $result = $GLOBALS['conn']->query($sql);
                    $data =  $result->fetch_assoc();
                    echo $data["firstname"] . " " . $data["lastname"] . " is now Slytherin";
                } else {
                    echo "Error updating record: " . $conn->error;
                }
            }
            if ($_GET['house'] == 3) {
                $sql = "UPDATE students SET hatId=3 WHERE id=$id";
                if ($conn->query($sql) === TRUE) {
                    $id = $ids[$_SESSION['current_student']];
                    $sql = "SELECT * FROM students WHERE id= $id";
                    $result = $GLOBALS['conn']->query($sql);
                    $data =  $result->fetch_assoc();
                    echo $data["firstname"] . " " . $data["lastname"] . " is now Ravenclaw";
                } else {
                    echo "Error updating record: " . $conn->error;
                }
            }
            if ($_GET['house'] == 4) {
                $sql = "UPDATE students SET hatId=4 WHERE id=$id";
                if ($conn->query($sql) === TRUE) {
                    $id = $ids[$_SESSION['current_student']];
                    $sql = "SELECT * FROM students WHERE id= $id";
                    $result = $GLOBALS['conn']->query($sql);
                    $data =  $result->fetch_assoc();
                    echo $data["firstname"] . " " . $data["lastname"] . " is now Hufflepuff";
                } else {
                    echo "Error updating record: " . $conn->error;
                }
            }

            //count griffindor
            $sql = "SELECT count(1) FROM students WHERE hatId = 1";
            $result = $GLOBALS['conn']->query($sql);
            $data =  $result->fetch_assoc();
            $grif = $data["count(1)"];

            //count slytherin
            $sql = "SELECT count(1) FROM students WHERE hatId = 2";
            $result = $GLOBALS['conn']->query($sql);
            $data =  $result->fetch_assoc();
            $sli = $data["count(1)"];

            //count ravenclaw
            $sql = "SELECT count(1) FROM students WHERE hatId = 3";
            $result = $GLOBALS['conn']->query($sql);
            $data =  $result->fetch_assoc();
            $rowe = $data["count(1)"];

            //count haffulpuff
            $sql = "SELECT count(1) FROM students WHERE hatId = 4";
            $result = $GLOBALS['conn']->query($sql);
            $data =  $result->fetch_assoc();
            $huf = $data["count(1)"];

            //calculate giffindor percentage
            $sorted_students = $grif + $sli + $rowe + $huf;
            $grif_percentage = (($grif) / ($sorted_students)) * 100;
            $sli_percentage = (($sli) / ($sorted_students)) * 100;
            $rowe_percentage = (($rowe) / ($sorted_students)) * 100;
            $huf_percentage = (($huf) / ($sorted_students)) * 100;
            echo "<br /><br /><br /><button>Griffindor: " . number_format((float)$grif_percentage, 2, '.', '') . "%</button>";
            echo "<button>Slytherin: " . number_format((float)$sli_percentage, 2, '.', '') . "%</button>";
            echo "<button>Ravenclaw: " . number_format((float)$rowe_percentage, 2, '.', '') . "%</button>";
            echo "<button>Huffulpuff: " . number_format((float)$huf_percentage, 2, '.', '') . "%</button>";
            echo "<br /><a href='sort.php?next=true'><button>Next Student</button></a>";
        }
        
        if ($_SESSION['first_student'] == true) {
            $sql = "SELECT * FROM students WHERE id= $ids[0]";
            $result = $GLOBALS['conn']->query($sql);
            $data =  $result->fetch_assoc();
            echo "First Name:" . $data["firstname"] . "<br>";
            echo "Last Name:" . $data["lastname"] . "<br>";
            echo "age:" . $data["age"] . "<br>";
            echo "Interests:" . $data["interests"] . "<br>";
            $_SESSION['first_student'] = false;
            echo "<button><a href='sort.php?house=1'>Griffindor</a></button>";
            echo "<button><a href='sort.php?house=2'>Slytherin</a></button>";
            echo "<button><a href='sort.php?house=3'>Ravenclaw</a></button>";
            echo "<button><a href='sort.php?house=4'>Hafulpuff</a></button>";
            echo "<br /><button><a href='sort.php?next=true'>Next Student</a></button";
        }
    }

    function runMyFunction()
        {

            if ($_SESSION['current_student'] < count($_SESSION['ids']) - 1 ) {
                global $ids;
                $_SESSION['current_student'] = $_SESSION['current_student'] + 1;
                $id = $ids[$_SESSION['current_student']];
                $sql = "SELECT * FROM students WHERE id= $id";
                $result = $GLOBALS['conn']->query($sql);
                $data =  $result->fetch_assoc();
                echo "First Name:" . $data["firstname"] . "<br>";
                echo "Last Name:" . $data["lastname"] . "<br>";
                echo "age:" . $data["age"] . "<br>";
                echo "Interests:" . $data["interests"] . "<br>";
                echo "<a href='sort.php?house=1'><button>Griffindor</button></a>";
                echo "<a href='sort.php?house=2'><button>Slytherin</button></a>";
                echo "<a href='sort.php?house=3'><button>Ravenclaw</button></a>";
                echo "<a href='sort.php?house=4'><button>Hafulpuff</button></a>";
                echo "<br /><a href='sort.php?next=true'><button>Next Student</button></a>";
            } else {
                echo "end of students";
                echo "<br /><a href='index.php'> Go Home </a>";
            }
        }


    ?>




</div>