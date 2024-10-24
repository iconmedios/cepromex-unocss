<script>
    import { Splide, SplideSlide } from '@splidejs/svelte-splide';
    import '@splidejs/svelte-splide/css';
  
    // Array de clientes
    const clientes = [
      "CONSTRUCCIÓN Y SERVICIO S.A. (HOME DEPOT)",
      "HOMEX",
      "OHL,S.A. (CIRCUITO EXTERIOR MEXIQUENSE Y TREN SUBURBANO)",
      "ICA",
      "DEMET,S.A.",
      "FRISA",
      "INSTALACIÓN EN TODA LA REPUBLICA"
    ];
  </script>
  
  <Splide 
    options={{
      perPage: 4, // Muestra 3 diapositivas por página
      type: 'loop', // Permite la navegación circular
      focus: 'center', // Centra la diapositiva activa
      rewind: true, // Permite volver al principio después de la última diapositiva
    }} 
    aria-label="Carrusel de Clientes" 

  >
    {#each clientes as cliente}
      <SplideSlide class="slide w-full">
        <div class="bg-gray-200 w-full h-60 flex items-center justify-center">
          {cliente}
        </div>
      </SplideSlide>
    {/each}
  </Splide>
  

