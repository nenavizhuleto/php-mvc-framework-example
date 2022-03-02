<h2>Login</h2>

<?php

use app\core\form\Form;

?>

<?php $form = Form::begin('', 'post'); ?>
    <?php echo $form->field($model, 'username'); ?>
    <?php echo $form->field($model, 'password')->password(); ?>
    <div class="form__row-group">
        <input class="form__input form__input--submit" type="submit" value="Login">
        <a class="form__input form__input--submit" href="/register">Sign up</a>
    </div>
<?php Form::end(); ?>