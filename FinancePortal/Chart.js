
function theGraph(datx,daty){

const ctx = document.getElementById('myChart').getContext('2d');

const myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: datx,
        datasets: [{
            label: 'Stock Value',
            data: daty,
            backgroundColor: [
                "rgba(218, 218, 240,0.9)",
                
            ],
            borderColor: [
                "rgba(218, 218, 240,0.9)",
                
            ],
            borderWidth: 2,
            tension: 0.2
        }]
    },
    options: {
        plugins: {
            zoom: {
                zoom: {
                wheel: {
                    enabled: true,
                },
                pinch: {
                    enabled: true,
                },
                pan:{
                    enabled: true,
                },
                mode: 'xy',
                }
            }
        },
        maintainAspectRatio:false,
        responsive: true,
        scales: {
            y: {
                beginAtZero: false,
                responsive: true,
                grid:{
                    display:true,
                }
            },
            x: {
                beginAtZero: true,
                responsive: true,
                grid:{
                    display:false,
                    
                                    },
                ticks:{
                    display:true
                }
            },
        },
             
        elements:{
            point:{
                PointBackgroundColor:"rgba(25, 84, 219, 0.8)",
                pointRadius:0.3,
                pointHitRadius:40,
                pointBorderColor:"rgba(25, 84, 219, 0.8)",
            },
            line:{
                backgroundColor:"rgba(218, 218, 240,0.9)",
                borderColor:"rgba(218, 218, 240,0.9)",
                borderWidth:3,            }
        }
    }
});
 return myChart
}



