<?php

namespace OscarPasache\GlobalSettings\Repositories;

use Illuminate\Database\Eloquent\Builder;
use OscarPasache\GlobalSettings\Models\GlobalSettingsModel;

class DatabaseSettingsRepository implements GlobalSettingsRepository
{
    /** @var class-string<\Illuminate\Database\Eloquent\Model> */
    protected string $propertyModel;

    public function __construct()
    {
        $this->propertyModel = GlobalSettingsModel::class;
    }

    /**
     * Check if a property exists in a name
     */
    public function checkIfPropertyExists(string $name): bool
    {
        return $this->getBuilder()
            ->where('name', $name)
            ->exists();
    }

    /**
     * Get the payload of a property
     */
    public function getPropertyPayload(string $name)
    {
        $setting = $this->getBuilder()
            ->where('name', $name)
            ->first('payload');

        return json_decode($setting->getAttribute('payload'));
    }

    /**
     * Create a property within a name with a payload
     */
    public function createProperty(string $name, $payload): void
    {
        $this->getBuilder()->create([
            'name' => $name,
            'payload' => json_encode($payload),
            'locked' => false,
        ]);
    }

    /**
     * Update the payloads of property within a name.
     */
    public function updatePropertyPayload(string $name, $payload): void
    {
        $this->getBuilder()
            ->where('name', $name)
            ->update(['payload' => json_encode($payload)]);
    }

    /**
     * Delete a property from a name
     */
    public function deleteProperty(string $name): void
    {
        $this->getBuilder()
            ->where('name', $name)
            ->delete();
    }

    /**
     * Lock a set of property for a specific name
     */
    public function lockProperty(string $name): void
    {
        $this->getBuilder()
            ->where('name', $name)
            ->update(['locked' => true]);
    }

    /**
     * Unlock a set of property for a name
     */
    public function unlockProperty(string $name): void
    {
        $this->getBuilder()
            ->where('name', $name)
            ->update(['locked' => false]);
    }

    public function getBuilder(): Builder
    {
        $model = new $this->propertyModel;

        return $model->newQuery();
    }
}
