<div class="row g-4">
    <!-- update email --> 
    <div class="col-md-6">
        <div>
            <label for="email" class="poppins-medium fw-normal"><small>Email</small></label>
            <input type="text" name="email" id="email" class="form-control form-control-sm border border-black-50 custom-input poppins-medium" placeholder="Email">
            <small id="errorCurrentPass" class="text-danger"></small>
        </div>
    </div>
    <!-- update firstName -->
    <div class="col-md-6">
        <div>
            <label for="firstName" class="poppins-medium fw-normal"><small>First Name</small></label>
            <input type="text" name="firstName" id="firstName" class="form-control form-control-sm border border-black-50 custom-input poppins-medium" placeholder="First Name">
            <small id="errorCurrentPass" class="text-danger"></small>
        </div>
    </div>
    <!-- update lastname -->
    <div class="col-md-6">
        <div>
            <label for="lastname" class="poppins-medium fw-normal"><small>Last Name</small></label>
            <input type="text" name="lastname" id="lastname" class="form-control form-control-sm border border-black-50 custom-input poppins-medium" placeholder="Last Name">
            <small id="errorCurrentPass" class="text-danger"></small>
        </div>
    </div>
    <!-- update userName -->
    <div class="col-md-6">
        <div>
            <label for="userName" class="poppins-medium fw-normal"><small>user Name</small></label>
            <input type="text" name="userName" id="userName" class="form-control form-control-sm border border-black-50 custom-input poppins-medium" placeholder="user Name">
            <small id="errorCurrentPass" class="text-danger"></small>
        </div>
    </div>
    <!-- phone -->
    <div>
        <label for="phone" class="poppins-medium fw-normal"><small>Phone</small></label>
        <input type="text" name="phone" id="phone" class="form-control form-control-sm border border-black-50 custom-input poppins-medium" placeholder="phone">
        <small id="errorCurrentPass" class="text-danger"></small>
   </div>
   <div>
     <button onclick="updateUserProfile()" class="btn btn-sm btn-dark px-3 text-uppercase"><small>save</small></button>
   </div>
</div>
<script>
    function clearErrors() {
        document.querySelectorAll("small.text-danger").forEach((el) => (el.innerText = ""));
        document.querySelectorAll("input").forEach((el) => el.classList.remove("is-invalid"));
    }
    async function changePassword(){
        clearErrors();
        let error = false;

        let currentPassInput = document.getElementById('current_password');
        let current_password = currentPassInput.value.trim();

        let newPassInput = document.getElementById('new_password');
        let new_password = newPassInput.value.trim();

        let confirmPassInput = document.getElementById('confirm_password');
        let confirm_password = confirmPassInput.value.trim();

        if(current_password.length === 0){
            document.getElementById('errorCurrentPass').innerText = "Current password required!";
            currentPassInput.classList.add("is-invalid");
            error = true;
        }
        if(new_password.length < 6){
            document.getElementById('errorNewPass').innerText = "Password must be at least 6 characters";
            newPassInput.classList.add("is-invalid");
            error = true;
        }
        if(new_password !== confirm_password){
            document.getElementById('errorConfirmPass').innerText = "Passwords do not match";
            confirmPassInput.classList.add("is-invalid");
            error = true;
        }

        if(!error){
            showLoader();
            try {
                let res = await axios.post("/change-password", {
                    current_password: current_password,
                    new_password: new_password
                });
                hideLoader();
                if(res.status === 200 && res.data['status'] === 'success'){
                    successToast(res.data['message']);
                    setTimeout(function (){
                        window.location.href="/setting"
                    }, 1000)
                } else {
                    errorToast(res.data['message']);
                }
            } catch (err) {
                hideLoader();
                errorToast("Current Password dosen't match!");
            }
        }
    }
</script>
