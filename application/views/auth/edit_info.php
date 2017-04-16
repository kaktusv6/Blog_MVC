<section class="personal-area">
    <h1 class="personal-area__title">Change data</h1>
    <h4 class="personal-area__error">
        <?=$_SESSION['msgError']?>
        <?
        $_SESSION['msgError'] = '';
        $_SESSION['isError'] = false;
        ?>
    </h4>
    <div class="personal-area__form-edit-info">
        <form method="post">
            <div class="input-block personal-area__input-block">
                <label class="input-block__text">Your name</label>
                <input type="text" name="name" value="<?=$data['name']?>" class="input-block__input"/>
            </div>
            <div class="input-block personal-area__input-block">
                <label class="input-block__text">Your email</label>
                <input type="email" name="email" value="<?=$data['email']?>" class="input-block__input"/>
            </div>
            <div class="input-block personal-area__input-block">
                <label class="input-block__text">Your birthday</label>
                <input type="date" name="birthday" value="<?=$data['birthday']?>" class="input-block__input"/>
            </div>
            <button class="edit-info__btn personal-area__btn">Change data</button>
        </form>
    </div>
</section>
