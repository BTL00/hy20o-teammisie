var height = document.documentElement.scrollHeight;
var width = document.documentElement.scrollHeight;

function scroll(event){
    var y = event.clientY;
    var x = event.clientX;

    var yPercentage = y/screen.height;
    var xPercentage = x/screen.width;

    window.scrollTo(1.8*xPercentage*width - 150 ,5*yPercentage*height-150);
}

window.onmousemove = scroll;
