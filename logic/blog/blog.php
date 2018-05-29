<?php 

$additional_templates[] = TPL_DIR . 'blog/main.html';


$posts = $model['blog']['get_last_10_posts']();

 ?> 