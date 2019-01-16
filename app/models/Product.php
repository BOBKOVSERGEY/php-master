<?php


namespace app\models;


class Product extends AppModel
{
  public function setRecentlyViewed($id)
  {
    $recentlyViewed = $this->getAllRecentlyViewed();
    if (!$recentlyViewed) {
      setcookie('recentlyViewed', $id, time() + 3600*24, '/');
    } else {
      $recentlyViewed = explode('.', $recentlyViewed);

      // если нет id в массивет recentlyViewed
      if (!in_array($id, $recentlyViewed)) {
        $recentlyViewed[] = $id;
        $recentlyViewed = implode('.', $recentlyViewed);
        setcookie('recentlyViewed', $recentlyViewed, time() + 3600*24, '/');

        // если есть id в массивет recentlyViewed
      } else if (in_array($id, $recentlyViewed)) {
        // удаляем старый id
        if(($key = array_search($id, $recentlyViewed)) !== FALSE){
          unset($recentlyViewed[$key]);
        }
        // записываем новый id
        $recentlyViewed[] = $id;
        $recentlyViewed = implode('.', $recentlyViewed);
        // сохраняем в cookie
        setcookie('recentlyViewed', $recentlyViewed, time() + 3600*24, '/');
      }
    }
  }

  public function getRecentlyViewed()
  {
    if (!empty($_COOKIE['recentlyViewed'])) {
      $recentlyViewed = $_COOKIE['recentlyViewed'];
      $recentlyViewed = explode('.', $recentlyViewed);

      // вернем три элемента массива с конца
      return array_slice($recentlyViewed, -3);
    }
    return false;
  }

  public function getAllRecentlyViewed()
  {
    if (!empty($_COOKIE['recentlyViewed'])) {
      return $_COOKIE['recentlyViewed'];
    }
    return false;
  }
}