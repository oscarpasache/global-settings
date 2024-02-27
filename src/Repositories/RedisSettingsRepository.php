<?php

namespace OscarPasache\GlobalSettings\Repositories;

use Illuminate\Support\Facades\Redis;

class RedisSettingsRepository implements GlobalSettingsRepository
{
    protected string $prefix;

    public function __construct()
    {
        $this->prefix = 'settings.';
    }

    /**
     * Check if a property exists in a name
     */
    public function checkIfPropertyExists(string $name): bool
    {
        return Redis::exists($this->prefix.$name);
    }

    /**
     * Get the payload of a property
     */
    public function getPropertyPayload(string $name)
    {
        return json_decode(Redis::get($this->prefix.$name));
    }

    /**
     * Create a property within a name with a payload
     */
    public function createProperty(string $name, $payload): void
    {
        Redis::set($this->prefix.$name, json_encode($payload));
    }

    /**
     * Update the payloads of property within a name.
     */
    public function updatePropertyPayload(string $name, $payload): void
    {
        Redis::set($this->prefix.$name, json_encode($payload));
    }

    /**
     * Delete a property from a name
     */
    public function deleteProperty(string $name): void
    {
        Redis::del($this->prefix.$name);
    }

    /**
     * Lock a set of property for a specific name
     */
    public function lockProperty(string $name): void
    {
        $this->createProperty($name, 'locked');
    }

    /**
     * Unlock a set of property for a name
     */
    public function unlockProperty(string $name): void
    {
        $this->deleteProperty($name);
    }
}
