<?php

namespace OscarPasache\GlobalSettings\Repositories;

interface GlobalSettingsRepository
{
    /**
     * Check if a property exists in a name
     */
    public function checkIfPropertyExists(string $name): bool;

    /**
     * Get the payload of a property
     */
    public function getPropertyPayload(string $name);

    /**
     * Create a property within a name with a payload
     */
    public function createProperty(string $name, $payload): void;

    /**
     * Update the payloads of property within a name.
     */
    public function updatePropertyPayload(string $name, $payload): void;

    /**
     * Delete a property from a name
     */
    public function deleteProperty(string $name): void;

    /**
     * Lock a set of property for a specific name
     */
    public function lockProperty(string $name): void;

    /**
     * Unlock a set of property for a name
     */
    public function unlockProperty(string $name): void;
}
