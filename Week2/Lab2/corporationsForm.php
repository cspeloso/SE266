<form method="post" action="index.php">

    <!-- $corp box -->
    <label for="corp">Corporation </label><input type="text" name="corp" id="corp" value="<?php echo $corp; ?>"/>
    <br><br>

    <!-- $incorp_dt box -->
    <label for="incorp_dt">incorp_dt </label><input type="text" name="incorp_dt" id="incorp_dt" value="<?php echo $incorp_dt; ?>"/>
    <br><br>

    <!-- $email box -->
    <label for="email">Email </label><input type="text" name="email" id="email" value=" <?php echo $email; ?>"/>
    <br><br>

    <!-- $zipcode box -->
    <label for="zipcode">Zip Code </label><input type="text" name="zipcode" id="zipcode" value="<?php echo $zipcode; ?>"/>
    <br><br>

    <!-- $owner box -->
    <label for="owner">Owner </label><input type="text" name="owner" id="owner" value="<?php $owner; ?>"/>
    <br><br>

    <!-- $phone box -->
    <label for="phone">Phone </label><input type="text" name="phone" id="phone" value="<?php $phone; ?>"/>
    <br><br>


    <input type="submit" name="action" value="Update"/>
</form>