<!-- apply virtual card page start -->

<form action="" id="profileForm" method="post" onsubmit="return submitForm(event, 'profileForm');">
    <div class="">
        <div class="user-field">
            <label for="fullName">Full Name<span>*</span></label>
            <div class="inputIcon" tabindex="0">
                <i class="ri-user-3-line"></i>
                <input type="text" name="name" value="<?= $userdetail['name']; ?>" id="name" required>
            </div>
        </div>
        <div class="user-field">
            <label for="emailId">Email-id<span>*</span></label>
            <div class="inputIcon">
                <i class="ri-mail-line"></i>
                <input type="email" value="<?= $userdetail['email']; ?>" name="email" id="email" required>
            </div>
        </div>
        <div class="user-field">
            <label for="contactNo">Contact no.<span>*</span></label>
            <div class="inputIcon">
                <i class="ri-phone-line"></i>
                <input type="number" value="<?= $userdetail['phone']; ?>" name="phone" id="phone" required>
            </div>
        </div>
        <div class="user-field">
            <label for="contactNo">DOB<span>*</span></label>
            <div class="inputIcon">
                <i class="ri-cake-2-line"></i>
                <input type="date" value="<?= $userdetail['birthday'] ?? ''; ?>" name="birthday" id="birthday" required>
            </div>
        </div>
    </div>

    <div class="">
        <div class="user-field">
            <label for="adhar">Aadhar no.</label>
            <div class="inputIcon">
                <i class="ri-id-card-line"></i>
                <input type="text" value="<?= $userdetail['adhar'] ?? ''; ?>" name="adhar_no" id="adhar_no" placeholder="">
            </div>
        </div>
        <div class="user-field">
            <label for="address">Current Address<span>*</span></label>
            <div class="inputIcon">
                <i class="ri-map-pin-user-line"></i>
                <textarea type="text" value="" name="address" id="address" required placeholder=""><?= $userdetail['address'] ?? ''; ?></textarea>
            </div>
        </div>
        <div class="user-field">
            <label for="pincode">Pincode<span>*</span></label>
            <div class="inputIcon">
                <i class="ri-map-pin-3-line"></i>
                <input type="number" value="<?= $userdetail['pincode'] ?? ''; ?>" name="pincode" id="pincode" required placeholder="">
            </div>
        </div>
        <div class="user-field">
            <label for="state">State<span>*</span></label>
            <div class="inputIcon">
                <i class="ri-signal-tower-line"></i>
                <select class="" name="state" id="state">
                    <option value="<?php echo $userdetail['state']; ?>" selected>
                        <?php echo $userdetail['state']; ?>
                    </option>
                </select>
                <!-- <input type="text" name="" id="state" required placeholder=""> -->
            </div>
        </div>
        <div class="user-field">
            <label for="state">City<span>*</span></label>
            <div class="inputIcon">
                <i class="ri-building-line"></i>
                <input type="text" value="<?= $userdetail['city'] ?? ''; ?>" name="city" id="city" required placeholder="">
            </div>
        </div>
        <div class="user-field">
            <label for="representative">Representative Name<span>*</span></label>
            <div class="inputIcon">
                <i class="ri-shield-user-line"></i>
                <input type="text" name="representative_name" value="<?= $userdetail['representative_name'] ?? ''; ?>" id="representative_name" required placeholder="">
            </div>
        </div>

        <div class="user-field">
            <label for="representative">Upload Image</label>
            <div class="inputIcon">
                <i class="ri-image-ai-line"></i>
                <input type="file" name="image" id="image" type="file" accept="image/*">
            </div>
        </div>
        <div class="user-field">
            <label for="contactNo">Anniversary</label>
            <div class="inputIcon">
                <i class="ri-diamond-ring-line"></i>
                <input type="date" value="<?= $userdetail['anniversary'] ?? ''; ?>" name="anniversary" id="anniversary">
            </div>
        </div>
    </div>
    <input type="hidden" class="form-control" value="<?= $userdetail['id']; ?>" name="id" id="user_id">
    <button name="submit" type="submit" id="submitButton">Submit</button>
</form>

<!-- apply virtual card page end -->

<!-- complete profile start -->

<div class="section pt-75 pb-75">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="andro_auth-wrapper d-flex">
                    <div class="andro_auth-form form-1 w-100">
                        <h2><?php echo !empty($userdetail['adhar']) ? 'Edit Profile'  : 'Complete Profile'; ?></h2>
                        <form id="profileForm" method="post" onsubmit="return submitForm(event, 'profileForm');">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="image">Profile Image</label>
                                        <input type="file" class="form-control" placeholder="Profile Image" name="image" id="image" accept="image/*">
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Full Name</label>
                                        <input type="text" class="form-control" value="<?= $userdetail['name']; ?>" placeholder="Full Name" name="name" id="name">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" value="<?= $userdetail['email']; ?>" placeholder="Email" name="email" id="email">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="phone">Phone Number</label>
                                        <input type="tel" class="form-control" value="<?= $userdetail['phone']; ?>" placeholder="Phone Number" name="phone" id="phone">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="adhar_no">Aadhar Number</label>
                                        <input type="text" class="form-control" value="<?= $userdetail['adhar'] ?? ''; ?>" placeholder="Aadhar Number" name="adhar_no" id="adhar_no">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="representative_name">Representative's Name</label>
                                        <input type="text" class="form-control" value="<?= $userdetail['representative_name'] ?? ''; ?>" placeholder="Representative's Name" name="representative_name" id="representative_name">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="birthday">Birthday</label>
                                        <input type="date" class="form-control" value="<?= $userdetail['birthday'] ?? ''; ?>" name="birthday" id="birthday">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="anniversary">Anniversary</label>
                                        <input type="date" class="form-control" value="<?= $userdetail['anniversary'] ?? ''; ?>" name="anniversary" id="anniversary">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="state">State</label>
                                        <select class="form-control" name="state" id="state">
                                            <option value="<?php echo $userdetail['state']; ?>" selected> </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="city">City</label>
                                        <input type="text" class="form-control" value="<?= $userdetail['city'] ?? ''; ?>" placeholder="City" name="city" id="city">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="pincode">Pincode</label>
                                        <input type="text" class="form-control" value="<?= $userdetail['pincode'] ?? ''; ?>" placeholder="Pincode" name="pincode" id="pincode">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="address">Address</label>
                                        <textarea class="form-control" placeholder="Address" name="address" id="address" rows="3"><?= $userdetail['address'] ?? ''; ?></textarea>
                                    </div>
                                </div>


                                <div class="col-md-12 text-center">
                                    <input type="hidden" class="form-control" value="<?= $userdetail['id']; ?>" name="id" id="user_id">
                                    <button type="submit" name="submit" class="thm-btn btn-p mb-3" id="submitButton">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- complete profile end -->