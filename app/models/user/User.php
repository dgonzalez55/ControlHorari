<?php
    namespace app\models\user;

    use lib\mvc\Model;
    use app\models\regEntries\RegisterEntries;

    //Domain Model Class
    /** @SuppressWarnings(PHPMD.StaticAccess) */
    abstract class User implements Model{
        protected int $idUser;
        protected string $email;
        protected string $username;
        protected string $role;
        protected RegisterEntries $regEntries;

        protected function __construct(int $idUser, string $email, string $role){
            $this->idUser       = $idUser;
            $this->role         = $role;
            $this->email        = $email;
            $this->username     = explode("@",$email)[0];
            $this->regEntries   = RegisterEntries::load($this->idUser);
        }

        public static function load(string $email, string $pass):?self{
            return DB_DATASET_TYPE==DB_DATASET_MARIADB ? UserMySQL::loadUser($email,$pass) : UserHardcoded::loadUser($email,$pass);
        }

        public function newRegisterEntry():void{
            $this->regEntries->addNext($this->idUser);
        }

        public function __get(string $key){
            return $this->$key;
        }
        
        //Controlem els atributs que es passen a la vista (passem només els necessaris en cada cas)
        public function getViewData(string $viewName):array{
            switch($viewName){
                case 'login':
                    return [];
                case 'mainPage':
                    return ['username' => $this->username,'role' => $this->role] + $this->regEntries->getViewData($viewName);
                default:
                    return [];
            }
        }
    }