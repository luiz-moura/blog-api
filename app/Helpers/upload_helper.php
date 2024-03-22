<?php

function upload($file)
{
    // helper(['form', 'url']);

    // $validated = $this->validate([
    //   'file' => [
    //     'uploaded[file]',
    //     'mime_in[file,image/jpg,image/jpeg,image/gif,image/png]',
    //     'max_size[file,1024]',
    //   ],
    // ]);

    // if (!$validated)
    //   throw new Exception('Missing or invalid File in request');

    if (null === $file) {
        throw new Exception('Missing or invalid File in request');
    }

    if ($file->isValid() && !$file->hasMoved()) {
        // Get file name and extension
        $name = $file->getName();
        $ext = $file->getClientExtension();
        // Get random file name
        $newName = $file->getRandomName();
        // Store file in public/uploads/ folder
        $file->move('../public/uploads', $newName);

        // File path to display preview
        return 'uploads/'.$newName;
    }

    throw new Exception('Missing or invalid File in request');
}
