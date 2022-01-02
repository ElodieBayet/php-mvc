<?php 

// Top Menu
if (isset($this['menu'])) {
    foreach ($this['menu'] as $uri => $item) {
        if (isset($item['sub'])) {
            echo '<li class="sub"><a href="'.$uri.'" title="Aller sur la page">'.$item['title'].'</a><ul>';
            foreach ($item['sub'] as $act => $sub) {
                echo '<li><a href="'.$uri.$act.'">'.$sub['title'].'</a></li>';
            }
            echo '</ul></li>';
        } else {
            echo '<li><a href="'.$uri.'" title="Aller sur la page">'.$item['title'].'</a></li>';
        }
    }
} else {
    echo '<li>Aucun menu</li>';
}


// Bottom Menu
if (isset($this['menu'])) {
    foreach ($this['menu'] as $key => $item) {
        echo '<li><a href="'.$key.'" title="Aller sur la page">'.$item['title'].'</a></li>';
    }
} else {
    echo '<li>Aucun menu</li>';
}


// Structure
$structure = [
    'actions' => [
        'model-vue-controller' => [
            'controller' => 'core\Architectures\MVC',
            'title' => "Model-Vue-Controller",
            'desc' => "Bla bla"
        ],
        'model-vue-vuemodel' => [
            'controller' => 'core\Architectures\MVVM',
            'title' => "Model-Vue-VueModel",
            'desc' => "Bla bla"
        ],
        'model-vue-presentation' => [
            'controller' => 'core\Architectures\MVP',
            'title' => "Model-Vue-Presentation",
            'desc' => "Bla bla"
        ]
    ]
];

// Process tests
$_manager = $this->request->path()[0];
$_list = $this->request->path();

echo '<pre>';
echo '<b>$url :</b><br>';
var_dump($url);
echo '</pre>';

echo '<pre>';
echo '<b>parse_url() :</b><br>';
var_dump(parse_url($url));
echo '</pre>';

echo '<pre>';
echo '<b>preg_replace(/\/index\..{3,4}/, "", $url) :</b><br>';
var_dump(preg_replace('/\/index\..{3,4}/', '', $url));
echo '</pre>';

echo '<pre>';
echo '<b>explode() :</b><br>';
var_dump( explode('/', ltrim($_SERVER['REQUEST_URI'], '/')) );
echo '</pre>';

echo '<pre>';
echo '<b>$_list :</b><br>';
var_dump($_list);
echo '</pre>';

echo '<pre>';
echo '<b>if ($test = $_list[0]) :</b><br>';
if ($test = $_list[0]) { 
    echo '$test ok : '.$test;
} else {
    echo 'Non, :(';
}
echo '</pre>';

echo '<pre>';
echo '<b>@REGISTER["no"] :</b><br>';
var_dump( @SECTIONS['no'] );
echo '</pre>';

echo '<pre>';
echo '<b>Is TypeError caught ?</b><br>';
try {
    $controller = $this->getController(@SECTIONS['no']);
    echo 'No problem, '.$controller;
} catch (\TypeError $badType) {
    echo 'Yes, TypeError caught !';
}
echo '</pre>';

echo '<pre>';
echo '<b>$_manager :</b><br>';
var_dump($_manager);
echo '</pre>';

echo '<pre>';
echo '<b>end($_list) :</b><br>';
var_dump(end($_list));
echo '</pre>';

echo '<pre>';
echo '<b>$controller :</b><br>';
var_dump($controller);
echo '</pre>';


/**
 * HTACCESS
 */

// Si le site est en racine --

# Options -Indexes

# RewriteEngine on

# RewriteCond %{REQUEST_URI} !^/(public|assets)/.*$ 
# RewriteCond %{REQUEST_FILENAME} !-f
# RewriteRule . /index.php [QSA,L]

// Se le site est dans une sous-dossier --

# Options -Indexes

# RewriteEngine on

# RewriteCond %{REQUEST_URI} !^/php-mvc/(public|assets)/.*$ 
# RewriteCond %{REQUEST_FILENAME} !-f
# RewriteRule . /php-mvc/index.php [QSA,L]