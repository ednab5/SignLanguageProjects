<?php

require_once './services/DictionaryServices.php';

Flight::route('GET /dictionary', function(){
    $dictionaryServices = new DictionaryServices();
    $result = $dictionaryServices->getAllDictionaries();
  
    Flight::json($result, 200);
});

Flight::route('POST /add_dictionary', function(){
    $signLanguage = Flight::request()->data['sign_language'];
    $word = Flight::request()->data['word'];
    $phrase = Flight::request()->data['phrase'];
    $image = Flight::request()->files['image'];

    // Get the uploaded file
    $imageFile = $image['tmp_name'];

    // Check if a file was uploaded
    if (!empty($imageFile)) {
        // Read the file contents
        $imageData = file_get_contents($imageFile);

        // Encode the file data as base64
        $imageBase64 = base64_encode($imageData);
    } else {
        // Set a default value for image if no file was uploaded
        $imageBase64 = '';
    }
  
    $dictionaryServices = new DictionaryServices();
    $result = $dictionaryServices->addDictionary($signLanguage, $word, $phrase, $imageBase64);
  
    Flight::json(array('message' => $result), 200);
});

Flight::route('DELETE /delete_dictionary/@id', function($id){
    $dictionaryId = $id;
  
    $dictionaryServices = new DictionaryServices();
    $result = $dictionaryServices->deleteDictionary($dictionaryId);
  
    Flight::json(array('message' => $result), 200);
});

Flight::route('POST /update_image/@id', function($id){
    $dictionaryId = $id;
    $image = Flight::request()->files['image'];

    // Get the uploaded file
    $imageFile = $image['tmp_name'];

    // Check if a file was uploaded
    if (!empty($imageFile)) {
        // Read the file contents
        $imageData = file_get_contents($image['tmp_name']);

        // Encode the file data as base64
        $imageBase64 = base64_encode($imageData);
    } else {
        // Set a default value for image if no file was uploaded
        $imageBase64 = '';
    }
  
    $dictionaryServices = new DictionaryServices();
    $result = $dictionaryServices->updateDictionaryImage($dictionaryId, $imageBase64);
  
    Flight::json(array('message' => $result), 200);
});

?>
