function paddy(n, p, c) {
    var pad_char = typeof c !== 'undefined' ? c : '0';
    var pad = new Array(1 + p).join(pad_char);
    return (pad + n).slice(-pad.length);
}
function updateTime() {
	var time = moment();
        var timeText = time.format("dddd, MMMM Do YYYY, h:mm:ss a");
	$('#clock').text(timeText);

	setTimeout(updateTime, 1000);
}


//start
updateTime();

