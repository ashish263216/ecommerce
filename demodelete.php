<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/boots.css">
    <script src="assets/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    
<div id="myModal" class="modal">
    <div class="modal-dialog">
        <div class="modal-content">
             
            <div class="modal-header">
                <h4 class="modal-title">Delete User</h4>
                <button type="button" class="close" data-dismiss="modal">×</button>
            </div>
 
            <div class="modal-body">
                <p>Are you sure you want to delete this user ?</p>
                <form method="POST" action="delete-user.php" id="form-delete-user">
                    <input type="hidden" name="id">
                </form>
            </div>
 
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" form="form-delete-user" class="btn btn-danger">Delete</button>
            </div>
 
        </div>
    </div>
</div>


<button type="button" class="btn btn-danger" data-id="<?php echo $row->id; ?>" onclick="confirmDelete(this);">Delete</button>



<script>

function confirmDelete(self) {
    var id = self.getAttribute("data-id");
 
    document.getElementById("form-delete-user").id.value = id;
    $("#myModal").modal("show");
}



    </script>




</body>
</html>