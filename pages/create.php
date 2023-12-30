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
                <table class="form-table">
                    <colgroup>
                        <col class="form-table-label"/>
                        <col class="form-table-field"/>
                    </colgroup>
                    <tr>
                        <td>
                            <label for="create-title">Title: </label>
                        </td>
                        <td>
                            <input class="input-text" type="text" id="create-title" name="create-title">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="create-content">Content: </label>
                        </td>
                        <td>
                            <input class="input-text" type="text" id="create-content" name="create-content">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input class="small-button" type="submit" id="create-submit">
                            <input class="small-button" type="reset" id="create-reset>">
                        </td>
                        
                    </tr>
                </table>
            </form>
        </section>

        <?php require_once '../components/footer.html'?>
    </body>
</html>