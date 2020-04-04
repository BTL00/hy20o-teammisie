let max_x = window.width;
let max_y = window.height;



let y = window.scrollY;
let x = window.scrollX;

let canv = document.querySelector("div#strona");

canv.addEventListener('mousemove', e => {
  console.log('evnet');
  console.log(canv.offsetWidth);
	newpos_x = canv.offsetWidth * e.pageX / max_x; 
  newpos_y = canv.offsetHeight * e.pageY / max_y; 

	window.scrollTo(newpos_x, newpos_y);
  
});
