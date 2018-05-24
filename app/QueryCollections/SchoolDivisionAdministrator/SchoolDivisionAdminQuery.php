<?php

namespace App\QueryCollections\SchoolDivisionAdministrator;

use App\Role;

class SchoolDivisionAdminQuery {

    protected $type;

    public function setType($role)
    {
        $this->type = $role;
    }

	public function SchoolDivisionAdminCollection()
	{
        $projectType = $this->type;

        $lookupArray = [
            'super_administrator' => 'SuperAdminRoleType',
            'school_division_administrator' => 'SchoolDivisionAdminRoleType'
        ];

        if( ! array_key_exists($this->type, $lookupArray)) {
            throw new \RuntimeException('Incorrect project type');
        }

        $className = "App\\QueryCollections\\SchoolDivisionAdministrator\\" . $lookupArray[$projectType];

        return ( new $className )->SchoolDivisionAdminCollection();
	}

}