<!DOCTYPE html>
<html>
	<head>
	    <title>Finder App</title>
	    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	    <link rel="stylesheet" type="text/css" href="css/jTinder.css">
	    <link rel="stylesheet" type="text/css" href="css/main.css">
	</head>
	<body>
		
		<div class="app">
		    
		    <h2 class="app-header">Findr</h2>
		
		    <div class="app-page">
		      
				<div class="finder">
		          	<div class="wrap">
		              	<div id="tinderslide">
		                  	<ul>
			                  	<?php
			      				# bibilothek initalisieren
			      				use InstagramScraper\Exception\InstagramException;
			      				require __DIR__ . '/vendor/autoload.php';
			      				$instagram = new \InstagramScraper\Instagram();
			
			      				# posts mit hashtag anfordern
			      				$medias = $instagram->getCurrentTopMediasByTagName('dessaumatchen');
			      				if (count($medias) > 0) {
				      				
				                    # tag filter
				                    if (isset($_GET['tag'])) {
				                      $tagFilter = $_GET['tag'];
				                    }
				                    
				  					# alle posts in schleife ausgeben
				  					foreach($medias as $media) {
				  						if (!isset($tagFilter) || (isset($tagFilter) && strpos($media->getCaption(), '#'.$tagFilter) !== false)) {
				  						?>
				  							<li class="pane1">
				  								<img src="<?php echo $media->getImageHighResolutionUrl(); ?>" width="300" alt="">
				  								<div><?php echo $media->getCaption(); ?></div>
				  								<div class="like"></div>
				  								<div class="dislike"></div>
				  							</li>
				  						<?php
				  						}
				  					}
			  					
			  					}
			          			?>
		                  	</ul>
		              	</div>
		          	</div>
		          
					<div class="actions">
						<a href="#" class="dislike"><i></i></a>
						<a href="#" class="like"><i></i></a>
					</div>
		      
		    	</div>
		    	
		      	<div class="page page-start is-active">
					<h1>LOGO</h1>
					<p>
						Wir, vom Projekt „Zeig, was Du machst!”, arbeiten derzeit an einem Webportal für Dessau-Roßlau. Nach dem Tinder-Prinzip sollen algorithmusbasierte Empfehlungen für Aktivitäten und Veranstaltungen in der Stadt vorgeschlagen werden. Die Zielgruppe sind junge Menschen zwischen 12 und 27 Jahren. Die Anwendung nutzt Beiträge der Plattform Instagram, die mit dem Hashtag #dessaumatchen markiert sind. Wir würden uns freuen, wenn Interesse an einer Zusammenarbeit durch Verwendung des Hashtags besteht. Gerne können wir dann Weiteres klären.
					<p>
					<button class="btn-finder">Los geht's</button>
				</div>
		      
				<div class="page page-bookmarks">
					<h1>BOOKMARKS</h1>
				</div>
		    
		    </div>
		
		    <nav class="app-menu" role="navigation">
				<ul>
					<!--li class="btn-filter">Filter</li-->
					<li class="btn-bookmarks">Bookmarks</li>
					<li class="btn-share">Share</li>
					<li class="btn-start">Info</li>
				</ul>
		    </nav>
		    
		</div>
	
		<script type="text/javascript" src="js/jquery.min.js"></script>
		<script type="text/javascript" src="js/jquery.transform2d.js"></script>
		<script type="text/javascript" src="js/jquery.jTinder.js"></script>
		<script type="text/javascript" src="js/js.cookie.js"></script>
		<script type="text/javascript" src="js/main.js"></script>
	
	</body>
</html>
