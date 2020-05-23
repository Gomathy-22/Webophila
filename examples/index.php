<?php
$url_tot = 'https://api.covid19india.org/state_district_wise.json';
$data_tot = file_get_contents($url_tot);
$c_tot = json_decode($data_tot, true); //madurai

date_default_timezone_set('Asia/Kolkata');
$currentDate = date( 'd-m-Y', time () );
$Date = date( 'd', time () );

$url_daily_tot = 'https://api.covid19india.org/districts_daily.json';
$data_daily_tot = file_get_contents($url_daily_tot);
$daily_tot = json_decode($data_daily_tot, true);
$i=sizeof($daily_tot["districtsDaily"]["Tamil Nadu"]["Madurai"])-1;
$j=sizeof($daily_tot["districtsDaily"]["Tamil Nadu"]["Madurai"])-7;
$k=0;
for(;$j<=$i;$j++){
  $daily_tot_act[$k]=$daily_tot["districtsDaily"]["Tamil Nadu"]["Madurai"][$j]["active"];
  $daily_tot_rec[$k]=$daily_tot["districtsDaily"]["Tamil Nadu"]["Madurai"][$j]["recovered"];
  $daily_tot_con[$k]=$daily_tot["districtsDaily"]["Tamil Nadu"]["Madurai"][$j]["confirmed"];
  $daily_tot_dec[$k]=$daily_tot["districtsDaily"]["Tamil Nadu"]["Madurai"][$j]["deceased"];
  $k++;
}

$url_tot_tn = 'https://api.covid19india.org/data.json';
$data_tot_tn = file_get_contents($url_tot_tn);
$c_tot_tn = json_decode($data_tot_tn, true); 
$c_tot_tn_statewise=sizeof($c_tot_tn["statewise"]);
for($i=0;$i<$c_tot_tn_statewise;$i++){
  if($c_tot_tn["statewise"][$i]["statecode"]=="TN"){
    $c_tot_tn_cnt[0]=$c_tot_tn["statewise"][$i]["active"];
    $c_tot_tn_cnt[1]=$c_tot_tn["statewise"][$i]["confirmed"];
    $c_tot_tn_cnt[2]=$c_tot_tn["statewise"][$i]["recovered"];
    break;
  }
}

$news_link = 'https://newsapi.org/v2/top-headlines?country=in&apiKey=cb99886d66cd44b298256c7d7f72f220';
$news_con = file_get_contents($news_link);
$news = json_decode($news_con, true);
$k=0;
for($i=0;$i<=6;$i++){
	$news_t[$k]=$news["articles"][$i]["title"];
	$news_url[$k]=$news["articles"][$i]["url"];
	$news_des[$k]=$news["articles"][$i]["description"];
	
	$k++;
}

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
  <script type="text/javascript">
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
            <a href="./index.php">
              <i class="tim-icons icon-chart-pie-36"></i>
              <p>Home</p>
            </a>
          </li>
 
          <li>
            <a href="./map.php">
              <i class="tim-icons icon-pin"></i>
              <p>Maps</p>
            </a>
          </li>
          <li>
            <a href="./Precaution.php">
              <i class="tim-icons icon-single-02"></i>
              <p>Precautions</p>
            </a>
          </li>
          <li>
            <a href="./List.php">
              <i class="tim-icons icon-puzzle-10"></i>
              <p>Hospital List</p>
            </a>
          </li>
		  <li>
            <a href="./Contact.php">
              <i class="tim-icons icon-bell-55"></i>
              <p>Emergency Contact</p>
            </a>
          </li>
		  <li>
				
				<a>
              <i class="tim-icons"></i>
              <div id="google_translate_element2">
			  </div>
		  </li>
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-absolute navbar-transparent">
        <div class="container-fluid">
          <div class="navbar-wrapper">

            <h1 class="card-title">COVID-19 UPDATES </h1>
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
                        <span class="d-none d-sm-block d-md-block d-lg-block d-xl-block">Comfirmed Cases</span>
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
        </div>
			  <label class="btn btn-sm btn-primary btn-simpleactive" >
                        <input type="button" class="d-none d-sm-none" name="options" onclick="features()" >
                        <span class="d-none d-sm-block d-md-block d-lg-block d-xl-block">FEATURES</span>
                        <span class="d-block d-sm-none">
                          <i class="tim-icons icon-gift-2"></i>
                        </span>
               </label>
            
			<div class="title" id="feat" align="center">
