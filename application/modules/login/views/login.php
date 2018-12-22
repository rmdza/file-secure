    <div id="preloader">
        <div class="loader"></div>
    </div>

    <div class="login-area login-s2">
        <div class="container">
            <div class="login-box ptb--100">
                <?php echo form_open('login/auth', array('id' => 'frmLogin', 'name' => 'frmLogin')); ?>
                    <div class="login-form-head">
                        <h4>Log In</h4>
                    </div>
                    <div class="login-form-body">
                        <?php if (
                                validation_errors() || 
                                $this->session->flashdata('invalid_credentials') || 
                                $this->session->flashdata('success_registration') ||
                                $this->session->flashdata('success_logout')
                            ): ?>
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

                                <?php if ($this->session->flashdata('invalid_credentials')): ?>
                                    <div class="alert-dismiss">
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <?php echo $this->session->flashdata('invalid_credentials'); ?>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span class="fa fa-times"></span>
                                            </button>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                
                                <?php if ($this->session->flashdata('success_registration')): ?>
                                    <div class="alert-dismiss">
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            <?php echo $this->session->flashdata('success_registration'); ?>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span class="fa fa-times"></span>
                                            </button>
                                        </div>
                                    </div>
                                <?php endif; ?>

                                <?php if ($this->session->flashdata('success_logout')): ?>
                                    <div class="alert-dismiss">
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            <?php echo $this->session->flashdata('success_logout'); ?>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span class="fa fa-times"></span>
                                            </button>
                                        </div>
                                    </div>
                                <?php endif; ?>

                            </div>
                        <?php endif; ?>
                        
                        <div class="form-gp<?php echo set_value('username') ? ' focused' : ''; ?>">
                            <label>Username</label>
                            <input type="text" name="username" value="<?php echo set_value('username');?>" autocomplete="off" />
                            <i class="ti-user"></i>
                        </div>
                        <div class="form-gp<?php echo set_value('password') ? ' focused' : ''; ?>">
                            <label>Password</label>
                            <input type="password" name="password" value="<?php echo set_value('password');?>" />
                            <i class="ti-lock"></i>
                        </div>
                        <div class="row mb-4 rmber-area">
                            <div class="col-6">
                                <div class="custom-control custom-checkbox mr-sm-2">
                                    <input class="custom-control-input" id="customControlAutosizing" type="checkbox">
                                    <label class="custom-control-label" for="customControlAutosizing">Remember Me</label>
                                </div>
                            </div>
                            <div class="col-6 text-right">
                                <a href="<?php echo base_url('login/forgotPassword'); ?>">Forgot Password?</a>
                            </div>
                        </div>
                        <div class="submit-btn-area">
                            <button id="form_submit" type="submit">Login<i class="ti-unlock"></i></button>
                        </div>
                        <div class="form-footer text-center mt-5">
                            <p class="text-muted">Don't have an account? <a href="<?php echo base_url('login/register');?>">Sign up</a></p>
                        </div>
                    </div>
                <?php echo form_close(); ?>
            </div>
        </div>

    </div>

    <!-- custom style -->
    <style>
        .login-form-head {
            padding-bottom: 5px;
        }
        .login-form-body {
            padding-top: 10px;
        }
    </style>
    
    <script type="text/javascript">
    
    $(function() {

        $('#frmLogin').on('submit', function(e) {

            var user = $('input[name=username]').val();
            var pass = $('input[name=password]').val();

            if (user == '' && pass == '') 
                return false;

            $('#form_submit').text('Logging in . . . ');
            $('#form_submit').prop('disabled', true);
            
            $(this)[0].submit();

        });

    });
    
    </script>