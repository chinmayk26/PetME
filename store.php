<?php
include 'header.php';
?>
    
      <div class="main main-raised"> 
        
		<div class="section">
		
			<div class="container">
			
				<div class="row">
			
					<div id="aside" class="col-md-2">
					
						<div id="get_category">
				        </div>
						
						<div id="get_brand">
				        </div>
					
					</div>
				
					<div id="store" class="col-md-9">
						
						<div class="store-filter clearfix">
							<div class="store-sort">
								
							</div>
							<ul class="store-grid">
								<li class="active"><i class="fa fa-th"></i></li>
								
							</ul>
						</div>
					
						<div class="row" id="product-row">
						<div class="col-md-11 col-xs-11" id="product_msg"></div><div id="get_product">
						
						</div>
					
						</div>
					
						<div class="store-filter clearfix">
							<span class="store-qty">Showing products</span>
							<ul class="store-pagination" id="pageno">
								<li ><a class="active" href="#aside">1</a></li>
								<li><a href="#"><i class="fa fa-angle-right"></i></a></li>
							</ul>
						</div>
				
					</div>
				
				</div>
			
			</div>
		
		</div>
</div>
<?php

include "footer.php";
?>