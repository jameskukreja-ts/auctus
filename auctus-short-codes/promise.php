<?php 
echo '<pre>';
print_r($attrs);
die();
?>
<div id="Promise" class="coustomer container">
<div class="multi_logos">
   <h1>OUR CUSTOMER PROMISE</h1>
   <div class="col-md-6">
      <img src="<?php echo $attrs['img'];?>" class="img-responsive" style="width:100%;">
   </div>
   <div class="col-md-6">
<div class="left_containt">
<h4><?php echo $attrs['boldtext'];?> </h4>
</div>

<div class="right_contant">
<?php echo $attrs['plaintext'];?>
<br><img src="<?php echo $attrs['signatureimg'];?>">


</div>
</div>
</div>
</div>