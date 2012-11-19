<script type="text/javascript" src="<?php echo base_url(); ?>js/FeedEk.js"></script>

<h3>Updates:</h3>

<section>
<div id="feed"></div>
</section>


<script type="text/javascript">
 $('#feed').FeedEk({
   FeedUrl : 'https://github.com/bootsDevelopers/Catalogue/commits/master.atom',
   MaxCount : 500,
   ShowDesc : true,
   ShowPubDate:true
  });
</script>
