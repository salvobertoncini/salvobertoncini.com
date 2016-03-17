<!DOCTYPE html>
<html lang="en">
    <head>
        <?php @include "head.html"; ?>
        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="assets/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="initialize_insert_post.js"></script>
        <script type="text/javascript" src="insert_work.js"></script>

        <!-- ckeditor -->
    <script src="//cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>

    </head>
    
    <body>
        <?php @include "sidebar.html"; ?>

        <div id="ww">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2 centered">
                        <form action="" method="POST" id="submitForm">
                            <div id="loading"></div>
                            <h2>Inserisci Work</h2>
                                autore: <label>Salvo Bertoncini</label>
                                <br>
                                nome:   <input class="form-control" type="text" name="titolo" id="titolo">
                                <br>
                                link:   <input class="form-control" type="text" name="link" id="link">
                                <br>
                                descrizione: <textarea type="text" name="articolo" id="articolo"></textarea>
                                <script>CKEDITOR.replace( 'articolo' );</script>

                                <br>
                                scegli immagine: <select name="image" class="form-control" id="menuimmagini"></select>
                                <br>
                            <input type="submit" class="btn btn-info" value="Insert" id="Insert">
                        </form>
                    </div><!-- /col-lg-8 -->
                </div><!-- /row -->
            </div> <!-- /container -->
        </div><!-- /ww -->

        <?php @include "footer.php"; ?>

    </body>
</html>