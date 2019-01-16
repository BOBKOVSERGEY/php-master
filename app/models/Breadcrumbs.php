<?php


namespace app\models;


use ishop\App;

class Breadcrumbs
{
  public static function getBreadcrumbs($categoryId, $name = '')
  {
    $cats = App::$app->getProperty('cats');
    $breadcrumbsArray = self::getParts($cats, $categoryId);
    $breadcrumbs = '<li><a href="'. PATH .'">Главная</a></li>';
    // если что то есть в массиве breadcrumbsArray
    if ($breadcrumbsArray) {
      foreach ($breadcrumbsArray as $alias => $title) {
        $breadcrumbs .= '<li><a href="'. PATH .'/category/' . $alias . '">'. $title .'</a></li>';
      }
    }

    // если переданно наименование товара
    if ($name) {
      $breadcrumbs .= '<li>' . $name . '</li>';
    }

    // возвращаем breadcrumbs
    return $breadcrumbs;

  }

  public static function getParts($cats, $id)
  {
    if (!$id) return false;

    $breadcrumbs = [];

    foreach ($cats as $k => $v) {
      if (isset($cats[$id])) {
        $breadcrumbs[$cats[$id]['alias']] = $cats[$id]['title'];
        $id = $cats[$id]['parent_id'];
      } else break;
    }

    return array_reverse($breadcrumbs);

  }
}