function generatePieChart(){
  
  var data = [{ value: 10, color : "#7cc576"},
            { value: 20, color : "#f26d7d"},
            { value: 30, color : "#00aeef"},
            { value: 40, color : "#f7941d"}],
    dataCircle = {width : 200,height : 200, radius : 100, text : Math.floor((Math.random() * 1000) + 1) };
  
  var chart = d3.select("body section")
  .append("svg")
  .attr("width", dataCircle.width + 40)
  .attr("height", dataCircle.height + 40)
  .append("g")
  .attr("transform", "translate(" + ((dataCircle.width / 2) + 20) + "," + ((dataCircle.height / 2) + 20) + ")");  

  var text = chart
  .append("text")
  .attr("text-anchor", "middle")
  .attr("alignment-baseline","middle")
  .attr("font-size","40")
  .attr("y","16")
  .attr("fill", "#353f43");

  text.append("tspan").text(dataCircle.text).attr("class","dynamic");
  
  text.append("tspan").text("h");
  
  var pie = d3.layout.pie()
  .sort(null)
  .startAngle(Math.PI)
  .endAngle(3 * Math.PI)
  .value(function (d) { 
    return d.value;
  }); 

  var arc = d3.svg.arc()
  .outerRadius(dataCircle.radius)
  .innerRadius(dataCircle.radius - 30);

  var g = chart.selectAll(".arc")
  .data(pie(data))
  .enter()
  .append("g") 
  .attr("class", "arc")
  .append("path")
  .attr("fill" , "#ffffff")
  .transition()
  .duration(1500)
  .attrTween("d", function(d) {
    var interpolate = d3.interpolate(d.startAngle,d.endAngle);
    return function(t) {
      d.endAngle = interpolate(t);
      return arc(d);  
    }; 
  }) 
  .attr("fill", function(d){return d.data.color;});

  $(".dynamic").each(function(){
    var $this = $(this);
    $({someValue: 0}).animate({someValue: $this.text()}, {
      duration: 1500,
      easing:'swing', 
      step: function() { 
        $this.text(Math.round(this.someValue));
      }
    });
  });

}

generatePieChart();

setInterval(function(){
  $('svg').remove();
  generatePieChart();
},2500);
