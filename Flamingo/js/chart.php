<?php 
/*function convert_day($jour)
{
	if ($jour=="Fri") {$ch="";}
	if ($jour=="Sat") {$ch="";}
	if ($jour=="Sun") {$ch="";}
	if ($jour=="Mon") {$ch="";}
	if ($jour=="") {$ch="";}
	if ($jour=="") {$ch="";}
	if ($jour=="") {$ch="";}

}
*/

$bdd=new PDO('mysql:host=localhost;dbname=flamingo','root','');
$query="SELECT * FROM activite WHERE  id_user='".$_COOKIE['ID']."'";
$result=$bdd->prepare($query);
$result->execute();
$i=0;
$cpt=$result->rowCount();
$liste='[';
$data1='[';
$data2='[';

while($row=$result->fetch()){
$liste.='"'.$row['designation'].'"';
$query="SELECT * FROM events WHERE Faite='1'AND id_user='".$_COOKIE['ID']."' AND designation='".$row['designation']."' ";
$result2=$bdd->prepare($query);
$result2->execute();
$data1.=''.$result2->rowCount().'';
$query="SELECT * FROM events WHERE designation='".$row['designation']."' AND id_user='".$_COOKIE['ID']."'";
$result3=$bdd->prepare($query);
$result3->execute();
$data2.=''.$result3->rowCount().'';
$i++;
if ($i<$cpt) { $liste.=',';
 $data1.=',';
  $data2.=',';}
}
$liste.=']';
$data1.=']';
$data2.=']';
/*$da=date('Y-m-d');
$date=new DateTime($da);
$jour=$date->format('D');
$semaine=$date->modify('-1 weeks');
$sem=$semaine->format('Y-m-d');
echo $sem;*/
$ajourdhui=new DateTime(date('Y-m-d'));


$avnt_sem=$ajourdhui->modify('-1 weeks');
$jours='[';
$data11='[';
$data22='[';

while ($avnt_sem != new DateTime(date('Y-m-d'))) {
	$query="SELECT * FROM events WHERE  id_user='".$_COOKIE['ID']."' ";
	$res=$bdd->prepare($query);
	$res->execute();
	$day=$avnt_sem->format('D');
	$cpt1=0;
	$cpt2=0;
	while ($row=$res->fetch()) {
		$start=explode(" ",$row['start']);
		if ($start[0] == $avnt_sem->format('Y-m-d')){
			$cpt1++;
			if ($row['Faite']==1){$cpt2++;}
		}
	}
	$jours.='"'.$day.'",';
	$data11.=''.$cpt1.',';
	$data22.=''.$cpt2.',';
	$avnt_sem=$avnt_sem->modify('+1 days');

}
$query="SELECT * FROM events WHERE  id_user='".$_COOKIE['ID']."'";
	$res=$bdd->prepare($query);
	$res->execute();
	$day=(new DateTime(date('Y-m-d')))->format('D');
	$cpt1=0;
	$cpt2=0;
	$jours.='"'.$day.'"]';
	while ($row=$res->fetch()) {
		$start=explode(" ",$row['start']);
		if ($start[0] == date('Y-m-d')){
			$cpt1++;
			if ($row['Faite']==1){$cpt2++;}
		}}
	$data11.=''.$cpt1.']';
   $data22.=''.$cpt2.']';

  
	// **************************************
   $sem1=(new DateTime(date('Y-m-d')))->modify('-4 weeks');
   $sem2=(new DateTime(date('Y-m-d')))->modify('-3 weeks');
   $sem3=(new DateTime(date('Y-m-d')))->modify('-2 weeks');
   $sem4=(new DateTime(date('Y-m-d')))->modify('-1 weeks');
   	$query="SELECT * FROM events WHERE  id_user='".$_COOKIE['ID']."' ";
	$res=$bdd->prepare($query);
	$res->execute();
	$count1=0;
	$count2=0;
	$count3=0;
	$count4=0;
	$count11=0;
	$count22=0;
	$count33=0;
	$count44=0;
	while ($row=$res->fetch()) {
		$date=new DateTime($row['start']);
		if (($date<$sem2) && ($date>=$sem1)) {
			$count1++;
			if ($row['Faite']==1) {
				$count11++;
			}

		}
		if (($date<$sem3) && ($date>=$sem2)) {
			$count2++;
			if ($row['Faite']==1) {
				$count22++;
			}
		}
		if (($date<$sem4) && ($date>=$sem3)) {
			$count3++;
			if ($row['Faite']==1) {
				$count33++;
			}
		}
		if (($date<(new DateTime(date('Y-m-d')))) && ($date>=$sem4)) {
			$count4++;
			if ($row['Faite']==1) {
				$count44++;
			}
		}

	}









 ?>
