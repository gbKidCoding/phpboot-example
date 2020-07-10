<?php

namespace App\Service;

require_once __DIR__ . '/../../packages/phutil/__phutil_library_init__.php';

use ConduitClient;


class PhabricatorService
{

    private $phabricatorIp = "http://172.16.0.124";

    public function diffusionCommitEdit($api_token, $queryKey)
    {

        $searchResult = $this->diffusionCommitSearch($api_token, $queryKey);

        $data = $searchResult["data"];

        foreach ($data as $one) {

            $identifier = $one["fields"]["identifier"];
//            print_r("identifier: $identifier");

            $api_parameters = array("objectIdentifier" => $identifier,
                "transactions" => array(array("type" => "accept", "value" => true)));
            $client = new ConduitClient($this->phabricatorIp);
            $client->setConduitToken($api_token);
            $editResult = $client->callMethodSynchronous('diffusion.commit.edit', $api_parameters);
            $editJsonResult = json_decode($editResult);
            print_r("editResult: $editJsonResult");
        }

        return "";
    }

    public function diffusionCommitSearch($api_token, $queryKey)
    {
        $api_parameters = array("queryKey" => $queryKey);
        $client = new ConduitClient($this->phabricatorIp);
        $client->setConduitToken($api_token);
        $result = $client->callMethodSynchronous('diffusion.commit.search', $api_parameters);
        return $result;
    }

}