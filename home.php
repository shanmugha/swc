
<?php

if(isset($_POST['login'])) {
    $loginStatus = false;
    $email       = $_POST['email'];
    $password    = $_POST['password'];
    if (!empty($email) && !empty($password)) {
        $key = md5($password);
        $sql = "select * from user where id = 1";
        $result = mysql_query($sql) or die ('Error updating database: '.mysql_error());
        $_SESSION['user'] = array('email' => $email, 'userId' => mysql_insert_id());
        if ($result) {
            $getRow   = mysql_fetch_row($result);
            $emailFromDb    = $getRow[1];
            $passwordFromDb = $getRow[4];
            if ($email == $emailFromDb && $key == $passwordFromDb) {error_log( $baseurl.'admin.php');
                header('Location:'.$baseurl.'admin/teachers.php');
            }
        }

    }

}
?>

<div class="tabbable">
    <!-- Only required for left/right tabs -->
    <div class="tab-content">
        <div class="tab-pane active" id="tab1">
            <h3>Welcome to our School</h3>
            <p>&nbsp;</p>
            <img src="<?php echo $resourcePath; ?>img/layout/school.jpg" width="632" height="375" class="pcr" />
            <p align="justify"> The three schools, two junior and one senior,
                Foundation in Worcester make up one of the leading academic institutions in the West Midlands and offer an outstanding educational experience.
                The Foundation was inspected at the end of 2011 and you can download here a copy of the official report from ISI.
                The senior school has one of the finest settings of any city school in the country.
                It borders the River Severn in the heart of Worcester and looks across to the Malvern Hills.
                It is adjacent to the Cathedral in an oasis of calm, and yet two minutes'
                walk from the pedestrianised city centre and within easy walking distance of train and bus stations.
                One of the junior schools, King's St Alban's, shares this tranquillity by being next to the senior site;
                the other, King's Hawford, is in a more rural setting just north of the city.
                The three schools, two junior and one senior,
                Foundation in Worcester make up one of the leading academic institutions in the West Midlands and offer an outstanding educational experience.
                The Foundation was inspected at the end of 2011 and you can download here a copy of the official report from ISI.
                The senior school has one of the finest settings of any city school in the country.
                It borders the River Severn in the heart of Worcester and looks across to the Malvern Hills.
                It is adjacent to the Cathedral in an oasis of calm, and yet two minutes'
                walk from the pedestrianised city centre and within easy walking distance of train and bus stations.
                One of the junior schools, King's St Alban's, shares this tranquillity by being next to the senior site;
                the other, King's Hawford, is in a more rural setting just north of the city.</p>
        </div>
        <div class="tab-pane active" id="tab2">
            <h3>&nbsp;</h3>
            <h3>Our Service</h3>
            <p>&nbsp;</p>
            <p align="justify"> The three schools, two junior and one senior,
                Foundation in Worcester make up one of the leading academic institutions in the West Midlands and offer an outstanding educational experience.
                The Foundation was inspected at the end of 2011 and you can download here a copy of the official report from ISI.
                The senior school has one of the finest settings of any city school in the country.
                It borders the River Severn in the heart of Worcester and looks across to the Malvern Hills.
                It is adjacent to the Cathedral in an oasis of calm, and yet two minutes'
                walk from the pedestrianised city centre and within easy walking distance of train and bus stations.
                One of the junior schools, King's St Alban's, shares this tranquillity by being next to the senior site;
                the other, King's Hawford, is in a more rural setting just north of the city.
                The three schools, two junior and one senior,
                Foundation in Worcester make up one of the leading academic institutions in the West Midlands and offer an outstanding educational experience.
                The Foundation was inspected at the end of 2011 and you can download here a copy of the official report from ISI.
                The senior school has one of the finest settings of any city school in the country.
                It borders the River Severn in the heart of Worcester and looks across to the Malvern Hills.
                It is adjacent to the Cathedral in an oasis of calm, and yet two minutes'
                walk from the pedestrianised city centre and within easy walking distance of train and bus stations.
                One of the junior schools, King's St Alban's, shares this tranquillity by being next to the senior site;
                the other, King's Hawford, is in a more rural setting just north of the city. </p>
        </div>
        <div class="tab-pane" id="tab4"></div>
        <div class="tab-pane center" id="tab5">
            <h3>&nbsp;</h3>
            <h4>&nbsp;</h4>
        </div>
    </div>
</div>

