<head>

<link href="css/apaccordion.css" rel="stylesheet" type="text/css" />

</head>
<body>
<!--
<div>
<ul style="list-style:none; ">
<li class="horizontal"><a class="current" href="javascript:void(0);" title="All">All</a></li>
<li class="horizontal"><a class="" href="/businesses/development-projects-story-map/development-projects-list/-alpha-NonAlpha" title="#">#</a></li>
<li class="horizontal"><a class="" href="/businesses/development-projects-story-map/development-projects-list/-alpha-A" title="A">A</a></li>
<li class="horizontal"><a class="" href="/businesses/development-projects-story-map/development-projects-list/-alpha-B" title="B">B</a></li>
<li class="horizontal"><a class="" href="/businesses/development-projects-story-map/development-projects-list/-alpha-C" title="C">C</a></li>
<li class="horizontal"><a class="" href="/businesses/development-projects-story-map/development-projects-list/-alpha-D" title="D">D</a></li>
<li class="horizontal"><a class="" href="/businesses/development-projects-story-map/development-projects-list/-alpha-E" title="E">E</a></li>
<li class="horizontal"><a class="" href="/businesses/development-projects-story-map/development-projects-list/-alpha-F" title="F">F</a></li>
<li class="horizontal"><a class="" href="/businesses/development-projects-story-map/development-projects-list/-alpha-G" title="G">G</a></li>
<li class="horizontal"><a class="" href="/businesses/development-projects-story-map/development-projects-list/-alpha-H" title="H">H</a></li>
<li class="horizontal"><a class="" href="/businesses/development-projects-story-map/development-projects-list/-alpha-I" title="I">I</a></li>
<li class="horizontal"><a class="" href="/businesses/development-projects-story-map/development-projects-list/-alpha-J" title="J">J</a></li>
<li class="horizontal"><a class="" href="/businesses/development-projects-story-map/development-projects-list/-alpha-K" title="K">K</a></li>
<li class="horizontal"><a class="" href="/businesses/development-projects-story-map/development-projects-list/-alpha-L" title="L">L</a></li>
<li class="horizontal"><a class="" href="/businesses/development-projects-story-map/development-projects-list/-alpha-M" title="M">M</a></li>
<li class="horizontal"><a class="" href="/businesses/development-projects-story-map/development-projects-list/-alpha-N" title="N">N</a></li>
<li class="horizontal"><a class="" href="/businesses/development-projects-story-map/development-projects-list/-alpha-O" title="O">O</a></li>
<li class="horizontal"><a class="" href="/businesses/development-projects-story-map/development-projects-list/-alpha-P" title="P">P</a></li>
<li class="horizontal"><a class="" href="/businesses/development-projects-story-map/development-projects-list/-alpha-Q" title="Q">Q</a></li>
<li class="horizontal"><a class="" href="/businesses/development-projects-story-map/development-projects-list/-alpha-R" title="R">R</a></li>
<li class="horizontal"><a class="" href="/businesses/development-projects-story-map/development-projects-list/-alpha-S" title="S">S</a></li>
<li class="horizontal"><a class="" href="/businesses/development-projects-story-map/development-projects-list/-alpha-T" title="T">T</a></li>
<li class="horizontal"><a class="" href="/businesses/development-projects-story-map/development-projects-list/-alpha-U" title="U">U</a></li>
<li class="horizontal"><a class="" href="/businesses/development-projects-story-map/development-projects-list/-alpha-V" title="V">V</a></li>
<li class="horizontal"><a class="" href="/businesses/development-projects-story-map/development-projects-list/-alpha-W" title="W">W</a></li>
<li class="horizontal"><a class="" href="/businesses/development-projects-story-map/development-projects-list/-alpha-X" title="X">X</a></li>
<li class="horizontal"><a class="" href="/businesses/development-projects-story-map/development-projects-list/-alpha-Y" title="Y">Y</a></li>
<li class="horizontal"><a class="" href="/businesses/development-projects-story-map/development-projects-list/-alpha-Z" title="Z">Z</a></li>
</ul>
</div>
-->
</body>
<?
//ini_set("display_errors","1");
//error_reporting(E_ALL ^ E_NOTICE);		

