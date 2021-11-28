let containerLeft= document.querySelector('#container-left');
let containerRight= document.querySelector('#container-right');
let open = document.getElementById('open');
open.addEventListener('click', function () {
    containerLeft.style.animation = "opening-left 2500ms";
    containerRight.style.animation = "opening-right 2500ms";
    open.style.display = "none";
    window.setTimeout(function () {
        containerLeft.style.display = "none";
        containerRight.style.display = "none";
    },2490)
} )