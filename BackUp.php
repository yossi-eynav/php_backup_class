<?php
class BackUp{
    private  $srcFolder;
    private $destFolder;
    static $file_count = 0;

    function __construct($srcFolder,$destFolder){
        $this->srcFolder = $srcFolder;
        $this->destFolder = $destFolder;
        $this->copy_files();
    }



    function copy_files(){

        echo "<br/><br/><strong>STARTING RECURSION </strong><br/><br/>";
        flush();
        if(!file_exists($this->destFolder))
            @mkdir($this->destFolder,0777);
        chmod($this->destFolder,0777);
        $handle = opendir($this->srcFolder);
        echo "<strong>FOLDER NAME =[{$this->srcFolder}] </strong> <br/>";
        flush();
        while(false != ($entry= readdir($handle))){
            if(is_file("{$this->srcFolder}/$entry"))
            {
                copy("{$this->srcFolder}/$entry","{$this->destFolder}/$entry");
                echo " File Count =  ".BackUp::$file_count++."   copy file from = {$this->srcFolder}/$entry ; copy destination  is = {$this->destFolder}/$entry <br/>";
                flush();
            }
            else if(is_dir("{$this->srcFolder}/$entry")&&$entry!='.'&&$entry!='..')
            {

                new BackUp("{$this->srcFolder}/$entry/","{$this->destFolder}/$entry/");
            }
        }
        closedir($handle);
        return;
    }

    function  export_database($dbname,$username,$password){
        exec("mysqldump -u $username -p$password $dbname > $this->destFolder/sql_backup.sql",$output=array(),$success);
        echo $success;

    }



}







