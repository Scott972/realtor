<?if($this->session->flashdata('success')):?>
    <div class="alert alert-success" role="alert">
        Thank you.
    </div>
<?endif;?>
<h1>Welcome to Real Realtors!</h1>
<div class="col-md-12">
    <div class="row">
        <div class="col-md-6">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur posuere, ex nec lobortis elementum, elit
            risus dictum mi,
            vel vestibulum ante eros eget metus. Praesent nibh metus, euismod sit amet felis sit amet, porta aliquam
            augue. Pellentesque porttitor neque vel
            aliquet euismod. In sit amet felis vel ipsum bibendum aliquam. Nunc rutrum dolor quis diam porttitor
            consequat. Duis varius eleifend ex vitae congue.
            Donec lobortis lorem id leo mollis, a blandit metus rutrum. Donec a placerat mauris, eget laoreet diam.
            Donec ac convallis orci. Mauris id nulla lacus.
            Pellentesque nec egestas justo, ut iaculis quam.
            Etiam pellentesque turpis et tellus dapibus, ut accumsan nisi suscipit. Vestibulum dignissim, dolor vel
            semper hendrerit, odio diam porta eros, in dictum magna sem vitae turpis. Aliquam accumsan odio eu suscipit
            hendrerit. Morbi tristique, ante a auctor dapibus, neque augue ultrices ipsum, tincidunt tempus quam libero
            at dolor. Etiam molestie arcu a sagittis dignissim. Donec semper felis eu aliquam imperdiet. Nulla vehicula,
            ligula non mattis vulputate, eros tellus placerat felis, sit amet elementum tortor justo consectetur dolor.
            Quisque mattis nisl enim, gravida aliquet turpis dapibus eget. Etiam eu malesuada sem, non gravida diam. In
            commodo venenatis nunc ac varius. Cras condimentum, risus ut porta sollicitudin, diam massa convallis urna,
            vitae porttitor velit sem vitae felis. Integer ligula neque, dignissim sed lobortis in, dictum vitae dolor.
            Aenean augue turpis, fringilla vitae ullamcorper id, dictum ac risus.
        </div>
        <div class="col-md-6">

            <?
            /**defined in controller**/
            foreach ($properties as $property):?>
                <img src="/assets/images/sub_<?=$property;?>.jpeg"
                     alt="placeholder 960" class="img-fluid sub-image"/>
                <div class="text-center  request-btn">
                    <a class="btn btn-info" href="welcome/requestInfo/<?= $property; ?>">Request Information</a>
                </div>
            <? endforeach; ?>
        </div>
    </div>
</div>

