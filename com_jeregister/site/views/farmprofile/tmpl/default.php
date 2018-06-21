<?php
defined('_JEXEC') or die('Restricted access');
?>

<h4><?=$this->profile->farm_name; ?></h4>
<p><?=$this->profile->description; ?></p>

<div class="row">
    <div class="col-md-6">

        <h5>Contact</h5>

        <div class="row">
            <div class="col-md-6">
                <?=$this->profile->contact; ?><br>
                <?=$this->profile->address; ?><br>
                <?=$this->profile->city; ?>&nbsp;
                <?=$this->profile->province; ?><br>
                <?=$this->profile->postal_code; ?>
            </div>
            <div class="col-md-6">
                <i class="icon-phone"></i>&nbsp;<?=$this->profile->telephone; ?><br>
                <a href="mailto:<?=$this->profile->email; ?>"><i class="icon-envelope"></i>&nbsp;<?=$this->profile->email; ?></a><br>
                <a href="http://<?=$this->profile->website; ?>"><i class="icon-home"></i>&nbsp;Visit Website</a><br>
                <?php if (!empty($this->profile->facebook)): ?>
                    <a href="<?=$this->profile->facebook; ?>"><i class="icon-home"></i>&nbsp;Visit Facebook</a>
                <?php endif; ?>
            </div>
        </div>

        <br>

        <h5>Activities</h5>

        <?php if ($this->profile->acres_blueberry): ?>
            <div class="row">
                <div class="col-md-6">
                    Blueberry Acres
                </div>
                <div class="col-md-6">
                    <?=$this->profile->acres_blueberry; ?>
                </div>
            </div>
        <?php endif; ?>

        <?php if ($this->profile->acres_raspberry): ?>
            <div class="row">
                <div class="col-md-6">
                    Raspberry Acres
                </div>
                <div class="col-md-6">
                    <?=$this->profile->acres_raspberry; ?>
                </div>
            </div>
        <?php endif; ?>

        <?php if ($this->profile->acres_strawberry): ?>
            <div class="row">
                <div class="col-md-6">
                    Strawberry Acres
                </div>
                <div class="col-md-6">
                    <?=$this->profile->acres_strawberry; ?>
                </div>
            </div>
        <?php endif; ?>

        <?php if ($this->profile->acres_fall_raspberry): ?>
            <div class="row">
                <div class="col-md-6">
                    Fall Raspberry Acres
                </div>
                <div class="col-md-6">
                    <?=$this->profile->acres_fall_raspberry; ?>
                </div>
            </div>
        <?php endif; ?>

        <?php if ($this->profile->acres_fall_strawberry): ?>
            <div class="row">
                <div class="col-md-6">
                    Fall Strawberry Acres
                </div>
                <div class="col-md-6">
                    <?=$this->profile->acres_fall_strawberry; ?>
                </div>
            </div>
        <?php endif; ?>

        <?php if ($this->profile->other_crops): ?>
            <div class="row">
                <div class="col-md-6">
                    Notes/Other Crops
                </div>
                <div class="col-md-6">
                    <?=$this->profile->other_crops; ?>
                </div>
            </div>
        <?php endif; ?>

    </div>

    <div class="col-md-6">
        <div id='map'></div>
    </div>

</div>





