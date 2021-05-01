<?php

include_once("Carrito.php");

$csv = new Carrito();

$csv->selectParaCsv();

include_once('templates/iniciar-html.php');
include_once('templates/menu.php');
?>
<br><br><br>

<div class="chart-container" style="position: relative; height:40vh; width:80vw">
    <canvas id="myChart"></canvas>
</div>

<script>
    const ylabels = [];
    chartIt();

    async function chartIt() {
        await getData();
        const ctx = document.getElementById('myChart').getContext('2d');

        const myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['iPhone 11 Pro Max', 'Samsung Galaxy S21+', 'Galaxy Note 20 Ultra', 'Samsung Galaxy A51', 'Xiaomi Redmi Note 9', 'Nokia 3.4'],
                datasets: [{
                    label: 'Ventas diarias',
                    data: ylabels,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },

        });
    }

    async function getData() {
        const response = await fetch('exportar.csv');
        const data = await response.text();
        //let aux = 1;
        for (let index = 1; index < 7; index++) {
            let contador = 0;
            const table = data.split('\n').slice(1);
            table.forEach(row => {
                const columns = row.split(';');
                const producto = columns[3];
                const temp = columns[2];

                if (index == temp) {
                    contador++;
                } 
            });
            ylabels.push(contador);

        }
        console.log(ylabels);


    }
</script> 

<script src="js/bootstrap.min.js"></script>
</body>

</html>