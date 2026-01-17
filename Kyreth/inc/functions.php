<?php
function head($name) {
    ?>
        <meta charset="utf-8">
        <title>Kyreth - <?php echo $name ?></title>
        <link rel="stylesheet" href="css/index.css">
        <link rel="shortcut icon" href="img/kyreth-flying.gif" type="image/x-icon">
    <?php
}

function im_headering_it_right_now() {
    ?>
        <header>
            <img src="img/kyreth.png">
            <h1>Kyreth</h1>
        </header>
    <?php
}

function footer() {
    ?>
        <footer>
            <img src="img/kyreth-pet.gif">
        </footer>
    <?php
}