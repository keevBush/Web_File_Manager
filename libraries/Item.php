<?php
 namespace clearos\apps\Web_File_Manager;
    class Item{
        private $name;
        private $path;
        private $type;
        private $icon;
        private $lastModif;
        private $ext;
        private $size;
        public function __construct($path,$type){
            $this->path=$path;
            $this->type=$type;
            $this->Initialize();
        }

        public function Initialize(){
            $data=pathinfo($this->path);
            $this->name=$data['filename'];
            if(trim($this->name)==""){
                $this->name=$data['basename'];
            }
            if($this->type=='f'){
                $this->ext=$data['extension'];
                $this->icon=$data['extension'].'.png';
                if('.'.$data['extension']==$data['basename']){
                    $this->icon='nonformat.png';
                    $this->ext='inconnue';
                }
            }else{
                $this->icon="folder.png";
               }
               $this->lastModif=date("F d Y H:i:s.",filemtime($this->path));
    
               $f = $this->path;
               $io = popen ( '/usr/bin/du -sk ' . $f, 'r' );
               $sizef = fgets ( $io, 4096);
               pclose ( $io );
               $this->size=(int) filter_var($sizef,FILTER_SANITIZE_NUMBER_INT);
           
        }

        public function GetName(){
            return $this->name;
        }
        public function GetPath(){
            return $this->path;
        }
        public function GetType(){
            return $this->type;
        }
        public function GetIcon(){
            return $this->icon;
        }
        public function GetLastModif(){
            return $this->lastModif;
        }
        public function GetExt(){
            return $this->ext;
        }
        public function GetSize(){
            return $this->size;
        }

        public function expose() {
            return get_object_vars($this);
        }

        public function ToJSON(){
            return json_encode($this->expose());
        }
    }

?>