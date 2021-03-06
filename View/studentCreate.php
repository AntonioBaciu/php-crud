<?php

declare(strict_types=1);
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require 'includes/header.php' ?>

<h4>Create New Student</h4>
<?php if (isset($message)): ?>
<div class="alert alert-success" role="alert">
    <?php echo $message ?>
</div>
<?php endif; ?>
<form method="post" id="create-student">
    <div class="form-group container container-fluid">
        <input type="hidden" name="id" value="" class="form-control">

        <label for="first_name" class="form-label">First name:</label>
        <input type="text" name="first_name" id="first_name" required class="form-control" />

        <label for="last_name" class="form-label">Last name:</label>
        <input type="text" name="last_name" id="last_name" required class="form-control" />

        <label for="email" class="form-label">Email:</label>
        <input type="text" name="email" id="email" class="form-control" required />

        <label for="class" class="form-label">Class:</label>
        <select name="class" id="class">
            <?php foreach ($classes as $class): ?>
            <option value="<?php echo $class->getclassid() ?>"><?php echo $class->getclassname() ?></option>
            <?php endforeach; ?>
        </select>

        <button type="submit" class="btn btn-primary mt-4">Create Student</button>
    </div>

</form>

<?php require 'includes/footer.php' ?>