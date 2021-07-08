<style>
  .terms{
    border: 1px solid lightgrey;
    height: 500px;
    overflow-y: scroll;
    padding: 30px;
    background-color: white;
    width: 68%;
    font-size: 13px;
}
</style>

<!-- Products Insert Modal -->
 <div class="modal fade" id="login_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
	  <div class="modal-content">
		<div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Login</h5>
          
		  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		  </button>
		</div>
		<div class="modal-body">
            <div class="rows">
                
                <form action="{{ route('login') }}" method="post" enctype="multipart/form-data" class="" >
                    {{csrf_field()}}

                    <div class="form-group">
                        <label>Email*:</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>
                    
                    <div class="form-group">
                        <label>Password*:</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <input type="submit" class="btn btn-info btn-sm" name="login" value="LOGIN">
                    </div>

                </form>
            </div>
		</div>
		<div class="modal-footer">
		  
		  <a href="#" class="show-register btn btn-primary btn-sm" class="close" data-dismiss="modal" >Register</a>
		</div>
	  </div>
	</div>
  </div>

   <!-- register Modal -->
 <div class="modal fade" id="register_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
	  <div class="modal-content">
		<div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Register</h5>
          
		  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		  </button>
		</div>
		<div class="modal-body">
            <div class="rows">
                
                <form action="{{ route('register') }}" method="POST" class="popup_form" aria-label="{{ __('Register') }}">
                    {{csrf_field()}}

                    <div class="form-group">
                        <label>First Name*:</label>
                        <input type="text" name="firstName" class="form-control" required>
                    </div>
                    
                    <div class="form-group">
                        <label>Middle Name*:</label>
                        <input type="text" name="middleName" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label>Last Name*:</label>
                        <input type="text" name="lastName" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label>User Name*:</label>
                        <input type="text" name="username" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label>Password*:</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label>Password Confirmation*:</label>
                        <input type="password" name="confirmation_password" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label>Email*:</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label>Street Address:</label>
                        <input type="text" name="streetAddress" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label>City:</label>
                        <input type="text" name="city" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label>Phone Number*:</label>
                        <input type="text" name="phoneNumber" class="form-control" required>
                    </div>

                    <div class="form-group">
                      <div class="row" style="padding: 20px;">
                          <div class="col-md-8 col-sm-12 offset-md-2 terms">
                              @component('components.terms')
                              @endcomponent
                          </div>
                      </div>
                  </div>
                  <div class="form-group">
                      <input type="checkbox" name="terms" required>&nbsp;&nbsp;I accept the above Terms and Conditions<br>
            
                  </div>

                    <div class="form-group">
                        <input type="checkbox" name="supplier" value="1">&nbsp;I am a Whole Seller<br>
                        <small>Check this only if you are the whole-seller personnel.</small>
                    </div>

                    <div class="form-group">
                        <input type="submit" class="btn btn-info btn-sm" name="login" value="Register">
                    </div>


                </form>
            </div>
		</div>
		<div class="modal-footer">
		  
		  <a href="#" class="show-login btn btn-primary btn-sm" class="close" data-dismiss="modal" >Login</a>
		</div>
	  </div>
	</div>
  </div>