<?php


namespace App\Http\Controllers\Helper;


use Illuminate\Support\Facades\File;

trait Uploader
{
//    single file methods
    public function FileStore($file, $path)
    {
        $fileName = time() . rand(100, 999) . '.' . $file->getClientOriginalExtension();
        $file->move(public_path($path), $fileName);
        return $fileName;
    }

    public function FileDelete($path)
    {
        if (File::exists($path)) {
            File::delete($path);
        }
    }

    public function FileUpdate($input, $db, $path)
    {
        if ($input != '') {
            if ($db != '' && $db != null) {
                $file_old = $path . $db;
                $this->FileDelete($file_old);
            }
            $file_name = $input;
            $file = $this->FileStore($file_name, $path);
        } else {
            $file = $db;
        }
        return $file;
    }

    public function CopyFile($name,$from,$to)
    {
        $file_exploded = explode(".", $name);
        $file_type = $file_exploded[1];
        $new_name = time() . rand(100, 999);
        $new_file = $new_name . "." . $file_type;
        copy($from.$name, $to.$new_file);
        $this->FileDelete($from.$name);
        return $new_file;
    }
}
