<?php

$action = $_SERVER['REQUEST_URI']."&upload";
$GLOBALS['router']->get('upload', PostAction::$ACTION_CREATEPOST);

?>


<div class="create-post">
    <div class="create-post__content">
        <h2>Update form</h2>
        <form action="<?= $action ?>" method="POST" class="create-post__form" enctype="multipart/form-data">

            <input 
                class="create-post__input" 
                type="text" 
                name="title" 
                autocomplete="off" 
                placeholder="title"
                id="pTitle">
            <input 
                class="create-post__input" 
                type="text" 
                name="desc" 
                autocomplete="off"
                placeholder="desc"
                id="pDesc">
            <input type="button" class="create-post__input" id="uploadBtn" value="Click to upload a file" />
            <input type="file" accept="image/*" name="imageUpload" id="imageUpload">
            <img id="imagePreview" class="" src="#" alt="Image">

            <input class="create-post__submit" type="submit" value="Create">
        </form>
    </div>
</div>
<script defer>
    const imageUpload = document.getElementById('imageUpload');
    const imagePreview = document.getElementById('imagePreview');
    const uploadBtn = document.getElementById('uploadBtn');
    const photo = JSON.parse(localStorage.getItem('photo'));

    console.log(photo);

    document.getElementById('pTitle').value = photo.title;
    document.getElementById('pDesc').value = photo.desc;
    imagePreview.src = photo.img;



    uploadBtn.addEventListener('click', () => {
        imageUpload.click();
    })

    imageUpload.onchange = (evt) => {
        const [file] = imageUpload.files;
        uploadBtn.value = file.name;
        if (file) {
            imagePreview.classList.remove('hidden');


            imagePreview.src = URL.createObjectURL(file);
        }
    };
</script>