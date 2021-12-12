
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Delete User</h5>
                        <p class="card-text">Confirm Deletion of a User.</p>
                        <form action="controller.php" method="POST">
                            <input type="hidden" name="page" value="delete">
                            <input type="hidden" name="userID" value="<?php echo $userid; ?>">
                            <button class="btn btn-primary" type="submit" name="submit" value="CONFIRM" >Confirm</button> 
                            <button class="btn btn-primary" type="submit" name="submit" value="CANCEL" >Cancel</button>   
                        </form>
                    </div>
                </div>      
            </div>
        </div>
    </div>

