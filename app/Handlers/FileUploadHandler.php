<?php

namespace App\Handlers;

use  Illuminate\Support\Str;

class FileUploadHandler
{
    // 只允许以下后缀名的文件上传
    protected $allowed_ext = ["pdf", "doc", "docx","xlsx","xls"];

    public function save($file, $folder, $file_prefix)
    {
        // 构建存储的文件夹规则，值如：uploads/images/avatars/201709/21/
        // 文件夹切割能让查找效率更高。
        $folder_name = "uploads/files/$folder/" . date("Ym/d", time());

        // 文件具体存储的物理路径，`public_path()` 获取的是 `public` 文件夹的物理路径。
        // 值如：/home/vagrant/Code/larabbs/public/uploads/images/avatars/201709/21/
        $upload_path = public_path() . '/' . $folder_name;

        // 获取文件的后缀名，因图片从剪贴板里黏贴时后缀名为空，所以此处确保后缀一直存在
        // $extension = strtolower($file->getClientOriginalExtension()) ?: 'png';
        $extension = strtolower($file->getClientOriginalExtension());
        // 拼接文件名，加前缀是为了增加辨析度，前缀可以是相关数据模型的 ID

        $filename = $file_prefix . '_' . time() . '_' . Str::random(10) . '.' . $extension;

        // 如果上传的不是指定文件将终止操作
        if ( ! in_array($extension, $this->allowed_ext)) {
            return false;
        }

        // 将文件移动到我们的目标存储路径中
        $file->move($upload_path, $filename);
// response()->download 该方法 要求文件路径 不加url前缀  从upload 开始即可
        return [
            'path' => "$folder_name/$filename"
        ];
    }
}
