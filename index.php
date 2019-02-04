<?php

//Del patogumo susikuriu eilutes funkcija:
function br(){echo "<br>";}

//nusistatom laiko zona
date_default_timezone_set('Europe/Vilnius');

//datos kintamasis:
$today = getdate();
/*print_r($today);*/
br();
?>

<!DOCTYPE html>

<html>
<head>

	<meta charset="utf-8"> 		
	<meta name="viewport" content="width=device-width, initial-scale=1">  
	<title>Advento kalendorius/2018</title>				
	<link rel="stylesheet" href="assets/css/style.css">

</head>

<body>

	<div class = "container">

		<!-- canvas tagas sniegui: -->
		<canvas id = "my_canvas" width="1800" height="1200"></canvas>
		
		<?php 
		
		//PAGRINDINIS VISO KALENDORIAUS puslapio VEIKIMO KODAS:
		
		//Jei datos diena lygi 25 ar daugiau, Advento kalendoriaus pabaiga ir sveikinimas:
			if($today['mday']>=25){?>
			<div class="xmas">
					<?php
					echo "<iframe width=50% height='315'
					src='https://www.youtube.com/embed/sKJC2bUsajI?playlist=sKJC2bUsajI?&loop=1'>
					</iframe>";
					br();		
					?>
					<h1><i>Jaukių švenčių ir laimingų ateinančių metų!</i></h1>
			</div>
			<section class = "section">
				<div class = "text">
					<h2>Advento kalendoriaus dienos praėjo.<br> Tačiau demonstraciniais tikslais šio kalendoriaus veikimas paliktas toks, koks buvo 2018 metų gruodį.<br></h2>
					<h3>Gruodis, 2018</h3>
					
				</div>
			</section>
	</div> 

	<?php //Jei datos diena yra iki 25,sveikinimas nerodomas ir rodomas skaitliukas bei Advento kalendorius:

			} elseif ($today['mday']<25) {?>
					
			<section class = "section">
				<div class = "text">
					<h1>Advento kalendorius</h1>
					<h2>Advento kalendoriaus dienos praėjo.<br> Tačiau demonstraciniais tikslais šio kalendoriaus veikimas paliktas toks, koks buvo 2018 metų gruodį.<br></h2>
					<h3>Gruodis, 2018</h3>
				</div>
			</section>
		
	<div class = "skaitliukas">
			<?php
			
			//Virs Advento kalendoriaus bus rodoma, kiek liko dienu iki Kaledu, cia skaitliuko kodas, if sakinys naudojamas lietuviskos gramatikos atvaizdavimo tikslais:
			
			$time = time();
				
			$christmas = strtotime('25th december 2018');

			$daysChristmas = ceil(($christmas - $time)/60/60/24);
			
			if ($daysChristmas ==1 || $daysChristmas==21 || $daysChristmas==31){?>
				<h3><?php echo "Iki Kalėdų liko " . ""; ?> <span><?php echo $daysChristmas; ?></span><?php echo "". " diena!";?></h3><?php
			} elseif ($daysChristmas>=2 && $daysChristmas<10 || $daysChristmas>=22 && $daysChristmas<30){?>
				<h3><?php echo "Iki Kalėdų liko " . ""; ?> <span><?php echo $daysChristmas; ?></span><?php echo "". " dienos!";?></h3><?php
			} 
			 else {?>
				<h3><?php echo "Iki Kalėdų liko " . ""; ?> <span><?php echo $daysChristmas; ?></span><?php echo "". " dienų!";?></h3><?php
			}
	}?>		
	</div>
								
<?php

//Advento kalendoriaus lenteles veikimo logika:
			
//nusistatom reikalingus kintamuosius masyvuose:
						
//Savaites dienu masyvas:
$weekdays = ['Pirmadienis', 'Antradienis', 'Trečiadienis', 'Ketvirtadienis', 'Penktadienis', 'Šeštadienis', 'Sekmadienis'];

//Savaites dienu masyvo ilgis:
$wl = sizeof($weekdays);

//Kalendoriaus dienu masyvas, neigiamos reiksmes reikalingos tustiems langeliams kalendoriaus lenteleje:
$days = [-4, -3, -2, -1, 0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24];

//Kalendoriaus dienu masyvo ilgis:
$dl = sizeof($days);

