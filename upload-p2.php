

                                                              
                            
                            
                        
                                <form id="ttm-quote-form" class="row ttm-quote-form clearfix" method="post" action="">
                                    
                                  

                            <div class="col-sm-12 col-md-12">
                            <div class="form-group">
                                       <label style="color:#7cda0a">Product name</label>
                            <input class="form-control with-border bg-white" type="text" name="name" placeholder="Enter product name">
                                    </div>
                            </div>


                           
                            <div class="col-sm-6 col-md-6">
        <div class="form-group">
 <?php
    $query_cat = mysqli_query($con,"SELECT * FROM measures ORDER BY measure ASC");   
    ?>
                
         
         <label style="color:#7cda0a">Select mode of item measurement</label>  
        <select  name="measure"  class="form-control with-border bg-white" >
            <option value="">Select measurements mode</option>
            <?php while($rowcat = mysqli_fetch_assoc($query_cat)):   ?>
     <?php 
     $measure_id = $rowcat['id'];
      $measure = $rowcat['measure'];
     ?>
            
            <option  value="<?php echo $measure_id; ?>"><?php echo $measure; ?></option>
       <?php endwhile; ?>       
        </select>
                                        
        </div>
</div>


                        
                            <div class="col-sm-6 col-md-6">
                                    <div class="form-group">
                                     <label style="color:#7cda0a">Price</label>
                            <input class="form-control with-border bg-white" type="number" name="price" placeholder="Enter  price">
                                    </div>
                            </div>
                            

                            <div class="col-sm-12 col-md-12"> 
                                    <div class="form-group">
                                      <label style="color:#7cda0a">Product Description</label>
                            <textarea name="description"  placeholder="Decribe the product" class="form-control with-border bg-white" rows="10"></textarea>  
                                    </div>
                            </div>


                                 

                                     
                                    <div class="col-md-12">
                                        <div class="text-left">
                                            <button type="submit" id="submit" name="submit2" class="ttm-btn ttm-btn-size-md ttm-btn-bgcolor-darkgrey w-100" value="">
                                                Submit
                                            </button>
                                        </div>
                                    </div>
                                </form>







