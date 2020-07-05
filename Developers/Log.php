<?php


namespace Developers;

class Log
{
    /**  @var */
    public $text;

    /**  @var */
    public $Name;

    /**  @var */
    public $Data;

    /** @var */
    public $Status;

    /** @var */
    public $Folder;


    /**
     * Method responsible for creating folders and subfolders, by default the folder name is Logs
     * Método responsável pela criação de pastas e subpastas, por padrão, o nome da pasta é Logs
     *
     * Create the folder and subfolders with today's date and in the "IF" we check if the folders and subfolders exist.
     * Cria a pasta e subpastas com a data de hoje e no "IF" verificamos se as pastas e subpastas existem.
     */
    public function CreateFolder($Folder = 'Logs/')
    {
        $this->Folder = $Folder;

        $FolderDir = $Folder . '/' . date('Y') . '/' . date('m') . '/' . date('d') . '/';
        if (!is_dir($FolderDir) && !file_exists($FolderDir)) {
            if (!is_dir($Folder) && !file_exists($Folder)) {
                mkdir($Folder, 0755);
            }

           if (!is_dir($Folder . '/' . date('Y')) && !file_exists($Folder . '/' . date('Y'))) {
                mkdir($Folder . '/' . date('Y'), 0755);
            }

             if (!is_dir($Folder . '/' . date('Y') . '/' . date('m'))
                && !file_exists($Folder . '/' . date('Y') . '/' . date('m'))) {
                mkdir($Folder . '/' . date('Y') . '/' . date('m'), 0755);
            }

            if (!is_dir($Folder . '/' . date('Y') . '/' . date('m') . '/' . date('d'))
                && !file_exists($Folder . '/' . date('Y') . '/' . date('m') . '/' . date('d'))) {
                mkdir($Folder . '/' . date('Y') . '/' . date('m') . '/' . date('d'), 0755);
            }
        }
    }

    /**
     * Method responsible for structuring the information that will be printed in the log .txt file.
     * Método responsável pela estruturação das informações que serão impressas no arquivo log .txt.
     *
     * @param $Name
     * @param $Status
     * @param $Data
     */
    public function CreateText()
    {

        //Predefined and standard text
        //Texto pré-definido e padrão
        $this->text = "[LOG - ". date("d/m/Y H:i:s")."]
        
       URL: ".__DIR__."
       IP: ".$_SERVER['REMOTE_ADDR']."
       NAVEGADOR: ".$_SERVER['HTTP_USER_AGENT']."
       PORTA: ".$_SERVER['REMOTE_PORT']."";

        //We retrieve the data reported through the array
        //Resgatamos os dados informados através do array
        $this->text .= "
         
        Resultados do {$this->Name}:
        Usuário: {$this->Data['usuario']}
        E-mail: {$this->Data['email']}
        Perfil: {$this->Data['perfil']}
        Sessão: {$this->Data['sessao']}
        
        Status: {$this->Status}";
    }

    /*
     * Method responsible for handling and generating the log file.
     * Método responsável por tratar e gerar o arquivo do log.
     *
     * @param $folderDir
     * @param $text
     */
    public function CreateFile($FolderDir, $text){

        $this->CreateText();

        $this->$FolderDir =  $FolderDir;
        $this->text =  $text;

        $dir = $this->$FolderDir;

        //Log File Creation
        //Criação de Arquivo para o Log
        $file = $this->Name.'-' . date('Y-m-d') . '-'.time() .'.txt';

        //We generate the file name and the content that will be printed on the file.
        //Geramos o nome do arquivo e o conteúdo do mesmo.
        $fopen = fopen($dir . $file, "w+");
        fwrite($fopen, $this->text);
        fclose($fopen);
    }


    /*
     * Method responsible for creating the Automatic Log every time it is called
     * Método responsável por criar um Log automático
     *
     * @param string $Name
     * @param string $Status
     * @param $Data
     * @return bool
     */
    public function LogCreate($Name, $Status, $Data){
        $this->Data = $Data;
        $this->Status= $Status;
        $this->Name= $Name;

        //We call the method to create the Log folder and subfolder, if it was not generated
        //Chamamos o método para criar a pasta Log e subpasta, se não foi gerado
        $this->CreateFolder();

        //We define the name of the folder and its subfolders.
        //Definimos o nome da pasta e suas subpastas.
        $FolderDir = $this->Folder . '/' . date('Y') . '/' . date('m') . '/' . date('d') . '/';

        $this->CreateText();
        $this->CreateFile($FolderDir, $this->text);

        return true;

    }

    public function CreateManual($FolderDir, $text){

        $this->$FolderDir =  $FolderDir;
        $this->text =  $text;

        $dir = $this->$FolderDir;

        //Log File Creation
        //Criação de Arquivo para o Log
        $file = $this->Name.'-' . date('Y-m-d') . '-'.time() .'.txt';

        //We generate the file name and the content that will be printed on the file.
        //Geramos o nome do arquivo e o conteúdo do mesmo.
        $fopen = fopen($dir . $file, "w+");
        fwrite($fopen, $this->text);
        fclose($fopen);
    }

    public function LogManual($Name, $Data){
        $this->Data= $Data;
        $this->Name= $Name;

        //We call the method to create the Log folder and subfolder, if it was not generated
        //Chamamos o método para criar a pasta Log e subpasta, se não foi gerado
        $this->CreateFolder();

        //Texto Pré-definido
        $this->content = "[LOG - ". date("d/m/Y H:i:s")."]";

        //Texto personalizado e encaminhado via parâmetro.
        $this->content.= "{$this->Data}";

        //We define the name of the folder and its subfolders.
        //Definimos o nome da pasta e suas subpastas.
        $FolderDir = $this->Folder . '/' . date('Y') . '/' . date('m') . '/' . date('d') . '/';

        $this->CreateManual($FolderDir, $this->content);

        return true;

    }

}