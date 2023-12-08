<div class="breadcrumb-section breadcrumb-bg">
    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5 col-lg-6 mx-auto">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg">
                        <div class="p-5">
                            <div class="subscription-form">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                                </div>
                                <?php $this->load->view("layouts/_alerts") ?>
                                <?= form_open('register', ['method' => 'POST']) ?>
                                    <div class="form-group">
                                        <?= form_input('name', $input->name, ['class' => 'form-control', 'placeholder' => 'Full Name', 'required' => true, 'autofocus' => true]) ?>
                                        <?= form_error('name') ?>
                                    </div>
                                    <div class="form-group">
                                        <?= form_input(['type' => 'email', 'name' => 'email', 'value' => $input->email, 'class' => 'form-control', 'placeholder' => 'Email Address', 'required' => true]) ?>
                                        <?= form_error('email') ?>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <?= form_password('password', '', ['class' => 'form-control', 'placeholder' => 'Password', 'required' => true]) ?>
                                            <?= form_error('password') ?>
                                        </div>
                                        <div class="col-sm-6">
                                            <?= form_password('password_confirmation', '', ['class' => 'form-control', 'placeholder' => 'Repeat Password', 'required' => true]) ?>
                                            <?= form_error('password_confirmation') ?>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-user btn-block">Register Account</button>
                                <?= form_close() ?>  
                                <hr>
                                <div class="text-center">
                                    <a class="small" href="<?= base_url('login'); ?>">Already have an account? Login!</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>  