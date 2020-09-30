google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);
// google.charts.setOnLoadCallback(drawChartUnverified);

function drawChart() {

    var data = google.visualization.arrayToDataTable([
        ['Task', 'Hours per Day'],
        ['Completed Trainings',     parseInt(completedCourses)],
        ['Trainings in Progress',      parseInt(coursesInProgress)]
    ]);

    var options = {
        title: 'Training Report',
        backgroundColor: {fill: '#f0f5f1'},
        colors: ['#4aa85a','#f48637', '#ed4037']
    };
    var chart = new google.visualization.PieChart(document.getElementById('userspiechart'));
    chart.draw(data, options);
}