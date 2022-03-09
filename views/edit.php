<?php
use ihate\mvc\form\Form;
use ihate\mvc\form\TextAreaField;
$this->title = 'Edit post';

?>
<h2>Edit post</h2>

<?php $form = Form::begin('', 'post', 'enctype="multipart/form-data"'); ?>
    <?php echo $form->field($photo, 'title'); ?>
    <?php echo new TextAreaField($photo, 'description') ?>
    <input class="form__input form__input--submit" type="submit" value="Edit">
    
<?php Form::end(); ?>
