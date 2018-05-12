<?php
defined('_JEXEC') or die('Restricted access');
?>

<style>
    .grid-item { width: 25%; }
    .grid-item--width2 { width: 50%; }
</style>

<script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.min.js"></script>

<div class="row">
    <div class="col-md-6">
        <div class="control-group">
            <div class="controls">
                <label>Filter by Name</label>
                <select id="letter-select">
                    <option value="*">All Growers</option>
                    <?php for ($i = 65; $i <=90; $i++):
                        $letter = chr($i);
                    ?>
                        <option value=".letter-<?=$letter?>"><?=$letter?></option>
                    <?php endfor; ?>
                </select>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="control-group">
            <div class="controls">
                <label>Filter by Berry Type</label>
                <select id="berry-type-select">
                    <option value="*">All Types</option>
                    <?php foreach ($this->berry_types as $key => $name): ?>
                        <option value="<?php echo "." . $key; ?>"><?=$name?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
    </div>
</div>

<div class="grid">
    <?php foreach ($this->farm_profiles as $id => $profile):
        $filter_classes = array();
        $filter_classes[] = "letter-" . substr($profile->farm_name, 0, 1);
        $tags = explode(",", $profile->profile_tags);
        foreach ($tags as $tag) {
            $filter_classes[] = $tag;
        }
    ?>
        <div class="grid-item <?php echo implode(" ", $filter_classes); ?>">
            <a href="index.php?option=com_jeregister&view=farmprofile&id=<?=$id?>">
                <strong><?php echo $profile->farm_name; ?></strong>
                <p>
                    <?php echo $profile->address; ?><br>
                    <?php echo $profile->city; ?> <?php echo $profile->province; ?><br>
                    <?php echo $profile->postal_code; ?><br>
                </p>
            </a>
        </div>
    <?php endforeach; ?>
</div>

<script>

    var $grid, afilter = "*", bfilter = "*";

    (function($) {
        function filter(a, b) {
            $grid.isotope({ filter: a + b });
        }

        $(document).ready(function() {
            $("#letter-select").on("change", function() {
                afilter = $(this).val();
                filter(afilter, bfilter);
            });

            $("#berry-type-select").on("change", function() {
                bfilter = $(this).val();
                filter(afilter, bfilter);
            });

            $grid = $('.grid').isotope({
                itemSelector: '.grid-item',
                layoutMode: 'fitRows'
            });
        });
    })(jQuery);

</script>