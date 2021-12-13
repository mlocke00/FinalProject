<?php 
   $articles = $_REQUEST['articles'];
?>
    <div class="container">
        <div class="col">
            <form action="controller.php" method="GET">
            <button class="btn btn-primary" type="submit" name="page" value="add">Add Article</button>
            <button class="btn btn-primary" type="submit" name="page" value="delete">Delete Article</button>
            <table class="table table-bordered table-striped">
                <thead><tr><th>Article ID</th><th>Author ID</th><th>Topic ID</th><th>Article Title</th><th>Image</th><th>Content</th><th>Last Modified</th></tr></thead>
                <tbody>
                    <?php

                        for($index=0;$index<count($articles);$index++){
                            echo "<tr><td><input type=\"radio\" name=\"artID\" value=\"".$articles[$index]->getArtID()."\"></td>";
                            echo "<td>".$articles[$index]->getAuthorID()."</td>";
                            echo "<td>".$articles[$index]->getCatID()."</td>";
                            echo "<td>".$articles[$index]->getTitle()."</td></tr>";
                            echo "<td>".$articles[$index]->getImage()."</td>";
                            echo "<td>".$articles[$index]->getContent()."</td>";
                            echo "<td>".$articles[$index]->getLastModified()."</td></tr>";
                        }
                    ?>
                </tbody>        
            </table>  
            </form>
        </div>
    </div>