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
        $alias = $article->alias;
        $title = $article->title;
        $modified = date("M d, Y \a\\t H:i", strtotime($article->modified));
        $images = json_decode($article->images, true);
        $image_intro = $images["image_intro"];
        $username = $article->username;
        $url = "index.php/" . $category->alias . "/" . $id . "-" . $alias;

        //show end publish date if end publish date is greater than current date + 7 days
        if (strtotime($article->publish_down) > time() + 7 * 24 * 60 * 60) {
            $publish_down_date = date("M/d/Y", strtotime($article->publish_down));
        }

        if (!empty($publish_down_date)) { //if there is an end publish date, show date instead of intro text
            $text = $publish_down_date;
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
                    <?php if (!empty($image_intro)): ?>
                    <div class="col-sm-4">
                        <img src="<?php echo $image_intro; ?>" width="200px" height="100px">
                    </div>
                    <div class="col-sm-8">
                    <?php else: ?>
                    <div class="col-sm-12">
                    <?php endif; ?>

                        <div class="list-group-item-heading">
                            <?php echo $title; ?>
                        </div>
                        <p class="list-group-item-text"?>
                            <?php echo $text; ?>
                        </p>
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