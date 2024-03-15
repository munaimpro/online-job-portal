/* Navbar scroll functionality */
const nav = document.querySelector('.navbar');
window.addEventListener('scroll', function(){
    const offset = window.pageYOffset;

    if(offset > 75){
        nav.classList.add('fixed-top');
    } else{
        nav.classList.remove('fixed-top');
    }
});