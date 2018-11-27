<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="/home">RavSys</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <?php if (isset($page['header_link'])): ?>
                <?php foreach ($page['header_link'] as $key => $value): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php print $value ?>"><?php print $key ?></a>
                    </li>
                <?php endforeach; ?>
            <?php endif; ?>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Dropdown
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <?php foreach ($page['header_link_dropdown'] as $key => $value): ?>

                            <div class="dropdown-item  dropdown my-second-dropdown-trigger">
                                <div id="mySecondDropdownTrigger">
                                <?php print $key ?>
                                </div>
                                <div class="my-second-dropdown">
                                <?php foreach ($page['header_link_dropdown'][$key] as $key2 => $value2): ?>
                                    <a class="dropdown-item" href="<?php print $value2 ?>"><?php print $key2 ?></a>
                                <?php endforeach; ?>
                                </div>
                            </div>

                    <?php endforeach; ?>
                    <div class="dropdown-divider"></div>
                    <?php if (isset($page['header_link'])): ?>
                     <?php foreach ($page['header_link_side'] as $key => $value): ?>
                        <a class="dropdown-item" href="<?php print $value ?>"><?php print $key ?></a>
                      <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </li>

        </ul>
<!--        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>-->
    </div>
</nav>