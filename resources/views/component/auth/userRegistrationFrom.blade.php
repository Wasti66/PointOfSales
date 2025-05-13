<div>
    <div class="row g-2">
        <!-- firstname -->
        <div class="col-md-6">
            <div class="mb-4">
                <label for="firstName" class="poppins-medium fw-normal">First Name</label>
                <input type="text" name="firstName" id="firstName" class="form-control border border-secondary custom-input" placeholder="First Name">
                <small id="emailError" class="text-danger"></small>
            </div>
        </div>
        <!-- last name -->
        <div class="col-md-6">
            <div class="mb-4">
                <label for="lastName" class="poppins-medium fw-normal">Last Name</label>
                <input type="text" name="lastName" id="lastName" class="form-control border border-secondary custom-input" placeholder="Last Name">
                <small id="emailError" class="text-danger"></small>
            </div>
        </div>
    </div>
    <!-- user name -->
    <div class="mb-4">
        <label for="userName" class="poppins-medium fw-normal">User Name</label>
        <input type="text" name="userName" id="userName" class="form-control border border-secondary custom-input" placeholder="User name">
        <small id="errorPass" class="text-danger"></small>
    </div>
    <!-- email -->
    <div class="mb-4">
        <label for="email" class="poppins-medium fw-normal">Email</label>
        <input type="text" name="email" id="email" class="form-control border border-secondary custom-input" placeholder="Email">
        <small id="errorPass" class="text-danger"></small>
    </div>
    <!-- phone -->
    <div class="mb-4">
        <label for="phone" class="poppins-medium fw-normal">Phone</label>
        <input type="text" name="phone" id="phone" class="form-control border border-secondary custom-input" placeholder="phone">
        <small id="errorPass" class="text-danger"></small>
    </div>
    <!-- password -->
    <div class="mb-4">
        <label for="phone" class="poppins-medium fw-normal">Password</label>
        <input type="password" name="password" id="password" class="form-control border border-secondary custom-input" placeholder="Password">
        <small id="errorPass" class="text-danger"></small>
    </div>
    <!-- confirm password -->
    <div class="mb-4">
        <label for="confirm_pass" class="poppins-medium fw-normal">Confirm Password</label>
        <input type="password" name="confirm_pass" id="confirm_pass" class="form-control border border-secondary custom-input" placeholder="Confirm Password">
        <small id="errorPass" class="text-danger"></small>
    </div>
    <!-- login and register button -->
    <div class="mb-4 text-end">
        <a href="/userLogin" class="link-dark me-2"><small>Already registered?</small></a>
        <button onclick="SubmitLogin()" class="btn btn-dark px-3 text-uppercase"><small>register</small></button>
    </div>
</div>