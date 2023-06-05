<?php

/**
 * SdkConfiguration represents the configuration settings for the SDK.
 *
 * This class holds properties such as API key, JWT token, client ID, environment, and version.
 *
 * @version 1.0
 * @author Find Your Spirit
 */

class SdkConfiguration
{
    public $apiKey;
    public $jwtToken;
    public $clientID;
    public $environment;
    public $version;

    public function __construct($apiKey, $environment, $jwtToken, $clientID, $version)
    {
        $this->apiKey = $apiKey;
        $this->environment = $environment;
        $this->jwtToken = $jwtToken;
        $this->clientID = $clientID;
        $this->version = $version;
    }

    public function getBaseUrl()
    {
        switch ($this->environment) {
            case EnvironmentType::Live:
                return "https://api.live.fysapp.co/{$this->version}";
            case EnvironmentType::Test:
                return "https://api.test.fysapp.co/{$this->version}";
            default:
                throw new InvalidArgumentException("Invalid environment specified.");
        }
    }
}

/**
 * EnvironmentType represents the different environments for the SDK.
 *
 * This class defines constants for live and test environments.
 */
class EnvironmentType
{
    const Live = "Live";
    const Test = "Test";
}