1.  Counts of the cases in TamilNadu / Madurai
2.  Latest News of India
3.  Tweets of Honourable Health Minister Dr.Vijayabaskar
4. 	Language Independent
5.  Dark/Ligth theme
6.  Map of Hospitals in Madurai
7.  Chatbot to test if you have Covid-19 or not (based on symptoms)
8.  Rules and regulations to be followed in lockdown 
9.  Emergency Helpline number
10. Links for door delivery of grocery shops
11. E-Pass Registeration link
12. Area-wise grocery shops contact number
13. Precautions
          </div>
		
		<h2 class="card-title">Last 7 Days (Cummulative)</h2>

        <div class="row">
          <div class="col-lg-6">
            <div class="card card-chart">
			
              <div class="card-header">
			  
                <h5 class="card-category">Active Cases </h5>
                <!--<h3 class="card-title"><i class="tim-icons icon-bell-55 text-primary"></i> 763,215</h3>-->
              </div>
              <div class="card-body">
                <div class="chart-area">
                  <canvas id="ccc"></canvas>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-6">
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

        </div>
		<div class="row">
          <div class="col-lg-6">
            <div class="card card-chart">
              <div class="card-header">
                <h5 class="card-category">Confirmed Cases</h5>
               <!--<h3 class="card-title"><i class="tim-icons icon-bell-55 text-primary"></i> 763,215</h3>-->
              </div>
              <div class="card-body">
                <div class="chart-area">
                  <canvas id="Greench"></canvas>
                </div>
              </div>
            </div>
          </div>
		            <div class="col-lg-6">
            <div class="card card-chart">
              <div class="card-header">
                <h5 class="card-category">Deceased</h5>
               <!--<h3 class="card-title"><i class="tim-icons icon-bell-55 text-primary"></i> 763,215</h3>-->
              </div>
              <div class="card-body">
                <div class="chart-area">
                  <canvas id="Greench2"></canvas>
                </div>
              </div>
            </div>
          </div>
        </div>
		<div class="row">
		<div class="col-sm-12 text-left">
                    <h2 class="card-title">Lastest Counts</h2>
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
                <h2 class="card-title">Deceased</h2>
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
		  <br>
		<div class="row">
		<div class="col-sm-12 text-left">
                    <h2 class="card-title">Today's status</h2>
                  </div> </div>
		        
				<div class="row">
          <div class="col-lg-3">
            <div class="card card-chart">
              <div class="card-header">
                <h2 class="card-title">Active</h2>
                <h3 class="card-title"><i class="tim-icons text-primary"></i><?php 
				
	$a=$daily_tot_act[6]-$daily_tot_act[5];
	echo $a;
?></h3>
              </div></div></div>
		<div class="col-lg-3">
            <div class="card card-chart">
              <div class="card-header">
                <h2 class="card-title">Confirmed</h2>
                <h3 class="card-title"><i class="tim-icons text-primary"></i><?php 
$a=$daily_tot_con[6]-$daily_tot_con[5];
	echo $a;
?></h3>
              </div></div></div>
		<div class="col-lg-3">
            <div class="card card-chart">
              <div class="card-header">
                <h2 class="card-title">Decreased</h2>
                <h3 class="card-title"><i class="tim-icons text-primary"></i><?php 

$a=$daily_tot_dec[6]-$daily_tot_dec[5];
	echo $a;
