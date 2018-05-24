<?php

namespace App\QueryCollections\SchoolDivision;

use App\Role;

class SchoolDivisionQuery {

    protected $type;

    public function setType($role)
    {
        $this->type = $role;
    }

	public function SchoolDivisionCollection()
	{
        $projectType = $this->type;

        $lookupArray = [
            'super_administrator' => 'SuperAdminRoleType',
            'school_division_administrator' => 'SchoolDivisionAdminRoleType'
        ];

        if( ! array_key_exists($this->type, $lookupArray)) {
            throw new \RuntimeException('Incorrect project type');
        }
        //dd($lookupArray[$projectType]);
        $className = "App\\QueryCollections\\SchoolDivision\\" . $lookupArray[$projectType];
        //dd($className);
        return ( new $className )->SchoolDivisionCollection();
	}

}