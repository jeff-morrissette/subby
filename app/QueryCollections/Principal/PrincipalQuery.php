<?php

namespace App\QueryCollections\Principal;

use App\Role;

class PrincipalQuery {

    protected $type;

    public function setType($role)
    {
        $this->type = $role;
    }

	public function PrincipalCollection()
	{
        $projectType = $this->type;

        $lookupArray = [
            'super_administrator' => 'SuperAdminRoleType',
            'school_division_administrator' => 'SchoolDivisionAdminRoleType',
            'school_principal' => 'PrincipalRoleType'
        ];

        if( ! array_key_exists($this->type, $lookupArray)) {
            throw new \RuntimeException('Incorrect project type');
        }

        $className = "App\\QueryCollections\\Principal\\" . $lookupArray[$projectType];

        return ( new $className )->PrincipalCollection();
	}

}