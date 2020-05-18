<?php
$url_tot = 'https://api.covid19india.org/state_district_wise.json';
$data_tot = file_get_contents($url_tot);
$c_tot = json_decode($data_tot, true);

date_default_timezone_set('Asia/Kolkata');
$currentDate = date( 'd-m-Y', time () );
$Date = date( 'd', time () );

$url_daily_tot = 'https://api.covid19india.org/districts_daily.json';
$data_daily_tot = file_get_contents($url_daily_tot);
$daily_tot = json_decode($data_daily_tot, true);



?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <title>
    Covid-19 Updates-Home
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,600,700,800" rel="stylesheet" />
  <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
  <!-- Nucleo Icons -->
  <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link href="../assets/css/black-dashboard.css?v=1.0.0" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="../assets/demo/demo.css" rel="stylesheet" />
  <script type="text/javascript">
function googleTranslateElementInit2() {new google.translate.TranslateElement({pageLanguage: 'en',autoDisplay: false}, 'google_translate_element2');}
</script>
<script type="text/javascript" src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit2"></script>
<script type="text/javascript">
/* <![CDATA[ */
eval(function(p,a,c,k,e,r){e=function(c){return(c<a?'':e(parseInt(c/a)))+((c=c%a)>35?String.fromCharCode(c+29):c.toString(36))};if(!''.replace(/^/,String)){while(c--)r[e(c)]=k[c]||e(c);k=[function(e){return r[e]}];e=function(){return'\\w+'};c=1};while(c--)if(k[c])p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c]);return p}('6 7(a,b){n{4(2.9){3 c=2.9("o");c.p(b,f,f);a.q(c)}g{3 c=2.r();a.s(\'t\'+b,c)}}u(e){}}6 h(a){4(a.8)a=a.8;4(a==\'\')v;3 b=a.w(\'|\')[1];3 c;3 d=2.x(\'y\');z(3 i=0;i<d.5;i++)4(d[i].A==\'B-C-D\')c=d[i];4(2.j(\'k\')==E||2.j(\'k\').l.5==0||c.5==0||c.l.5==0){F(6(){h(a)},G)}g{c.8=b;7(c,\'m\');7(c,\'m\')}}',43,43,'||document|var|if|length|function|GTranslateFireEvent|value|createEvent||||||true|else|doGTranslate||getElementById|google_translate_element2|innerHTML|change|try|HTMLEvents|initEvent|dispatchEvent|createEventObject|fireEvent|on|catch|return|split|getElementsByTagName|select|for|className|goog|te|combo|null|setTimeout|500'.split('|'),0,{}))
/* ]]> */
</script>
  <script type="tex/javascript">
    initDashboardPageCharts: function() {

    gradientChartOptionsConfigurationWithTooltipBlue = {
      maintainAspectRatio: false,
      legend: {
        display: false
      },

      tooltips: {
        backgroundColor: '#f5f5f5',
        titleFontColor: '#333',
        bodyFontColor: '#666',
        bodySpacing: 4,
        xPadding: 12,
        mode: "nearest",
        intersect: 0,
        position: "nearest"
      },
      responsive: true,
      scales: {
        yAxes: [{
          barPercentage: 1.6,
          gridLines: {
            drawBorder: false,
            color: 'rgba(29,140,248,0.0)',
            zeroLineColor: "transparent",
          },
          ticks: {
            suggestedMin: 60,
            suggestedMax: 125,
            padding: 20,
            fontColor: "#2380f7"
          }
        }],

        xAxes: [{
          barPercentage: 1.6,
          gridLines: {
            drawBorder: false,
            color: 'rgba(29,140,248,0.1)',
            zeroLineColor: "transparent",
          },
          ticks: {
            padding: 20,
            fontColor: "#2380f7"
          }
        }]
      }
    };}
  </script>
</head>

