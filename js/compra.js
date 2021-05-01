const carro = new Carro();
const carrito= document.getElementById('carrito');
const productos = document.getElementById('lista-productos');
const listaProductos = document.querySelector('#lista-carrito tbody');
const vaciarCarro = document.getElementById('vaciar-carrito');

cargar();

function cargar(){
    productos.addEventListener('click', (e)=>{carro.comprar(e)} );

    carrito.addEventListener('click', (e)=>{carro.eliminar(e)});

    vaciarCarro.addEventListener('click', (e)=>{carro.vaciar(e)});

    document.addEventListener('DOMContentLoaded', carro.leerLocalStorage());
}