<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

$this->title = 'Statistic data';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact">
    <h1><?= Html::encode($this->title) ?></h1>

    <div class="alert alert-success">
        Ok statistic data
    </div>

    <div class="row">
        <div class="col-lg-5 chartcont">
            <svg class="chart"></svg>
        </div>
    </div>

</div>

<?php
if( false ) {
    ?>
    <style>
        .bar {
            fill: steelblue;
        }

        .axis text {
            font: 10px sans-serif;
        }

        .axis path,
        .axis line {
            fill: none;
            stroke: #000;
            shape-rendering: crispEdges;
        }

        .x.axis path {
            display: none;
        }
    </style>
    <script src="http://d3js.org/d3.v3.min.js"></script>
    <script>

        /*
         var sData = 'name  value\nname A   17\nname B   26\nname C   9\nname D   11\nname E   16\nname F   22\nname G   6\nname H   14',
         data = d3.tsv.parse(sData, type);
         //        function(data) {
         x.domain(data.map(function(d) { return d.name; }));
         y.domain([0, d3.max(data, function(d) { return d.value; })]);

         chart.append("g")
         .attr("class", "x axis")
         .attr("transform", "translate(0," + height + ")")
         .call(xAxis);

         chart.append("g")
         .attr("class", "y axis")
         .call(yAxis);

         chart.selectAll(".bar")
         .data(data)
         .enter().append("rect")
         .attr("class", "bar")
         .attr("x", function(d) { return x(d.name); })
         .attr("y", function(d) { return y(d.value); })
         .attr("height", function(d) { return height - y(d.value); })
         .attr("width", x.rangeBand());
         //        });
         */

        var margin = {top: 20, right: 20, bottom: 30, left: 40},
            width = 960 - margin.left - margin.right,
            height = 500 - margin.top - margin.bottom;
        var x = d3.scale.ordinal()
            .rangeRoundBands([0, width], .1);
        var y = d3.scale.linear()
            .range([height, 0]);
        var xAxis = d3.svg.axis()
            .scale(x)
            .orient("bottom");
        var yAxis = d3.svg.axis()
            .scale(y)
            .orient("left")
            .ticks(10, "%");
        var svg = d3.select("body").append("svg")
            .attr("width", width + margin.left + margin.right)
            .attr("height", height + margin.top + margin.bottom)
            .append("g")
            .attr("transform", "translate(" + margin.left + "," + margin.top + ")");
        d3.tsv("/assets/data.tsv", type, function (error, data) {
            x.domain(data.map(function (d) {
                return d.letter;
            }));
            y.domain([0, d3.max(data, function (d) {
                return d.frequency;
            })]);
            svg.append("g")
                .attr("class", "x axis")
                .attr("transform", "translate(0," + height + ")")
                .call(xAxis);
            svg.append("g")
                .attr("class", "y axis")
                .call(yAxis)
                .append("text")
                .attr("transform", "rotate(-90)")
                .attr("y", 6)
                .attr("dy", ".71em")
                .style("text-anchor", "end")
                .text("Frequency");
            svg.selectAll(".bar")
                .data(data)
                .enter().append("rect")
                .attr("class", "bar")
                .attr("x", function (d) {
                    return x(d.letter);
                })
                .attr("width", x.rangeBand())
                .attr("y", function (d) {
                    return y(d.frequency);
                })
                .attr("height", function (d) {
                    return height - y(d.frequency);
                });
        });
        function type(d) {
            d.frequency = +d.frequency;
            return d;
        }

    </script>
<?php
}
?>

<style>

    body {
        font: 10px sans-serif;
    }

    .axis path,
    .axis line {
        fill: none;
        stroke: #000;
        shape-rendering: crispEdges;
    }

    .bar {
        fill: steelblue;
    }

    .x.axis path {
        display: none;
    }

</style>
<body>
<script src="http://d3js.org/d3.v3.min.js"></script>
<script>

    var margin = {top: 20, right: 20, bottom: 30, left: 40},
        width = 960 - margin.left - margin.right,
        height = 500 - margin.top - margin.bottom;

    var x0 = d3.scale.ordinal()
        .rangeRoundBands([0, width], .1);

    var x1 = d3.scale.ordinal();

    var y = d3.scale.linear()
        .range([height, 0]);

    var color = d3.scale.ordinal()
        .range(["#98abc5", "#8a89a6", "#7b6888", "#6b486b", "#a05d56", "#d0743c", "#ff8c00"]);

    var xAxis = d3.svg.axis()
        .scale(x0)
        .orient("bottom");

    var yAxis = d3.svg.axis()
        .scale(y)
        .orient("left")
        .tickFormat(d3.format(".2s"));

    var svg = d3.select(".chartcont").append("svg")
        .attr("width", width + margin.left + margin.right)
        .attr("height", height + margin.top + margin.bottom)
        .append("g")
        .attr("transform", "translate(" + margin.left + "," + margin.top + ")");

    d3.csv("/assets/data1.csv", function(error, data) {
        var ageNames = d3.keys(data[0]).filter(function(key) { return key !== "State"; });

        data.forEach(function(d) {
            d.ages = ageNames.map(function(name) { return {name: name, value: +d[name]}; });
        });

        x0.domain(data.map(function(d) { return d.State; }));
        x1.domain(ageNames).rangeRoundBands([0, x0.rangeBand()]);
        y.domain([0, d3.max(data, function(d) { return d3.max(d.ages, function(d) { return d.value; }); })]);

        svg.append("g")
            .attr("class", "x axis")
            .attr("transform", "translate(0," + height + ")")
            .call(xAxis);

        svg.append("g")
            .attr("class", "y axis")
            .call(yAxis)
            .append("text")
            .attr("transform", "rotate(-90)")
            .attr("y", 6)
            .attr("dy", ".71em")
            .style("text-anchor", "end")
            .text("Population");

        var state = svg.selectAll(".state")
            .data(data)
            .enter().append("g")
            .attr("class", "g")
            .attr("transform", function(d) { return "translate(" + x0(d.State) + ",0)"; });

        state.selectAll("rect")
            .data(function(d) { return d.ages; })
            .enter().append("rect")
            .attr("width", x1.rangeBand())
            .attr("x", function(d) { return x1(d.name); })
            .attr("y", function(d) { return y(d.value); })
            .attr("height", function(d) { return height - y(d.value); })
            .style("fill", function(d) { return color(d.name); });

        var legend = svg.selectAll(".legend")
            .data(ageNames.slice().reverse())
            .enter().append("g")
            .attr("class", "legend")
            .attr("transform", function(d, i) { return "translate(0," + i * 20 + ")"; });

        legend.append("rect")
            .attr("x", width - 18)
            .attr("width", 18)
            .attr("height", 18)
            .style("fill", color);

        legend.append("text")
            .attr("x", width - 24)
            .attr("y", 9)
            .attr("dy", ".35em")
            .style("text-anchor", "end")
            .text(function(d) { return d; });

    });

</script>