//echo "hello world!<br />";	 <link href="../css/viewAP.css" rel="stylesheet" type="text/css" />  <script type="text/javascript" src="https://www.chesterfield.mo.us/cmss_files/js/viewActiveProjects.js"></script>
$db2 = mssql_connect("sde101.chesterfield.mo.us","webreader","w3br3ad3r!");
$dbName = "[APTest]";
//echo "hello world";

//$where = '';
//if(isset($_REQUEST['pid']))
//	$where = ' and P.project_id='.$_REQUEST['pid'];

if(!isset($_REQUEST['pid'])){
/*	$q = "SELECT distinct PP.project_location, P.proj_name, P.thumb_url, P.OBJECTID, P.project_id, P.Description
	  FROM $dbName.[dbo].[PROJ_PROJECT] AS PP LEFT JOIN $dbName.[dbo].[PROJECTBOUNDARYORIG] AS P
	  ON PP.Parent_ID = P.proj_name
	  where P.Status = 'active' and P.proj_name IS NOT NULL 
	  order by P.OBJECTID ";
*/	  
	  $q = "SELECT * FROM 
[APTest].[dbo].[PROJECTBOUNDARYORIG] AS P  
WHERE P.Status = 'active' 
order by P.OBJECTID ";
	  
	$qry = mssql_query( $q );

	//echo '<ul >';		//class="list-main clearfix"
	echo '<table class="list-main">';
	$alt = '';
	$count = 1;
	while ($row = mssql_fetch_array($qry)) {
	//	echo '<li>';
		echo '<tr  class="allproj">';
		echo '<td style="padding:20px">';
		echo '<h2 >'.'<a href="?index='.$count.'&pid='.$row['OBJECTID'].'" >'.$row['proj_name'].' </a> </h2>';
		echo '<span>Status: '.$row['DevelopmentStatus'].'</span> <br>';
		echo '<span>Description: '.$row['Description'].'</span>';
		echo '</td>';	
		
		echo '<td style="padding:20px">';	
		echo '<a href="?index='.$count.'&pid='.$row['OBJECTID'].'" class="detail-thumbnail" title="'.$row['proj_name'].'" >';
		echo '<div style="height: 200px;" > <img width="350px" style="max-height: 100%;min-height: 100%;" alt="'.$row['proj_name'].'" src="'.$row['thumb_url'].'" /> </div>';
		echo '</a>';
		echo '</td>';	
	//	echo '<ul class="detail-list">';
	//	echo '<li>';
	//	echo '<span class="detail-list-label">Address:</span>';
	//	echo '<span class="detail-list-value">'.$row['project_location'].'</span>';
	//	echo '</li>';
	//	echo '</ul>';
	//	echo '</li>';
		echo '</tr>';
		$count++;
	}
	//echo '</ul>';
	echo '</table>';
}

