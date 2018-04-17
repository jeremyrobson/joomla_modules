<?php
defined('_JEXEC') or die('Restricted access');
?>

<h4><?=$this->profile->farm_name; ?></h4>
<p><?=$this->profile->description; ?></p>

<div class="row">
    <div class="col-md-6">
        <table class="table">
            <tr>
                <th>Address</td>
                <td><?=$this->profile->address; ?></td>
            </tr>
            <tr>
                <th>City</td>
                <td><?=$this->profile->city; ?></td>
            </tr>
            <tr>
                <th>Postal Code</td>
                <td><?=$this->profile->postal_code; ?></td>
            </tr>
            <tr>
                <th>Telephone</td>
                <td><?=$this->profile->telephone; ?></td>
            </tr>
            <tr>
                <th>Contact</td>
                <td><?=$this->profile->contact; ?></td>
            </tr>
            <tr>
                <th>Email</td>
                <td><a href="mailto:<?=$this->profile->email; ?>"><?=$this->profile->email; ?></a></td>
            </tr>
            <tr>
                <th>Website</td>
                <td><a href="<?=$this->profile->website; ?>"><?=$this->profile->website; ?></a></td>
            </tr>
            <tr>
                <th>Facebook</td>
                <td><a href="<?=$this->profile->facebook; ?>"><?=$this->profile->facebook; ?><a/></td>
            </tr>
            <tr>
                <th>Blueberry Acres</td>
                <td><?=$this->profile->acres_blueberry; ?></td>
            </tr>
            <tr>
                <th>Raspberry Acres</td>
                <td><?=$this->profile->acres_raspberry; ?></td>
            </tr>
            <tr>
                <th>Strawberry Acres</td>
                <td><?=$this->profile->acres_strawberry; ?></td>
            </tr>
            <tr>
                <th>Fall Raspberry Acres</td>
                <td><?=$this->profile->acres_fall_raspberry; ?></td>
            </tr>
            <tr>
                <th>Fall Strawberry Acres</td>
                <td><?=$this->profile->acres_fall_strawberry; ?></td>
            </tr>
            <tr>
                <th>Other Crops</td>
                <td><?=$this->profile->other_crops; ?></td>
            </tr>
        </table>
    </div>
    <div class="col-md-6">
        <div id='map'></div>
    </div>
</div>





