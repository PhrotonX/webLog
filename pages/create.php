<html>
    <head>
        <meta charset="utf-8"/>
        <title>Create Blog</title>
        <link rel="stylesheet" href="../base/style.css" type="text/css"/>
        <script src="script.js"></script>
    </head>
    <body>
        <?php require_once '../components/toolbar.html' ?>

        <section id="content">
            <h1>Create Blog</h1>
            <form action="../base/post_config.php">
                <label for="create-title">Title: </label>
                <input class="input-text" type="text" id="create-title" name="create-title"><br>
                <label for="create-content">Content: </label>
                <input class="input-text" type="text" id="create-content" name="create-content"><br>

                <input class="small-button" type="submit" id="create-submit">
                <input class="small-button" type="reset" id="create-reset>">
            </form>
        </section>

        <?php require_once '../components/footer.html'?>
    </body>
</html>