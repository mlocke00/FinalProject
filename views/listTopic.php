<?php 
   $users = $_REQUEST['topics'];
?>
    <div class="container">
        <div class="col">
            <form action="controller.php" method="GET">
            <button class="btn btn-primary" type="submit" name="page" value="add">Add Topic</button>
            <button class="btn btn-primary" type="submit" name="page" value="delete">Delete Topic</button>
            <table class="table table-bordered table-striped">
                <thead><tr><th>Topic ID</th><th>Topic Name</th><th>Description</th><th>Last Modified</th></tr></thead>
                <tbody>
                    <?php

                        for($index=0;$index<count($topics);$index++){
                            echo "<tr><td><input type=\"radio\" name=\"topID\" value=\"".$topics[$index]->getTopID()."\"></td>";
                            echo "<td>".$topics[$index]->getName()."</td>";
                            echo "<td>".$topics[$index]->getDescription()."</td>";
                            echo "<td>".$topics[$index]->getLastModified()."</td></tr>";
                        }
                    ?>
                </tbody>        
            </table>  
            </form>
        </div>
    </div>