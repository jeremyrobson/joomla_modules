<?php
defined('_JEXEC') or die;
?>

<style>
.jernewsbox {
  padding: 20px 0px;
}

.jernewsbox .scroller {
  overflow-y: scroll;
  height: 200px;
}

.jernewsbox .list-group-item-heading {
    font-size: 17.5px;
}

.jernewsbox span {
    color: #666666;
}
</style>

<div class="jernewsbox">

    <h5><?php echo $header; ?></h5>

    <div class="scroller">

        <div class="list-group">

<?php
    foreach ($articles as $index => $article) :
        $id = $article->id;
        $catid = $article->catid;
        $alias = $article->alias;
        $title = $article->title;
        $modified = date("M d, Y \a\\t H:i", strtotime($article->modified));
        $images = json_decode($article->images, true);
        $image_intro = $images["image_intro"];
        $username = $article->username;
        $url = "index.php/" . $category->alias . "/" . $id . "-" . $alias;
        $url = JRoute::_("index.php?view=article&id=$id&catid=$catid");

        //show end publish date if end publish date is greater than current date + 7 days
        if (strtotime($article->publish_down) > time() + 7 * 24 * 60 * 60) {
            $publish_down_date = date("m/d/Y", strtotime($article->publish_down));
        }

        if (!empty($publish_down_date)) { //if there is an end publish date, show date instead of picture, don't show intro text
            $text = "";
        }
        else if (!empty($article->fulltext)) { //show article sample
            $text = substr(str_replace(array("\r", "\n"), "", strip_tags($article->fulltext)), 0, 100) . "...";
        }
        else if (!empty($article->introtext)) { //show intro text
            $text = substr(str_replace(array("\r", "\n"), "", strip_tags($article->introtext)), 0, 100) . "...";
        }
        else { //default text
            $text = "Click here for more information!";
        }
?>

            <a href="<?php echo $url; ?>" class="list-group-item">
                <div class="row">
                    <div class="col-sm-4">
                        <?php if (!empty($image_intro)): ?>
                            <img src="<?php echo $image_intro; ?>" width="200px" height="100px">
                        <?php else: ?>
                            <b><?php echo $publish_down_date; ?></b>
                        <?php endif; ?>
                    </div>
                    <div class="col-sm-8">
                        <div class="list-group-item-heading">
                            <?php echo $title; ?>
                        </div>
                        <?php if (!empty($text)): ?>
                            <p class="list-group-item-text"?>
                                <?php echo $text; ?>
                            </p>
                        <?php endif; ?>
                        <!--
                        <p>
                            <span>by <?php echo $username; ?></span>&nbsp;/&nbsp;<span><?php echo $modified; ?></span>
                        </p>
                        -->
                    </div>
                </div>
            </a>

<?php
    endforeach;
?>

        </div>

    </div>

</div>