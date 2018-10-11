 <!-- Reset form -->
    
  <div class="page-signin-container" id="otpConfirmationForm">

    

    <h2 class="m-t-0 m-b-4 text-xs-center font-weight-semibold color-white font-size-20">VERIFY AUTHENTICATION CODE</h2>
   
    <form action="#" class="panel p-a-4" id="otpForm">

         <div id="otpFail" ></div>  

         <div class="row" id="steps">
           



           <div class="form-group col-sm-12">

            <div id="step1">

            <p class="text-secondary"><strong>Step 1</strong></p>
            <p class="text-primary text-center" style="font-size: 14px;font-weight: bold;">Get your verification code via</p>   
             
             <div class="text-center">
              <a href="#" class="btn btn-primary" >
              
              <label class="radio-inline" for="phone">
               <input type="radio" name="codeMethod" id="phone" class="codeMethod" value="phone">
               <i class="fa fa-phone">&nbsp;&nbsp;</i>Phone

              </label>
              
              </a> 

              <span>&nbsp;&nbsp;OR&nbsp;&nbsp;</span>
              
              <a href="#" class="btn btn-primary">  

              <label class="radio-inline" for="mail">

                    <input type="radio" name="codeMethod" id="mail" class="codeMethod" value="email">  
                    <i class="fa fa-envelope">&nbsp;&nbsp;</i>Email
              </label>
              
               </a>
               </div>

               <span class="text-center" id="spinner"></span> 
             </div>
          </div>
          
         

        
      
          

      
      <!-- <div class="m-t-2 text-muted">
        <a href="#" id="page-signin-forgot-back">&larr; Back</a>
      </div> -->

      </div>
    </form>
  </div>

  <!-- / Reset form -->

