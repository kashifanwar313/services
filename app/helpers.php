<?php
    function uploadImage($image)
    {
        $name = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/uploads');
        $image->move($destinationPath, $name);
        return $name;
    }

    function deleteImageFromDir($image)
    {
        if($image){
            $image_path = public_path('uploads/');
            if (file_exists($image_path.$image)) {
                \File::delete($image_path.$image);
            }
        }
    }
?>
