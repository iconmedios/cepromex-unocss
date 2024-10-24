import { defineConfig, presetUno, transformerDirectives  } from 'unocss'

export default defineConfig({
    presets:[
        presetUno(),
       
       ],
       theme:{
        colors:{
            'brand':{
                "DEFAULT":"#5b7935",
                50 :"#f3f7ed",
                90 :"#d1dac8",
                100:"#b0bda1",
                200:"#8fa07a",
                300:"#6e8353",
                400:"#4d662c",
                500:"#415624",
                600:"#34451d",
                700:"#273416",
                800:"#1a230f",
                900:"#0d1208"

            },
            'soft' :{
              "DEFAULT":"#dfe5d8",
                10: '#f4f6f2',
                20: '#e9eee5',
                30: '#dfe5d8',
                40: '#d4ddcb',
                50: '#cad4be',
            
            }
        }
    },
    shortcuts:{
        "container"         : "mx-auto w-90% lg:w-90% xl:w-80",
        "centermin"         : "mx-auto w-90% lg:w-60%",
        "ic"                : "items-center",
        "icc"               : "items-center justify-center",
        "icb"               : "items-center justify-between",
        "all400"            : "transition-all transition-duration-400 ",
        "all300"            : "transition-all ease-in-out duration-300",
        "all600"            : "transition-all ease-in-out duration-600",
        "btn-round"         : "border-2 rounded-full",
        "btn-br"          : "border-brand-500 bg-brand-400 hover:bg-brand-500 text-white hover:text-white/80",
        "btn-tr"          : "border-white/80 hover:bg-brand-500 text-white hover:text-white/80",
        "panel-footer"      : "py-18 lg:py-32",
        "panel-contrast"  : "bg-brand text-white/80 ",
        "panel-soft"      : "bg-soft text-brand-600 px-8 "
    },
    
    transformers: [
        transformerDirectives(),
      ],  
      variants:[
        (matcher) => {
            if (matcher.startsWith('visible:')) {
              return {
                matcher: matcher.slice('visible:'.length),
                selector: (s) => `.visible ${s}`,
              }
            }
          }
      ]
})



// 100:"#f3f7ed"




