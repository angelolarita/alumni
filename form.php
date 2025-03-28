<?php



ob_start();
include_once "formbase.php";
$layout = ob_get_clean();

ob_start();

 include_once '../alumni/view/formView.php';
$content = ob_get_clean();

$layout = str_replace('{{ script }}', '<script type="text/javascript" src="/Assets/js/form.js"></script>', $layout);


echo str_replace('{{ content }}', $content, $layout);