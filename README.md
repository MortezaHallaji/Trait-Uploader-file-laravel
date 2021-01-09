**Laravel file uploader helper**
-------------------------------------------------------------

This helper is for easy uploading of files in Laravel
 
 **Installation**
----------------------------
> clone file and put this file to `your-project/app/Http/Controllers` and import to your controller then add 
`use Uploader`

**Usage**
----------------------
 
> Upload file
------------
 use `$file = $this->FileStore($request->file, "path/to")`
 
> Delete file
------------
 use `$this->FileDelete("path/to" . $request->file)`

> Update file
------------
 use `$file = $this->FileUpdate($input, $db, "path/to")`
 - $input : The file that comes from the view
 - $db : The file that comes from the database

 > Copy file : Copy a file from one folder to another if you want
------------
 use `$file = $this->CopyFile($fileName, 'path/from', 'path/to')`
 - $fileName : File name in folder `path/from`
