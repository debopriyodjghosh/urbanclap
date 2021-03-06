<?php
          
           include("config.php");
            $start = 0;
            $limit = 8;
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $start = ($id - 1) * $limit;
            }
            echo "<div class='container'>";
            echo "</div>";
           
            $sql1 = "select * from service_provider LIMIT $start, $limit";
            $stmt_edit = $DB_con->prepare($sql1);
            #$result1 = $stmt_edit->fetchAll();
            $rows = $stmt_edit->rowCount();
            $total = ceil($rows / $limit);
            echo "<br /><ul class='pager'>";
            if ($id > 1) {
                echo "<li><a style='color:white;background-color : #033c73;' href='?id=" . ($id - 1) . "'>Previous Page</a><li>";
            }
            if ($id != $total) {
                echo "<li><a style='color:white;background-color : #033c73;' href='?id=" . ($id + 1) . "' class='pager'>Next Page</a></li>";
            }
            echo "</ul>";
            echo "<center><ul class='pagination pagination-lg'>";
            for ($i = 1; $i <= $total; $i++) {
                if ($i == $id) {
                    echo "<li class='pagination active'><a style='color:white;background-color : #033c73;'>" . $i . "</a></li>";
                } else {
                    echo "<li><a href='?id=" . $i . "'>" . $i . "</a></li>";
                }
            }
            echo "</ul></center>";
            ?>
            <br />



    