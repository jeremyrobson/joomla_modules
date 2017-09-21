<?php
    class ModJerNewsHelper {
      public static function getArticles($categoryId = 1) {
          $result = null;

          $db = JFactory::getDbo();
          $query = $db->getQuery(true);
          $query->select(array('a.*', 'b.username'))
                  ->from($db->quoteName('#__content', 'a'))
                  ->join('INNER', $db->quoteName('#__users', 'b') . ' ON (' . $db->quoteName('a.created_by') . ' = ' . $db->quoteName('b.id') . ')')
                  ->where('catid='.$db->quote($categoryId) . ' AND state=1')
                  ->order('modified DESC LIMIT 4');
          try {
              $db->setQuery($query);
              $result = $db->loadObjectList();
          }
          catch(RuntimeException $e){
              echo $e->getMessage();
          }

          return $result;
      }

      public static function getCategoryId($params) {
        return $params->get("title", "1");
      }

      public static function getHeader($params) {
        return $params->get("header", "");
      }
    }
?>