<?php

use Config\Services;

function upload($file) : string
{
  helper(['form', 'url']);

  $input = $this->validate([
    'file' => [
      'uploaded[file]',
      'mime_in[file,image/jpg,image/jpeg,image/png]',
      'max_size[file,1024]',
    ],
  ]);

  if (!$input)
    throw new Exception('Missing or invalid File in request');

  if ($file->isValid() && ! $file->hasMoved()) {
    // Get file name and extension
    $name = $file->getName();
    $ext = $file->getClientExtension();
    // Get random file name
    $newName = $file->getRandomName();
    // Store file in public/uploads/ folder
    $file->move('../public/uploads', $newName);
    // File path to display preview
    $filepath = base_url()."/uploads/".$newName;

    return $filepath;
  }
  else
  {
    throw new Exception('Missing or invalid File in request');
  }
}
