<?php
/*
Now we apply our rules and draw the pagination object.
We're actually saving the code to a variable in case we want to draw it more than once.
*/
$pagination = "";
if ($lastpage > 1) {
    $pagination .= "<div class=\"pagination pagination-centered\"><ul>";
    //previous button
    if ($page > 1)
        $pagination .= "<li><a href=\"$targetpage?page=$prev\">previous</a></li>";
    else
        $pagination .= "<li class=\"disabled\"><a href=\"#\">previous</a></li>";

    //pages
    if ($lastpage < 7 + ($adjacents * 2)) //not enough pages to bother breaking it up
    {
        for ($counter = 1; $counter <= $lastpage; $counter++) {
            if ($counter == $page)
                $pagination .= "<li class=\"active\"><a href=\"#\">$counter</a></li>";
            else
                $pagination .= "<li><a href=\"$targetpage?page=$counter\">$counter</a></li>";
        }
    } elseif ($lastpage > 5 + ($adjacents * 2)) //enough pages to hide some
    {
        //close to beginning; only hide later pages
        if ($page < 1 + ($adjacents * 2)) {
            for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++) {
                if ($counter == $page)
                    $pagination .= "<li class=\"active\"><a href=\"#\">$counter</a></li>";
                else
                    $pagination .= "<a href=\"$targetpage?page=$counter\">$counter</a>";
            }
            $pagination .= "<a href=\"#\">...</a>";
            $pagination .= "<a href=\"$targetpage?page=$lpm1\">$lpm1</a>";
            $pagination .= "<a href=\"$targetpage?page=$lastpage\">$lastpage</a>";
        } //in middle; hide some front and some back
        elseif ($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2)) {
            $pagination .= "<a href=\"$targetpage?page=1\">1</a>";
            $pagination .= "<a href=\"$targetpage?page=2\">2</a>";
            $pagination .= "<a href=\"#\">...</a>";
            for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++) {
                if ($counter == $page)
                    $pagination .= "<li class=\"active\"><a href=\"#\">$counter</a></li>";
                else
                    $pagination .= "<a href=\"$targetpage?page=$counter\">$counter</a>";
            }
            $pagination .= "<a href=\"#\">...</a>";
            $pagination .= "<a href=\"$targetpage?page=$lpm1\">$lpm1</a>";
            $pagination .= "<a href=\"$targetpage?page=$lastpage\">$lastpage</a>";
        } //close to end; only hide early pages
        else {
            $pagination .= "<a href=\"$targetpage?page=1\">1</a>";
            $pagination .= "<a href=\"$targetpage?page=2\">2</a>";
            $pagination .= "<a href=\"#\">...</a>";
            for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++) {
                if ($counter == $page)
                    $pagination .= "<li class=\"active\"><a href=\"#\">$counter</a></li>";
                else
                    $pagination .= "<a href=\"$targetpage?page=$counter\">$counter</a>";
            }
        }
    }

    //next button
    if ($page < $counter - 1)
        $pagination .= "<li><a href=\"$targetpage?page=$next\">next</a></li>";
    else
        $pagination .= "<li class=\"disabled\"><a href=\"#\">next</a></li>";
    $pagination .= "</ul></div>\n";
}
?>

<?php echo $pagination; ?>