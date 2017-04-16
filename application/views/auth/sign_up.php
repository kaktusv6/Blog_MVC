<section class="registration">
    <h1 class="registration__title">Registration</h1>
    <div class="registration__form">
        <label class="registration__msg" style="color: red;">
            <?=$_SESSION['msgError']?>
        </label>
        
        <form method="POST">
            <div class="input-block registration__input-block">
                <label class="input-block__text">Name</label>
                <input type="text" name="name" value="<?=$_SESSION['isError'] ? $_POST['name'] : '' ?>" class="input-block__input"/>
            </div>
            <div class="input-block registration__input-block">
                <label class="input-block__text">E-mail</label>
                <input type="email" name="email" value="<?=$_SESSION['isError'] ? $_POST['email'] : '' ?>" class="input-block__input"/>
            </div>
            <div class="input-block registration__input-block">
                <label class="input-block__text">Birthday</label>
                <input type="date" name="birthday" value="<?=$_SESSION['isError'] ? $_POST['birthday'] : '' ?>" class="date input-block__input"/>
            </div>
            <div class="input-block registration__input-block">
                <label class="input-block__text">Password</label>
                <input type="password" name="pas" value="<?=$_SESSION['isError'] ? $_POST['pas'] : '' ?>" class="input-block__input"/>
            </div>
            <div class="input-block registration__input-block">
                <label class="input-block__text">Confrim password</label>
                <input type="password" name="pas_con" value="<?=$_SESSION['isError'] ? $_POST['pas_con'] : '' ?>" class="input-block__input"/>
            </div>
            <input type="submit" value="Registration" class="registration__btn"/>
        </form>
    </div>
</section>