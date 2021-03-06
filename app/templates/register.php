<?php include '/includes/header.php'; ?>

    <h1>Register</h1>

    <div class="form">
            <form action="/register" method="POST">
                <p>
                    <label>User name : </label>
                    <?php
                    if (isset($parameters['error']['user'])) {
                        echo "<input name='user' type='text' value='".$parameters['user']."' style='background-color:indianred;'/>";
                        echo '<p><span style="color:red; float:center; font-size:14px;">'.$parameters['error']['user'].'</span></p>';
                    } else {
                        echo "<input name='user' value='".$parameters['user']."' type='text' />";
                    }
                    ?>
                </p>
                <p>
                    <label>Password : </label>
                    <?php
                    if (isset($parameters['error']['password'])) {
                        echo "<input name='password' type='password' value='".$parameters['password']."' style='background-color:indianred;'/>";
                        echo '<p><span style="color:red; float:center; font-size:14px;">'.$parameters['error']['password'].'</span></p>';
                    } else {
                        echo "<input name='password' value='".$parameters['password']."' type='password' />";
                    }
                    ?>
                </p>

                <p>
                    <label>Confirmation : </label>
                    <?php
                    if (isset($parameters['error']['confirm'])) {
                        echo "<input name='confirm' type='password' value='".$parameters['confirm']."' style='background-color:indianred;'/>";
                        echo '<p><span style="color:red; float:center; font-size:14px;">'.$parameters['error']['confirm'].'</span></p>';
                    } else {
                        echo "<input name='confirm' value='".$parameters['confirm']."' type='password' />";
                    }
                    ?>
                </p>

                <p>
                    <fieldset id="fieldset_captcha">
                        <p class="centre">Write the follow code to continue.<br /></p>
                        <label for="captcha"><?php echo "<img src='./scripts/captcha.php'; "; ?> </label><br />
                        <?php
                        if (isset($parameters['error']['captcha'])) {
                            echo "<input type='text' name='captcha' id='captcha' style='background-color:indianred;'/>";
                            echo '<p><span style="color:red; float:center; font-size:14px;">'.$parameters['error']['captcha'].'</span></p>';
                        } else {
                            echo "<input type='text' name='captcha' id='captcha' />";
                        }
                        ?>
                        <br />
                    </fieldset>
                </p>

                <input type="submit" value="Register" />
            </form>
    </div>
    <br/>

<?php include '/includes/footer.php'; ?>

