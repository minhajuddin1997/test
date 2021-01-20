<style>
.content-wrapper {
    min-height: 100vh
}

.text-gray {
    color: #aaa
}

img {
    height: 170px;
    width: 140px
}
</style>
<div class="content-wrapper" style="min-height: 353px;">
<section class="content" style="padding:2rem;">
    <div class="row text-center text-dark mb-5">
        <div class="col-lg-7 mx-auto">
            <span style="display:inline-block;">
                <img src='<?php echo base_url('uploads/20/market_place_img.png'); ?>'  style="height:8vh;width:10%;margin-top:-50px;" class="img-responsive" >
                <h1 class="display-3" style="display:inline;">Market Place</h1>
            </span>
        </div>
    </div>
    <div class="row" >
        <div class="col-lg-8 mx-auto">
            <!-- List group-->
            <ul class="list-group shadow"  style="border-top: 2px solid #f5c20c;border-radius:5px;">
                <!-- list group item-->
                <?php foreach($records as $row): ?>
                <li class="list-group-item">
                    <!-- Custom content-->
                    <div class="media align-items-lg-center flex-column flex-lg-row p-3">
                        <div class="media-body order-2 order-lg-1">
                            <h5 class="mt-0 font-weight-bold mb-2"><?php echo $row->name; ?></h5>
                            <p class="font-italic text-muted mb-0 small"><?php 
                            $string = strip_tags($row->description);
                            if (strlen($string) > 500) {
                            
                                $stringCut = substr($string, 0, 500);
                                $endPoint = strrpos($stringCut, ' ');
                            
                                $string = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
                                $string .= '... <a href="#">Read More</a>';
                            }
                            echo $string;
                            ?></p>
                            <span style='color:green;font-weight:999;'><?php echo count($row->in_stock) > 0 ? 'In Stock' : ''; ?></span>
                            <div class="d-flex align-items-center justify-content-between mt-1">
                                <h6 class="font-weight-bold my-2"><?php echo !empty($row->price_html) ? $row->price_html : 'Price not mentioned'; ?></h6>
                                <ul class="list-inline small">
                                    <li class="list-inline-item m-0"><i class="fa fa-star text-success"></i></li>
                                    <li class="list-inline-item m-0"><i class="fa fa-star text-success"></i></li>
                                    <li class="list-inline-item m-0"><i class="fa fa-star text-success"></i></li>
                                    <li class="list-inline-item m-0"><i class="fa fa-star text-success"></i></li>
                                    <li class="list-inline-item m-0"><i class="fa fa-star-o text-gray"></i></li>
                                </ul>

                            </div>
                            <a href='<?php echo $row->permalink; ?>' class='btn btn-default' style="background: linear-gradient(to left, #6E7F89, #4E7489); color:#fff;">Add to Cart</a>

                        </div><img src="<?php echo $row->images[0]->src; ?>" alt="Generic placeholder image" width="200" class="ml-lg-5 order-1 order-lg-2">
                    </div> <!-- End -->
                </li> <!-- End -->
                <?php endforeach; ?>
            </ul> <!-- End -->
        </div>
    </div>
</section>
</div>