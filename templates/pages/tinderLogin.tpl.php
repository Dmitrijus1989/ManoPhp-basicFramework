<div style="background-image: url('/templates/images/bg-registration-form-2.jpg')">
<div class="wrapper wrapper-outside" style="background-image: url('/templates/images/registration-form-2.jpg')">
    <div class="inner" id="login">
        <form method="post" class="tinderRegForm">
            <div class="form-wrapper">
                <label for="">Email</label>
                <input type="text" name="email" class="form-control">
            </div>
            <div class="form-wrapper">
                <label for="">Password</label>
                <input type="password" name="password" class="form-control">
            </div>
            <input value="login" type="login" name="login" style="display: none;">
            <button class="regButton" >Log in</button>
        </form>
        <div class="tinderRegForm">
            <button onclick="goToRegistration()" class="regButton">Register</button>
            <div class="returnToUser">
                <?php if (isset($page['content']['return'])) : ?>
                    <p><?php print $page['content']['return'] ?></p>
                <?php endif; ?>
            </div>
        </div>

    </div>
    <div class="inner" id="registrationForm" style="display: none;">
        <form method="post" enctype="multipart/form-data" class="tinderRegForm" action="">
            <h3>Registration Form</h3>
            <div class="form-group">
                <div class="form-wrapper">
                    <label for="">First Name</label>
                    <input type="text" name="firstName" class="form-control">
                </div>
                <div class="form-wrapper">
                    <label for="">Last Name</label>
                    <input type="text" name="lastName" class="form-control">
                </div>
            </div>
            <div class="form-wrapper">
                <label for="">Date of birth</label>
                <input type="date" name="dateOfBirth" class="form-control">
            </div>
            <div class="form-wrapper">
                <label for="">Gender</label>
                <div class="gender-form-wrapper">
                    <label>
                    <input type="radio" name="gender" value="male" class="option-input male-option radio">
                    <span>Male<i class="fa fa-mars custom"></i></span>
                    </label>
                    <label>
                    <input type="radio" name="gender" value="female" class="option-input female-option radio">
                    <span>Female<i class="fa fa-venus custom"></i></span>
                    </label>
                </div>
            </div>
            <div class="form-wrapper">
                <label for="">Email</label>
                <input type="text" name="email" class="form-control">
            </div>
            <div class="form-wrapper">
                <label for="">Password</label>
                <input type="password" name="password" class="form-control">
            </div>
            <div class="form-wrapper">
                <label for="">Confirm Password</label>
                <input type="password" name="confirmPassword" class="form-control">
            </div>
            <div class="form-wrapper">
                <label class="regButton btn-file fileLabel" for="" value=""> Please upload your foto
                    <input type="file" name="fileToUpload" id="fileToUpload" class="imageFile">
                </label>
            </div>
            <div class="checkbox">
                <label class="">
                    <input type="checkbox"> I caccept the Terms of Use & Privacy Policy.
                    <span class="checkmark"></span>
                </label>
            </div>
            <input value="registration" type="registration" name="registration" style="display: none;">
            <button class="regButton">Register Now</button>
        </form>
        <div class="tinderRegForm">
            <div class="returnToUser">
                <?php if (isset($page['content']['return'])) : ?>
                    <p><?php print $page['content']['return'] ?></p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
</div>

