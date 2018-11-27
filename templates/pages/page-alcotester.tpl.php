<div class="">
    <h2 class="task  myH">Alcotester</h2>
    <div class="taskInside">
        <form method="post">
            <div>Kiek isgerei in ml: <input type="number" name="kiek"></div>
            <div>ant kiek stiptus alkogolis: <input type="number" name="prom"></div>
            <div>Kiek tu svieri in kg: <input type="number" name="svoris"></div>
            <div> male: <input type="radio" value="male" name="gender"> female: <input type="radio" value="female" name="gender"></div>
            <button class="task1-button" type="submit">Submit</button>
        </form>
        <?php if ($page['content']['alcotester']): ?>
            <div class=""><p><?php print $page['content']['alcotester']; ?></p></div>
        <?php endif; ?>
           
    </div>
</div>
