<?php 

namespace SimpleMvc\Application\Repositories;

use SimpleMvc\Application\Repositories\Entities\User;

class UserCreator {
    public static function createUserFromDbRequest($request) {
        return new User(
            $request['ID'],
            $request['Prenom'],
            $request['Nom'],
            $request['Courriel'],
            $request['NomUtilisateur'],
            $request['MotDePasse'],
            $request['IsAdmin']
        );
    }
}