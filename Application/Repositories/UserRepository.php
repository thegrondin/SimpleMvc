<?php

namespace SimpleMvc\Application\Repositories;

use SimpleMvc\Core\Database\Facade\DB;
use SimpleMvc\Application\Repositories\Entities\User;


class UserRepository {

    public function getAll() {

        
        $request = DB::request('SELECT * FROM TP7_Usagers');

        $users = array();

        while ($row = $request->fetch_assoc()) {
           
            $users[] = UserCreator::createUserFromDbRequest($row);
        }

        return $users;
    }

    public function getSingleById(int $id) {

        $request = DB::requestSecure('SELECT * FROM TP7_Usagers WHERE ID = ?', ['i', &$id])->fetch_assoc();
        
        if ($request != null) {
            return UserCreator::createUserFromDbRequest($request);
        }

        return null;
        
    }

    public function getSingleByUsername(string $username) {
        $request = DB::requestSecure('SELECT * FROM TP7_Usagers WHERE NomUtilisateur = ?', ['s', &$username])->fetch_assoc();

        if ($request != null) {
            return UserCreator::createUserFromDbRequest($request);
        }

        return null;

    }

    public function delete(int $id) {

        $request = DB::requestSecure('DELETE FROM TP7_Usagers WHERE ID = ?', ['i', &$id]);
    }

    public function update(int $id, User $user) {
        $request = DB::requestSecure("UPDATE TP7_Usagers 
                    SET Nom=?, Prenom=?, Courriel=?, NomUtilisateur=?, MotDePasse=? 
                    WHERE ID=?", 
                    [
                        'sssssi',
                        &$user->lastname, 
                        &$user->firstname, 
                        &$user->email, 
                        &$user->username,
                        &$user->password, 
                        &$id
                    ]
                );
    }

    public function add(User $user) {
        $request = DB::requestSecure('INSERT INTO TP7_Usagers (Nom, Prenom, Courriel, NomUtilisateur, MotDePasse) 
                    VALUES (?, ?, ?, ?, ?)', 
                    [
                        'sssss',
                        &$user->lastname, 
                        &$user->firstname, 
                        &$user->email, 
                        &$user->username,
                        &$user->password
                    ]
                );
    }

}