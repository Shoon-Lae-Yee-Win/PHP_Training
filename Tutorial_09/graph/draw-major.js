var majors = [];
var chart_data = [];

google.charts.load('current', {
    'packages': ['corechart']
});
google.charts.setOnLoadCallback(drawChart);

//drawchart function
function drawChart() {
    students.forEach(student => {
        majors.push(student["major"]);
    });
    majors = removeDuplicate(majors);
    chart_data = countingMajor(majors, students);
    var data = google.visualization.arrayToDataTable(chart_data);
    var options = {
        title: 'Number of students vs Majors'
    };
    var chart = new google.visualization.PieChart(document.getElementById('piechart'));
    chart.draw(data, options);
}

//remove duplicate array function
function removeDuplicate(array) {
    let uniqueItems = array.filter((c, index) => {
        return array.indexOf(c) === index;
    });
    return uniqueItems;
}

//counting function
function countingMajor(majors, students) {
    var tmp_arr = [];
    tmp_arr.push(["Major", "Number of Students"])
    majors.forEach(major => {
        var number = 0;
        students.forEach(student => {
            if (major === student["major"]) {
                number = number + 1;
            }
        });
        tmp_arr.push([major, number]);
    });
    return tmp_arr;
}
