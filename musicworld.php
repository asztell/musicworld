<!DOCTYPE html>
<html>
    <head>
        <title>album</title>
   		<link href="style.css" rel="stylesheet" type="text/css">
	</head>
	<body>
<?php
	error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);

	$add_album = 'add_album';
	$add_artist = 'add_artist';
	$add_band = 'add_band';
	$albums_table = 'albums_table';
	$artists_table = 'artists_table';
	$album_title = 'album_title';	
	$bands_table = 'bands_table';
	$band_name = 'band_name';
	$button_specs = 'button_specs';
	$create_tables = 'create_tables';	
	$create_tables_page_action = 'musicworld.php?pageAction';
	$first_name = 'first_name';
	$last_name = 'last_name';
	$member = 'member';
	$release_year = 'release_year';
	$s = 'submitted';
	$search_album = 'search_album';
	$search_artist = 'search_artist';
	$search_band = 'search_band';
	$style = 'style';
	$text_box_ID = 'text_box_ID';
	$table_class = 'table_class';

	//Aux. variables which hold html for various forms
	$createTablesForm = <<<EOT
<form action="$create_tables_page_action=$create_tables" method="post">
	<input type="hidden" name="$s" value="true">
	<input type="submit" value="create db tables">
</form>
EOT;

	$PinkFloydForm = <<<EOT
<form>
	<div id="img">
		<div id="img_div">
			<form action="$create_tables_page_action=" method="post">
				<img src="pinkfloydgirls.jpg" alt="music is cool man...">
			</form>
		</div>
	</div>
</form>
EOT;

	$searchArtistForm = <<<EOT
<div class="form">
    <h1>Search Artist</h1>
    <p>Enter the name of the artist you want to find.</p>
    <div>
        <form action="$create_tables_page_action=$search_artist" method="post">
            <input type="hidden" name="submitted" value="true">
            <table class="$table_class">
                <tr>
                    <td>Artist First Name: </td>
                    <td><input id="$text_box_ID" type="text" name="$first_name" maxlength="40" size="40"><br />
                    </td>
                </tr>
                <tr>
                    <td>Artist Last Name: </td>
                    <td><input id="$text_box_ID" type="text" name="$last_name" maxlength="40" size="40"><br />
                    </td>
                </tr>                
                <tr>
                    <td colspan="2" id="$button_specs">
                    <p align="center"><input type="submit" value="Search Artist"></p>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>
EOT;

    $searchBandForm = <<<EOT
<div class="form">
    <h1>Search Band</h1>
    <p>Enter the name of the band or name of band member you want to find.</p>
    <div>
        <form action="$create_tables_page_action=$search_band" method="post">
            <input type="hidden" name="submitted" value="true">
            <table class="$table_class">
                <tr>
                    <td>Band Name: </td>
                    <td><input id="$text_box_ID" type="text" name="band_name" maxlength="40" size="40"><br />
                    </td>
                </tr>
                <tr>
                    <td>One Band Member Full Name: </td>
                    <td><input id="$text_box_ID" type="text" name="member_name" maxlength="40" size="40"><br />
                    </td>
                </tr>                
                <tr>
                    <td colspan="2" id="$button_specs">
                    <p align="center"><input type="submit" value="Search Band"></p>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>
EOT;

    $searchalbumForm = <<<EOT
<div class="form">
    <h1>Search album</h1>
    <p>Enter the title of the album you want to find.</p>
    <div>
        <form action="$create_tables_page_action=$search_album" method="post">
            <input type="hidden" name="submitted" value="true">
            <table class="$table_class">
                <tr>
                    <td>album Title: </td>
                    <td><input id="$text_box_ID" type="text" name="$album_title" maxlength="40" size="40"><br />
                    </td>
                </tr>
                <tr>
                    <td>Release Year: </td>
                    <td><input id="$text_box_ID" type="text" name="$release_year" maxlength="40" size="40"><br />
                    </td>
                </tr>                
                <tr>
                    <td colspan="2" id="$button_specs">
                    <p align="center"><input type="submit" value="Search album"></p>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>
EOT;

    $addArtistForm = <<<EOT
<div class="form">
    <h1>New Artist</h1>
    <div>	
        <form action="$create_tables_page_action=$add_artist" method="post">
            <input type="hidden" name="submitted" value="true">
            <table class="$table_class">
                <tr>
                    <td align="right">Artist's first name:</td>
                    <td><input id="$text_box_ID" type="text" name="$first_name" maxlength="30" size="30"><br />
                </tr>
                <tr>
                    <td align="right">Artist's last name:</td>
                    <td><input id="$text_box_ID" type="text" name="$last_name" maxlength="30" size="30"><br />
                </td>
                </tr>
                <tr>
                    <td align="right">Style:</td>
                    <td><input id="$text_box_ID" type="text" name="$style" maxlength="30" size="30"><br />
                </tr>
                <tr>
                    <td colspan="2" id="$button_specs">
                        <p align="center" class="save">
                            <input type="submit" value="Save">
                        </p>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>
