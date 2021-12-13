
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Topics</h5>
                        <p class="card-text">Add a new Topic.</p>
                        <form action="controller.php" method="POST">
                            <input type="hidden" name="page" value="add">
                            <label for="name" class="form-label">Topic Name</label>
                            <input type="text" class="form-control mb-3" id="name" name="name" placeholder="Enter the topic name" required>
                            <label for="description" class="form-label">Description</label>
                            <input type="text" class="form-control mb-3" id="description" name="description" placeholder="Enter the topic description" required>
                            
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>      
            </div>
        </div>
    </div>
