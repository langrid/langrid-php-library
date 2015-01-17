<?php


class ServiceConfigurator
{
    protected $config;

    /**
       __construct

       $obj : service configuration object (standard object style)
     */
    public function __construct($obj) {
        if (! $obj instanceOf stdClass) {
            throw new Exception('Invalid setting object is given.');
        }

        $this->config = $obj;
        if (! isset($this->config->connection)) {
            throw new Exception('Member "connection" is missing.');
        }
        if (! isset($this->config->connection->uri)) {
            throw new Exception('Member "connection->uri" is missing.');
        }
    }

    public function isProxyEnabled() {
        if (! isset($this->config->connection->proxy)) {
            return FALSE;
        }
        return !! $this->config->connection->proxy->enabled;
    }

    public function isProxyAuthNeeded() {
        if (! $this->isProxyEnabled()) {
            return FALSE;
        }
        if (! isset($this->config->connection->proxy->userId)) {
            return FALSE;
        }
        return !! $this->config->connection->proxy->userId;
    }

    public function getProxyUri() {
        if (! $this->isProxyEnabled()) {
            return FALSE;
        }
        return $this->config->connection->proxy->uri;
    }

    public function getProxyUserId() {
        if (! $this->isProxyAuthNeeded()) {
            return FALSE;
        }
        return $this->config->connection->proxy->userId;
    }

    public function getProxyPasswd() {
        if (! $this->isProxyAuthNeeded()) {
            return FALSE;
        }
        return $this->config->connection->proxy->passwd;
    }

    public function getUserId() {
        return $this->config->connection->userId;
    }

    public function getPasswd() {
        return $this->config->connection->passwd;
    }

    public function buildServiceUri($serviceId) {
        return str_replace('{service_id}', $serviceId, $this->config->connection->uri);
    }

    protected function setupClient($client) {
        $client->setUserId($this->getUserId());
        $client->setPassWord($this->getPasswd());
        if ($this->isProxyEnabled()) {
            $client->setProxy($this->getProxyUri(), $this->getProxyPort());

            if ($this->isProxyAuthNeeded()) {
                // TODO: ServiceClientImpl.php does not have proxy authentication.
                //
                // $client->setProxyUser($this->getProxyUser());
                // $client->setProxyPasswd($this->getProxyPasswd());
            }
        }

        return $client;
    }

    public function getServiceUri($sourceLang, $intermediateLang) {
        $pats = $this->getPairPattern($sourceLang, $intermediateLang);
        foreach ($this->config->serviceSetting->collection as $setting) {
            if (array_search($setting->path, $pats)!==FALSE) {
                return $this->buildServiceUri($setting->serviceId);
            }
        }
        return FALSE;
    }

    public function getServiceBinding($sourceLang, $intermediateLang) {
        $pats = $this->getPairPattern($sourceLang, $intermediateLang);
        foreach ($this->config->serviceSetting->collection as $setting) {
            if (array_search($setting->path, $pats)!==FALSE) {
                return $setting->binding;
            }
        }
        return FALSE;
    }

    public function getPairPattern($from, $to) {
        return array("${from}=>${to}", "${from}<=>${to}", "${to}<=>${from}");
    }
}
