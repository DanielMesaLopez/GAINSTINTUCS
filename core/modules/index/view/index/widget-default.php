<?php 
$cnt=0;
$slides = SlideData::getPublics();
$news = ProductData::getFeatureds();
?>

 <div class="item">
          <a href="">
            <img  src="assets/img/mujer.jpg" style=" width: 1500px; height:400px; left: 200px; max-width: 100%;">
           
          </a>
        </div>
<section>
  <div class="container">

  <div class="row">

  <div class="col-md-12">
<!-- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -->
        <?php if(count($slides)>0):?>

    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
<?php foreach($slides as $s):?>
        <li data-target="#carousel-example-generic" data-slide-to="<?php echo $cnt; ?>" class="<?php if($cnt==0){ echo "active";}?>"></li>
<?php $cnt++; endforeach; ?>

      </ol>


     

      <!-- Wrapper for slides -->
      <div class="carousel-inner" >
<?php $cnt=0; foreach($slides as $s):
$url = "admin/storage/slides/".$s->image;
?>

        <div class="item <?php if($cnt==0){ echo "active"; }?>"   style=" padding: 10px; margin: 10px; border: 2px solid #590F63;   border-radius: 29px 29px 29px 29px;
-moz-border-radius: 29px 29px 29px 29px;
-webkit-border-radius: 29px 29px 29px 29px; width: 100%;">
          <img src="<?php echo $url; ?>" style= "border-radius: 29px 29px 29px 29px;
-moz-border-radius: 29px 29px 29px 29px;
-webkit-border-radius: 29px 29px 29px 29px;"> 
          
        </div>
<?php $cnt++; endforeach; ?>

      </div>

      <!-- Controls -->
      <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
      </a>
      <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
      </a>
    </div>
  <?php endif; ?>



<!-- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -->
    <a href="./"><div style="background:#ED3ACF;font-size:25px;color:white;padding:5px; ">Productos Destacados</div></a>
<br>
<?php

$nproducts = count($news);
$filas = $nproducts/3;
$extra = $nproducts%3;
if($filas>1&& $extra>0){ $filas++; }
$n=0;
?>
<?php for($i=0;$i<$filas;$i++):?>
  <div class="row">
<?php for($j=0;$j<3;$j++):
$p=null;
if($n<$nproducts){
$p = $news[$n];
}
?>
<?php if($p!=null):
$img = "admin/storage/products/".$p->image;
?>
  <div class="col-md-4">
 <center>   <img src="<?php echo $img; ?>"  style="width:120px;height:120px; border-radius: 29px 29px 29px 29px;
-moz-border-radius: 29px 29px 29px 29px;
-webkit-border-radius: 29px 29px 29px 29px;"></center>
  <h4 class="text-center"><?php echo $p->name; ?></h4>
<h3 class="text-center text-primary">$ <?php echo number_format($p->price,2,".",","); ?></h3>
<?php 
$in_cart=false;
if(isset($_SESSION["cart"])){
  foreach ($_SESSION["cart"] as $pc) {
    if($pc["product_id"]==$p->id){ $in_cart=true;  }
  }
  }

  ?>
<center style="height: 80px;">

<?php
 if(!$p->in_existence):?>

<a href="javascript:void()" class="btn btn-labeled btn-sm btn-warning tip" title="No disponible">
                <span class="btn-label"><i class="glyphicon glyphicon-shopping-cart"></i></span>No Disponible</a>
<br>

<?php elseif(!$in_cart):?>

<a href="index.php?action=addtocart&product_id=<?php echo $p->id; ?>&href=cat" class="btn btn-labeled btn-sm btn-primary tip" title="A&ntilde;adir al carrito">
                <span class="btn-label"><i class="glyphicon glyphicon-shopping-cart"></i></span>Comprar</a>
<br>
<?php else:?>
<center><a href="javascript:void()" class="btn btn-labeled btn-sm btn-success tip" title="Ya esta en el carrito">
                <span class="btn-label"><i class="glyphicon glyphicon-shopping-cart"></i></span>Ya esta agregado</a>
<br>
<?php endif; ?>
<a href="index.php?view=producto&product_id=<?php echo $p->id; ?>">Detalles</a>
                </center>

  </div>
<?php endif; ?>
<?php $n++; endfor; ?>
  </div>
<?php endfor; ?>



  </div>

  </div>


  </div>
  </section>
