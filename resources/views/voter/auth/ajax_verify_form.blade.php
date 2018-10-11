


<form action="#" class="panel p-a-4" id="otpForm">

         <div id="otpFail" ></div>  

        <!--  <div class="row container-fluid" id="steps"> -->



<div id="step2" >

        <p class="text-secondary"><strong>Step 2</strong></p>
        

        <div class="text-center m-b-3">
                    <label>Time Left: </label>
              <div class="countdown text-primary "  style="font-size: 20px; font-weight: bold;">
              
              
              </div>
          
          </div>

        <p class="text-primary text-center" style="font-size: 14px;font-weight: bold;">Enter your verification code</p>

      <fieldset class="form-group form-group-lg">
        <input type="text" name="userCode" id="userCode" class="form-control" placeholder="Please insert Verification Code">
      </fieldset>
 
        <input type="hidden" name="userSsn" value="{{ $ssn }}" id="userSsn" >
        <input type="hidden" name="userId"  value="{{ $userId }}" id="userId" >
        <input type="hidden" name="method"  value="{{ $method }}" id="userId" >


      <button type="submit" id="verifyBtn" class=" btn btn-block btn-lg btn-primary m-t-3">Verify</button>
      <a href="{{ route('voter.login') }}" class="btn btn-block btn-lg btn-default m-t-3">Cancel</a>

     </div>


  <!-- </div> -->
      </form>