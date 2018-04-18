<?if(validation_errors()):?>
    <div class="alert alert-danger" role="alert">
        <?= validation_errors() ;?>
    </div>
<?endif;?>
<form class="form-horizontal" role="form" method="POST" action="/admin/authenticate/login">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <h2>Please Login</h2>
            <hr>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Username:</label>
                <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                    <input type="text" name="username" class="form-control" autofocus>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Password:</label>
                <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                    <input type="text" name="password" class="form-control">
                </div>
            </div>
        </div>
    </div>
    <div class="row" style="padding-top: 1rem">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <button type="submit" class="btn btn-success"><i class="fa fa-sign-in"></i> Login</button>
        </div>
    </div>
</form>