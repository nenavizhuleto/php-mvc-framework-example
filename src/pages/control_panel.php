<?php

if(!Auth::isset()) {
    header("Location: /");
    exit();
}

?>

<div class="control_panel">
    <div class="control_panel__content">
        <h2>Control Panel</h2>
        <div class="panel__group">
            <div class="panel__group__item">
                <a href="">Create post</a>
            </div>
            <div class="panel__group__item">
                <a href="">Create post</a>
            </div>
        </div>
    </div>
</div>