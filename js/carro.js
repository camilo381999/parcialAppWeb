class Carro{
    //Añade el producto al carro
    comprar(e){
        e.preventDefault();
        if(e.target.classList.contains('agregar')){
            const producto = e.target.parentElement.parentElement;
            //console.log(producto);
            this.datosProducto(producto);
        }
    }

    datosProducto(producto){
        const info = {
            imagen : producto.querySelector('img').src,
            titulo : producto.querySelector('.referencia').textContent,
            precio : producto.querySelector('.precio').textContent,
            id : producto.querySelector('a').getAttribute('data-id'),
            cantidad : 1
        }
        this.insertar(info);
    }

    insertar(producto){
        const row = document.createElement('tr');
        row.innerHTML = `
        <td><img src="${producto.imagen}" width=100></td>
        <td>${producto.titulo}</td>
        <td>${producto.precio}</td>
        <td><a href="#" class="borrar-producto btn btn-primary" data-id="${producto.id}">eliminar</a></td>
        `;
        listaProductos.appendChild(row);      
    }

    eliminar(e){
        e.preventDefault();
        let producto, id;
        if (e.target.classList.contains('borrar-producto')) {
            e.target.parentElement.parentElement.remove();
            producto = e.target.parentElement.parentElement;
            id = producto.querySelector('a').getAttribute('data-id');
            
        }
    }

    vaciar(e){
        e.preventDefault();
        while (listaProductos.firstChild) {
            listaProductos.removeChild(listaProductos.firstChild)
        }
        return false;
    }


}