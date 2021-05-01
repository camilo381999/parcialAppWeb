class Carro {
    //Añade el producto al carro
    comprar(e) {
        e.preventDefault();
        if (e.target.classList.contains('agregar')) {
            const producto = e.target.parentElement.parentElement;
            //console.log(producto);
            this.datosProducto(producto);
        }
    }

    datosProducto(producto) {
        const info = {
            imagen: producto.querySelector('img').src,
            titulo: producto.querySelector('.referencia').textContent,
            precio: producto.querySelector('.precio').textContent,
            id: producto.querySelector('a').getAttribute('data-id'),
            cantidad: 1
        }
        this.insertar(info);
    }

    insertar(producto) {
        const row = document.createElement('tr');
        row.innerHTML = `
        <td><img src="${producto.imagen}" width=100></td>
        <td>${producto.titulo}</td>
        <td>${producto.precio}</td>
        <td><a href="#" class="borrar-producto btn btn-primary" data-id="${producto.id}">eliminar</a></td>
        `;
        listaProductos.appendChild(row);
        this.guardarLocalStorage(producto);
    }

    eliminar(e) {
        e.preventDefault();
        let producto, id;
        if (e.target.classList.contains('borrar-producto')) {
            e.target.parentElement.parentElement.remove();
            producto = e.target.parentElement.parentElement;
            id = producto.querySelector('a').getAttribute('data-id');
        }
        this.eliminarLocalStorage(id);
    }

    vaciar(e) {
        e.preventDefault();
        while (listaProductos.firstChild) {
            listaProductos.removeChild(listaProductos.firstChild)
        }
        this.vaciarLocalStorage();
        return false;
    }

    guardarLocalStorage(producto) {
        let productos;
        productos = this.obtenerLocalStorage();
        productos.push(producto);
        localStorage.setItem('productos', JSON.stringify(productos));
    }

    obtenerLocalStorage() {
        let producto;
        if (localStorage.getItem('productos') === null) {
            producto = [];
        } else {
            producto = JSON.parse(localStorage.getItem('productos'));
        }
        return producto;
    }

    //Eliminamos un producto por medio del id
    eliminarLocalStorage(id) {
        let productos;
        //se obtinen los productos del local storage
        productos = this.obtenerLocalStorage();
        //comparamos si los id son iguales para eliminarlo
        productos.forEach(function (producto, index) {
            if (producto.id === id) {
                productos.splice(index, 1);
            }
        });
        // Actualizamos el local storage con los cambios
        localStorage.setItem('productos', JSON.stringify(productos));
    }

    //Se obtienen todos los objeos del local storage y si hay alguno se agrega en el carrito, por si se recarga la pagina
    leerLocalStorage() {
        let productos;
        productos = this.obtenerLocalStorage();
        productos.forEach(function (producto) {
            const row = document.createElement('tr');
            row.innerHTML = `
            <td><img src="${producto.imagen}" width=100></td>
            <td>${producto.titulo}</td>
            <td>${producto.precio}</td>
            <td><a href="#" class="borrar-producto btn btn-primary" data-id="${producto.id}">eliminar</a></td>
            `;
            listaProductos.appendChild(row);
        });
    }

    //Elimina todo lo que hay en el Local storage
    vaciarLocalStorage(){
        localStorage.clear();
    }

}