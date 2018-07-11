<?php
defined('_JEXEC') or die('Restricted access');
?>

<h4><?=$farm_profile->farm_name; ?></h4>
<p><?=$farm_profile->description; ?></p>

<div class="row">
    <div class="col-md-6">

        <h5>Contact</h5>

        <div class="row">
            <div class="col-md-6">
                <?=$farm_profile->contact; ?><br>
                <?=$farm_profile->address; ?><br>
                <?=$farm_profile->city; ?>&nbsp;
                <?=$farm_profile->province; ?><br>
                <?=$farm_profile->postal_code; ?>
            </div>
            <div class="col-md-6">
                <i class="icon-phone"></i>&nbsp;<?=$farm_profile->telephone; ?><br>
                <a href="mailto:<?=$farm_profile->email; ?>"><i class="icon-envelope"></i>&nbsp;<?=$farm_profile->email; ?></a><br>
                <a href="http://<?=$farm_profile->website; ?>"><i class="icon-home"></i>&nbsp;Visit Website</a><br>
                <?php if (!empty($farm_profile->facebook)): ?>
                    <a href="<?=$farm_profile->facebook; ?>"><i class="icon-home"></i>&nbsp;Visit Facebook</a>
                <?php endif; ?>
            </div>
        </div>

        <br>

        <h5>Crops</h5>

        <?php if ($farm_profile->acres_blueberry): ?>
            <div class="row">
                <div class="col-md-6">
                    Blueberry Acres
                </div>
                <div class="col-md-6">
                    <?=$farm_profile->acres_blueberry; ?>
                </div>
            </div>
        <?php endif; ?>

        <?php if ($farm_profile->acres_raspberry): ?>
            <div class="row">
                <div class="col-md-6">
                    Raspberry Acres
                </div>
                <div class="col-md-6">
                    <?=$farm_profile->acres_raspberry; ?>
                </div>
            </div>
        <?php endif; ?>

        <?php if ($farm_profile->acres_strawberry): ?>
            <div class="row">
                <div class="col-md-6">
                    Strawberry Acres
                </div>
                <div class="col-md-6">
                    <?=$farm_profile->acres_strawberry; ?>
                </div>
            </div>
        <?php endif; ?>

        <?php if ($farm_profile->acres_fall_raspberry): ?>
            <div class="row">
                <div class="col-md-6">
                    Fall Raspberry Acres
                </div>
                <div class="col-md-6">
                    <?=$farm_profile->acres_fall_raspberry; ?>
                </div>
            </div>
        <?php endif; ?>

        <?php if ($farm_profile->acres_fall_strawberry): ?>
            <div class="row">
                <div class="col-md-6">
                    Fall Strawberry Acres
                </div>
                <div class="col-md-6">
                    <?=$farm_profile->acres_fall_strawberry; ?>
                </div>
            </div>
        <?php endif; ?>

        <?php if ($farm_profile->other_crops): ?>
            <div class="row">
                <div class="col-md-6">
                    Notes/Other Crops
                </div>
                <div class="col-md-6">
                    <?=$farm_profile->other_crops; ?>
                </div>
            </div>
        <?php endif; ?>

    </div>

    <div class="col-md-6">
        <div id='map'></div>
    </div>

</div>