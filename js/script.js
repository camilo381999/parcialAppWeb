function sumar(){
    let suma = 0;
    $("tr").each(function(index) {
        res= $(this).text().split("\n");
        //console.log(res[3].trim().replace(/[^0-9\,-]+/g, ""));
        suma = suma + Number(res[3].trim().replace(/[^0-9\,-]+/g, ""));
    });

    var subtotal = suma /1.19;
    var iva = suma - subtotal;
    

    const options2 = { style: 'currency', currency: 'COP' };
    const numberFormat2 = new Intl.NumberFormat('es-CO', options2);
    $("#subtotal").append(numberFormat2.format(subtotal));
    $("#iva").append(numberFormat2.format(iva));
    $("#total").append(numberFormat2.format(suma));
}

sumar();