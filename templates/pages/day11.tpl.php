
<div id="tinder">
    <div id="loading">
        <img id="loading-image" src="https://www.tradefinex.org/assets/images/icon/ajax-loader.gif" alt="Loading..." />
    </div>
    <div id="tinderInside">
        <!--debug print-->
        <?php if (isset($page['content']['debug'])): ?>   
            <?php print $page['content']['debug']; ?>
        <?php endif; ?>

        <?php if (isset($page['content']['boba']) && $page['content']['boba']): ?>
            <div> <?php print $page['content']['boba']->get_name(); ?> </div>
            <div> <?php print $page['content']['boba']->get_age(); ?> </div>
            <div> <?php print $page['content']['boba']->get_email(); ?> </div>
            <img style="height: 300; width: 200;" src="<?php print $page['content']['boba']->get_image(); ?>">

            <div>
                <button data-action="like" class="tinder">Like</button>
                <button data-action="next" class="tinder">next</button>
            </div>
        <?php elseif (isset($page['content']['noMore']) && $page['content']['noMore']) :?>
            <h2>No more girls left</h2>
            <div>
                <button data-action="load" class="tinder">Need more?</button>
            </div>
        <?php endif; ?>
        <h3>Matched girls:</h3>
        <div class="row">
            <?php if (isset($page['content']['match'])): ?>
                <?php foreach ($page['content']['match'] as $key => $value): ?>
                    <div class="col-sm-4">
                        <div> <?php print $value->get_name(); ?> </div>
                        <div> <?php print $value->get_age(); ?> </div>
                        <div> <?php print $value->get_email(); ?> </div>
                        <img style="height: 300px; width: 200px;" src="<?php print $value->get_image(); ?>">
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>

</div>

