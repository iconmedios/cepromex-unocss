console.log('hola');

((d, w) => {

  const navBar = d.querySelector("#navbar")
  window.addEventListener("scroll", () => {
    let posScroll = w.scrollY
    navBar.classList.toggle("sticky", posScroll > 0)
  })

  d.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
      e.preventDefault();

      const targetElement = document.querySelector(this.getAttribute('href'));

      // Ajusta estos valores según tus preferencias
      const scrollOptions = {
        behavior: 'smooth',
        block: 'start',
        inline: 'nearest',
        speed: 500, // milisegundos
        easing: 'easeOutElastic'
      };

      targetElement.scrollIntoView(scrollOptions);
    });
  })

})(document, window)


