<?php

$url = 'https://contextualwebsearch-websearch-v1.p.rapidapi.com/api/search/';
$end_point = 'NewsSearchAPI';
$query_fields = [
    'q' => $_GET['query'],
    'pageNumber' => 1,
    'pageSize' => 1000000,
    'autoCorrect' => 'true',
    'fromPublicedDate' => 'null',
    'toPublishedDate' => 'null',
    'safeSearch' => 'false',
];

$comp_url = $url . $end_point . '?' . http_build_query($query_fields);

$curl = curl_init();

curl_setopt_array($curl, [
	CURLOPT_URL => $comp_url,
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_FOLLOWLOCATION => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 30,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "GET",
	CURLOPT_HTTPHEADER => [
		"X-RapidAPI-Host: contextualwebsearch-websearch-v1.p.rapidapi.com",
		"X-RapidAPI-Key: e360d44f73msh230b17b4e1f719bp13e2d8jsn10e230b8ec77"
	],
]);

$response = json_decode(curl_exec($curl),true);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
	echo "cURL Error #:" . $err;
} else {
    $test = $response['value'];
}
?>
<!DOCTYPE html>
<html leng='en'>
    <head>
        <title>Article Search Engine | 3DOT60 iResources</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="app.css">
    </head>
    <body>
        
        <div id="mySidenav" class="sidenav">
              <button class="menu" onclick="this.classList.toggle('opened');this.setAttribute('aria-expanded', this.classList.contains('opened'));menuFunction();" aria-label="Main Menu">
                  <svg width="100" height="100" viewBox="0 0 100 100">
                    <path class="line line1" d="M 20,29.000046 H 80.000231 C 80.000231,29.000046 94.498839,28.817352 94.532987,66.711331 94.543142,77.980673 90.966081,81.670246 85.259173,81.668997 79.552261,81.667751 75.000211,74.999942 75.000211,74.999942 L 25.000021,25.000058" />
                    <path class="line line2" d="M 20,50 H 80" />
                    <path class="line line3" d="M 20,70.999954 H 80.000231 C 80.000231,70.999954 94.498839,71.182648 94.532987,33.288669 94.543142,22.019327 90.966081,18.329754 85.259173,18.331003 79.552261,18.332249 75.000211,25.000058 75.000211,25.000058 L 25.000021,74.999942" />
                  </svg>
                </button>
              <a href="#" class="tablinks" onclick="openTab(event, 'Articles')" id="defaultOpen"><b style='font-size: 36px;'>&#128240</b> <strong>Articles</strong></a>
              <a href="#" class="tablinks" onclick="openTab(event, 'Books')"><b style='font-size: 36px;'>&#128218</b> <strong>Books</strong></a>
              <a href="#" class="tablinks" onclick="openTab(event, 'Summarise')"><b style='font-size: 36px;'>&#128214</b> <strong>Summarise</strong></a>
              <a href="#" class="tablinks" onclick="openTab(event, 'Paraphrase')"><b style='font-size: 36px;'>&#128221</b> <strong>Paraphrase</strong></a>
              <a href="#" class="tablinks" onclick="openTab(event, 'Reference')"><b style='font-size: 36px;'>&#127942</b> <strong>APA Reference</strong></a>
              <a href="#" class="tablinks" onclick="openTab(event, 'Text-to-Voice')"><b style='font-size: 36px;'>&#127911</b> <strong>Text-to-Voice</strong></a>
            </div>
        
       <div id="main" class="main">
           <div id="Articles" class="tabcontent">
            <div class="form-box">
                <form action="" method="get">
                    <label for="query"><h1>Get latest articles published across the world...</h1></label>
                  <br />
                  <input id="query" type="text" name="query" placeholder="Search article here"/>
                  <button type="submit" name="submit" onclick="showArrow();">&#128270</button>
                </form>
                <br />
                <p id="down-arrow" style="font-size: 25px;font-family: Arial, Helvetica, sans-serif;color: white;animation: down 1s  infinite; display: none;"><b>&#8681&nbspView&nbspResults&nbsp&#8681</b></p>
            </div>
            <br />
            <div class="container">
            <div class="results-box">
                <?php
                  if (!empty($test)) {
                          
                          foreach ($test as $post) {
                             echo '<h2>' . $post['title'] . '</h2>';
                             echo '<p><small>Date Published: ' . $post['datePublished'] . '</small></p>';
                             echo '<p style="text-overflow: ellipsis; height: 100px; overflow:hidden; line-height:1.5;white-space: normal;">' . $post['body'] .'</p>';
                             echo '<a href="' . $post['url'] . '" target="blank">View Source</a>';
                             echo '<br />'; 
                             echo '<br />'; 
                             echo '<hr>';
                          }
                  }else if(empty($test)){
                      echo '<h2>Sorry, you have reached your daily limit...</h2>';
                        
                  }
               ?>
            </div>
            </div>
           </div>
           
            <div id="Books" class="tabcontent">
              <h3>Books</h3>
              <p>Coming soon...</p> 
            </div>

            <div id="Summarise" class="tabcontent">
              <h3>Summarise</h3>
              <p>Coming soon...</p>
            </div>

            <div id="Paraphrase" class="tabcontent">
              <h3>Paraphrase</h3>
              <p>Coming soon...</p>
            </div>

            <div id="Reference" class="tabcontent">
              <h3>Reference</h3>
              <p>Coming soon...</p>
            </div>

            <div id="Text-to-Voice" class="tabcontent">
              <h3>Text-to-Voice</h3>
              <p>Coming soon...</p>
            </div>
           
           
           
        </div> 
        
        
        <script type="text/javascript">

function menuFunction() {
   var element = document.getElementById("mySidenav");
   element.classList.toggle("mystyle1");
   var element1 = document.getElementById("main");
   element1.classList.toggle("mystyle2");
   var element2 = document.querySelector("body");
   element2.classList.toggle("mystyle3");
}
</script>

<script type="text/javascript">
function openTab(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>
        
        <script type="text/javascript">
            function showArrow(){
                var arrow = document.getElementById('down-arrow');
                arrow.style.display = "block";
            }        
        </script>
    </body>
</html>


