<section class="registration login">
    <h1 class="registration__title">Login</h1>
    <div class="registration__form">
        <label class="registration__msg" style="color: red;">
            <?=$_SESSION['msgError']?>
        </label>
        <form method="post">
            <div class="input-block registration__input-block">
                <label class="input-block__text">E-mail</label>
                <input type="email" name="email" value="<?= $_SESSION['isError'] ? $_POST['email'] : '' ?>" class="input-block__input"/>
            </div>
            <div class="input-block registration__input-block">
                <label class="input-block__text">Password</label>
                <input type="password" name="pas" class="input-block__input"/>
            </div>
            <input type="submit" value="Login" class="registration__btn"/>
        </form>
    </div>
</section>