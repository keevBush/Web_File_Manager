<?php
     namespace clearos\apps\Web_File_Manager;
     require_once('Item.php');
     class Elfinder
     {
    static $instance;
    private $user_dir;
    public function __construct(){
        
    }
    public static function GetInstance(){
        if(self::$instance==null){
            self::$instance= new Elfinder();
        }
        return self::$instance;
    }
    public function setSiteFolder()
    {

        $site_folder_path = "/var/www/virtual/";
        $site_folders = array();

        $folder = opendir($site_folder_path);
        while ($item = readdir($folder)) {
            if (is_dir($site_folder_path . $item) && ($item != ".") && ($item != ".."))
                $site_folders[] = $item;
        }
        $site_folder = $site_folders;
    }

    /**
     * @return array
     */
    public function ToJSON($data){
        return json_encode($data);
    }

    public function open_dir($params){
        $path=$params;
        if(is_dir ($path)){
            $file_folder=opendir($path);            
            $contents=array();
            while($item =readdir($file_folder)){
                if (($item != ".") && ($item != ".."))
                {
                    if(is_dir($path."/".$item)){
                        
                        $it=new Item($path.$item.'/',"d");
                        $contents[]=$it->ToJSON();//d for directory
                    }else{
                        $it=new Item($path.$item,"f");
                        $contents[]=$it->ToJSON();// f for file
                    }
                }
            }
            return $contents;
        }else
        {
            return false;
        }
    }
    public function getSiteFolder()
    {
        return $site_folder;
    }

    /**
     * Get the value of user_dir
     */
    public function getUser_dir()
    {
        setUser_dir();
        return $user_dir;
    }
    /**
     * Get return Directory to Json Format
     * 
     */

    public function getUser_dirJson(){
        $d = json_encode(open_dir(array(getUser_dir())));
        var_dump($d);
        die();
        return $d;
    }
    /**
     * Set the value of user_dir
     *
     * @return  self
     */
    public function setActualUserPath(array $params){
        //var_dump($params[0]);die;
        self::$actualuserpath=realpath($params[0]);
    }
    public function getActualUserPath(){
       $d= setUser_dir();    
       $d1= setActualUserPath(array(getUser_dir()));
       return json_encode ($actualuserpath);
    }

    public function open_user_dir($params){
        $user_dir = "/home/";
        $u = posix_getpwnam(get_current_user());
        
        if ($u == FALSE) {
            $user_dir = "../files/";
        } elseif ($u["uid"] == 0) {
            $user_dir = "/home/";
        } else {
            $user_dir .= '/'.get_current_user() . '/';
        }
        return $this->open_dir($user_dir);
    }

    public function setUser_dir()
    {

        $user_dir = "/home/";
        $u = posix_getpwnam(get_current_user());
        
        if ($u == FALSE) {
            $user_dir = "../files/";
        } elseif ($u["uid"] == 0) {
            $user_dir = "/home/";
        } else {
            $user_dir .= '/'.get_current_user() . '/';
        }
        $user_dir = realpath($user_dir);
    
        return null;
    }
}    

?>