EOT;

    $addBandForm = <<<EOT
<div class="form">
    <h1>New Band</h1>
    <div>
        <form action="$create_tables_page_action=$add_band" method="post">
            <input type="hidden" name="submitted" value="true">
            <table class="$table_class">
                <tr>
                    <td align="right">Name of band:</td>
                    <td><input id="$text_box_ID" type="text" name="band_name" maxlength="30" size="30"><br /></td>
                </tr>
                <tr>
                    <td align="right">Style:</td>
                    <td><input id="$text_box_ID" type="text" name="$style" maxlength="30" size="30"><br /></td>
                </tr>
                <tr>
                    <td align="right">Member1:</td>
                    <td><input id="$text_box_ID" type="text" name="member1" maxlength="30" size="30"><br /></td>
                </tr>
                <tr>
                    <td align="right">Member2:</td>
                    <td><input id="$text_box_ID" type="text" name="member2" maxlength="30" size="30"><br /></td>
                </tr>
                <tr>
                    <td align="right">Member3:</td>
                    <td><input id="$text_box_ID" type="text" name="member3" maxlength="30" size="30"><br /></td>
                </tr>
                <tr>
                    <td align="right">Member4:</td>
                    <td><input id="$text_box_ID" type="text" name="member4" maxlength="30" size="30"><br /></td>
                </tr>
                <tr>
                    <td align="right">Member5:</td>
                    <td><input id="$text_box_ID" type="text" name="member5" maxlength="30" size="30"><br /></td>
                </tr>
                <tr>
                    <td colspan="2" id="$button_specs">
                        <p align="center" class="save"><input type="submit" value="Save"></p>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>
EOT;

    $addalbumForm = <<<EOT
<div class="form">
    <h1>New album</h1>
    <div>
        <form action="$create_tables_page_action=$add_album" method="post">
            <input type="hidden" name="submitted" value="true">
            <table class="$table_class">
                <tr>
                    <td align="right">album title:</td>
                    <td><input id="$text_box_ID" type="text" name="$album_title" maxlength="30" size="30"><br /></td>
                </tr>
                <tr>
                    <td align="right">Style:</td>
                    <td><input id="$text_box_ID" type="text" name="$style" maxlength="30" size="30"><br /></td>
                </tr>
                <tr>
                    <td align="right">Release Year:</td>
                    <td><input id="$text_box_ID" type="text" name="$release_year" maxlength="30" size="30"><br /></td>
                </tr>
                <tr>
                    <td colspan="2" id="$button_specs">
                        <p align="center" class="save"><input type="submit" value="Save"></p>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>
