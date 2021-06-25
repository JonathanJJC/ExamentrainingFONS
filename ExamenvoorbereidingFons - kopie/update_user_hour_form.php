<form class="form" action="update_user_hour.php?id=<?php echo $rows['id']?>" method="post">
            <input type="hidden" name="id" value="<?php echo ($_GET['id']) ?>"><br>
            <input hidden="text" name="type_id" value="<?php echo $rows['id']?>"><br>
            <label>Name</label><br>
            <?php echo "<strong>" . $rows['username'] . "</strong>";?><br>
            <label>Start at</label><br>
            <input type="time" name="start_at" value="<?php echo $rows['start_at']?>"><br>
            <label>End at</label><br>
            <input type="time" name="end_at" value="<?php echo $rows['end_at']?>"><br><br>
            <label>Updated at</label>
            <?php echo "<strong>" . $rows['updated_at'] . "</strong>";?><br><br>
            <label>Created at</label>
             <?php echo "<strong>" . $rows['created_at'] . "</strong>";?><br><br>
            <button type="submit" name="update" value="Update">Update</button>
</form>