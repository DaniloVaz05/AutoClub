
document.addEventListener('DOMContentLoaded', () => {
    const loginDiv = document.querySelector('.login');
    const bar = document.querySelector('.bar');


    loginDiv.addEventListener('mouseenter', function () {
        bar.style.width = '100%';
    });

    loginDiv.addEventListener('mouseleave', function () {
        bar.style.width = '0%';
    });

 
});


const h3s1 = document.querySelector('.b3s1')
const barra = document.querySelector('.barra')
h3s1.addEventListener('mouseenter', function () {
    barra.style.width = '0%';
    barra.style.transition = '0.6s'
});
h3s1.addEventListener('mouseleave', function () {
    barra.style.width = '240px';
    barra.style.transition = '0.6s'
});


const h3s2 = document.querySelector('.b3s2')
const barra2 = document.querySelector('.barra2')
h3s2.addEventListener('mouseenter', function () {
    barra2.style.width = '0%';
    barra2.style.transition = '0.6s'
});
h3s2.addEventListener('mouseleave', function () {
    barra2.style.width = '240px';
    barra2.style.transition = '0.6s'
});

document.addEventListener("DOMContentLoaded", function () {
    VanillaTilt.init(document.querySelector(".logo"), {
        max: 20,     // era 25
        speed: 400  //era 400
    });
});

