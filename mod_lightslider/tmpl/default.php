
<div>
    <ul id="lightSlider">
        <?php foreach ($files as $file): ?>
        <li>
            <a href="<?php echo $file["url"]; ?>" target="_blank"><img src="<?php echo $file["image"]; ?>" width="160px" /></a>
        </li>
        <?php endforeach; ?>
    </ul>
</div>

<script type="text/javascript">
    (function($) { $(document).ready(function() {
        $("#lightSlider").lightSlider(); 
    })})(jQuery);
</script>