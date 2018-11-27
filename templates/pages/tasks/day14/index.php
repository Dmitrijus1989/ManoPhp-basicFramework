<h1>User registration</h1>
<h2>abstract classes</h2>
<?php if (!$page['content']['isLoggedIn']) :?>
<form action="" method="post">
    <div>Email:<input name="email"></div>
    <div>Password:<input type="password" name="password"></div>
    <div>Confirm password:<input type="password" name="passwordConfirm"></div>
    <div>Name:<input name="name"> Surname:<input name="surname"></div>
    <button onclick="reload()" type="submit">Registr</button>
</form>
<hr>
<div>
    <form action="" method="post">
        <div>Email:<input name="loginEmail"></div>
        <div>Password:<input type="password" name="loginPassword"></div>
        <button onclick="reload()" type="submit">Log in</button>
    </form>
</div>
<?php endif; ?>
<?php if ($page['content']['isLoggedIn']) :?>
<hr>
<div>
    <form action="" method="post">
        <button onclick="reload()" name="logout" value="logout" type="submit">Log out</button>
    </form>
</div>
<?php endif; ?>
<div>
    <?php if (isset($page['content']['registration'])) : ?>
        <p><?php print $page['content']['registration'] ?></p>
    <?php endif; ?>
</div>

<script>
    history.replaceState(null, null, window.location.href);
</script>