else{
	$where = ' and P.OBJECTID='.$_REQUEST['pid'];
	$count = $_REQUEST['index'];

	$q = "SELECT distinct PP.project_location, PP.project_ward, P.proj_name, P.OBJECTID, P.project_id, P.thumb_url, P.pic_url, P.project_details, P.DevelopmentStatus
		  FROM $dbName.[dbo].[PROJ_PROJECT] AS PP LEFT JOIN $dbName.[dbo].[PROJECTBOUNDARYORIG] AS P
		  ON PP.Parent_ID = P.proj_name
		  where PP.project_active = 'active' $where";

	$qry = mssql_query( $q );

	echo '<table >';
	while ($row = mssql_fetch_array($qry)) {
		echo '<tr  >';
		echo '<td style="padding:20px">';
		echo '<h2 >'.$row['proj_name'].'</h2>';
		echo '<span>Address: '.$row['project_location'].'</span> <br>';
		echo '<span>Ward: '.$row['project_ward'].'</span> <br>';
		echo '<span>Development Stage: '.$row['DevelopmentStatus'].'</span>';
		echo '</td>';
		echo '</tr>';
		
		echo '<tr  >';
		echo '<td style="padding:20px">';	
		echo '<div style="height: 200px;" > <img width="350px" style="max-height: 100%;min-height: 100%;" alt="'.$row['proj_name'].'" src="'.$row['thumb_url'].'" /> </div>';
		echo '</td>';		
		echo '</tr>';

		echo '<tr  >';
		echo '<td style="padding:20px">';	
		echo '<div style="height: 200px;" ><img width="350px" style="max-height: 100%;min-height: 100%;" alt="'.$row['proj_name'].'" src="'.$row['pic_url'].'">';
		echo '</td>';		
		echo '</tr>';
		
		echo '<tr><td style="padding:0px 0px 0px 20px"><h3>Detailed Information </h3></td></tr>';
		
		if(isset($row['project_details'])){
			$line = split("\n", $row['project_details']);
			foreach($line as $l)
				echo '<tr><td style="padding:0px 0px 0px 20px">'.$l.'</td></tr>';
			//echo '<tr><td style="padding:0px 0px 0px 20px">'.$row['project_details'].'</td></tr>';
		}
		echo '<tr><td style="padding:0px 0px 0px 20px"><h3>Projects </h3></td></tr>';
	}
	echo '</table>';


	
	$q = "  SELECT  *, PP.project_id AS projid, planner.planner_name AS pname, planner.planner_email AS pemail, city_engineer.planner_name AS cname, city_engineer.planner_email AS cemail, PT.type_name
		  FROM $dbName.[dbo].[PROJ_PROJECT] AS PP LEFT JOIN $dbName.[dbo].[PROJECTBOUNDARYORIG] AS P
		  ON PP.Parent_ID = P.proj_name
		  INNER JOIN $dbName.[dbo].PROJ_TYPE AS PT ON PT.type_id=PP.type_id
		LEFT JOIN $dbName.[dbo].[proj_planner] AS planner
		ON planner.[planner_id] = PP.[planner_id]
		LEFT JOIN $dbName.[dbo].[proj_planner] AS city_engineer
		ON city_engineer.planner_id = PP.[city_engineer_id]		  
		  
		  where PP.project_active = 'active' $where";
	$qry = mssql_query( $q );	
	
	echo '<ul class="accord">';
	while ($row = mssql_fetch_array($qry)) {
//		echo '<tr  >';
		echo '<li>';
		echo '<input type="checkbox" checked><i></i>';
		
//		echo '<td style="padding:0px 0px 10px 20px">';
//		echo '<strong>Name: </strong>'.$row['project_name'].'</span> <br>';
		echo '<h2>'.$row['type_name'].'</h2>';
		echo '<p>';
		//echo '<span>Address: '.$row['project_location'].'</span> <br>';
		echo '<span><strong>Name: </strong>'.$row['project_name'].'</span> <br>';
		echo '<span><strong>Status: </strong>'.$row['project_status'].'</span> <br>';
		echo '<span><strong>Type: </strong>'.$row['type_name'].'</span> <br>';
		echo '<span><strong>Planner: </strong>'.$row['pname'].' <a href="mailto:'.$row['pemail'].'" target="_blank">[contact]</a> </span> <br>';
		echo '<span><strong>Engineer: </strong>'.$row['cname'].' <a href="mailto:'.$row['cemail'].'" target="_blank">[contact]</a> </span> <br>';
		//echo '<a href="http://www.chesterfield.mo.us/active-projects.html?pid='.$row['projid'].'" class="detail-thumbnail" target="_blank"> More </a>';
//		echo '</td>';
		
		echo '</p>';
		echo '</li>';
//		echo '</tr>';
	}	
	echo '</ul>';
	
	
//	echo '</table>';
	
	echo '<a href="http://mapping.chesterfield.mo.us/maptour/src/index.html?webmap=7526cb721b7c43c3afacd301ece8d659&index='.$count.'" target="_blank" style = "float:right;">Go to story map &gt;&gt;</a> ';
	echo '<a href="https://www.chesterfield.mo.us/test-active-projects.html" style = "float:left;">&lt;&lt; Return to all list </a> ';
	

}

?>
