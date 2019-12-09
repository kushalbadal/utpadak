<?php 

$aPcat = array();

// This is for products_categories Begin //

if(isset($_REQUEST['p_cat'])&&is_array($_REQUEST['p_cat'])){

    foreach($_REQUEST['p_cat'] as $sKey=>$sVal){

        if((int)$sVal!=0){

            $aPcat[(int)$sVal] = (int)$sVal;

        }

    }

}

// This is for products_categories Finisih //

?>


<div class="panel panel-default sidebar-menu"><!-- panel panel-default sidebar-menu Begin -->
    <div class="panel-heading"><!-- panel-heading Begin -->
        <h3 class="panel-title">
            Product Categories

            <div class="pull-right"><!-- pull-right Begin -->
            
                <a href="JavaScript:Void(0);" style="color:black;">
                
                    <span class="nav-toggle hide-show"><!-- nav-toggle hide-show Begin -->
                    
                        Hide
                    
                    </span><!-- nav-toggle hide-show Finish -->
                
                </a>
            
            </div><!-- pull-right finish -->

        </h3>
    </div><!-- panel-heading Finish -->

    <div class="panel-collapse collapse-data"><!-- panel-collapse collapse-data Begin -->
    
        <div class="panel-body"><!-- panel-body 1 Begin -->
            <div class="input-group"><!-- input-group Begin -->
                <input type="text" class="form-control" id="dev-table-filter" data-filters="#dev-p-cat" data-action="filter" placeholder="Filter Product Categories">

                    <a class="input-group-addon"><!-- input-group-addon Begin -->
                    
                        <i class="fa fa-search"></i>
                        
                    </a><!-- input-group-addon Finish -->

            </div><!-- input-group Finish -->
            </div><!-- panel-body 1 Finish -->
        <div class="panel-body scroll-menu"><!-- panel-body 2 Begin -->
            <ul class="nav nav-pills nav-stacked category-menu" id="dev-p-cat"><!-- nav nav-pills nav-stacked category-menu Begin -->
                
                <?php 
                
                $get_p_cat = "select * from product_categories ";
                $run_p_cat = mysqli_query($con,$get_p_cat);

                while($row_p_cat=mysqli_fetch_array($run_p_cat)){

                    $p_cat_id = $row_p_cat['p_cat_id'];
                    $p_cat_title = $row_p_cat['p_cat_title'];
                    $p_cat_image = $row_p_cat['p_cat_image'];

                    if($p_cat_image == ""){

                    }else{

                        $p_cat_image = "<img src='admin/other_images/$p_cat_image' width='20px'>&nbsp;";

                    }

                    echo "
                    <li style='background:#dddddd' class='checkbox checkbox-primary'>

                        <a>

                            <label>

                                <input ";
                                
                                if(isset($aPcat[$p_cat_id])){
                                    echo "checked='checked'";
                                }
                                
                                echo " value='$p_cat_id' type='checkbox' class='get_p_cat' name='p_cat'>

                                <span>
                                $p_cat_image
                                $p_cat_title
                                </span>

                            </label>

                        </a>
                    
                    </li>
                    ";

                }
                
              
                ?>
                
            </ul><!-- nav nav-pills nav-stacked category-menu Finish -->
        </div><!-- panel-body 2 Finish -->

    </div><!-- panel-collapse collapse-data Finish -->
    
</div><!-- panel panel-default sidebar-menu Finish -->