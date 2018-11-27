<?php
// Load all functions here
require_once 'functions/core.php';

// Enable/Disable Debugging
$debug = false;

/**
 * Default $page array:
 * Array of all page variables
 * and settings
 */
$page = [
    'title' => 'Error: 404',
    'stylesheet' => 'main.css',
    'header_link' => [
        'Home' => '/home',
        'Alcotester' => '/alcotester',
        'Tinder' => '/tinder/login'
    ],
    'header_link_dropdown' => [
        'Week 1' => [
            'Day 2' => '/day2',
            'Day 3' => '/day3',
            'Day 4' => '/day4',
            'Day 5' => '/day5',
        ],
        'Week 2' => [
            'Day 6' => '/day6',
            'Day 7' => '/day7',
            'Day 8' => '/day8',
            'Day 9' => '/day9',
        ],
        'Week 3' => [
            'Day 11' => '/day11',
            'Day 12' => '/day12',
            'Day 13' => '/day13',
            'Day 14' => '/day14',
            'Day 15' => '/day15',
        ],
    ],
    'header_link_side' => [
        'Side project' => '/sideProject1',
    ],
    'content' => [
        // Šitas variable 'rendered' bus sukurtas controllerio
        // Tai bus ilgas HTML'o stringas sukurtas funkcijos
        // render_page()
        'rendered' => 'Tokio puslapio nerasta'
    ],
    'show_aside' => true,
    'show_header' => true,
    'show_footer' => true,
];

/**
 * Čia yra mūsų "Router'is"
 * Kiekvienam page iškviečiame
 * atitinkamą controller'į
 */
if (isset($_GET['url'])) {
    $url = $_GET['url'];
    /**
     * Best Way
     */
    $page_found = false;
    $total_folders = count(glob("templates/pages/tasks/*", GLOB_ONLYDIR));

    for ($i = 2; $i <= $total_folders + 1; $i++) {
        if ($url == "day$i") {
            $page_found = true;
            run_controller($page, "day$i");
        }
    }
    if (!$page_found) {
        switch ($url) {
            case 'home':
                run_controller($page, 'home');
                break;
            case 'alcotester':
                run_controller($page, 'alcotester');
                break;
            case 'sideProject1':
                run_controller($page, 'sideProject1');
                break;
            case 'showcase':
                run_controller($page, 'showcase');
                break;
            case 'tinder':
                run_controller($page, 'tinder');
                break;
            case 'tinder/login':
                run_controller($page, 'tinderLogin');
                break;
            default:
                run_controller($page, '404');
        }
    }
} else {
    run_controller($page, 'home');
}
?>
<html>
    <head>
        <title><?php print $page['title']; ?></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="/css/main.css">
        <link rel="stylesheet" type="text/css" href="/css/<?php print $page['stylesheet']; ?>">
    </head>
    <body>
        <!-- Debug Output !-->
        <?php if ($debug) var_dump($page); ?>

        <!-- Header !-->
        <?php if ($page['show_header']): ?>
            <div class="header-wrapper">
                <?php include ('templates/objects/header.tpl.php'); ?>
            </div>
        <?php endif; ?>
        <div class="container-fluid">
            <div class="row">
                <!-- Content !-->
                <?php if (isset($page['content']['rendered'])): ?>
                    <?php if ($page['show_aside']): ?>
                        <div id="tinder2" class="content-wrapper col-sm-9">
                        <?php elseif (!$page['show_aside']): ?>
                            <div id="tinder2" class="content-wrapper col-sm-12">
                            <?php endif; ?>
                            <?php print $page['content']['rendered']; ?>
                        </div>
                    <?php endif; ?>

                    <!-- aside content !-->
                    <?php if ($page['show_aside']): ?>
                        <div class="aside-wrapper col-sm-3">
                            <?php include ('templates/objects/aside.tpl.php'); ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <!-- Footer !-->
            <?php if ($page['show_footer']): ?>
                <div class="footer-wrapper">
                    <?php include ('templates/objects/footer.tpl.php'); ?>
                </div>
            <?php endif; ?>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
            <script src="/javascript/common.js" charset="utf-8"></script>
            <?php if (isset($page['js'])): ?>
                <?php foreach ($page['js'] as $script_url): ?>
                    <script src="/javascript/<?php print $script_url; ?>" charset="utf-8"></script>
                <?php endforeach; ?>
            <?php endif; ?>
    </body>
</html>