<script >
	var randomScalingFactor = function(){ return Math.round(Math.random()*1000)};
	
	var lineChartData = {
		labels : <?php echo $jours ?>,
		datasets : [
			{
				label: "Taches Programmées",
				fillColor : "rgba(220,220,220,0.2)",
				strokeColor : "rgba(220,220,220,1)",
				pointColor : "rgba(220,220,220,1)",
				pointStrokeColor : "#fff",
				pointHighlightFill : "#fff",
				pointHighlightStroke : "rgba(220,220,220,1)",
				data : <?php echo $data11; ?>
			},
			{
				label: "Taches Faites",
				fillColor : "rgba(48, 164, 255, 0.2)",
				strokeColor : "rgba(48, 164, 255, 1)",
				pointColor : "rgba(48, 164, 255, 1)",
				pointStrokeColor : "#fff",
				pointHighlightFill : "#fff",
				pointHighlightStroke : "rgba(48, 164, 255, 1)",
				data : <?php echo $data22; ?>
			}
		]

	}
		
	var barChartData = {
		labels : ["Semaine1: <?php echo $sem1->format('Y-m-d') ?>","Semaine2: <?php echo $sem2->format('Y-m-d') ?>","Semaine3:<?php echo $sem3->format('Y-m-d') ?> ","Semaine4: <?php echo $sem4->format('Y-m-d') ?>"],
		datasets : [
			{
				fillColor : "rgba(220,220,220,0.5)",
				strokeColor : "rgba(220,220,220,0.8)",
				highlightFill: "rgba(220,220,220,0.75)",
				highlightStroke: "rgba(220,220,220,1)",
				data : [<?php echo $count1; ?>,<?php echo $count2; ?>,<?php echo $count3; ?>,<?php echo $count4; ?>]
			},
			{
				fillColor : "rgba(48, 164, 255, 0.2)",
				strokeColor : "rgba(48, 164, 255, 0.8)",
				highlightFill : "rgba(48, 164, 255, 0.75)",
				highlightStroke : "rgba(48, 164, 255, 1)",
				data : [<?php echo $count11; ?>,<?php echo $count22; ?>,<?php echo $count33; ?>,<?php echo $count44; ?>]
			}
		]

	}

	var pieData = [
		
			{
				value: 20,
				color: "#ffb53e",
				highlight: "#fac878",
				label: "En attente"
			},
			{
				value: 100,
				color: "#1ebfae",
				highlight: "#3cdfce",
				label: "Faite"
			},
			{
				value: 120,
				color: "#f9243f",
				highlight: "#f6495f",
				label: 'Non faites'
			}

		];
			
	var doughnutData = [
				{
					value: 300,
					color:"#30a5ff",
					highlight: "#62b9fb",
					label: "Blue"
				},
				{
					value: 50,
					color: "#ffb53e",
					highlight: "#fac878",
					label: "Orange"
				},
				{
					value: 100,
					color: "#1ebfae",
					highlight: "#3cdfce",
					label: "Teal"
				},
				{
					value: 120,
					color: "#f9243f",
					highlight: "#f6495f",
					label: "Red"
				}

			];
			
	var radarData = {
	    labels: <?php echo $liste; ?>,
	    datasets: [
	        {
	            label: "My First dataset",
	            fillColor: "rgba(220,220,220,0.2)",
	            strokeColor: "rgba(220,220,220,1)",
	            pointColor: "rgba(220,220,220,1)",
	            pointStrokeColor: "#fff",
	            pointHighlightFill: "#fff",
	            pointHighlightStroke: "rgba(220,220,220,1)",
	            data: <?php echo $data2; ?>
	        },
	        {
	            label: "My Second dataset",
	            fillColor : "rgba(48, 164, 255, 0.2)",
	            strokeColor : "rgba(48, 164, 255, 0.8)",
	            pointColor : "rgba(48, 164, 255, 1)",
	            pointStrokeColor : "#fff",
	            pointHighlightFill : "#fff",
	            pointHighlightStroke : "rgba(48, 164, 255, 1)",
	            data: <?php echo $data1; ?>
	        }
	    ]
	};
	
	var polarData = [
		    {
		    	value: 300,
		    	color: "#1ebfae",
		    	highlight: "#38cabe",
		    	label: "Teal"
		    },
		    {
		    	value: 140,
		    	color: "#ffb53e",
		    	highlight: "#fac878",
		    	label: "Orange"
		    },
		    {
		    	value: 220,
		    	color:"#30a5ff",
		    	highlight: "#62b9fb",
		    	label: "Blue"
		    },
		    {
		    	value: 250,
		    	color: "#f9243f",
		    	highlight: "#f6495f",
		    	label: "Red"
		    }
		
	];


</script>