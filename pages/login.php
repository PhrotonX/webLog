<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>Log In or Sign Up - WebLog</title>
        <link rel="stylesheet" href="../base/style.css" type="text/css"/>
    </head>
    <body>
        <?php require_once '../components/toolbar.html' ?>

        <section id="content">
            <h1>Log In or Sign Up</h1>
            <form action="../base/login_config.php" method="post" name="login-form" autocomplete="on">
                <table>
                    <tr>
                        <td>
                            <label for="login-email">Email: </label>
                        </td>
                        <td>
                            <input class="input-text" type="text" id="login-email" name="login-email"/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="login-password">Password: </label>
                        </td>
                        <td>
                            <input class="input-text" type="password" id="login-password" name="login-password"/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input class="small-button" type="submit">
                            <input class="small-button" type="reset">
                        </td>
                        
                    </tr>
                </table>
            </form>

            <p>Already had an account?</p>
        </section>

        <?php require_once '../components/footer.html' ?>
    </body>
</html>