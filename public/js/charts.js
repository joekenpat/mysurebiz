google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);
// google.charts.setOnLoadCallback(drawChartUnverified);

function drawChart() {

    var data = google.visualization.arrayToDataTable([
        ['Task', 'Hours per Day'],
        ['Students',     parseInt(students)],
        ['Artisans',      parseInt(artisans)],
        ['Employees',    parseInt(employees)]
    ]);

    var options = {
        title: 'Users Report',
        backgroundColor: {fill: '#f0f5f1'},
        colors: ['#4aa85a','#f48637', '#ed4037']
    };
    var chart = new google.visualization.PieChart(document.getElementById('userspiechart'));
    chart.draw(data, options);
}

// function drawChartUnverified() {
//
//     var data = google.visualization.arrayToDataTable([
//         ['Task', 'Hours per Day'],
//         ['Students',     7],
//         ['Artisans',      10],
//         ['Employees',    4]
//     ]);
//
//     var options = {
//         title: 'Unverified Users Report',
//         backgroundColor: {fill: '#f0f5f1'},
//         colors: ['#4aa85a','#f48637', '#ed4037']
//     };
//     var chart = new google.visualization.PieChart(document.getElementById('Unverifiedpiechart'));
//     chart.draw(data, options);
// }