<div class="wrapper wrapper-inside" style="background-image: url('/templates/images/bg-registration-form-2.jpg')">
    <div class="logOut-button">
        <?php if (isset($page['content']['welcome'])): ?>
            <h3>Welcome <?php print $page['content']['welcome']['firstName']; ?></h3>
        <?php endif; ?>

        <form method="post">
            <button name="action" value="logOut" class="regButton regButton-inside">log out</button>
        </form>
    </div>
    <?php if (isset($page['content']['viewing_user']) && $page['content']['viewing_user']): ?>
        <div class="viewing-user-card">
            <div class="viewing-user-card-relative">
                <img src="<?php print $page['content']['viewing_user']->getData()['image']; ?>">
                <div class="card-data-wrapper">
                    <div class="viewing-user-card-div"><span>Name: </span><span><?php print $page['content']['viewing_user']->getData()['firstName']; ?></span></div>
                    <div class="viewing-user-card-div"><span>Age: </span><span><?php print $page['content']['viewing_user']->getData()['age']; ?></span></div>
                    <div class="viewing-user-card-div"><span>Email: </span><span><?php print $page['content']['viewing_user']->getEmail(); ?></span></div>
                </div>
            </div>


            <form method="post">
                <div class="card-button-wrapper">
                    <button name="action" value="like" class="regButton regButton-inside">Like</button>
                    <button name="action" value="next" class="regButton regButton-inside">next</button>
                </div>
            </form>
        </div>
    <?php else : ?>
        <div>
            <h2>No more girls left</h2>
            <div>
                <form method="post">
                    <button name="action" value="cleaning" class="regButton">Clean viewed data</button>
                </form>
            </div>
        </div>
    <?php endif; ?>
    <?php if (isset($page['content']['matches']) && $page['content']['matches']): ?>
        <h2 class="Matches-h2">Matches:</h2>
        <div class="matches-wrapper row">

            <?php foreach ($page['content']['matches'] as $value) : ?>


                <div class="matches-inside col-sm-3">
                    <img src="<?php print $value->getData()['image']; ?>">
                    <div class="card-data-wrapper">
                        <div class="viewing-user-card-div"><span>Name: </span><span><?php print $value->getData()['firstName']; ?></span></div>
                        <div class="viewing-user-card-div"><span>Age: </span><span><?php print $value->getData()['age']; ?></span></div>
                        <div class="viewing-user-card-div"><span>Email: </span><span><?php print $value->getEmail(); ?></span></div>
                    </div>
                </div>


            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>
<script>
    history.replaceState(null, null, window.location.href);
</script>