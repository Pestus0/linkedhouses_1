document.addEventListener('DOMContentLoaded', () => {
    const images = [
      '../Media/casa.jpg',
      '../Media/Casa1.jpg',
      '../Media/casaa.jpg',
      '../Media/Departamento.jpg',
      '../Media/Departamento2.jpg'
    ];
    
    const container = document.querySelector('.background-images');
    let currentImageIndex = 0;
  
    // Crear elementos <img> para cada imagen
    images.forEach((src, index) => {
      const img = document.createElement('img');
      img.src = src;
      if (index === 0) img.style.opacity = 1;
      container.appendChild(img);
    });
  
    const imgElements = document.querySelectorAll('.background-images img');
  
    // Cambiar la imagen cada 3 segundos
    setInterval(() => {
      imgElements[currentImageIndex].style.opacity = 0;
      currentImageIndex = (currentImageIndex + 1) % images.length;
      imgElements[currentImageIndex].style.opacity = 1;
    }, 3000);
  });
  const carousel = document.querySelector('.carousel');
const prevBtn = document.getElementById('prevBtn');
const nextBtn = document.getElementById('nextBtn');

let currentIndex = 0;

prevBtn.addEventListener('click', () => {
  if (currentIndex > 0) {
    currentIndex--;
    carousel.style.transform = `translateX(-${currentIndex * 330}px)`;
  }
});

nextBtn.addEventListener('click', () => {
  const cards = document.querySelectorAll('.card');
  if (currentIndex < cards.length - 3) {
    currentIndex++;
    carousel.style.transform = `translateX(-${currentIndex * 330}px)`;
  }
});
function comprar(propiedad) {
    alert(`Redirigiendo a la página de compra de: ${propiedad}`);
    window.location.href =`https://www.ejemplo.com/comprar?propiedad=${encodeURIComponent(propiedad)}`;
}
function consultar(propiedad) {
    alert(`Redirigiendo al formulario de consulta de: Hogar Ideal`);
    window.location.href = `pages/Consultar.html`;
}