?></h3>
              </div></div></div>
		<div class="col-lg-3">
            <div class="card card-chart">
              <div class="card-header">
                <h2 class="card-title">Recovered</h2>
                <h3 class="card-title"><i class="tim-icons text-primary"></i><?php 	
$a=$daily_tot_rec[6]-$daily_tot_rec[5];
	echo $a;
?></h3>
              </div></div></div>
		
          </div>
		  
        <div class="row">
          <div class="col-lg-6 col-md-12">
            <div class="card card-tasks">
              <div class="card-header ">
                <h6 class="title d-inline">Hot Lines</h6>
                <p class="card-category d-inline">today</p>

              </div>
              <div class="card-body ">
                <div class="table-full-width table-responsive">
                  <table class="table">
                    <tbody>
					<?php
					for($i=0;$i<6;$i++){
						echo "<tr><td>";
						echo "<a href=\"$news_url[$i]\">";
						echo "<p class=\"title\">$news_t[$i]</p>";
						echo "  <p class=\"text-muted\">$news_des[$i]</p></a>";
						echo "</tr></td>";
					}
					?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
         <div class="col-lg-6 col-md-12">
            <div class="card ">
              <div class="card-header">
                <h4 class="card-title"> Shops and Schedule</h4>
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
						<th>
							Timing
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
						<td>
							10am - 7pm
							<br>(Only Takeway)
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
						<td>
							9am - 10pm
						</td>
                        
                      </tr>
                      <tr>
                        <td>
                          Grocery
                        </td>
                         <td>
                          Essentials
                        </td>
                        <td>
                          Open
                        </td>
						<td>
							6am - 7pm
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
						<td>
							10am - 7pm
							<br>(Non-AC Shops)
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
						<td>
							NA
						</td>
                      </tr>
					  <tr>
                        <td>
                          Religious Places
                        </td>
                         <td>
                          Non-Essentials
                        </td>
                        <td>
                          Closed
                        </td>
						<td>
							NA
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
						<td>
							10am - 7pm
						</td>
                      </tr>
					  <tr>
                        <td>
                          Tea Shops
                        </td>
                         <td>
                          Essentials
                        </td>
                        <td>
                          Open
                        </td>
						<td>
							10am - 7pm
							<br>(Only Takeway)
						</td>
                      </tr>
					  <tr>
                        <td>
                          Petrol Bunks
                        </td>
                         <td>
                          Essentials
                        </td>
                        <td>
                          Open
                        </td>
						<td>
							6am - 8pm
						</td>
                      </tr>
					  <tr>
                        <td>
                          Parlour
                        </td>
                         <td>
                          Non-Essentials
                        </td>
                        <td>
                          Closed
                        </td>
						<td>
							NA
						</td>
                      </tr>
					  <t
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
		<div class="text-left">
                    
                    <h1 class="card-title">Words from Honourable Health Minister Mr.Vijayabaskar </h1>
                    
                  </div>
	<div class="" id="tweet-w" align="center">
			  <a class="twitter-timeline" href="https://twitter.com/Vijayabaskarofl" data-theme="light"  data-tweet-limit="4" data-width="600" ></a>
<script async src="http://platform.twitter.com/widgets.js" charset="utf-8"></script>
          </div>
	<div class="" id="tweet-d" align="center">
			  <a class="twitter-timeline" href="https://twitter.com/Vijayabaskarofl" data-theme="dark"  data-tweet-limit="4" data-width="600" ></a>
