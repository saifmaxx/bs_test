<?php 
include 'template/header.php';
include 'functions.php';



?>
<div id="col1"></div>
<div id="col2">
<?php

$obj = new Oopclass();
$topcategory = $obj->select_parent_category();
?>
<div class="wrapper wrapper-content animated fadeInRight">    
    <div class="row">      
        <div class="col-lg-12">   
            <div class="ibox float-e-margins">     
                <div class="ibox-title">                
                    <h2>Category Tree  </h2>                  
                    <div class="ibox-tools">       
                        <a class="collapse-link">          
                            <i class="fa fa-chevron-up"></i>          
                        </a>                 
                    </div>          
                </div>              
                <div class="ibox-content">        
                    


				<div>
					<div class="bg-font-normal" style = "width:90%;">
						<ul id="red" class="treeview-red">
						<?php foreach($topcategory as $cat){ ?>
							<li>
								<span class="folder"><i class = "fa fa-book tree-toogle"></i> &nbsp; <?php echo $cat->Name; ?></span>
								<?php echo $obj->display_children($cat->Id, 1); ?>
							</li>
							<?php } ?>
						</ul> 
					</div>
				</div>		
                </div>      
            </div>      
        </div> 
    </div>
</div>
</div>
<div id="col3"></div>

<script type="text/javascript">
    //$(document).ready(function () {
 
        $("#red").treeview({
            animated: "fast",
            collapsed: false,
            unique: true,
            //persist: "cookie",
            toggle: function () {
                window.console && console.log("%o was toggled", this);
            }
        });

   // });
</script>
<?php
include 'template/footer.php';
 ?>