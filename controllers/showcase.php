<?php


$page['title'] = 'showcase!';
$page['content']['main_content'] = 'Tris is main content of the page';
$page['content']['sub_content'] = 'and sub content here';
$page['content']['mox_matrix'] = '';
$image_sense1 = 0;
$image_sense2 = 24;
$image_sense3 = 1;
$image_sense4 = 23;
for ($v = 0; $v < 25; $v++) {
    
    for ($h = 0; $h < 25; $h++) {
        $random_color = rand(0, 255).', '.rand(0, 255).', '.rand(0, 255);
        if ($h == $image_sense1) {
            $random_color = 255 .', '. 255 .', '. 255;
        }
        if ($h == $image_sense3) {
            $random_color = 255 .', '. 255 .', '. 255;
        }
        if ($h == $image_sense2) {
            $random_color = 255 .', '. 255 .', '. 255;
        }
        if ($h == $image_sense4) {
            $random_color = 255 .', '. 255 .', '. 255;
        }
        $page['content']['mox_matrix'] .= "<div style='background-color: rgb(". $random_color .")' class='small-box'></div>";
    }
    $page['content']['mox_matrix'] .= '<br>';
    $image_sense1++;
    $image_sense3++;
    $image_sense2--;
    $image_sense4--;
}

$page['content']['rendered'] = render_page($page, 'page-showcase');

?>