# Gazelle
A PHP package mainly developed for Laravel to manage validator and save easily.

Usage
====

**Configuration**  

In your model, set GazelleTrait like the below.

    <?php
    
    use Sukohi\Gazelle\GazelleTrait;
    
    class Animal extends Eloquent {
    
        use GazelleTrait;
    
        protected $guarded = ['id'];
    
    }

Now you can call the methods named easyValidator() and easySave().

**Validator**  

    $validator = Animal::easyValidator([
        'name' => 'required',
        'count' => 'required|numeric|min:0',
    ]);

    if($validator->fails()) {

        // Redirect or something here..

    }
    
    // with Attribute Name

    $validator = Animal::easyValidator([
        'name' => ['required', 'Animal Name'],
        'count' => ['required|numeric|min:0', 'The Number of the Animals'],
    ]);

**Save**

    // Insert
    // In this case, Input::get('name') and Input::get('count') will saved.

    Animal::easySave(['name', 'count']);


    // Update

    $id = 1;
    Animal::easySave(['name', 'count'], $id);


    // with Extra Data
    // If "Input" has the same key, the value will be overwritten.

    Animal::easySave(['name', 'count'], $id, [
        'name' => 'Springbok'
    ]);


    $animal = Animal::easySave(['name', 'count']);  // You also can get instance. If save failed, return value is null.

License
====
This package is licensed under the MIT License.

Copyright 2015 Sukohi Kuhoh