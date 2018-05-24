<?php

namespace App\QueryCollections\SchoolAdministrator;

use App\Role;

class SchoolAdminQuery {

    protected $type;

    public function setType($role)
    {
        $this->type = $role;
    }

	public function SchoolAdminCollection()
	{
        $projectType = $this->type;

        $lookupArray = [
            'super_administrator' => 'SuperAdminRoleType',
            'school_division_administrator' => 'SchoolDivisionAdminRoleType',
            'school_administrator' => 'SchoolAdminRoleType'
        ];

        if( ! array_key_exists($this->type, $lookupArray)) {
            throw new \RuntimeException('Incorrect project type');
        }

        $className = "App\\QueryCollections\\SchoolAdministrator\\" . $lookupArray[$projectType];

        return ( new $className )->SchoolAdminCollection();
	}

}