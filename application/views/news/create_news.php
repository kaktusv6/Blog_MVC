<section class="create-news">
    <h1 class="create-news__title">Create current news</h1>
    <h4 class="create-news__successful" color="green">
        <?=$_SESSION['successfulText']?>
        <?$_SESSION['successfulText'] = ''?>
    </h4>
    <h4 class="create-news__error">
        <?=$_SESSION['msgError']?>
        <?$_SESSION['msgError'] = ''?>
    </h4>
    <div class="create-news__form">
        <label class="create-news__label">Choose main image for your news</label>
        <button class="create-news__btn">Choose image</button>
        <form method="post" enctype="multipart/form-data">
            <input type="file" name="urlImgNews" style="display: none;">
            <div class="input-block" style="margin-bottom: 40px;">
                <label class="create-news__label">Enter title for your news</label>
                <br>
                <input style="float: left;" type="text" placeholder="Title" name="titleNews" class="input-block__input">
            </div>
            <br>
            <label class="create-news__label">Enter text for your news</label>
            <textarea name="textNews" value="" class="create-news__textarea"></textarea>
            <input type="submit" value="Post" class="create-news__btn" style="margin-top: 20px;"/>
        </form>
    </div>
    <script>
        tinymce.init({
            selector: 'textarea',
            height: 250,
            menubar: false,
            plugins: [
                'advlist autolink lists link image charmap print preview anchor',
                'searchreplace visualblocks code fullscreen',
                'insertdatetime media table contextmenu paste code'
            ],
            toolbar: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image'
//            content_css: '//www.tinymce.com/css/codepen.min.css'
        });

        $(document).ready(function () {
//            $('input[type=file]').change(function () {
//                $('.create-news__form form').trigger('submit');
//            });
            $('button.create-news__btn').click(function () {
                $('input[type=file]').trigger('click');
            });
        });
    </script>
</section>