//Nuorodu masyvai i paveikslelius, kurie atsidarines automatiskai kiekviena diena:

//Nuotraukos kalendoriaus langeliams:

$links = [
" ",
" ",
" ",
" ",
" ",
"images/nuotrauka_1.jpg",
"images/nuotrauka_2.jpg",
"images/nuotrauka_3.jpg",
"images/nuotrauka_4.jpg",
"images/nuotrauka_5.jpg",
"images/nuotrauka_6.jpg",
"images/nuotrauka_7.jpg",
"images/nuotrauka_8.jpg",
"images/nuotrauka_9.jpg",
"images/nuotrauka_10.jpg",
"images/nuotrauka_11.jpg",
"images/nuotrauka_12.jpg",
"images/nuotrauka_13.jpg",
"images/nuotrauka_14.jpg",
"images/nuotrauka_15.jpg",
"images/nuotrauka_16.jpg",
"images/nuotrauka_17.jpg",
"images/nuotrauka_18.jpg",
"images/nuotrauka_19.jpg",
"images/nuotrauka_20.jpg",
"images/nuotrauka_21.jpg",
"images/nuotrauka_22.jpg",
"images/nuotrauka_23.jpg",
"images/nuotrauka_24.jpg"
];
 
 
 
//Viso kalendoriaus lenteles atvaizdavimo ir veikimo kodas:
echo "<table>";

	//pirmoji eilute - savaites dienu atvaizdavimas lentele per for cikla:
	for ($a=1; $a<=1; $a++){
		//eilute:
		echo "<tr>";
		for($b=0; $b<$wl; $b++){
			//stulpeliai (padalos):
			echo "<th>";
			echo $weekdays[$b];					
			echo "</th>"; 
		}	
		echo "</tr>";
	}
	
	//menesio dienu lentele, atvaizduota nested loop metodu (for ciklas):
	
	//pradedam viska vienos eilutes atvaizdavimu:
	for ($a=1; $a<=1; $a++){
		echo "<tr>";
			//pirmuoju for ciklu atvaizduota eilute padalinam i stulpelius, kurie ir bus kalendoriaus langeliai:
			for ($b=0; $b<$dl; $b++){						
				echo "<td>";
				//Kadangi gruodis 2018 m. prasideda sestadieni, reikalingi penki tusti langeliai, tad taip ir nustatom:
				if ($b<=4){
					echo '';	
				}	
				//nuo sesto langelio pradedam atvaizduoti ($today['mday']+4) Advento kalendoriaus paveikslelius su galimybe juos paspaudus atidaryti paveikslelio modala, o kai diena dar "neatejusi" - rodom dienos skaiciu:
				
				//taigi, kai ateina diena, - atsiranda paveikslelis:
				elseif ($b<= ($today['mday']+4)){						
						echo "
								<a id='mybtn' href='#'>
								<img class = 'modal_image' src='$links[$b]' alt = ' ' height='106' width='160'>
								</a>
							  ";
						  
				//Modalo kodas:
				echo "<div id='myModal' class='modal'>";
						 // Modalo turinys:
						echo " <div class='modal-content'>
								<span class='close'>&times;</span>
								<img class = 'mcont' id = 'img01' src='$links[$b]' alt = ' ' height='430' width='650'>
								<div class = 'capt' id='caption'></div>";
								
						 echo "</div>";
				echo "</div>";					  
				}

				// kol diena nera atejusi - atvaizduojame kalendorines dienos skaiciu:
				else {	
					echo  $days[$b];				
					echo "</td>";
				}
					
				//Visas auksciau surasytas advento kalendoriaus kodas yra vienai eilutei, tad kad ji taptu lentele, sudalinam ta eilute kas septynias dienas:
				if ($b==6 || $b==13 || $b==20 || $b==27){
					echo "</tr>";
				}								
	}	
		echo "</tr>";
}
echo "</table>" . "<br>";

?>

<!-- Footer`is: -->

<div class="footer">
	
		<div id="name">
			<p>© Virginija Šniukštienė, 2018</p>
		</div>
		<div>
			<a id="link" href = "#">Kiti darbai</a>
		</div>
	
</div>
<br>
	
<script src="assets/scripts/custom.js"></script>

</body>

</html>
