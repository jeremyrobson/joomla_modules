<?php
    class ModFindAFarmHelper {
        public static function getFarms() {
            $db = JFactory::getDbo();
            $query = $db->getQuery(true);
            $query->select("*");
            $query->from($db->quoteName('#__farm_profile'));
            $query->where("published = 1");
            $db->setQuery($query);
            $farm_profiles = $db->loadObjectList("id");
            
            foreach ($farm_profiles as $id => $farm_profile) {
                $farm_profiles[$id]->profile_link = Juri::root() . "index.php?option=com_jeregister&view=farmprofile&id=$id";
            }

            return $farm_profiles;
        }


    }
?>