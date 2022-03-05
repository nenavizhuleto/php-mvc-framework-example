<?php
use ihate\mvc\form\Form;
use ihate\mvc\form\TextAreaField;
$this->title = 'Upload new photo';

?>
<h2>Upload new photo</h2>

<?php $form = Form::begin('', 'post'); ?>
    <?php echo $form->field($model, 'title'); ?>
    <?php echo new TextAreaField($model, 'description') ?>
    <div class="form__group">
        <input type="button" class="form__input form__input--submit" id="uploadBtn" value="Click to upload a file" />
        <input type="file" accept="image/*" name="img" id="imageUpload">
        <img id="imagePreview" src="#" alt="Image">
    </div>
    <input class="form__input form__input--submit" type="submit" value="Upload">
    
<?php Form::end(); ?>

            
<script defer>
    const imageUpload = document.getElementById('imageUpload');
    const imagePreview = document.getElementById('imagePreview');
    const uploadBtn = document.getElementById('uploadBtn');

    uploadBtn.addEventListener('click', () => {
        imageUpload.click();
    })

    imagePreview.style.display = 'none';

    imageUpload.onchange = (evt) => {
        const [file] = imageUpload.files;
        uploadBtn.value = file.name;
        if (file) {
            imagePreview.style.display = 'block';

            imagePreview.src = URL.createObjectURL(file);
        }
    };
</script>