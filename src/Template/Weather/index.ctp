<?php $this->Html->css('weather-icons.min.css', ['block' => true]);?>


<h1>5 day weather</h1>

<table>
<tr>
<?php
$currentDate = date("Y-m-d");
echo "<h2>$currentDate</h2>";
foreach($weather->list as $item){
    if(date("Y-m-d",$item->dt) != $currentDate){
        $currentDate = date("Y-m-d",$item->dt);
        echo "</table>";
        echo "<h2>$currentDate<h2>";
        echo "<table>";
    }
    echo "<tr><td>".date("H:i:s",$item->dt)."</td>";
echo "<td>"." Temp: ".$item->main->temp."<!-- (Min: ".$item->main->temp_min." Max: ".$item->main->temp_max." )-->"."</td>";
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
    echo "<td> ".$item->weather[0]->description."<i class='$weatherIcon'></i></td>";

    echo "<td> Clouds: ".$item->clouds->all ."%</td>";
    echo "<td> Wind: ".$item->wind->speed."</td>";
    if(!empty($item->rain->{'3h'})){
        echo "<td> Rain: ".$item->rain->{'3h'}."</td>";
    }
    echo "</tr>";
}

?>
</table>

