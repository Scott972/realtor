<div class="request-info-text">
    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur posuere, ex nec lobortis elementum, elit risus
    dictum mi,
    vel vestibulum ante eros eget metus. Praesent nibh metus, euismod sit amet felis sit amet, porta aliquam augue.
    Pellentesque porttitor neque vel
    aliquet euismod. In sit amet felis vel ipsum bibendum aliquam. Nunc rutrum dolor quis diam porttitor consequat. Duis
    varius eleifend ex vitae congue.
    Donec lobortis lorem id leo mollis, a blandit metus rutrum. Donec a placerat mauris, eget laoreet diam. Donec ac
    convallis orci. Mauris id nulla lacus.
</div>

<?if(validation_errors() || $this->session->flashdata('error')):?>
    <div class="alert alert-danger" role="alert">
        <?= validation_errors() ? validation_errors() : $this->session->flashdata('error') ;?>
    </div>
<?endif;?>
<form action="/welcome/submit_request" method="POST">
    <div class="form-row">
        <div class="form-group col-md-6">
            <label>Your First Name</label>
            <input type="text" class="form-control" name="first_name" placeholder="First Name">
        </div>
        <div class="form-group col-md-6">
            <label>Your Last Name</label>
            <input type="text" class="form-control" name="last_name" placeholder="Last Name">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label>Email</label>
            <input type="email" class="form-control" name="email" placeholder="Email">
            <small class="form-text text-muted">We love you and would never send spam. We might sell it.</small>
        </div>
    </div>
    <div class="form-group">
        <label>Address</label>
        <input type="text" class="form-control" name="address" placeholder="1234 Main St">
    </div>
    <div class="form-group">
        <label>Address 2</label>
        <input type="text" class="form-control" name="address_2" placeholder="Apartment, studio, or floor">
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label>City</label>
            <input type="text" class="form-control" name="city">
        </div>
        <div class="form-group col-md-4">
            <label>State</label>
            <select name="state" class="form-control">
                <? foreach ($states as $state): ?>
                    <option value="<?= $state->state_code; ?>"><?= $state->state; ?></option>
                <? endforeach; ?>
            </select>
        </div>
        <div class="form-group col-md-2">
            <label>Zip / Postal Code</label>
            <input type="text" class="form-control" name="postal_code">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label>Phone Number</label>
            <input type="tel" class="form-control" name="phone">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-4">
            <label>How'd you hear about us?</label>
            <select name="referral" class="form-control">
                <option value="google">Google</option>
                <option value="facebook">Facebook</option>
                <option value="other">Other</option>
            </select>
        </div>
    </div>
    <input type="hidden" name="property_id" value="<?=$property_id;?>"/>
    <div class="form-row">
        <div class="form-group col-md-2">
            <label>Maximum Budget</label>
            <input type="tel" class="form-control" name="budget" placeholder="150000">
        </div>
    </div>
    <?=$captcha_image;?>
    <div class="form-row">
        <div class="form-group col-md-2">
            <label>Please enter text shown above</label>
            <input type="text" class="form-control" name="captcha">
        </div>
    </div>
    </div>
    <button type="submit" class="btn btn-primary" value="submit_request">Submit</button>
</form>