<script async src="http://platform.twitter.com/widgets.js" charset="utf-8"></script>
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
          <li>
		  <table>
				<tr><td><p>&nbsp; &nbsp;Click here
                  <span><a href="https://wa.me/919013353535?text=Hi"><b> Whatsapp </b></a></span>to connect whataspp</p></td></tr>
              <tr><td><p>&nbsp; &nbsp;Click here
                  <span><a href="https://www.messenger.com/t/MyGovIndia"><b>  FaceBook Messenger </b></a></span> to connect Facebook</p></td></tr>
                  <tr><td> <p>&nbsp; &nbsp;Click here
                  <span><a href="https://t.me/MyGovCoronaNewsdesk"><b> Newsdesk Telegram </b></a></span> to connect NewsDesk</p></td></tr>
                <tr><td> <p>&nbsp; &nbsp;Click here
                   <span><a href="https://www.instagram.com/mygovindia/"><b>Instagram Page</b></a></span> to connect Instagram</p></td></tr>
				 <tr><td><p>&nbsp; &nbsp;Help-Line Number : <b>044-29510500<b></p></td></tr>
				   </table>
		  <script>(function(){var js,fs,d=document,id="tars-widget-script",b="https://tars-file-upload.s3.amazonaws.com/bulb/";if(!d.getElementById(id)){js=d.createElement("script");js.id=id;js.type="text/javascript";js.src=b+"js/widget.js";fs=d.getElementsByTagName("script")[0];fs.parentNode.insertBefore(js,fs)}})();window.tarsSettings = {"convid":"NJGGvv"};</script>
        </li></ul>
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
  <script type="text/javascript">
    var ctx = document.getElementById("ccc").getContext("2d");
    var gradientStroke = ctx.createLinearGradient(0, 230, 0, 50);

    gradientStroke.addColorStop(1, 'rgba(72,72,176,0.2)');
    gradientStroke.addColorStop(0.2, 'rgba(72,72,176,0.0)');
    gradientStroke.addColorStop(0, 'rgba(119,52,169,0)'); //purple colors

    var data = {
      labels: ['DAY 7', 'DAY 6', 'DAY 5', 'DAY 4','DAY 3','YESTERDAY', 'TODAY'],
      datasets: [{
        label: "Data",
        fill: true,
        backgroundColor: gradientStroke,
        borderColor: '#d048b6',
        borderWidth: 2,
        borderDash: [],
        borderDashOffset: 0.0,
        pointBackgroundColor: '#d048b6',
        pointBorderColor: 'rgba(255,255,255,0)',
        pointHoverBackgroundColor: '#d048b6',
        pointBorderWidth: 20,
        pointHoverRadius: 4,
        pointHoverBorderWidth: 25,
        pointRadius: 4,
        data: [<?php echo $daily_tot_act[0];?>,
        <?php echo $daily_tot_act[1];?>,
        <?php echo $daily_tot_act[2];?>,
        <?php echo $daily_tot_act[3];?>,
        <?php echo $daily_tot_act[4];?>,
        <?php echo $daily_tot_act[5];?>,
        <?php echo $daily_tot_act[6];?>],
      }]
    };
