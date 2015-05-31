<?php
/**
 * PHP Version 5
 *
 * @category  H24
 * @package   H24
 * @author    "Yury Kozyrev" <yury.kozyrev@home24.de>
 * @copyright 2015 Home24 GmbH
 * @license   Proprietary license.
 * @link      http://www.home24.de
 */

namespace Instagram\Subscription;


use Instagram\Client\Config\AuthConfig;
use Instagram\Response\Subscription\RealTimeSubscription;
use Instagram\Serializer\JMSSerializer;

class SubscriptionReactor
{

    protected $config;
    protected $callbacks;
    protected $serializer;

    public function __construct(AuthConfig $config)
    {
        $this->config     = $config;
        $this->callbacks  = new \ArrayObject();
        $this->serializer = new JMSSerializer();
    }

    public function process($json, $xHubSignature = null)
    {
        $xHubSignature = $this->retrieveXHubSignature($xHubSignature);
        $valid         = $this->validate($this->config->getSecret(), $json, $xHubSignature);
        if (false === $valid) {
            throw new \DomainException("X-Hub-Signature and hmac digest did not match");
        }
        $json = json_decode($json);
        $json = is_array($json) ? reset($json) : $json;

        $subscription = $this->serializer->deserialize(json_encode($json), new RealTimeSubscription());
        foreach ($this->getObjectStorage($json->object) as $callback) {
            $callback($subscription);
        }

    }

    public function registerCallback($type, \Closure $callback)
    {
        $list = $this->getObjectStorage($type);
        $list->attach($callback);
    }

    /**
     * Desc
     *
     * @param $type
     * @return \SplObjectStorage | \Closure[]
     */
    protected function getObjectStorage($type)
    {
        if(!$this->callbacks->offsetExists($type)){
            $this->callbacks->offsetSet($type, new \SplObjectStorage());
        }

        return $this->callbacks->offsetGet($type);
    }

    protected function validate($secret, $json, $xHubSignature)
    {
        return $xHubSignature === hash_hmac('sha1', $json, $secret);
    }

    protected function retrieveXHubSignature($xHubSignature)
    {
        if ($xHubSignature) {
            return $xHubSignature;
        }
        if (isset($_SERVER['HTTP_X_HUB_SIGNATURE'])) {
            return $_SERVER['HTTP_X_HUB_SIGNATURE'];
        }
        return null;
    }
}