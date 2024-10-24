<script >
  import { Splide, SplideSlide } from '@splidejs/svelte-splide';
  import '@splidejs/svelte-splide/css';

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



<Splide options={{
perPage: 4, 
type: 'loop', 
// focus: 'center', // Centra la diapositiva activa
rewind: true, 
gap: 10,
autoplay:true,
// heightRatio : 0.3,
// autoWidth: 0 
perMove: 1,
breakpoints:{ 1084:{perPage:2, gap:10 }, 480:{perPage:1} }
}} aria-label="Ejemplo de Splide con Svelte">
<SplideSlide class="slide">
  <div class="bg-zinc-3 text-zinc-6 text-4 p-5 w-full h-60 flex items-center justify-center">
    <p>CONSTRUCCIÓN Y SERVICIO S.A. (HOME DEPOT)</p>
  </div>
</SplideSlide>
<SplideSlide class="slide">
  <div class="bg-zinc-2 text-zinc-6 text-4 p-5 w-full h-60 flex items-center justify-center">
    <p>HOMEX</p>
  </div>
</SplideSlide>
<SplideSlide class="slide">
  <div class="bg-zinc-3 text-zinc-6 text-4 p-5 w-full h-60 flex items-center justify-center">
    <p>OHL,S.A. (CIRCUITO EXTERIOR MEXIQUENSE Y TREN SUBURBANO)</p>
  </div>
</SplideSlide>
<SplideSlide class="slide">
  <div class="bg-zinc-2 text-zinc-6 text-4 p-5 w-full h-60 flex items-center justify-center">
    <p>ICA</p>
  </div>
</SplideSlide>
<SplideSlide class="slide">
  <div class="bg-zinc-3 text-zinc-6 text-4 p-5 w-full h-60 flex items-center justify-center">
   <p>DEMET,S.A.</p>
  </div>
</SplideSlide>
<SplideSlide class="slide">
  <div class="bg-zinc-2 text-zinc-6 text-4 p-5 w-full h-60 flex items-center justify-center">
   <p>FRISA</p>
  </div>
</SplideSlide>
<SplideSlide class="slide">
  <div class="bg-zinc-3 text-zinc-6 text-4 p-5 w-full h-60 flex items-center justify-center">
   <p>INSTALACIÓN EN TODA LA REPUBLICA</p>
  </div>
</SplideSlide>
</Splide>

