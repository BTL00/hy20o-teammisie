var height = document.documentElement.scrollHeight;
var width = document.documentElement.scrollHeight;

function scroll(event){
    var y = event.clientY;
    var x = event.clientX;

    var yPercentage = y/screen.height;
    var xPercentage = x/screen.width;

    window.scrollTo(1.6*xPercentage*width ,4.3*yPercentage*height);
}

window.onmousemove = scroll;
