<div class="view content">
		<a href="/"><i class="icon-home"></i> Home</a>
  	
  	<div class="block block-center" id="help-block">
	    <h2>Enter your note here!</h2>
	    <?php echo form_open("",array('id'=>'form-enter-name')); ?>
	    <!-- <form class="" action="" method="post" id="form-enter-name"> -->
	    	<textarea name="note" placeholder="Note here" class="input-block-level" required></textarea>
	    	<input type="submit" class="btn-primary btn" value="Save">
	    </form>
	  </div>
    <?php foreach($records as $record) {?>
    <div class="block block-center" id="help-block">
    <b><?php echo $record->ipaddress, ' - ', date("h:ia - l, F d, Y", $record->timestamp)?></b>
    <hr/> 
    <?php echo $record->note ?>
    </div>
    <?php } ?>
</div>