<link rel="stylesheet" href="assets/css/bootstrap.css" />
<link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">
<script type="text/javascript">
            window.jQuery || document.write("<script src='assets/js/jquery.js'>"+"<"+"/script>");
        </script>
<script src="assets/js/bootstrap.js"></script>

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <?php if(!empty($products)): foreach($products as $product): ?>
                <div class="col-sm-4 col-lg-4 col-md-4">
                    <div class="thumbnail">
                        <img src="<?php echo base_url().'assets/images/'.$product['image']; ?>" alt="">
                        <div class="caption">
                            <h4 class="pull-right">$<?php echo $product['price']; ?> USD</h4>
                            <h4><a href="javascript:void(0);"><?php echo $product['name']; ?></a></h4>
                            <p>See more snippets like this online store item at <a target="_blank" href="http://www.codexworld.com">CodexWorld</a>.</p>
                        </div>
                        <div class="ratings">
                            <a href="<?php echo base_url().'products/buy/'.$product['id']; ?>"><img src="<?php echo base_url(); ?>assets/images/x-click-but01.gif" style="width: 70px;"></a>
                            <p class="pull-right">15 reviews</p>
                            <p>
                                <span class="glyphicon glyphicon-star"></span>
                                <span class="glyphicon glyphicon-star"></span>
                                <span class="glyphicon glyphicon-star"></span>
                                <span class="glyphicon glyphicon-star"></span>
                                <span class="glyphicon glyphicon-star"></span>
                            </p>
                        </div>
                    </div>
                </div>
                <?php endforeach; endif; ?>
            </div>
        </div>
    </div>
</div>