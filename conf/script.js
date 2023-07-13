


$('.container-slider').slick({
    dots: true,
    arrows:false,
    speed:1000,
    slidesToShow: 3,
    slidesToScroll: 3,
    autoplay: true,
    autoplaySpeed: 3000,
    pauseOnHover:false,
    responsive: [
                {
                  breakpoint: 768,
                  settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                  }
                }],
});


$('.img-top-slider').slick({
        dots: true,
        arrows:false,
        speed:1000,
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 3000,
        pauseOnHover:false,
});

var contatoBtn = document.querySelector('.cta-btn');
contatoBtn.addEventListener('click',()=>{
    Swal.fire({
        title: 'Ops!',
        text: 'Desculpe, mas no momento nosso chat esta desabilitado!',
        icon: 'info',
        confirmButtonText: 'OK'
      });
});

const btnMobile = document.getElementById('btn-Mobile');

function toggleMenu(event){
    if(event.type === 'touchstart') event.preventDefault();
    const menu = document.getElementById('menu');
    menu.classList.toggle('active');
}

btnMobile.addEventListener('click', toggleMenu);
btnMobile.addEventListener('touchstart', toggleMenu);