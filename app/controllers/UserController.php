<?php  
    namespace app\controllers;

    use lib\mvc\Controller;
    use lib\sessions\Session;
    use app\models\user\User;

    /** @SuppressWarnings(PHPMD.StaticAccess) */
    class UserController extends Controller{

        private ?User $user;

        final public function __construct(){
            $this->user = &$this->model;
        }

        public function isUserLogged():bool{
            $this->user = Session::get('user');
            return $this->user !== null;            
        }

        public function logout(){
            Session::destroy();
            $this->redirect('/');
        }

        public function login(){
            if($this->isUserLogged()){
                $this->render('mainPage');
                return;
            }
            $this->render('login');
        }

        public function processLogin($params){
            $mail = isset($params['user']) ? filter_var($params['user'],FILTER_SANITIZE_EMAIL) : null;
            $pass = isset($params['pass']) ? filter_var($params['pass'],FILTER_SANITIZE_STRING) : null;
            if($mail && $pass){
                $this->user = User::load($mail,$pass);
                if(isset($this->user)){
                    Session::set('user',$this->user);
                    $this->render('mainPage');
                    return;
                }
            }
            $this->render('login',['email' => $mail ,'loginFailed' => true]);
        }

        public function processRegisterEntry(){
            if($this->isUserLogged()){
                $this->user->newRegisterEntry();
                $this->redirect('/');
                return;
            }
            $this->render('login');
        }
    }
