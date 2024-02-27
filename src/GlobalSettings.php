<?php

namespace OscarPasache\GlobalSettings;

use OscarPasache\GlobalSettings\Repositories\DatabaseSettingsRepository;
use OscarPasache\GlobalSettings\Repositories\RedisSettingsRepository;

class GlobalSettings
{
    private ?RedisSettingsRepository $RedisRepository;

    private ?DatabaseSettingsRepository $DatabaseRepository;

    public function __construct()
    {
        $this->RedisRepository = new RedisSettingsRepository();
        $this->DatabaseRepository = new DatabaseSettingsRepository();
    }

    public function get($name)
    {
        if ($this->RedisRepository->checkIfPropertyExists($name)) {
            return $this->RedisRepository->getPropertyPayload($name);
        } elseif ($this->DatabaseRepository->checkIfPropertyExists($name)) {
            return $this->DatabaseRepository->getPropertyPayload($name);
        } else {
            return '';
        }
    }

    public function set($name, $payload)
    {
        if ($this->DatabaseRepository->checkIfPropertyExists($name)) {
            $this->DatabaseRepository->updatePropertyPayload($name, $payload);
        } else {
            $this->DatabaseRepository->createProperty($name, $payload);
        }

        if ($this->RedisRepository->checkIfPropertyExists($name)) {
            $this->RedisRepository->updatePropertyPayload($name, $payload);
        } else {
            $this->RedisRepository->createProperty($name, $payload);
        }
    }

    public function delete($name)
    {
        if ($this->DatabaseRepository->checkIfPropertyExists($name)) {
            $this->DatabaseRepository->deleteProperty($name);
        }

        if ($this->RedisRepository->checkIfPropertyExists($name)) {
            $this->RedisRepository->deleteProperty($name);
        }
    }
}
