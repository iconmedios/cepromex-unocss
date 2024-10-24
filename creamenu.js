const fs = require('fs');
const path = require('path');

const directorio = 'src/pages/productos';

fs.readdir(directorio, (err, archivos) => {
    if (err) {
        console.error('Error al leer el directorio:', err);
        return;
    }

    // Filtrar solo archivos (excluyendo directorios) y crear un array de objetos con los nombres de archivo
    const productos = archivos
        .filter(archivo => fs.statSync(path.join(directorio, archivo)).isFile()) // Asegurarse de que solo se incluyan archivos
        .map(archivo => {
            const nombreSinExtension = path.basename(archivo, path.extname(archivo)); // Nombre del archivo sin extensión
            return {
                title: nombreSinExtension,
                link: `/${nombreSinExtension}` // Link basado en el nombre del archivo
            };
        });

    // Convertir el array de productos a formato JSON
    const jsonData = JSON.stringify({ productos }, null, 2);

    // Escribir el JSON en un archivo (opcional)
    fs.writeFile('productos.json', jsonData, (err) => {
        if (err) {
            console.error('Error al escribir el archivo JSON:', err);
        } else {
            console.log('Archivo JSON creado correctamente.');
        }
    });
});
