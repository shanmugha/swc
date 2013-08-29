<?php include('header.php'); ?>
    <body>

    <div class="wrapper">
        <?php
        try {
            $sql_album = "select * from album";
            $album = mysql_query($sql_album) or die ('Error updating database: ' . mysql_error());
            while ($albumRow = mysql_fetch_object($album)):
                $sql_upload = "select path from uploads where album = '$albumRow->id' order by rand() limit 1 ";
                $upload = mysql_query($sql_upload) or die ('Error updating database: ' . mysql_error());
                $uploadRow = mysql_fetch_object($upload);
                $albumUploadDetails[] = array('album_name' => $albumRow->album_name, 'description' => $albumRow->description, 'path' => $uploadRow->path);
            endwhile;
        } catch (Exception $e) {
            echo $e->getMessage();
            die;
        }

        ?>
        <section class="content-pg clearfix">
            <?php
            foreach ($albumUploadDetails as $albumUploadDetail) {
                ?>
                <div class="folder">
                    <div class="folder-mp"></div>
                    <a class="folder-link" href="#">
                        <div class="thump">
                            <img src="<?php echo $albumUploadDetail['path']; ?>"/>
                        </div>
                        <h3><?php echo $albumUploadDetail['album_name']; ?></h3>

                        <p><?php echo $albumUploadDetail['description']; ?></p>
                    </a>
                </div>
            <?php } ?>
            
        </section>

    </div>
    </body>
<?php include('footer.php'); ?>