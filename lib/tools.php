<?php
// on définie une fonction qui va nous permettre de récupérer les données d'un fichier et de les transformer en tableau
function linesToArray(string $string)
{
    return (explode(PHP_EOL, $string));
}


// fonction toute faite permettant de "normer" le nom d'un fichier pour être lisible sur tous les navigateurs ici: https://stackoverflow.com/questions/2955251/php-function-to-make-slug-url-string

function slugify($text, string $divider = '-')
{
  // replace non letter or digits by divider
$text = preg_replace('~[^\pL\d]+~u', $divider, $text);

  // transliterate
$text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

  // remove unwanted characters
$text = preg_replace('~[^-\w]+~', '', $text);

  // trim
$text = trim($text, $divider);

  // remove duplicate divider
$text = preg_replace('~-+~', $divider, $text);

  // lowercase
$text = strtolower($text);

if (empty($text)) {
    return 'n-a';
}

return $text;
}