gradientChartOptionsConfigurationWithTooltipPurple = {
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
            fontColor: "#9a9a9a"
          }
        }],

        xAxes: [{
          barPercentage: 1.6,
          gridLines: {
            drawBorder: false,
            color: 'rgba(225,78,202,0.1)',
            zeroLineColor: "transparent",
          },
          ticks: {
            padding: 20,
            fontColor: "#9a9a9a"
          }
        }]
      }
    };

    var myChart = new Chart(ctx, {
      type: 'line',
      data: data,
      options: gradientChartOptionsConfigurationWithTooltipPurple
    });
	
    var ctxGreen = document.getElementById("Greench").getContext("2d");

    var gradientStroke = ctx.createLinearGradient(0, 230, 0, 50);

    gradientStroke.addColorStop(1, 'rgba(66,134,121,0.15)');
    gradientStroke.addColorStop(0.4, 'rgba(66,134,121,0.0)'); //green colors
    gradientStroke.addColorStop(0, 'rgba(66,134,121,0)'); //green colors

    var data = {
      labels:  ['DAY 7', 'DAY 6', 'DAY 5', 'DAY 4','DAY 3','YESTERDAY', 'TODAY'],
      datasets: [{
        label: "",
        fill: true,
        backgroundColor: gradientStroke,
        borderColor: '#00d6b4',
        borderWidth: 2,
        borderDash: [],
        borderDashOffset: 0.0,
        pointBackgroundColor: '#00d6b4',
        pointBorderColor: 'rgba(255,255,255,0)',
        pointHoverBackgroundColor: '#00d6b4',
        pointBorderWidth: 20,
        pointHoverRadius: 4,
        pointHoverBorderWidth: 15,
        pointRadius: 4,
        data: [<?php echo $daily_tot_con[0]; ?>,
        <?php echo $daily_tot_con[1]; ?>,
        <?php echo $daily_tot_con[2]; ?>,
        <?php echo $daily_tot_con[3]; ?>,
        <?php echo $daily_tot_con[4]; ?>,
        <?php echo $daily_tot_con[5]; ?>,
        <?php echo $daily_tot_con[6]; ?>],

      }]
    };
	    gradientChartOptionsConfigurationWithTooltipGreen = {
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
            suggestedMin: 50,
            suggestedMax: 125,
            padding: 20,
            fontColor: "#9e9e9e"
          }
        }],

        xAxes: [{
          barPercentage: 1.6,
          gridLines: {
            drawBorder: false,
            color: 'rgba(0,242,195,0.1)',
            zeroLineColor: "transparent",
          },
          ticks: {
            padding: 20,
            fontColor: "#9e9e9e"
          }
        }]
      }
    };
    var myChart = new Chart(ctxGreen, {
      type: 'line',
      data: data,
      options: gradientChartOptionsConfigurationWithTooltipGreen

    });

var ctxGreen1 = document.getElementById("Greench2").getContext("2d");

    var gradientStroke = ctx.createLinearGradient(0, 230, 0, 50);

    gradientStroke.addColorStop(1, 'rgba(66,134,121,0.15)');
    gradientStroke.addColorStop(0.4, 'rgba(66,134,121,0.0)'); //green colors
    gradientStroke.addColorStop(0, 'rgba(66,134,121,0)'); //green colors

    var data = {
      labels:  ['DAY 7', 'DAY 6', 'DAY 5', 'DAY 4','DAY 3','YESTERDAY', 'TODAY'],
      datasets: [{
        label: "",
        fill: true,
        backgroundColor: gradientStroke,
        borderColor: '#00d6b4',
        borderWidth: 2,
        borderDash: [],
        borderDashOffset: 0.0,
        pointBackgroundColor: '#00d6b4',
        pointBorderColor: 'rgba(255,255,255,0)',
        pointHoverBackgroundColor: '#00d6b4',
        pointBorderWidth: 20,
        pointHoverRadius: 4,
        pointHoverBorderWidth: 15,
        pointRadius: 4,
        data: [<?php echo $daily_tot_dec[0]; ?>,
        <?php echo $daily_tot_dec[1]; ?>,
        <?php echo $daily_tot_dec[2]; ?>,
        <?php echo $daily_tot_dec[3]; ?>,
        <?php echo $daily_tot_dec[4]; ?>,
        <?php echo $daily_tot_dec[5]; ?>,
        <?php echo $daily_tot_dec[6]; ?>],

      }]
    };
	
	var myChart = new Chart(ctxGreen1, {
      type: 'line',
      data: data,
      options: gradientChartOptionsConfigurationWithTooltipGreen

    });
