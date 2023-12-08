<div class="breadcrumb-section breadcrumb-bg">
    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg">
                                <div class="p-5">
                                    <div class="subscription-form">
                                        <div class="text-center">
                                            <h1 class="h4 text-gray-900 mb-4">Login page!</h1>
                                        </div>
                                        <br />
                                        <?php $this->load->view("layouts/_alerts") ?>
                                        
                                        <?= form_open('login', ['method' => 'POST']) ?>
                                            <div class="form-group">
                                                <?= form_input(['type' => 'email', 'name' => 'email', 'value' => $input->email, 'class' => 'form-control', 'placeholder' => 'Enter E-mail Address...', 'required' => true]) ?>
                                                <?= form_error('email') ?>
                                            </div>
                                            <div class="form-group">
                                                <?= form_password('password', '', ['class' => 'form-control', 'placeholder' => 'Password', 'required' => true]) ?>
                                                <?= form_error('password') ?>
                                            </div>
                                            <div class="text-center">
                                                <button type="submit" class="btn btn-primary btn-user btn-block">Login</button>
                                            </div>
                                        <?= form_close() ?>
                                        <hr />
                                        <div class="text-center">
                                            <a class="small" href="<?= base_url('register'); ?>">Create an Account!</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>