<?php
require_once('database.php');

// Get category ID
if (!isset($category_id)) {
    $category_id = filter_input(INPUT_GET, 'category_id', 
            FILTER_VALIDATE_INT);
    if ($category_id == NULL || $category_id == FALSE) {
        $category_id = 1;
    }
}

// Get name for selected category
$queryCategory = 'SELECT * FROM categories
                  WHERE categoryID = :category_id';
$statement1 = $db->prepare($queryCategory);
$statement1->bindValue(':category_id', $category_id);
$statement1->execute();
$category = $statement1->fetch();
$category_name = $category['categoryName'];
$statement1->closeCursor();


// Get all categories
$query = 'SELECT * FROM categories
                       ORDER BY categoryID';
$statement = $db->prepare($query);
$statement->execute();
$categories = $statement->fetchAll();
$statement->closeCursor();

// Get products for selected category
$queryProducts = 'SELECT * FROM animals
                  WHERE categoryID = :category_id
                  ORDER BY animalID';
$statement3 = $db->prepare($queryProducts);
$statement3->bindValue(':category_id', $category_id);
$statement3->execute();
$animals = $statement3->fetchAll();
$statement3->closeCursor();

echo "hello";
<!DOCTYPE html>
<html>
    <head>
        <title>Zoo</title>
        <link rel="stylesheet" href="main.css">
    </head>
    <body id="zoo">
        
        <div contenteditable="false" class="zooField">
            <h1 id="Zooname" label for="name" class="title">World Zoo</h1>
            <div class="zooInfo">
            <p id="Zoocapacity" label for="capacity">Capacity:250</p>
            <p id="numberofanimals" label for="animalNumber">Number of animals:4</p>
            <p id="numberofguest" label for="guestNumber">Number of guest:57</p>  
            <button id="myBtn" >Admit Guest</button> 
            <button id="addAnimal">Add Animal</button>
            </div>
        </div>
     
        <div class="animalInfo">
        <h2 id="animals">
            <h1 id="Animallist" class="title">Animals: </h1>
            <!--Added a animal list with a find by name function and on key up event handler-->
            <ul id="animalList">
        </h2>
        </div> 


        <section>
        <!-- display a table of animals -->

        <table>
            <tr>
                <th>Name</th>
                <th>Age</th>
                <th>Gender</th>
                <th>Weight</th>
                <th>Is Pregnant?</th>
                <th>&nbsp;</th>
            </tr>

            <?php foreach ($animals as $product) : ?>
            <tr>
                <td><?php echo $product['animalName']; ?></td>
                <td><?php echo $product['age']; ?></td>
                <td><?php echo $product['gender']; ?></td>
                <td><?php echo $product['animalWeight']; ?></td>
                <td><?php echo $product['isPregnant']; ?></td>
            </tr>
            <?php endforeach; ?>
        </table>        
    </section>

    </body>
</html>