<body class="">
  <div class="wrapper">
    <div class="sidebar">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red"
    -->
      <div class="sidebar-wrapper">
        <div class="logo">
          <a href="javascript:void(0)" class="simple-text logo-normal">
            Madurai
          </a>
        </div>
        <ul class="nav">
          <li class="active ">
            <a href="./Home.html">
              <i class="tim-icons icon-chart-pie-36"></i>
              <p>Home</p>
            </a>
          </li>
          <li>
            <a href="./Prediction.html">
              <i class="tim-icons icon-atom"></i>
              <p>Prediction</p>
            </a>
          </li>
          <li>
            <a href="./map.html">
              <i class="tim-icons icon-pin"></i>
              <p>Maps</p>
            </a>
          </li>
          <li>
            <a href="./Contact.html">
              <i class="tim-icons icon-bell-55"></i>
              <p>Emergency Contact</p>
            </a>
          </li>
          <li>
            <a href="./Precaution.html">
              <i class="tim-icons icon-single-02"></i>
              <p>Precautions</p>
            </a>
          </li>
          <li>
            <a href="./List.html">
              <i class="tim-icons icon-puzzle-10"></i>
              <p>Hospital List</p>
            </a>
          </li>
		  <li>
				<div id="google_translate_element2"></div>
		  </li>
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-absolute navbar-transparent">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle d-inline">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand" href="javascript:void(0)">Home</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse" id="navigation">
            <ul class="navbar-nav ml-auto">
              <li class="search-bar input-group">
                <button class="btn btn-link" id="search-button" data-toggle="modal" data-target="#searchModal"><i class="tim-icons icon-zoom-split" ></i>
                  <span class="d-lg-none d-md-block">Search</span>
                </button>
              </li>
              <li class="dropdown nav-item">
                <a href="javascript:void(0)" class="dropdown-toggle nav-link" data-toggle="dropdown">
                  <div class="notification d-none d-lg-block d-xl-block"></div>
                  <i class="tim-icons icon-sound-wave"></i>
                  <p class="d-lg-none">
                    Notifications
                  </p>
                </a>
                <ul class="dropdown-menu dropdown-menu-right dropdown-navbar">
                  <li class="nav-link"><a href="./Prediction.html" class="nav-item dropdown-item">View Predictive cases</a></li>
                  <li class="nav-link"><a href="./Precaution.html" class="nav-item dropdown-item">View Precautions</a></li>
                  <li class="nav-link"><a href="./List.html" class="nav-item dropdown-item">View Medical centres or hospitals</a></li>
                  <li class="nav-link"><a href="./Contact.html" class="nav-item dropdown-item">Contact in case of emergency</a></li>
                </ul>
              </li>
              <li class="dropdown nav-item">
                <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                  <div class="photo">
                    <img src="../assets/img/anime3.png" alt="Profile Photo">
                  </div>
                  <b class="caret d-none d-lg-block d-xl-block"></b>
                  <p class="d-lg-none">
                    Log out
                  </p>
                </a>
                <ul class="dropdown-menu dropdown-navbar">
                  <li class="nav-link"><a href="./Home.html" class="nav-item dropdown-item">Home</a></li>
                  <li class="nav-link"><a href="javascript:void(0)" class="nav-item dropdown-item">Settings</a></li>
                  <li class="dropdown-divider"></li>
                </ul>
              </li>
              <li class="separator d-lg-none"></li>
				</ul>
          </div>
        </div>
      </nav>
      <div class="modal modal-search fade" id="searchModal" tabindex="-1" role="dialog" aria-labelledby="searchModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="SEARCH">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <i class="tim-icons icon-simple-remove"></i>
              </button>
            </div>
          </div>
        </div>
      </div>
      <!-- End Navbar -->
      <div class="content">
        <div class="row">
          <div class="col-12">
            <div class="card card-chart">
              <div class="card-header ">
                <div class="row">
                  <div class="col-sm-6 text-left">
                    
                    <h1 class="card-title">Covid-19 Updates</h1>
                    <h2 class="card-title">Monthly Rates (Tamil Nadu)</h2>
                  </div>
                  <div class="col-sm-6">
                    <div class="btn-group btn-group-toggle float-right" data-toggle="buttons">
                      <label class="btn btn-sm btn-primary btn-simple active" id="0">
                        <input type="radio" name="options" checked>
                        <span class="d-none d-sm-block d-md-block d-lg-block d-xl-block">Active Cases</span>
                        <span class="d-block d-sm-none">
                          <i class="tim-icons icon-single-02"></i>
                        </span>
                      </label>
                      <label class="btn btn-sm btn-primary btn-simple" id="1">
                        <input type="radio" class="d-none d-sm-none" name="options">
                        <span class="d-none d-sm-block d-md-block d-lg-block d-xl-block">Cured Cases</span>
                        <span class="d-block d-sm-none">
                          <i class="tim-icons icon-gift-2"></i>
                        </span>
                      </label>
                      <label class="btn btn-sm btn-primary btn-simple" id="2">
                        <input type="radio" class="d-none" name="options">
                        <span class="d-none d-sm-block d-md-block d-lg-block d-xl-block">Tested count</span>
                        <span class="d-block d-sm-none">
                          <i class="tim-icons icon-tap-02"></i>
                        </span>
                      </label>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <div class="chart-area">
                  <canvas id="chartBig1">
				  
				  </canvas>
                </div>
              </div>
            </div>
          </div>
        </div><h2 class="card-title">Last 7 Days</h2>

        <div class="row">
          <div class="col-lg-4">
            <div class="card card-chart">
			
              <div class="card-header">
			  
                <h5 class="card-category">Active Cases </h5>
                <!--<h3 class="card-title"><i class="tim-icons icon-bell-55 text-primary"></i> 763,215</h3>-->
              </div>
              <div class="card-body">
                <div class="chart-area">
                  <canvas id="chartLinePurple"></canvas>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="card card-chart">
              <div class="card-header">
                <h5 class="card-category">Cured Cases</h5>
               <!--<h3 class="card-title"><i class="tim-icons icon-bell-55 text-primary"></i> 763,215</h3>-->
              </div>
              <div class="card-body">
                <div class="chart-area">
                  <canvas id="CountryChart"></canvas>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="card card-chart">
              <div class="card-header">
                <h5 class="card-category">Confirmed Cases</h5>
               <!--<h3 class="card-title"><i class="tim-icons icon-bell-55 text-primary"></i> 763,215</h3>-->
              </div>
              <div class="card-body">
                <div class="chart-area">
                  <canvas id="chartLineGreen"></canvas>
                </div>
              </div>
            </div>
          </div>
        </div>
		<div class="row">
		<div class="col-sm-12 text-left">
                    <h2 class="card-title">Total Cases</h2>
                  </div> </div>
		        
			<div class="row">
          <div class="col-lg-3">
            <div class="card card-chart">
              <div class="card-header">
                <h2 class="card-title">Active</h2>
                <h3 class="card-title"><i class="tim-icons text-primary"></i><?php 
