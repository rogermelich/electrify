<?php

use Spatie\Menu\Laravel\Menu;
use Spatie\Menu\Laravel\Html;
use Spatie\Menu\Laravel\Link;


Menu::macro('adminlteSubmenu', function ($submenuName) {
    return Menu::new()->prepend('<a href="#"><span> ' . $submenuName . '</span> <i class="fa fa-angle-left pull-right"></i></a>')
        ->addParentClass('treeview')->addClass('treeview-menu');
});
Menu::macro('adminlteMenu', function () {
    return Menu::new()
        ->addClass('sidebar-menu')->setAttribute('data-widget','tree');
});
Menu::macro('adminlteSeparator', function ($title) {
    return Html::raw($title)->addParentClass('header');
});

Menu::macro('adminlteDefaultMenu', function ($content) {
    return Html::raw('<i class="fa fa-link"></i><span>' . $content . '</span>')->html();
});

Menu::macro('sidebar', function () {
    return Menu::adminlteMenu()
        ->add(Html::raw('Dashboard')->addParentClass('header'))
        ->action('HomeController@index', '<i class="fa fa-home"></i><span>Dashboard</span>')
        ->add(Menu::adminlteSeparator('Graphs'))
        ->add(Link::toUrl('graphs', '<i class="fa fa-line-chart"></i><span>Graphs</span>'))
        ->add(Link::toUrl('reports', '<i class="fa fa-file-archive-o"></i><span>Reports</span>'))
        ->setActiveFromRequest();
});
