<?php
use ihate\mvc\form\Form;
use ihate\mvc\form\TextAreaField;
$this->title = 'Contact Us';

?>
<h2>Contact us</h2>

<?php $form = Form::begin('', 'post'); ?>
    <?php echo $form->field($model, 'subject'); ?>
    <?php echo $form->field($model, 'email'); ?>
    <?php echo new TextAreaField($model, 'body') ?>
    <input class="form__input form__input--submit" type="submit" value="Send">
<?php Form::end(); ?>