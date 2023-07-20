<?php if(isset($_GET["message"])): ?>
    <div class="alert alert-success text-center" role="alert" id="alert">
    <?php
    if($_GET['message'] == "successadd"){
        echo "Successfully Added!";
    }elseif($_GET['message'] == "successupdated"){
        echo "Successfully Updated!";
    }elseif($_GET['message'] == "successdeleted"){
        echo "Successfully Deleted!";
    }
    else{
        echo "Failed to update!";
    }
    ?>
    </div>
<?php endif ?>
