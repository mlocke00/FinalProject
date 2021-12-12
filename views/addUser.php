
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Users</h5>
                        <p class="card-text">Add a new user.</p>
                        <form action="controller.php" method="POST">
                            <input type="hidden" name="page" value="add">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control mb-3" id="username" name="username" placeholder="Enter your Username" required>
                            <label for="lastname" class="form-label">Last Name</label>
                            <input type="text" class="form-control mb-3" id="lastname" name="lastname" placeholder="Enter your last name" required>
                            <label for="firstname" class="form-label">First Name</label>
                            <input type="text" class="form-control mb-3" id="firstname" name="firstname" placeholder="Enter your first name" required>
                            <label for="passwd" class="form-label">Password</label>
                            <input type="text" class="form-control mb-3" id="passwd" name="passwd" placeholder="Enter your Password" required>
                            <label for="email" class="form-label">Email</label>
                            <input type="text" class="form-control mb-3" id="email" name="email" placeholder="Enter your Email Address" required>
                            <label for="role" class="form-label">Role</label>
                            <input type="text" class="form-control mb-3" id="role" name="role" placeholder="Enter your Role" required>
                            
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>      
            </div>
        </div>
    </div>
