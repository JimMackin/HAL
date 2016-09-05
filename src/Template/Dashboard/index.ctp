<?php $this->Html->css('weather-icons.min.css', ['block' => true]);?>
<?php $this->Html->css('weather.css', ['block' => true]);?>
<?php $this->Html->css('clock.css', ['block' => true]);?>
<div class="row">
<!--    <div class="col-md-4">
    </div>-->
    <div class="col-md-4"><br><br>
        <span id="clock" class="label label-primary"></span>
    </div>
<!--    <div class="col-md-4">
    </div>-->
</div>
<div class="row">
    <div class="col-md-9">
        <h2>Todays weather</h2>
        <?php
        $currentDate = date("Y-m-d");
        echo "<h3>$currentDate</h3>";
        ?>
        <table class="table-bordered">
            <tr>
            <?php
            foreach($weather->list as $item){
                if(date('Y-m-d',$item->dt) !== $currentDate){
                    continue;
                }
                echo "<tr>";
                echo "<td><span class='weatherTime'>".date('H:i',$item->dt)."</span></td>";
                echo "<td>";//." Temp: ".$item->main->temp;
                $weatherIcon = "";
                switch($item->weather[0]->description){
                    case "light rain":
                        $weatherIcon = "wi wi-showers";
                        break;
                    case "moderate rain":
                        $weatherIcon = "wi wi-rain";
                        break;
                    case "few clouds":
                    case "scattered clouds":
                    case "broken clouds":
                    case "overcast clouds":
                    case "few clouds":
                        $weatherIcon = "wi wi-cloud";
                        break;
                    case "clear sky":
                    case "sky is clear":
                        $weatherIcon = "wi wi-day-sunny";
                        break;
                } 
                echo "<span class='weatherDescription'>".ucwords($item->weather[0]->description)."</span><i class='$weatherIcon'></i></td>";
echo "<td><p class='temperature'>".$item->main->temp."°C</p></td>";
//                echo "<td> Clouds: ".$item->clouds->all ."%</td>";
//                echo "<td> Wind: ".$item->wind->speed."</td>";
//                if(!empty($item->rain->{'3h'})){
//                    echo "<td> Rain: ".$item->rain->{'3h'}."</td>";
//                }
                echo "</tr>\n";
            }
            ?>
        </table>
    </div>
    <div class="col-md-3">
        <h2>Next Bin day: <?= $binDay['label']?></h2>
        <ul>
            <?= $binDay->isBrown() ? '<li>Big Brown Bin</li>' : '' ?>
            <?= $binDay->isGrey() ? '<li>Grey Bin</li>' : '' ?>
            <?= $binDay->isBlue() ? '<li>Blue Bin</li>' : '' ?>
            <?= $binDay->isCard() ? '<li>Card Bin</li>' : '' ?>
        </ul>
    </div>
</div>
<?php echo $this->Html->script('moment.min.js');?>
<?php echo $this->Html->script('clock.js');?>
