    <div id="preloader">
        <div class="loader"></div>
    </div>
    <div class="login-area login-s2">
        <div class="container">
            <div class="login-box">
                <?php echo form_open('login/register', array('id' => 'frmRegister', 'name' => 'frmRegister')); ?>
                    <div class="login-form-head">
                        <h4>Sign up</h4>
                        <p>Hello there, Sign up and Join with Us</p>
                    </div>
                    <?php if (validation_errors() || $this->session->flashdata('error_registration')): ?>
                        <div class="form-gp" style="margin-bottom: 25px;" >
                            <?php echo validation_errors(
                                        '<div class="alert-dismiss">
                                            <div class="alert alert-warning alert-dismissible fade show" role="alert">',
                                                '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span class="fa fa-times"></span>
                                                </button>
                                            </div>
                                        </div>'
                                    ); ?>

                            <?php if ($this->session->flashdata('error_registration')): ?>
                                <div class="alert-dismiss">
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <?php echo $this->session->flashdata('error_registration'); ?>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span class="fa fa-times"></span>
                                        </button>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                     <?php endif; ?>
                         
                    <div class="login-form-body">
                        <div class="form-gp<?php echo set_value('username') ? ' focused' : ''; ?>">
                            <label>Username</label>
                            <input type="text" name="username" autocomplete="off" value="<?php echo set_value('username'); ?>" />
                            <i class="ti-user"></i>
                        </div>
                        <div class="form-gp<?php echo set_value('email') ? ' focused' : ''; ?>">
                            <label>Email address</label>
                            <input type="email" name="email" autocomplete="off" value="<?php echo set_value('email'); ?>" />
                            <i class="ti-email"></i>
                        </div>
                        <div class="form-gp">
                            <label>Password</label>
                            <input type="password" name="password" value="" />
                            <i class="ti-lock"></i>
                        </div>
                        <div class="form-gp">
                            <label>Confirm Password</label>
                            <input type="password" name="confirmPassword" value="" />
                            <i class="ti-lock"></i>
                        </div>
                        <div class="submit-btn-area">
                            <button id="form_submit" type="submit">Register <i class="ti-arrow-right"></i></button>
                        </div>
                        <div class="form-footer text-center mt-5">
                            <p class="text-muted">Already have an account? <a href="<?php echo base_url('login/auth');?>">Sign in</a></p>
                        </div>
                    </div>

                <?php echo form_close(); ?>
            </div>
        </div>
    </div>

    <!-- custom style -->
    <style>
        .login-form-head {
            padding-bottom: 10px;
        }
        .login-form-body {
            padding-top: 10px;
        }
    </style>

    <script type="text/javascript">

        $(function() {

            $('#frmRegister').on('submit', function(e) {

                $('#form_submit').text('Submitting . . . ');
                $('#form_submit').prop('disabled', true);

                $(this)[0].submit();
            });

        });
      
    
    </script>