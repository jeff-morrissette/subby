<?php

namespace App\QueryCollections\VacationDay;

use App\Role;

class VacationDayQuery {

    protected $type;

    public function setType($role)
    {
        $this->type = $role;
    }

	public function VacationDayCollection()
	{
        $projectType = $this->type;

        $lookupArray = [
            'substitute_teacher' => 'SubstituteRoleType'
        ];

        if( ! array_key_exists($this->type, $lookupArray)) {
            throw new \RuntimeException('Incorrect project type');
        }
        //dd($lookupArray[$projectType]);
        $className = "App\\QueryCollections\\VacationDay\\" . $lookupArray[$projectType];
        //dd($className);
        return ( new $className )->VacationDayCollection();
	}

}