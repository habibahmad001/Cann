<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo $pageTitle;?></title>
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo $this->config->base_url()."public/";?>user/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
	

    <!-- MetisMenu CSS -->
    <link href="<?php echo $this->config->base_url()."public/";?>user/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="<?php echo $this->config->base_url()."public/";?>user/dist/css/timeline.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo $this->config->base_url()."public/";?>user/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="<?php echo $this->config->base_url()."public/";?>user/bower_components/morrisjs/morris.css" rel="stylesheet">
	 <link href="<?php echo $this->config->base_url()."public/";?>user/css/line-g.css" rel="stylesheet">
	 <link href="<?php echo $this->config->base_url()."public/";?>user/css/pie.css" rel="stylesheet">
	 <link href="<?php echo $this->config->base_url()."public/";?>user/css/progress.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo $this->config->base_url()."public/";?>user/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo $this->config->base_url()."public/";?>user/css/animated.css" rel="stylesheet" type="text/css">
    
    <script src="<?php echo $this->config->base_url()."public/";?>user/bower_components/jquery/dist/jquery.min.js"></script>
    <script language="javascript" src="<?php echo $this->config->base_url()."public/";?>user/js/function.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
<style>
.pie {
background:
 h1 {
    text-align : center; 
    color : white;
    font-family: "Arial", arial, sans-serif;
  }

  section {
    background : white;
    margin : auto; 
    width : 400px; 
    height : 300px;
    padding-top : 50px;
    padding-left : 150px;
    border : 2px dashed rgba(#000,0.4);
    @include border-radius(5px);
  }


</style>
</head>

<body>
<form action="" name="frm" id="frm" method="post" enctype="multipart/form-data">
    <div id="wrapper">

        
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo $this->config->base_url();?>user/home"><img src="<?php echo $this->config->base_url()."public/";?>user/images/logo.png"></a>
            </div>
            <!-- /.navbar-header -->

            <?php $this->load->view('user/includes/top-nav');?>
            <!-- /.navbar-top-links -->
           
            <?php $this->load->view('user/includes/left-pan');?>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Account Dashboard</h1>
                </div>
				
                <!-- /.col-lg-12 -->
            </div>
			<!--right Side-->
            <div class="row">

                <div class="col-lg-8">
                  <div class="col-lg-8">
                    <div class="panel panel-default ">
                        <div class="panel-heading" style="display:none">
                            <i class="fa fa-bar-chart-o fa-fw"></i> Keywords & Search Terms
                            <div class="pull-right">
                                <div class="btn-group">
                            
                                </div>
                            </div>
                        </div>
                    <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
								<script>
								$( document ).ready(function() {
							$('.barra-nivel').each(function() {
  var valorLargura = $(this).data('nivel');
  var valorNivel = $(this).html("<span class='valor-nivel'>"+valorLargura+"</span>");
    $(this).animate({
        width: valorLargura
    });
});
</script>
                                    <div class="table-responsive barras">
									<table class="table table-bordered table-hover table-striped">
                                            <thead>
                                                <tr>
                                                   <th width="38%" >Keywords & Search Terms</th> 
                                                  <th width="62%"><div class="barra"><div class="barra-nivel" data-nivel="100%"></div></div></th>
                                           
                                                </tr>
												<tr>
                                                   <th width="38%">Budget  & Impression Share</th> 
                                                  <th width="62%"><div class="barra"><div class="barra-nivel" data-nivel="100%"></div></div></th>
                                           
                                                </tr>
												<tr>
                                                   <th width="38%">Quality Score & Text Ads</th> 
                                                  <th width="62%"><div class="barra"><div class="barra-nivel" data-nivel="100%"></div></div></th>
                                           
                                                </tr>
												<tr>
                                                   <th width="38%">Targeting</th> 
                                                  <th width="62%"><div class="barra"><div class="barra-nivel" data-nivel="100%"></div></div></th>
                                           
                                                </tr>
												<tr>
                                                   <th width="38%">CPL Trend & Ad Consistency</th> 
                                                  <th width="62%"><div class="barra"><div class="barra-nivel" data-nivel="100%"></div></div></th>
                                           
                                                </tr>
                                            </thead>
                                    
                                        </table>
									
                                     


									 
									 


							 
									 
									 
									 
									 
									 
                                    </div>
                                    <!-- /.table-responsive -->
                                </div>
                            </div>
                    </div>

                    </div>
					</div>

                  <div class="col-lg-4">
                       <h3>Your Avererage Score</h3>

<div class="bar_container">
	<div id="main_container">
		<div id="pbar" class="progress-pie-chart" data-percent="0">
			<div class="ppc-progress">
				<div class="ppc-progress-fill"></div>
			</div>
			<div class="ppc-percents">
				<div class="pcc-percents-wrapper">
				<span>%</span>
				</div>
			</div>
		</div>
	
	<progress style="display: none" id="progress_bar" value="0" max="100"></progress>
	</div>
</div>
   <!-- jQuery -->
  <script src="<?php echo $this->config->base_url()."public/";?>user/bower_components/jquery/dist/jquery.min.js"></script>
<script>

$(document).ready(function() {

var progressbar = $('#progress_bar');
 max = progressbar.attr('max');
 time = (1000 / max) * 5;
 value = progressbar.val();

var loading = function() {
value += 1;
addValue = progressbar.val(value);

$('.progress-value').html(value + '%');
var $ppc = $('.progress-pie-chart'),
deg = 360 * value / 100;
if (value > 50) {
$ppc.addClass('gt-50');
}

$('.ppc-progress-fill').css('transform', 'rotate(' + deg + 'deg)');
$('.ppc-percents span').html(value + '%');

if (value == max) {
clearInterval(animate);
}
};

var animate = setInterval(function() {
loading();
}, time);
});// JavaScript Document
</script>
					</div>
				  
				  <div class="col-lg-12">
                    
                        

<div class="col-lg-6 greenl-bg" align="center"><h4>CPL Trend & Ad Consistency</h4></div>
<div class="col-lg-6 redl-bg" align="center"><h4>Keywords & Search Terms</h4></div>



 
	</div>
				
			      <div class="col-lg-6" style="display:none">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Pie Chart Example
                        </div>
                        <div id="chart2" class="chart1"></div>
						<script>
						$( document ).ready(function() {
							$('.barra-nivel').each(function() {
  var valorLargura = $(this).data('nivel');
  var valorNivel = $(this).html("<span class='valor-nivel'>"+valorLargura+"</span>");
    $(this).animate({
        width: valorLargura
    });
});
						
  var colors = Highcharts.getOptions().colors,
    categories = ['MSIE', 'Firefox', 'Chrome', 'Safari', 'Opera'],
    name = 'Browser brands',
    data = [{
            y: 55.11,
            color: colors[0],
            drilldown: {
                name: 'MSIE versions',
                categories: ['MSIE 6.0', 'MSIE 7.0', 'MSIE 8.0', 'MSIE 9.0'],
                data: [10.85, 7.35, 33.06, 2.81],
                color: colors[0]
            }
        }, {
            y: 21.63,
            color: colors[1],
            drilldown: {
                name: 'Firefox versions',
                categories: ['Firefox 2.0', 'Firefox 3.0', 'Firefox 3.5', 'Firefox 3.6', 'Firefox 4.0'],
                data: [0.20, 0.83, 1.58, 13.12, 5.43],
                color: colors[1]
            }
        }, {
            y: 11.94,
            color: colors[2],
            drilldown: {
                name: 'Chrome versions',
                categories: ['Chrome 5.0', 'Chrome 6.0', 'Chrome 7.0', 'Chrome 8.0', 'Chrome 9.0',
                    'Chrome 10.0', 'Chrome 11.0', 'Chrome 12.0'],
                data: [0.12, 0.19, 0.12, 0.36, 0.32, 9.91, 0.50, 0.22],
                color: colors[2]
            }
        }, {
            y: 7.15,
            color: colors[3],
            drilldown: {
                name: 'Safari versions',
                categories: ['Safari 5.0', 'Safari 4.0', 'Safari Win 5.0', 'Safari 4.1', 'Safari/Maxthon',
                    'Safari 3.1', 'Safari 4.1'],
                data: [4.55, 1.42, 0.23, 0.21, 0.20, 0.19, 0.14],
                color: colors[3]
            }
        }, {
            y: 2.14,
            color: colors[4],
            drilldown: {
                name: 'Opera versions',
                categories: ['Opera 9.x', 'Opera 10.x', 'Opera 11.x'],
                data: [ 0.12, 0.37, 1.65],
                color: colors[4]
            }
        }];


// Build the data arrays
var browserData = [];
var versionsData = [];
for (var i = 0; i < data.length; i++) {

    // add browser data
    browserData.push({
        name: categories[i],
        y: data[i].y,
        color: data[i].color
    });

    // add version data
    for (var j = 0; j < data[i].drilldown.data.length; j++) {
        var brightness = 0.2 - (j / data[i].drilldown.data.length) / 5 ;
        versionsData.push({
            name: data[i].drilldown.categories[j],
            y: data[i].drilldown.data[j],
            color: Highcharts.Color(data[i].color).brighten(brightness).get()
        });
    }
}


// Create the chart
$('#chart2').highcharts({
    chart: {
        type: 'pie'
    },
    title: {
        text: 'Browser market share, April, 2011'
    },
    yAxis: {
        title: {
            text: 'Total percent market share'
        }
    },
    plotOptions: {
        pie: {
            shadow: false,
            center: ['50%', '50%']
        }
    },
    tooltip: {
      valueSuffix: '%'
    },
    series: [{
        name: 'Browsers',
        data: browserData,
        size: '60%',
        dataLabels: {
            formatter: function() {
                return this.y > 5 ? this.point.name : null;
            },
            color: 'white',
            distance: -30
        }
    }, {
        name: 'Versions',
        data: versionsData,
        size: '80%',
        innerSize: '60%',
        dataLabels: {
            formatter: function() {
                // display only if larger than 1
                return this.y > 1 ? '<b>'+ this.point.name +':</b> '+ this.y +'%'  : null;
            }
        }
    }]
});
});
						
						</script>
					</div>
                    <!-- /.panel -->
                </div>
				
			    </div>
				
                <div class="col-lg-4">
                    <div class="panel panel-default">
                        <div class="panel-heading" style="display:none">
                            <i class="fa fa-bell fa-fw"></i> Youtube Video
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                           <div class="video"><img src="<?php echo $this->config->base_url()."public/";?>user/images/video_bg.jpg"></div> 
                         
                        </div>
						
                        <!-- /.panel-body -->
                    </div>
          
                    <!-- /.panel .chat-panel -->
                </div>
				
              
            <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                         .
							<button>Choose Campaign<div class="drop">
							<ul>
							<a href="#">Campaign1</a>
							<a href="#">Campaign2</a>
							<a href="#">Campaign3</a>
							<a href="#">Campaign4</a>
						</ul>
							</div>
							</button>
                        </div>
<script type="text/javascript" src="http://www.amcharts.com/lib/3/amcharts.js"></script>
<script type="text/javascript" src="http://www.amcharts.com/lib/3/serial.js"></script>
<script type="text/javascript" src="http://www.amcharts.com/lib/3/themes/none.js"></script>
<div id="chartdiv"></div>		
<script>
var chart = AmCharts.makeChart("chartdiv", {
    "type": "serial",
    "theme": "none",
    "marginLeft": 20,
    "pathToImages": "http://www.amcharts.com/lib/3/images/",
    "dataProvider": [{
        "year": "1950",
        "value": -0.307
    }, {
        "year": "1951",
        "value": -0.168
    }, {
        "year": "1952",
        "value": -0.073
    }, {
        "year": "1953",
        "value": -0.027
    }, {
        "year": "1954",
        "value": -0.251
    }, {
        "year": "1955",
        "value": -0.281
    }, {
        "year": "1956",
        "value": -0.348
    }, {
        "year": "1957",
        "value": -0.074
    }, {
        "year": "1958",
        "value": -0.011
    }, {
        "year": "1959",
        "value": -0.074
    }, {
        "year": "1960",
        "value": -0.124
    }, {
        "year": "1961",
        "value": -0.024
    }, {
        "year": "1962",
        "value": -0.022
    }, {
        "year": "1963",
        "value": 0
    }, {
        "year": "1964",
        "value": -0.296
    }, {
        "year": "1965",
        "value": -0.217
    }, {
        "year": "1966",
        "value": -0.147
    }, {
        "year": "1967",
        "value": -0.15
    }, {
        "year": "1968",
        "value": -0.16
    }, {
        "year": "1969",
        "value": -0.011
    }, {
        "year": "1970",
        "value": -0.068
    }, {
        "year": "1971",
        "value": -0.19
    }, {
        "year": "1972",
        "value": -0.056
    }, {
        "year": "1973",
        "value": 0.077
    }, {
        "year": "1974",
        "value": -0.213
    }, {
        "year": "1975",
        "value": -0.17
    }, {
        "year": "1976",
        "value": -0.254
    }, {
        "year": "1977",
        "value": 0.019
    }, {
        "year": "1978",
        "value": -0.063
    }, {
        "year": "1979",
        "value": 0.05
    }, {
        "year": "1980",
        "value": 0.077
    }, {
        "year": "1981",
        "value": 0.12
    }, {
        "year": "1982",
        "value": 0.011
    }, {
        "year": "1983",
        "value": 0.177
    }, {
        "year": "1984",
        "value": -0.021
    }, {
        "year": "1985",
        "value": -0.037
    }, {
        "year": "1986",
        "value": 0.03
    }, {
        "year": "1987",
        "value": 0.179
    }, {
        "year": "1988",
        "value": 0.18
    }, {
        "year": "1989",
        "value": 0.104
    }, {
        "year": "1990",
        "value": 0.255
    }, {
        "year": "1991",
        "value": 0.21
    }, {
        "year": "1992",
        "value": 0.065
    }, {
        "year": "1993",
        "value": 0.11
    }, {
        "year": "1994",
        "value": 0.172
    }, {
        "year": "1995",
        "value": 0.269
    }, {
        "year": "1996",
        "value": 0.141
    }, {
        "year": "1997",
        "value": 0.353
    }, {
        "year": "1998",
        "value": 0.548
    }, {
        "year": "1999",
        "value": 0.298
    }, {
        "year": "2000",
        "value": 0.267
    }, {
        "year": "2001",
        "value": 0.411
    }, {
        "year": "2002",
        "value": 0.462
    }, {
        "year": "2003",
        "value": 0.47
    }, {
        "year": "2004",
        "value": 0.445
    }, {
        "year": "2005",
        "value": 0.47
    }],
    "valueAxes": [{
        "axisAlpha": 0,
        "inside": true,
        "position": "left",
        "ignoreAxisWidth": true
    }],
    "graphs": [{
        "balloonText": "[[category]]<br><b><span style='font-size:14px;'>[[value]]</span></b>",
        "bullet": "round",
        "bulletSize": 6,
        "lineColor": "#d1655d",
        "lineThickness": 2,
        "negativeLineColor": "#637bb6",
        "type": "smoothedLine",
        "valueField": "value"
    }],
    "chartScrollbar": {},
    "chartCursor": {
        "categoryBalloonDateFormat": "YYYY",

        "cursorAlpha": 0,
        "cursorPosition": "mouse"
    },
    "dataDateFormat": "YYYY",
    "categoryField": "year",
    "categoryAxis": {
        "minPeriod": "YYYY",
        "parseDates": true,
        "minorGridAlpha": 0.1,
        "minorGridEnabled": true
    }
});
</script>				 
				 
				 

                    </div>
                    <!-- /.panel -->
                </div>
				
				

        </div>


    </div>
	</div>
    <!-- /#wrapper -->

 

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo $this->config->base_url()."public/";?>user/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo $this->config->base_url()."public/";?>user/bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Flot Charts JavaScript -->
    <script src="<?php echo $this->config->base_url()."public/";?>user/bower_components/flot/excanvas.min.js"></script>
    <script src="<?php echo $this->config->base_url()."public/";?>user/bower_components/flot/jquery.flot.js"></script>
    <script src="<?php echo $this->config->base_url()."public/";?>user/bower_components/flot/jquery.flot.pie.js"></script>
    <script src="<?php echo $this->config->base_url()."public/";?>user/bower_components/flot/jquery.flot.resize.js"></script>
    <script src="<?php echo $this->config->base_url()."public/";?>user/bower_components/flot/jquery.flot.time.js"></script>
    <script src="<?php echo $this->config->base_url()."public/";?>user/bower_components/flot.tooltip/js/jquery.flot.tooltip.min.js"></script>
    <script src="<?php echo $this->config->base_url()."public/";?>user/js/flot-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?php echo $this->config->base_url()."public/";?>user/dist/js/sb-admin-2.js"></script>
	<script type="text/javascript">
$( '.progress-pie-chart' ).append( '<div class="ppc-progress"><div class="ppc-progress-fill"></div></div><div class="ppc-percents"><div class="pcc-percents-wrapper"><span>%</span></div></div></div>' );

$(function(){
  var $ppc = $('.progress-pie-chart'),
    percent = parseInt($ppc.data('percent')),
    deg = 360*percent/100;
  if (percent > 50) {
    $ppc.addClass('gt-50');
  }
  $('.ppc-progress-fill').css('transform','rotate('+ deg +'deg)');
  $('.ppc-percents span').html(percent+'%');
});
</script>
</form>
</body>

</html>
