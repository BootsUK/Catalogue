<h3>Developers log // information center</h3>

<p>Select an area</p>

<br>

<script type="text/javascript" src="<?php echo base_url(); ?>js/FeedEk.js"></script>

<section>
<div id="feed"></div>
</section>


<script type="text/javascript">
 $('#feed').FeedEk({
   FeedUrl : 'https://github.com/BootsUK/Catalogue/commits/master.atom',
   MaxCount : 500,
   ShowDesc : true,
   ShowPubDate:true
  });
</script>
