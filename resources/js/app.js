require('./bootstrap');

require('chart.js');

window.chartColors = {
    red: 'rgb(255, 99, 132)',
};


const color = Chart.helpers.color;
const config = {
    type: 'radar',
    data: {
        labels: [
            "Diligence", "Smart", "Relationships", "Teach", "Health", "Communication" ],
        datasets: [{
            label: 'label1',
            backgroundColor: color(window.chartColors.red).alpha(0.2).rgbString(),
            borderColor: window.chartColors.red,
            pointBackgroundColor: window.chartColors.red,
            data: [ 10, 6, 6, 8, 9, 7 ],
            notes: [ "Diligence", "Smart", "Relationships", "Teach", "Health", "Communication" ]
        }]
    },
    options: {

        label: {
            display: false,
        },
        legend: {
            display: false,
        },
        title: {
            display: false,
        },
        scale: {
            ticks: {
                beginAtZero: true,
            },
        },
        tooltips: {
            callbacks: {
                title: (tooltipItem, data) => {
                    return data['labels'][tooltipItem[0]['datasetIndex']];
                }, label: (tooltipItem, data) => {
                    return [tooltipItem.yLabel];
                }
            }
        }
    }
};
window.onload = function() {
    const portfolios = document.querySelectorAll('.carousel__item');
    portfolios.forEach(item => {
        item.addEventListener('click', (e) => {
            const img = item.querySelector('img').getAttribute('src');
            const title = item.querySelector('.title').innerText;
            const stacks = item.querySelector('.stacks').innerText;
            const description = item.querySelector('.description').innerHTML;
            const url = item.querySelector('.url').innerHTML;

            document.querySelector('.modal .img').setAttribute('src', img);
            document.querySelector('.modal .title').innerText = title;
            document.querySelector('.modal .stacks').innerText = stacks;
            document.querySelector('.modal .description').innerHTML = description;

            if (url === '') {
                document.querySelector('.modal .url').setAttribute('readonly', 'true');
                document.querySelector('.modal .url').classList.remove('active');
            } else {
                document.querySelector('.modal .url').setAttribute('href', url);
                document.querySelector('.modal .url').setAttribute('readonly', 'false');
                document.querySelector('.modal .url').classList.add('active');
            }

            location.href = '#modal';
        })
    });

    window.myRadar = new Chart(document.getElementById("canvas"), config);
};
