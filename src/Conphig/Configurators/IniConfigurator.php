<?php

/**
 *
 * @author    Ashwin Mukhija
 * @license   MIT
 * @link      https://github.com/Achrome/Conphig
 */
namespace Conphig\Configurators;

use Conphig\Configuration\Configuration;
use Conphig\Helpers\ConfiguratorHelper;
use Conphig\Exceptions\ConfigurationException;

class IniConfigurator extends AbstractConfigurator
{

    public function parseConfig()
    {
        $this->intermediateConf = parse_ini_file($this->filePath, true);
        if ($this->intermediateConf === false) {
            throw new ConfigurationException("Could not read the configuration file");
        }
    
        $this->configuration = (new ConfiguratorHelper)->createObjFromArray($this->intermediateConf);
    }
}
