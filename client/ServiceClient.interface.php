<?php
/**
 * Created by JetBrains PhpStorm.
 * User: tetsu
 * Date: 12/01/14
 * Time: 17:01
 * To change this template use File | Settings | File Templates.
 */
interface ServiceClient {
    const HTTPHEADER_SERVICE_NAME = 'X-LanguageGrid-ServiceName';
    const HTTPHEADER_SERVICE_COPYRIGHT = 'X-LanguageGrid-ServiceCopyright';
    const HTTPHEADER_SERVICE_LICENSE = 'X-LanguageGrid-ServiceLicense';

    public function setUserId($userId);

    public function setPassword($password);

    public function setProxy($proxyHost, $proxyPort);

    /*
     * @return Array<BindingNode>
     */
    public function getTreeBindings();

    /*
     * @return Array<string, string>
     */
    public function getHttpHeaders();

    /*
     * @return String
     */
    public function getLastName();

    /*
     * @return String
     */
    public function getLastCopyrightInfo();

    /*
     * @return String
     */
    public function getLastLicenseInfo();

    /*
     * @return CallNode
     */
    public function getLastCallTree();

    public function addBindings(BindingNode $node);


}