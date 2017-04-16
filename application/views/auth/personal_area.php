<section class="personal-area">
    <div class="personal-area__avatar">
        <div style="background-image: url(<?=$data['urlImage']?>)" class="personal-area__avatar-img img"></div>
    </div>
    <h1 class="personal-area__name"><?=$data['name']?></h1>
    <h2 class="personal-area__birthday"><?=$data['birthday']?></h2>
    <h3 class="personal-area__email"><?=$data['email']?></h3>
    <h4 class="personal-area__error">
        <?=$_SESSION['msgError']?>
        <?
            $_SESSION['msgError'] = '';
            $_SESSION['isError'] = false;
        ?>
    </h4>
    <div class="personal-area__buttons">

        <div class="form-hidden">
            <form method="post" enctype="multipart/form-data">
                <input type="file" name="urlImg">
            </form>
        </div>
        <button class="personal-area__btn" name="change_img">Change avatar</button>

        <form method="get" style="display: inline-block;">
            <button class="personal-area__btn" value="change_info" name="change_info">
                Change personal info
            </button>
        </form>

        <form method="get">
            <button class="personal-area__btn" name="logout" value="1">Logout</button>
        </form>
    </div>
    <script>
        $(document).ready(function () {
            $('input[name="urlImg"]').change(function () {
                $('.form-hidden form').trigger('submit');
            });
            $('.personal-area__btn[name=change_img]').click(function () {
                $('input[type=file]').trigger('click');
            });
        });
    </script>
</section>