EOT;

	include('db2_connection_info.inc');

	$conn = mysqli_connect($Hostname, $Username, $Password, $Database);

    //page action
    $pageAction = $_GET['pageAction'];

    //figure out which form to display to the user based upon the page action
    $formToDisplay = "";

    $output = array(); //store output to display to the user later

	function display($result) {
//		var_dump($result);
		$output = "";
		$output .= "<h4>Search returned the following results: </h4>";
		$output .= "<div id='display_output_form'>";
		$output .= "<table border='0'>";
		while($row = mysqli_fetch_assoc($result)) {
			foreach ($row as $name => $value) {
				$output .= <<<EOT
<tr>
	<td>$name</td>
	<td>: $value</td>
</tr>
EOT;
			}
		}
		$output .= "</table>";
		$output .= "</div>";
		return $output;
	};

    //decide which form to show
    if ($pageAction == "") {
    	$formToDisplay = $PinkFloydForm;
    } else if ($pageAction == $add_artist) {
        $formToDisplay = $addArtistForm;
    } else if ($pageAction == $add_band) {
        $formToDisplay = $addBandForm;
    } else if ($pageAction == $add_album) {
        $formToDisplay = $addalbumForm;
    } else if ($pageAction == $search_artist) {
        $formToDisplay = $searchArtistForm;
    } else if ($pageAction == $search_band) {
        $formToDisplay = $searchBandForm;
    } else if ($pageAction == $search_album) {
        $formToDisplay = $searchalbumForm;
    }

    //actual logic to process submitted forms
    if ($pageAction == $create_tables) {
        array_push($output, "Processing creating tables");

        $result = mysqli_query( $conn, "
            DROP TABLE IF EXISTS $artists_table;
		");
        if (!$result) {
            array_push($output, mysqli_error($conn));
        } else {
            array_push($output, "<div class='mysql_message'>table artist dropped<br /></div>");
        }

        $result = mysqli_query( $conn, "
            DROP TABLE IF EXISTS bands_table;
		");
        if (!$result) {
            array_push($output, mysqli_error($conn));
        } else {
            array_push($output, "<div class='mysql_message'>table band dropped<br /></div>");
        }

        $result = mysqli_query( $conn, "
            DROP TABLE IF EXISTS albums_table;
		");
        if (!$result) {
            array_push($output, mysqli_error($conn));
        } else {
            array_push($output, "<div class='mysql_message'>table album dropped<br /></div>");
        }

        $result = mysqli_query($conn, "
            CREATE TABLE $artists_table (
                artist_id int(7) NOT NULL AUTO_INCREMENT,
                $first_name varchar(15) NOT NULL,
                $last_name varchar(15) NOT NULL,
                $style varchar(25),
                CONSTRAINT pk_artist_id PRIMARY KEY (artist_id));
		");
        if (!$result) {
            array_push($output, mysqli_error($conn));
        } else {
            array_push($output, "<div class='mysql_message'>table artist created<br /></div>");
        }

        $result = mysqli_query($conn, "
            CREATE TABLE bands_table (
                band_id int(7) NOT NULL AUTO_INCREMENT,
                band_name varchar(35) NOT NULL,
                $style varchar(25),
                member1 varchar(35),
                member2 varchar(35),                
                member3 varchar(35),
                member4 varchar(35),
                member5 varchar(35),
                CONSTRAINT pk_band_id PRIMARY KEY (band_id));
		");
        if (!$result) {
            array_push($output, mysqli_error($conn));
        } else {
            array_push($output, "<div class='mysql_message'>table band created<br /></div>");
        }

        $result = mysqli_query($conn, "
            CREATE TABLE albums_table ( 
                album_id int(7) NOT NULL AUTO_INCREMENT,
                $album_title varchar(30) NOT NULL,
                $style varchar(25),
                $release_year int(4),
                CONSTRAINT pk_album_id PRIMARY KEY (album_id));
        ");
        if (!$result) {
            array_push($output, mysqli_error($conn));
        } else {
            array_push($output, "<div class='mysql_message'>table album created<br /></div>");
        }

    } else if (($pageAction == $add_artist) && $_POST["submitted"]) {
        $result = mysqli_query($conn, "
        	INSERT INTO $artists_table(
        	$first_name, $last_name, $style)
        	ValUES ('".$_POST['first_name']."', '".$_POST['last_name']."', '".$_POST['style']."'
        	);
        ");
        if (!$result) {
            array_push($output, mysqli_error($conn));
            array_push($output, "You must at least enter the first name of the artist");
        } else {
            array_push($output, "<div class='mysql_message'>artist ".$_POST['first_name']." ".$_POST['last_name']." has been added</div>");
        }

    } else if ($pageAction == $add_band && $_POST["submitted"]) {
        $result = mysqli_query($conn, "
        	INSERT INTO bands_table(
        	$band_name, $style, member1, member2, member3, member4, member5)
        	ValUES ('".$_POST['band_name']."', '".$_POST['style']."', '".$_POST['member1']."', '".$_POST['member2']."', '".$_POST['member3']."', '".$_POST['member4']."', '".$_POST['member5']."'
        	);
        ");        
        if (!$result) {
            array_push($output, mysqli_error($conn));
            array_push($output, "You must at least enter the band's name");            
        } else {
            array_push($output, "<div class='mysql_message'>band ".$_POST['band_name']." has been added</div>");
        }

    } else if ($pageAction == $add_album && $_POST["submitted"]) {
        $result = mysqli_query($conn, "
        	INSERT INTO albums_table(
        	$album_title, $style, $release_year)
        	ValUES ('".$_POST['album_title']."', '".$_POST['style']."', '".$_POST['release_year']."'
        	);
        ");
        if (!$result) {
            array_push($output, mysqli_error($conn));
            array_push($output, "You must at least enter the name of the album");            
        } else {
            array_push($output, "<div class='mysql_message'>album ".$_POST['album_title']." has been added</div>");
        }

	} else if ($pageAction == $search_artist && $_POST["submitted"]) {
		$filter2 = filter_input(INPUT_POST, "$first_name");
		$filter3 = filter_input(INPUT_POST, "$last_name");
/*assign alias to table)
        http://dev.mysql.com/doc/refman/5.0/en/string-comparison-functions.html#operator_like
         */
		$result = mysqli_query($conn, "
				SELECT $artists_table.artist_id AS 'Artist id',
					$artists_table.$first_name AS 'First Name',
					$artists_table.$last_name AS 'Last Name',
					$artists_table.$style AS 'Style'
				FROM $artists_table
				WHERE $first_name LIKE '$filter2'
					OR $last_name LIKE '$filter3'
			;");
		if (!$result) {
			array_push($output, mysqli_error($conn));
		} else {
			$searchResultDisplayString = display($result);
		}

	} else if ($pageAction == $search_band && $_POST["submitted"]) {
		$filter4 = filter_input(INPUT_POST, "$band_name");
		$filter5 = filter_input(INPUT_POST, "member_name");
		if (strlen($filter5) <= 0) {
			$query = "
				SELECT bands_table.band_id AS 'Band ID',
					bands_table.$band_name AS 'Band Name',
					bands_table.$style AS 'Style',
					bands_table.member1,
					bands_table.member2,
					bands_table.member3,
					bands_table.member4,
					bands_table.member5
				FROM bands_table
				WHERE $band_name LIKE '$filter4'
			;";
		} else {
			$query = "
				SELECT bands_table.band_id AS 'Band ID',
					bands_table.$band_name AS 'Band Name',
					bands_table.$style AS 'Style',
					bands_table.member1,
					bands_table.member2,
					bands_table.member3,
					bands_table.member4,
					bands_table.member5
				FROM bands_table
				WHERE $band_name LIKE '$filter4'
					OR member1 LIKE '$filter5'
					OR member2 LIKE '$filter5'
					OR member3 LIKE '$filter5'
					OR member4 LIKE '$filter5'
					OR member5 LIKE '$filter5'
			;";
		}
		$result = mysqli_query($conn, $query);
		if (!$result) {
            array_push($output, mysqli_error($conn));
        } else {
			$searchResultDisplayString = display($result);
		}

    } else if ($pageAction == $search_album && $_POST["submitted"]) {
		$filter1 = filter_input(INPUT_POST, "$album_title");
		$filter6 = filter_input(INPUT_POST, "$release_year");		
		$result = mysqli_query($conn, "
				SELECT albums_table.$album_title AS 'album Title',
					albums_table.$release_year AS 'Release Year'
				FROM albums_table
				WHERE albums_table.$album_title LIKE '$filter1'
				OR albums_table.$release_year LIKE '$filter6'
			;");
		if (!$result) {
            array_push($output, mysqli_error($conn));
        } else {
			$searchResultDisplayString = display($result);
		}
	}
?>
		<div class="page">
		    <div class="logo">
		        <h1>M O V I E W O R L D</h1>
		    </div>
		    <div class="container" id="header_container">
				<ul class="nav">
					<li class="button_specs"><a href="musicworld.php?pageAction=search_artist">SrchArtist</a></li>
					<li class="button_specs"><a href="musicworld.php?pageAction=search_band">SrchBand</a></li>
					<li class="button_specs"><a href="musicworld.php?pageAction=search_album">Srchalbum</a></li>
				</ul>
		    </div>
		    <div class="container" id="form_container">
		        <?php
		        	if ($_POST["submitted"]) {
				    	if ($pageAction == $search_artist) {
				    		if (mysqli_num_rows($result) == 0) {
								echo "<h4>wrong artist name</h4>";
								echo "<h4>try again</h4>";
					    	} else {
						    	echo $searchResultDisplayString;
						    }
						}

				    	if ($pageAction == $search_band) {
				    		if (mysqli_num_rows($result) == 0) {
								echo "<h4>wrong band name or member name</h4>";
								echo "<h4>try again</h4>";
							}else {
						    	echo $searchResultDisplayString;
						    }
				    	}

				    	if ($pageAction == $search_album) {
				    		if (mysqli_num_rows($result) == 0) {
								echo "<h4>wrong album name or year</h4>";
								echo "<h4>try again</h4>";
							}else {
						    	echo $searchResultDisplayString;
						    }
				    	}
		        	}
					$searchResultDisplayString = "";
					echo $formToDisplay;
		        ?>
		    </div>
		    <div class="server_output">
		        <?php echo implode("<br>", $output) ?>
		    </div>
		    <div class="container" id="footer_container">
				<ul class="nav">
				    <li class="button_specs"><a href="musicworld.php?pageAction=add_artist">Add New Artist</a></li>
				    <li class="button_specs"><a href="musicworld.php?pageAction=add_band">Add New Band</a></li>		        
				    <li class="button_specs"><a href="musicworld.php?pageAction=add_album">Add New album</a></li>
				</ul>
			</div>
			
<?php
		if ( $pageAction != "") {
			echo "
			<div>
				<ul class='nav'>
					<li class='$button_specs'><a href='$create_tables_page_action'> < back to the naked ladies</a></li>
					<li class='$button_specs'><a href='$create_tables_page_action=$create_tables'>DB tables</a></li>			    
				</ul>
			</div> ";
		}
?>
		</div>
    </body>
</html>
