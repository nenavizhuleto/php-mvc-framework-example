<?php

$this->title = 'Create an account';

?>
<h2>Create an account</h2>

<?php

use app\core\form\Form;

?>

<?php $form = Form::begin('', 'post'); ?>
<div class="form__row-group">
    <?php echo $form->field($model, 'firstname'); ?>
    <?php echo $form->field($model, 'lastname'); ?>
</div>
    <?php echo $form->field($model, 'email'); ?>
    <?php echo $form->field($model, 'password')->password(); ?>
    <?php echo $form->field($model, 'passwordConfirm')->password(); ?>
    <input class="form__input form__input--submit" type="submit" value="Sign up">
<?php Form::end(); ?>