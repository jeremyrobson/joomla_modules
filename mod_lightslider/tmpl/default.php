
<div>
    <ul id="lightSlider">
        <?php foreach ($images as $image): ?>
        <li>
            <img src="<?php echo $this->baseurl ?>/<?php echo $image->src; ?>" width="160px" />
        </li>
        <?php endforeach; ?>
    </ul>
</div>

<script type="text/javascript">
    (function($) { $(document).ready(function() {
        $("#lightSlider").lightSlider(); 
    })})(jQuery);
</script>