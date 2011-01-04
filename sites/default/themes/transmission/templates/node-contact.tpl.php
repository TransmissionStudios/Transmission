<?php
// $Id: node.tpl.php,v 1.10 2009/11/02 17:42:27 johnalbin Exp $

/**
 * @file
 * Theme implementation to display a node.
 *
 * Available variables:
 * - $title: the (sanitized) title of the node.
 * - $content: Node body or teaser depending on $teaser flag.
 * - $user_picture: The node author's picture from user-picture.tpl.php.
 * - $date: Formatted creation date. Preprocess functions can reformat it by
 *   calling format_date() with the desired parameters on the $created variable.
 * - $name: Themed username of node author output from theme_username().
 * - $node_url: Direct url of the current node.
 * - $terms: the themed list of taxonomy term links output from theme_links().
 * - $display_submitted: whether submission information should be displayed.
 * - $links: Themed links like "Read more", "Add new comment", etc. output
 *   from theme_links().
 * - $classes: String of classes that can be used to style contextually through
 *   CSS. It can be manipulated through the variable $classes_array from
 *   preprocess functions. The default values can be one or more of the
 *   following:
 *   - node: The current template type, i.e., "theming hook".
 *   - node-[type]: The current node type. For example, if the node is a
 *     "Blog entry" it would result in "node-blog". Note that the machine
 *     name will often be in a short form of the human readable label.
 *   - node-teaser: Nodes in teaser form.
 *   - node-preview: Nodes in preview mode.
 *   The following are controlled through the node publishing options.
 *   - node-promoted: Nodes promoted to the front page.
 *   - node-sticky: Nodes ordered above other non-sticky nodes in teaser
 *     listings.
 *   - node-unpublished: Unpublished nodes visible only to administrators.
 *   The following applies only to viewers who are registered users:
 *   - node-by-viewer: Node is authored by the user currently viewing the page.
 *
 * Other variables:
 * - $node: Full node object. Contains data that may not be safe.
 * - $type: Node type, i.e. story, page, blog, etc.
 * - $comment_count: Number of comments attached to the node.
 * - $uid: User ID of the node author.
 * - $created: Time the node was published formatted in Unix timestamp.
 * - $classes_array: Array of html class attribute values. It is flattened
 *   into a string within the variable $classes.
 * - $zebra: Outputs either "even" or "odd". Useful for zebra striping in
 *   teaser listings.
 * - $id: Position of the node. Increments each time it's output.
 *
 * Node status variables:
 * - $build_mode: Build mode, e.g. 'full', 'teaser'...
 * - $teaser: Flag for the teaser state (shortcut for $build_mode == 'teaser').
 * - $page: Flag for the full page state.
 * - $promote: Flag for front page promotion state.
 * - $sticky: Flags for sticky post setting.
 * - $status: Flag for published status.
 * - $comment: State of comment settings for the node.
 * - $readmore: Flags true if the teaser content of the node cannot hold the
 *   main body content.
 * - $is_front: Flags true when presented in the front page.
 * - $logged_in: Flags true when the current user is a logged-in member.
 * - $is_admin: Flags true when the current user is an administrator.
 *
 * The following variables are deprecated and will be removed in Drupal 7:
 * - $picture: This variable has been renamed $user_picture in Drupal 7.
 * - $submitted: Themed submission information output from
 *   theme_node_submitted().
 *
 * @see template_preprocess()
 * @see template_preprocess_node()
 * @see zen_preprocess()
 * @see zen_preprocess_node()
 * @see zen_process()
 */
?>
<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix">
  <?php print $user_picture; ?>

  <?php if (!$page): ?>
    <h2 class="title"><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h2>
  <?php endif; ?>

  <?php if ($unpublished): ?>
    <div class="unpublished"><?php print t('Unpublished'); ?></div>
  <?php endif; ?>

  <?php if ($display_submitted || $terms): ?>
    <div class="meta">
    </div>
  <?php endif; ?>

<div id="contactContent">	

	<?php
	  drupal_set_html_head('<script rel="lightbox" src="http://maps.google.com/maps?file=api&amp;v=2&amp;key=ABQIAAAAFl77mNVTBDIxcIFDYVLtrBS2YoDOH1_EenGei1y4QGQ5O8iqGRTyB39w69BuCia-elL_NGE54ZOd8w"
	      type="text/javascript"></script>
	    <script type="text/javascript">

	    //<![CDATA[

	    function load() {
	      if (GBrowserIsCompatible()) {
	        var map = new GMap2(document.getElementById("map"));
	        map.addControl(new GSmallMapControl());
	        map.addControl(new GMapTypeControl());
	      	
			var point = new GLatLng(51.46249712959607,-0.1389699429273);
			map.setCenter(point, 15);
			
			var marker = new GMarker(point);
			map.addOverlay(marker);
			
		map.openInfoWindow(point, "<b>Address:</b>" + "<br>18-20 Bromells Road<br>London SW4 0LL" + "<p><b>Phone:</b>+44 (0) 20 7622 4421")
		  }
	    }

	    //]]>
	    </script>
	    <script type="text/javascript">
	    window.onload = function() {
	      load();
	    }
	    window.onunload = function() {
	      GUnload();
	    } 
	  </script>');
	?>
  
  <?php print ('<div id="map" style="width: 400px; height: 300px"></div>'); ?>
  
	<div id="contactInfo">
  		<p>
		<strong>Transmission</strong><br />
      	18-20 Bromells Road<br />
      	London SW4 0LL <br />
      	t: +44 (0) 20 7622 4421<br />
      	e: <a href="mailto:info@transmissionstudios.com">info@transmissionstudios.com</a><br />
		</p><br />
		<p>
			<strong>How to find us</strong><br />
			If coming via the underground, Clapham Common tube station (Northern Line) is just around the corner.<br />
			If using National Rail, Clapham Junction is a short walk away.
		</p>
    </div>
  
</div>


  <?php print $links; ?>
</div> <!-- /.node -->