echo $c_tot["Tamil Nadu"]["districtData"]["Madurai"]["active"];
?></h3>
              </div></div></div>
		<div class="col-lg-3">
            <div class="card card-chart">
              <div class="card-header">
                <h2 class="card-title">Confirmed</h2>
                <h3 class="card-title"><i class="tim-icons text-primary"></i><?php 
echo $c_tot["Tamil Nadu"]["districtData"]["Madurai"]["confirmed"];
?></h3>
              </div></div></div>
		<div class="col-lg-3">
            <div class="card card-chart">
              <div class="card-header">
                <h2 class="card-title">Decreased</h2>
                <h3 class="card-title"><i class="tim-icons text-primary"></i><?php 
echo $c_tot["Tamil Nadu"]["districtData"]["Madurai"]["deceased"];
?></h3>
              </div></div></div>
		<div class="col-lg-3">
            <div class="card card-chart">
              <div class="card-header">
                <h2 class="card-title">Recovered</h2>
                <h3 class="card-title"><i class="tim-icons text-primary"></i><?php 
echo $c_tot["Tamil Nadu"]["districtData"]["Madurai"]["recovered"];
?></h3>
              </div></div></div>
		
          </div>
		  
		<!---	  <div class="row">
		<div class="col-sm-12 text-left">
                    <h2 class="card-title">Total Cases</h2>
                  </div> </div>
		        
				<div class="row">
          <div class="col-lg-3">
            <div class="card card-chart">
              <div class="card-header">
                <h2 class="card-title">Active</h2>
                <h3 class="card-title"><i class="tim-icons text-primary"></i><?php 
				
	$a=end($daily_tot["districtsDaily"]["Tamil Nadu"]["Madurai"])["active"];
	//echo $a;
?></h3>
              </div></div></div>
		<div class="col-lg-3">
            <div class="card card-chart">
              <div class="card-header">
                <h2 class="card-title">Confirmed</h2>
                <h3 class="card-title"><i class="tim-icons text-primary"></i><?php 
$a=end($daily_tot["districtsDaily"]["Tamil Nadu"]["Madurai"])["confirmed"];
	//echo $a;
?></h3>
              </div></div></div>
		<div class="col-lg-3">
            <div class="card card-chart">
              <div class="card-header">
                <h2 class="card-title">Decreased</h2>
                <h3 class="card-title"><i class="tim-icons text-primary"></i><?php 

