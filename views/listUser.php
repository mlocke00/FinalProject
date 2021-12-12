<?php 
   $users = $_REQUEST['users'];
?>
    <div class="container">
        <div class="col">
            <form action="controller.php" method="GET">
            <button class="btn btn-primary" type="submit" name="page" value="add">Add User</button>
            <button class="btn btn-primary" type="submit" name="page" value="delete">Delete User</button>
            <table class="table table-bordered table-striped">
                <thead><tr><th>User ID</th><th>Username</th><th>User Last Name</th><th>User First Name</th><th>Password</th><th>Email</th><th>Role</th><th>Last Modified</th></tr></thead>
                <tbody>
                    <?php

                        for($index=0;$index<count($users);$index++){
                            echo "<tr><td><input type=\"radio\" name=\"userID\" value=\"".$users[$index]->getUserID()."\"></td>";
                            echo "<td>".$users[$index]->getUsername()."</td>";
                            echo "<td>".$users[$index]->getLastname()."</td>";
                            echo "<td>".$users[$index]->getFirstname()."</td></tr>";
                            echo "<td>".$users[$index]->getPassword()."</td>";
                            echo "<td>".$users[$index]->getEmail()."</td>";
                            echo "<td>".$users[$index]->getRole()."</td></tr>";
                            echo "<td>".$users[$index]->getLastModified()."</td></tr>";
                        }
                    ?>
                </tbody>        
            </table>  
            </form>
        </div>
    </div>