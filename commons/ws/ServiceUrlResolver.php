<?php
/**
 * Created by JetBrains PhpStorm.
 * User: tetsu
 * Date: 12/02/07
 * Time: 15:49
 * To change this template use File | Settings | File Templates.
 */

define('SERVICE_GRID_BASE_URL', 'http://langrid.nict.go.jp/service_manager/wsdl/');


class ServiceUrlResolver
{
    const DEFAULT_SERVICE_GRID_BASE_URL = 'http://langrid.nict.go.jp/service_manager/wsdl/';

    public static function resolveByServiceId($serviceId)
    {
        return self::serviceGridBaseUrl().$serviceId;
    }

    public static function resolveDefaultByServiceType($serviceType) {
        $list = array(
            'BilingualDictionary' => 'kyotou.langrid:NaturalDisasters'
        );

        return array_key_exists($serviceType, $list) ? self::serviceGridBaseUrl().$list[$serviceType] : 'UnknownServiceId';
    }

    protected static function serviceGridBaseUrl()
    {
        return defined('SERVICE_GRID_BASE_URL') ? SERVICE_GRID_BASE_URL : self::DEFAULT_SERVICE_GRID_BASE_URL;
    }
}
