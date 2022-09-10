window.onscroll = function() {myFunction()};

var header = document.getElementById("mainHeader");
var rest = document.getElementById("rest");

var sticky = header.offsetTop;


function myFunction() {
  if (window.pageYOffset > sticky) {
    header.classList.add("sticky");
  } else {
    header.classList.remove("sticky");
	rest.style.paddingTop = "100px";;
  }
}