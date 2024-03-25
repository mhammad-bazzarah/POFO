<?php

/** Handle file upload */

function handleUpload($inputName, $model = null)
{
    try {
        if (request()->hasFile($inputName)) {
            if ($model && \File::exists(public_path($model->{$inputName}))) {
                \File::delete(public_path($model->{$inputName}));
            }
            $file = request()->file($inputName);
            $fileName = rand() . $file->getClientOriginalName();
            $file->move(public_path('/uploads'), $fileName);
            $filePath = "/uploads/" . $fileName;
            return $filePath;
        }
    } catch (\Exception $e) {
        throw $e;
    }
}
// Delete File
function deleteFileIfExists($filePath)
{
    try {
        if (\File::exists(public_path($filePath)))
            \File::delete(public_path($filePath));
    } catch (\Exception $e) {
        throw $e;
    }
}

// Get Dinamic Colors
function getColor($index)
{
    $colors = ['#8e3ac5', '#f30c14', '#0df21e', '#f2e50d', '#020d0d', '#28d6d7'];
    return $colors[$index % count($colors)];
}

// Activate   Navbar
function setSidebarActive($route)
{
    if (is_array($route)) {
        foreach ($route as $r) {
            if (request()->routeIs($r)) {
                return "active";
            }
        }
    }
}