$a=end($daily_tot["districtsDaily"]["Tamil Nadu"]["Madurai"])["deceased"];
	//echo $a;
?></h3>
              </div></div></div>
		<div class="col-lg-3">
            <div class="card card-chart">
              <div class="card-header">
                <h2 class="card-title">Recovered</h2>
                <h3 class="card-title"><i class="tim-icons text-primary"></i><?php 	
$a=end($daily_tot["districtsDaily"]["Tamil Nadu"]["Madurai"])["recovered"];
//	echo $a;
?></h3>
              </div></div></div>
		
          </div>--->
		  
        <div class="row">
          <div class="col-lg-6 col-md-12">
            <div class="card card-tasks">
              <div class="card-header ">
                <h6 class="title d-inline">Hot Lines</h6>
                <p class="card-category d-inline">today</p>
                <div class="dropdown">
                  <button type="button" class="btn btn-link dropdown-toggle btn-icon" data-toggle="dropdown">
                    <i class="tim-icons icon-settings-gear-63"></i>
                  </button>
                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href="#pablo">Action</a>
                    <a class="dropdown-item" href="#pablo">Another action</a>
                    <a class="dropdown-item" href="#pablo">Something else</a>
                  </div>
                </div>
              </div>
              <div class="card-body ">
                <div class="table-full-width table-responsive">
                  <table class="table">
                    <tbody>
                      <tr>
                        <td>
                          <div class="form-check">
                            <label class="form-check-label">
                              <input class="form-check-input" type="checkbox" value="">
                              <span class="form-check-sign">
                                <span class="check"></span>
                              </span>
                            </label>
                          </div>
                        </td>
                        <td>
                          <p class="title">Spurt in number of positive cases</p>
                          <p class="text-muted">SPECIAL CORRESPONDENTTIRUNELVELI/SIVAGANGA/MADURAI</p>
                        </td>
                        <td class="td-actions text-right">
                          <button type="button" rel="tooltip" title="" class="btn btn-link" data-original-title="Edit Task">
                            <i class="tim-icons icon-pencil"></i>
                          </button>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="form-check">
                            <label class="form-check-label">
                              <input class="form-check-input" type="checkbox" value="" checked="">
                              <span class="form-check-sign">
                                <span class="check"></span>
                              </span>
                            </label>
                          </div>
                        </td>
                        <td>
                          <p class="title">Migrant workers board special train to Bihar</p>
                          <p class="text-muted">Over 2,200 from Kanniyakumari, Virudhunagar and Sivaganga districts make their way home</p>
                        </td>
                        <td class="td-actions text-right">
                          <button type="button" rel="tooltip" title="" class="btn btn-link" data-original-title="Edit Task">
                            <i class="tim-icons icon-pencil"></i>
                          </button>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="form-check">
                            <label class="form-check-label">
                              <input class="form-check-input" type="checkbox" value="">
                              <span class="form-check-sign">
                                <span class="check"></span>
                              </span>
                            </label>
                          </div>
                        </td>
                        <td>
                          <p class="title">Theni GH gets three medical robots</p>
                          <p class="text-muted">SASTRA Deemed to be University, Thanjavur, has presented three medical robots to Theni Government Medical College Hospital in the wake of COVID-19.</p>
                        </td>
                        <td class="td-actions text-right">
                          <button type="button" rel="tooltip" title="" class="btn btn-link" data-original-title="Edit Task">
                            <i class="tim-icons icon-pencil"></i>
                          </button>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="form-check">
                            <label class="form-check-label">
                              <input class="form-check-input" type="checkbox" value="">
                              <span class="form-check-sign">
                                <span class="check"></span>
                              </span>
                            </label>
                          </div>
                        </td>
                        <td>
                          <p class="title">Textile shops remain closed in Madurai</p>
                          <p class="text-muted">A week after textile shops in Madurai were allowed to open, those shops remained shut on Sunday as Collector T. G. Vinay ordered their closure on Saturday evening</p>
                        </td>
                        <td class="td-actions text-right">
                          <button type="button" rel="tooltip" title="" class="btn btn-link" data-original-title="Edit Task">
                            <i class="tim-icons icon-pencil"></i>
                          </button>
                        </td>
                      </tr>
                     
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-6 col-md-12">
            <div class="card ">
              <div class="card-header">
                <h4 class="card-title"> Simple Table</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table tablesorter " id="">
                    <thead class=" text-primary">
                      <tr>
                        <th>
                          Shop Category
                        </th>
                        <th>
                          Type
                        </th>
                        <th>
                          Status
                        </th>
                        
                      </tr>
                    </thead>
                    <tbody>
                      
                      <tr>
                        <td>
                          Hotel
                        </td>
                        <td>
                          Essentials
                        </td>
                        <td>
                          Open
                        </td>
         
                      </tr>
                      <tr>
                        <td>
                          Medical
                        </td>
                        <td>
                          Essentials
                        </td>
                        <td>
                          Open
                        </td>
                        
                      </tr>
                      <tr>
                        <td>
                          Glossery
                        </td>
                         <td>
                          Essentials
                        </td>
                        <td>
                          Open
                        </td>
                      </tr>
					  <tr>
                        <td>
                          Textile
                        </td>
                         <td>
                          Non-Essentials
                        </td>
                        <td>
                          Open
                        </td>
                      </tr><tr>
                        <td>
                          Mall
                        </td>
                         <td>
                          Non-Essentials
                        </td>
                        <td>
                          Closed
                        </td>
                      </tr>
					  <tr>
                        <td>
                          Temple
                        </td>
                         <td>
                          Non-Essentials
                        </td>
                        <td>
                          Closed
                        </td>
                      </tr>
					  <tr>
                        <td>
                          Milk
                        </td>
                         <td>
                          Essentials
                        </td>
                        <td>
                          Open
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      <div class="col-lg-6 col-md-12" id="tweet-w"> 
		<blockquote class="twitter-tweet" data-dnt="true" data-theme="light" ><p lang="und" dir="ltr"><a href="https://twitter.com/hashtag/coronavirus?src=hash&amp;ref_src=twsrc%5Etfw">#coronavirus</a> <a href="https://twitter.com/hashtag/StayHealthy?src=hash&amp;ref_src=twsrc%5Etfw">#StayHealthy</a> <a href="https://twitter.com/hashtag/StopTheSpread?src=hash&amp;ref_src=twsrc%5Etfw">#StopTheSpread</a> <a href="https://twitter.com/hashtag/vijayabaskar?src=hash&amp;ref_src=twsrc%5Etfw">#vijayabaskar</a> <a href="https://t.co/WXB0K6sKUI">pic.twitter.com/WXB0K6sKUI</a></p>&mdash; Dr C Vijayabaskar (@Vijayabaskarofl) <a href="https://twitter.com/Vijayabaskarofl/status/1261536873672896514?ref_src=twsrc%5Etfw"></a></blockquote> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
          </div>
	<div class="col-lg-6 col-md-12" id="tweet-d">
		<blockquote class="twitter-tweet" data-dnt="true" data-theme="dark" data-width="100%" ><p lang="und" dir="ltr"><a href="https://twitter.com/hashtag/coronavirus?src=hash&amp;ref_src=twsrc%5Etfw">#coronavirus</a> <a href="https://twitter.com/hashtag/StayHealthy?src=hash&amp;ref_src=twsrc%5Etfw">#StayHealthy</a> <a href="https://twitter.com/hashtag/StopTheSpread?src=hash&amp;ref_src=twsrc%5Etfw">#StopTheSpread</a> <a href="https://twitter.com/hashtag/vijayabaskar?src=hash&amp;ref_src=twsrc%5Etfw">#vijayabaskar</a> <a href="https://t.co/WXB0K6sKUI">pic.twitter.com/WXB0K6sKUI</a></p>&mdash; Dr C Vijayabaskar (@Vijayabaskarofl) <a href="https://twitter.com/Vijayabaskarofl/status/1261536873672896514?ref_src=twsrc%5Etfw"></a></blockquote> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
          </div>
	  </div>
	  
      <footer class="footer">
        <div class="container-fluid">
          <ul class="nav">
            <li class="nav-item">
              <a href="javascript:void(0)" class="nav-link">
                Contact Us
              </a>
            </li>
          </ul>
        </div>
      </footer>
    </div>
  </div>
  <div class="fixed-plugin">
    <div class="dropdown show-dropdown">
      <a href="#" data-toggle="dropdown">
        <i class="fa fa-cog fa-2x"> </i>
      </a>
      <ul class="dropdown-menu">
        <li class="header-title"> Sidebar Background</li>
        <li class="adjustments-line">
          <a href="javascript:void(0)" class="switch-trigger background-color">
            <div class="badge-colors text-center">
              <span class="badge filter badge-primary active" data-color="primary"></span>
              <span class="badge filter badge-info" data-color="blue"></span>
              <span class="badge filter badge-success" data-color="green"></span>
            </div>
            <div class="clearfix"></div>
          </a>
        </li>
        <li class="adjustments-line text-center color-change">
          <span class="color-label">LIGHT MODE</span>
          <span class="badge light-badge mr-2" onclick="myFunction()"></span>
          <span class="badge dark-badge ml-2"  onclick="myFunction()"></span>
          <span class="color-label">DARK MODE</span>
        </li> 
      </ul>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="../assets/js/core/jquery.min.js"></script>
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!--  Google Maps Plugin    -->
  <!-- Place this tag in your head or just before your close body tag. -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chart JS -->
  <script src="../assets/js/plugins/chartjs.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="../assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Black Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/black-dashboard.min.js?v=1.0.0"></script><!-- Black Dashboard DEMO methods, don't include it in your project! -->
  <script src="../assets/demo/demo.js"></script>
  <script>
    $(document).ready(function() {
      $().ready(function() {
        $sidebar = $('.sidebar');
        $navbar = $('.navbar');
        $main_panel = $('.main-panel');

        $full_page = $('.full-page');

        $sidebar_responsive = $('body > .navbar-collapse');
        sidebar_mini_active = true;
        white_color = false;

        window_width = $(window).width();

        fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html();



        $('.fixed-plugin a').click(function(event) {
          if ($(this).hasClass('switch-trigger')) {
            if (event.stopPropagation) {
              event.stopPropagation();
            } else if (window.event) {
              window.event.cancelBubble = true;
            }
          }
        });

        $('.fixed-plugin .background-color span').click(function() {
          $(this).siblings().removeClass('active');
          $(this).addClass('active');

          var new_color = $(this).data('color');

          if ($sidebar.length != 0) {
            $sidebar.attr('data', new_color);
          }

          if ($main_panel.length != 0) {
            $main_panel.attr('data', new_color);
          }

          if ($full_page.length != 0) {
            $full_page.attr('filter-color', new_color);
          }

          if ($sidebar_responsive.length != 0) {
            $sidebar_responsive.attr('data', new_color);
          }
        });

        $('.switch-sidebar-mini input').on("switchChange.bootstrapSwitch", function() {
          var $btn = $(this);

          if (sidebar_mini_active == true) {
            $('body').removeClass('sidebar-mini');
            sidebar_mini_active = false;
            blackDashboard.showSidebarMessage('Sidebar mini deactivated...');
          } else {
            $('body').addClass('sidebar-mini');
            sidebar_mini_active = true;
            blackDashboard.showSidebarMessage('Sidebar mini activated...');
          }

          // we simulate the window Resize so the charts will get updated in realtime.
          var simulateWindowResize = setInterval(function() {
            window.dispatchEvent(new Event('resize'));
          }, 180);

          // we stop the simulation of Window Resize after the animations are completed
          setTimeout(function() {
            clearInterval(simulateWindowResize);
          }, 1000);
        });

        $('.switch-change-color input').on("switchChange.bootstrapSwitch", function() {
          var $btn = $(this);

          if (white_color == true) {

            $('body').addClass('change-background');
            setTimeout(function() {
              $('body').removeClass('change-background');
              $('body').removeClass('white-content');
            }, 900);
            white_color = false;
          } else {

            $('body').addClass('change-background');
            setTimeout(function() {
              $('body').removeClass('change-background');
              $('body').addClass('white-content');
            }, 900);

            white_color = true;
          }


        });

        $('.light-badge').click(function() {
          $('body').addClass('white-content');
        });

        $('.dark-badge').click(function() {
          $('body').removeClass('white-content');
        });
      });
    });
  </script>
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      demo.initDashboardPageCharts();
		//initDashboardPageCharts();

    });
  var x = document.getElementById("tweet-d");
  var w = document.getElementById("tweet-w");
  x.style.display = "block";
  w.style.display = "none";
function myFunction() {
  if (x.style.display === "none") {
    x.style.display = "block";
	w.style.display = "none";
  } else {
    x.style.display = "none";
	w.style.display = "block";
  }
}	

	
	  
  </script>
  <script src="https://cdn.trackjs.com/agent/v3/latest/t.js"></script>
  <script>
    window.TrackJS &&
      TrackJS.install({
        token: "ee6fab19c5a04ac1a32a645abde4613a",
        application: "black-dashboard-free"
      });
  </script>
</body>

</html>