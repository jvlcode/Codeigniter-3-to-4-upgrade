
<p>
    <?php echo session()->getFlashdata('verify_msg'); ?>
</p>
 <div class="row">
       <div class=" col-md-4 mx-auto ">
<h4 class="text-center">User Registration Form</h4>
 
<?php
helper('form');
 $butes = array("name" => "regtionform");
echo form_open("user/register", $butes);?>

   
       <label for="name">First Name</label>
       <input name="firstname" class="form-control" placeholder="First Name" type="text" value="<?php echo set_value('fname'); ?>" /> <span style="color:red"><p><?php echo $validation->getError('firstname');?></p></span>
        
   
       <label for="name">Last Name</label><input name="lastname" class="form-control" placeholder="Last Name" type="text" value="<?php echo set_value('lname'); ?>" /> <span style="color:red"><p><?php echo $validation->getError('lastname'); ?></p></span>
        
       
       <label for="email">Email ID</label><input class="form-control" name="email" placeholder="Email-ID" type="text" value="<?php echo set_value('email'); ?>" /> <span style="color:red"><p><?php echo $validation->getError('email'); ?></p></span>
        
       
       <label for="subject">Password</label><input class="form-control" name="password" placeholder="Password" type="password" /> <span style="color:red"><p><?php echo $validation->getError('password'); ?></p></span>
        
       
       <label for="subject">Confirm Password</label><input class="form-control" name="cpassword" placeholder="Confirm Password" type="password" /> <span style="color:red"><p><?php echo $validation->getError('cpassword'); ?></p></span>
        
       
       <br>

       <button name="submit" class=" btn btn-secondary btn-block" type="submit">Signup</button>        
    

    
<?php echo form_close(); ?>
 </div>
</div>
<p style="color:green; font-style:bold"><?php echo session()->getFlashdata('msg_success'); ?></p>
<p style="color:red; font-style:bold"><?php echo session()->getFlashdata('msg_error'); ?></p>
