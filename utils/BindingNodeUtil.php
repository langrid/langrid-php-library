<?php

class BindingNodeUtil {
    public static function decodeBindingTree($str) {
        $obj = json_decode($str);
        return self::createBindingNode($obj);
    }

    private static function createBindingNode($obj) {
        if (is_array($obj)) {
            $children = array();
            foreach ($obj as $c) {
                $children[] = self::createBindingNode($c);
            }
            return $children;
        }
        $bind = new BindingNode($obj->invocationName, $obj->serviceId);
        if (isset($obj->children) && is_array($obj->children)) {
            $bind->setChildren(self::createBindingNode($obj->children));
        }
        return $bind;
    }
}
