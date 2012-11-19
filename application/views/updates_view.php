<script type="text/javascript" src="<?php echo base_url(); ?>js/FeedEk.js"></script>

<h3>Updates:</h3>

<section>
<div id="FeedEk">

</div>
</section>


<script type="text/javascript">
 $('#FeedEk').FeedEk({
   FeedUrl : 'https://github.com/bootsDevelopers/Catalogue/commits/master',
   MaxCount : 50,
   ShowDesc : true,
   ShowPubDate:true
  });
</script>
