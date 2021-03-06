<?php

declare(strict_types=1);
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require "includes/header.php"
?>

<h1>Edit Student Data</h1>

<?php if (isset($message)): ?>
<div class="alert alert-success" role="alert">
    <?php echo $message ?>
</div>
<?php endif; ?>


<form method="post" id="create-user">

    <div class="form-group container container-fluid">
        <input class="form-control" type="hidden" name="id" value="<?php echo $student->getid(); ?>" />

        <label class="form-label" for="first_name">First name:</label>
        <input class="form-control" type="text" name="first_name" id="first_name" required
            value="<?php echo $student->getfirst_name(); ?>" />

        <label class="form-label" for="last_name">Last name:</label>
        <input class="form-control" type="text" name="last_name" id="last_name" required
            value="<?php echo $student->getlast_name(); ?>" />

        <label class="form-label" for="email">Email:</label>
        <input class="form-control" type="text" name="email" id="email" value="<?php echo $student->getemail(); ?>" />

        <label class="form-label" for="class">Class:</label>

        <select name="class" id="class">
            <?php foreach ($classes as $class): ?>
            <option value="<?php echo $class->getclassid() ?>"><?php echo $class->getclassname() ?></option>
            <?php endforeach; ?>
        </select>


        <input class="btn btn-primary ml-4" type="submit" value="Update Student" />


    </div>


</form>

<?php require "includes/footer.php" ?>

<style>
label {
    cursor: pointer;
}

label {
    display: block;
}

form#create-user {
    margin-left: 10px;
}
</style>

</body>

</html>