var ctx = document.getElementById("CountryChart").getContext("2d");

    var gradientStroke = ctx.createLinearGradient(0, 230, 0, 50);

    gradientStroke.addColorStop(1, 'rgba(29,140,248,0.2)');
    gradientStroke.addColorStop(0.4, 'rgba(29,140,248,0.0)');
    gradientStroke.addColorStop(0, 'rgba(29,140,248,0)'); //blue colors

 gradientBarChartConfiguration = {
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

          gridLines: {
            drawBorder: false,
            color: 'rgba(29,140,248,0.1)',
            zeroLineColor: "transparent",
          },
          ticks: {
            suggestedMin: 60,
            suggestedMax: 120,
            padding: 20,
            fontColor: "#9e9e9e"
          }
        }],

        xAxes: [{

          gridLines: {
            drawBorder: false,
            color: 'rgba(29,140,248,0.1)',
            zeroLineColor: "transparent",
          },
          ticks: {
            padding: 20,
            fontColor: "#9e9e9e"
          }
        }]
      }
    };
    var myChart = new Chart(ctx, {
      type: 'bar',
      responsive: true,
      legend: {
        display: false
      },
      data: {
        labels:  ['DAY 7', 'DAY 6', 'DAY 5', 'DAY 4','DAY 3','YESTERDAY', 'TODAY'],
        datasets: [{
          label: "Countries",
          fill: true,
          backgroundColor: gradientStroke,
          hoverBackgroundColor: gradientStroke,
          borderColor: '#1f8ef1',
          borderWidth: 2,
          borderDash: [],
          borderDashOffset: 0.0,
          data: [ <?php echo $daily_tot_rec[0]; ?>,
          <?php echo $daily_tot_rec[1]; ?>,
          <?php echo $daily_tot_rec[2]; ?>,
          <?php echo $daily_tot_rec[3]; ?>,
          <?php echo $daily_tot_rec[4]; ?>, 
          <?php echo $daily_tot_rec[5]; ?>,
          <?php echo $daily_tot_rec[6]; ?>,],

        }]
      },
      options: gradientBarChartConfiguration
    });
var chart_labels = ['FEB','MAR', 'APR', 'MAY'];
    var chart_data = [0,55, 2323, <?php echo $c_tot_tn_cnt[0];      ?>];


    var ctx = document.getElementById("chartBig1").getContext('2d');

    var gradientStroke = ctx.createLinearGradient(0, 230, 0, 50);

    gradientStroke.addColorStop(1, 'rgba(72,72,176,0.1)');
    gradientStroke.addColorStop(0.4, 'rgba(72,72,176,0.0)');
    gradientStroke.addColorStop(0, 'rgba(119,52,169,0)'); //purple colors
    var config = {
      type: 'line',
      data: {
        labels: chart_labels,
        datasets: [{
          label: "",
          fill: true,
          backgroundColor: gradientStroke,
          borderColor: '#d346b1',
          borderWidth: 2,
          borderDash: [],
          borderDashOffset: 0.0,
          pointBackgroundColor: '#d346b1',
          pointBorderColor: 'rgba(255,255,255,0)',
          pointHoverBackgroundColor: '#d346b1',
          pointBorderWidth: 20,
          pointHoverRadius: 4,
          pointHoverBorderWidth: 15,
          pointRadius: 4,
          data: chart_data,
        }]
      },
      options: gradientChartOptionsConfigurationWithTooltipPurple
    };
    var myChartData = new Chart(ctx, config);
    $("#0").click(function() {
      var data = myChartData.config.data;
      data.datasets[0].data = chart_data;
      data.labels = chart_labels;
      myChartData.update();
    });
    $("#1").click(function() {
      var chart_data = [0, 0, 48,<?php echo $c_tot_tn_cnt[2];
      ?>];
      var data = myChartData.config.data;
      data.datasets[0].data = chart_data;
      data.labels = chart_labels;
      myChartData.update();
    });


    $("#2").click(function() {
      var chart_data = [0, 124, 2323, <?php echo $c_tot_tn_cnt[1];
      ?>];
      var data = myChartData.config.data;
      data.datasets[0].data = chart_data;
      data.labels = chart_labels;
      myChartData.update();
    });
	var f = document.getElementById("feat");
 f.style.display = "none";
	function features(){
		if (f.style.display === "none") {
		f.style.display = "block";}else{
			f.style.display = "none";
		}
	}
  </script>
</body>

</html>
