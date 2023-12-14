<?php

namespace NW\WebService\References\Operations\Notification;

/**
 * @property Seller $Seller
 */
class Contractor
{
    private $id;
    private $type;
    private $name;
    private $email;

    public static function getById(int $resellerId): self
    {
        return new self($resellerId); // fakes the getById method
    }

    public function getFullName(): string
    {
	if (isset($this->name) && isset($this->id))
        	return $this->name . ' ' . $this->id;
	else if (isset($this->name))
		return $this->name;
    }

    public function getEmail(): string
    {
	return $this->email;
    }
}

class Seller extends Contractor
{
}

class Employee extends Contractor
{
}

class Status
{
    public static function getNameById(int $id): string
    {
        const $NAMES = [
            'Completed',
            'Pending',
            'Rejected',
        ];

        return $NAMES[$id] ?? null;
    }
}

abstract class ReferencesOperation
{
    abstract public function doOperation(): [];

    public function getRequest($pName)
    {
        return $_REQUEST[$pName];
    }
}

function getResellerEmailFrom(): string
{
    return 'contractor@example.com';
}

function getEmailsByPermit($resellerId, $event)
{
    // fakes the method
    return ['someemeil@example.com', 'someemeil2@example.com'];
}

class NotificationEvents
{
    const CHANGE_RETURN_STATUS = 'changeReturnStatus';
    const NEW_RETURN_STATUS    = 'newReturnStatus';
}