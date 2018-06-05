
<div>
    <ul id="lightSlider">
        <?php foreach ($files as $file): ?>
        <li>
            <img src="<?php echo $file; ?>" width="160px" />
        </li>
        <?php endforeach; ?>
    </ul>
</div>

<script type="text/javascript">
    (function($) { $(document).ready(function() {
        $("#lightSlider").lightSlider(); 
    })})(jQuery);
</script>