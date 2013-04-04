<section id="page" class="container-fluid">
    <div class="span12" style="margin-top: 20px; float: left;">
        <ul class="media-list">
        <?php foreach($prints as $print) { ?>
            <li class="media">
                <a class="pull-left" href="<?php echo site_url('admin/prints/edit/'.$print->id) ?>">
                    <div class="ribbon-wrapper-green left"><div class="ribbon-green left"><?php echo ucfirst($print->language) ?></div></div>
                    <img src="<?php echo site_url($print->thumbnail)?>" class="hidden-phone"/>
                </a>
                <div class="media-body">
                    <h4 class="media-heading blank-phone"><?php echo $print->title ?></h4>
                    <p><?php echo $print->article ?></p>
                    <div class="bottom">
                        <div class="btn-group text-center">
                            <a href="<?php echo site_url('admin/prints/edit/'.$print->id) ?>" class="btn">Editer</a>
                            <a href="<?php echo site_url('admin/prints/dell/'.$print->id ) ?>" class="btn btn-danger">Supprimer</a>
                        </div>
                    </div>
                </div>
            </li>
        <?php } ?>
        </ul>
    </div>

</section>