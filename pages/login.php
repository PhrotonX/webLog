<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>Log In or Sign Up - WebLog</title>
        <link rel="stylegsheet" href="../base/style.css" type="text/css"/>
    </head>
    <body>
        <?php require_once '../components/toolbar.html' ?>

        <section id="content">
            <h1>Log In or Sign Up</h1>
            <form action="../base/login_config.php" method="post" name="login-form" autocomplete="on">
                <label for="login-email">Email: </label><br>
                <input type="text" id="login-email" name="login-email"/><br>
                <label for="login-password">Password: </label><br>
                <input type="password" id="login-password" name="login-password"/><br>
            </form>

            <p>Already had an account?</p>
        </section>

        <?php require_once '../components/footer.html' ?>
    </body>
</html>