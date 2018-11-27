<?php if (isset($page['content']['debug'])): ?>   
    <?php print $page['content']['debug']; ?>
<?php endif; ?>

<h1>OOP Injection</h1>
<h2>Fake database</h2>
<form class="day13-form" method="POST">
    <input class="dar13-input" name="testText1">
    <textarea class="dar13-input" name="testText2"></textarea>
    <button>Submit</button>
</form>
<div class="day13-output">

    <?php if (isset($page['content']['textReturn'])) : ?>
    <p><?php print $page['content']['textReturn']; ?></p>
    <?php endif; ?>

</div>