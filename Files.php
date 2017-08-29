<?php 

class Files
{
	private $files = [];
	private $extensions = ['.png', '.jpg', '.jpeg'];
	private $size = 20000000; //bytes => 20 megabytes
	private $err = false;
	private $msg;

	public function getFiles()
	{
		return $this->files;
	}

	public function setFiles($files)
	{
		$this->files = $files;
	}


	public function validFiles()
	{
		for($x = 0; $x < count($this->getFiles()['name']); $x++){

			$nameFile = $this->getFiles()['name'][$x];
			$sizeFile = $this->getFiles()['size'][$x];
			$tempFile = $this->getFiles()['tmp_name'][$x];

			if(!in_array(strrchr($nameFile, '.'), $this->extensions)){
				$this->msg = "Alguns arquivos tem a extensão não permitida, somente é permitido " . implode(' , ', $this->extensions);
				$this->err = true;
			}

			if($this->size < $sizeFile){
				$this->msg = "Alguns arquivos ultrapassam o limite permitido.";
				$this->err = true;
			}

			if($this->err == false){
				$extension = explode('.', $nameFile);
				$newName = date("Y-m-d_H:i:s") . '.' . $extension[1];
				move_uploaded_file($this->getFiles()['tmp_name'][$x], 'files/' . $newName);
				$this->msg = "Arquivos enviados com sucesso.";
			}
		}
		return $this->msg;
	}

}